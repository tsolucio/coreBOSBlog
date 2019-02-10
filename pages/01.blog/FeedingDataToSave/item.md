---
title: Feeding Data to the Application
date: 2019/02/10 13:08
metadata:
    description: 'Learn how to correctly save a record from within the application.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Guido Goluke'
header_image_file: david-lazaro-347836-unsplash.jpg
header_image_height: 395
header_image_width: 568
taxonomy:
    category: blog
    tag: [development]
---

Another guest post from Luke where you will learn the complexities of saving records from within the code, the correct way to do it and some future optimizations that will be implemented.

===

**When developing for coreBOS I often stumble on the format to send into certain functions. Which is not really hard to do, since there are some cases where you would expect something very different to happen than what actually does happen. Let's take this opportunity to share what I've learned so far, won't we?**

 ! Feeding data to the save method: how to do what when?

The two datatypes that trip me up the most (and probably will trip you up the most as well) are dates and numbers. The reason for this, of course, is that while databases have a fairly standardized way of formatting both types, humans do not. For instance, you may live in a country where numbers are typically formatted like 2.886,34. In a database, that will always become 2886.34, or, if your column is configured to six decimals for instance: 2886.340000. Of course the same goes for dates. Standard ISO format is YYYY-MM-DD (dates), or YYYY-MM-DD HH:mm:ss (date-times). We, pesky humans, on the other end have very different flavors when formatting dates.

If you've ever written code for coreBOS, you may have done something like this:

```PHP
// Retrieve the record you want to update and prepare it for editing
require 'modules/MyModule.php';
$focus = new MyModule();
$focus->retrieve_entity_info($some_id, 'MyModule');
$focus->mode = 'edit';
$focus->id = $some_id;
```

Then you of course want to edit some fields:

```PHP
$focus->column_fields['my_field'] = $qty_of_orders * $avg_order_value;
$focus->column_fields['my_date'] = date('d-m-Y');
```

And lastly, save it. Now here's the tricky part. When you did the 'retrieve_entity_info', the 'column_fields' array was populated with data from the database. That means ISO formatted dates, numbers without your favourite thousands separator of decimal separator and up to 6 decimals (depending on the column settings for the field).

So now you've updated two fields with some calculated value and a date, formatted to European style. You're ready to send that data back in! You might be tempted to do:

```PHP
$focus->save('MyModule');
```

 !! Please don't do that. Not now at least.

Because think about it: what do our two updated fields contain? One field has some number we presume (we can't tell from the variable names exactly) and the other has a date, formatted European style and most definitely not ISO format. So to summarize we have one field that is formatted in a way that we know is wrong, and one that may be wrong, but we’re not sure. And what if the field value wasn’t set by us in code, but entered by a user? Then we could expect anything.

 ! Some background

One important thing to know and always keep in mind is that the ‘save’ method (that [lives on CRMEntity](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L1050)) **expects data to be formatted in user format**. That means the current user. So when you’re coding some save thingy like above, you won’t know who that is. We’ll explore the CRMEntity class later on, it deserves some more tender love ‘n care, but first, let’s look at how you can make sure you send your data correctly to the ‘save’ method.

Basically, you do everything you want to the column_fields array. Take it out to dinner, start a vineyard together, it’s all good. But before you call the save method, you prepare the data. To do that you do the following:

```PHP
$handler = vtws_getModuleHandlerFromName(‘MyModule’, $current_user); // Remember to pull user from global scope
$meta = $handler->getMeta();
$focus->column_fields = DataTransform::sanitizeRetrieveEntityInfo($focus->column_fields, $meta);
```

That’s basically three lines you will always need. Check out how the current user comes into play, just like we predicted earlier. It is used to retrieve a handler. You don’t have to know what the handler does (I don’t), but it’s telling that it needs the module name you’re saving and the current user object.

Then you get some meta information from the handler and lastly, you overwrite the column fields you are about to save with a sanitized version of itself by using the DataTransfom class. Basically, these three steps make sure you feed user formatted data to the ‘save’ method.

Nice! We’re all done, right? Throw that into the ‘save’ method and voila! Well, sadly no. At least not always. Before I tell you why let’s first get back to the CRMEntity class. You’re probably thinking it must be a huge function right? It’s not. In fact, mostly, it acts as a wrapper for another method in the same class: [saveentity](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L79). What the ‘save’ method does is (mostly) fire the multiple ‘beforesave’ and ‘aftersave’ events and, naturally, fire ‘saveentity’ in between the ‘beforesaves’ and ‘aftersaves’.

So let’s track the data. What does ‘saveentity’ do then? Well, not a whole lot either. It does some checks when you have image fields, checks if you didn’t send in an empty record, but somewhere in the middle, it calls a very important method: [‘insertIntoEntityTable’](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L524). This is where the actual saving of your data takes place.

At some point, it starts looping over the fields you sent into the ‘save’ method. For each field, it checks the UI type. For each field, it calls some UI type-specific code that prepares the data you sent in to be inserted in the database, making sure it is correct.

So where is the danger then? You send in sanitized data right? And ‘insertIntoEntityTable’ expects that right? Well, not always. When you edit a record in full it does, so when you hit the edit button, update some fields and then save the record. But when you do a quick edit, on a single field, the data actually get treated **mixed**.

 ! What happens when quick-editing?

What happens when you hit save on a quick-edit is that an AJAX call sends a request to the server. There, coreBOS is listening and receives the field name and new value. It then opens up the entire record, basically like we did in the code examples, updates the field you edited and then saves the record. But in this case, it **does not send in the data in user format** into the ‘save’ function. If it sanitizes anything (I’m not sure if it does), it’s only the field you updated. Take a look at the ‘if’ clause in the ‘insertIntoEntityTable’ [function here](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L637). It checks (on a per-field base) for a number of conditions:
 - Is the $_REQUEST[‘file’] parameter set and is the value of $_REQUEST[‘file’] ‘DetailViewAjax’ (indicating that you updated a field through an AJAX action, so the quick-edit).
 - Is the $_REQUEST[‘ajxaction’] set and does it hold the value ‘DETAILVIEW’ (more or less the same as the last parameter)?
 - Is the $_REQUEST[‘fldName’] parameter set and does it **not** hold the field name of the current field in the loop in ‘insertIntoEntityTable’?

If all is true, a variable called ‘ajaxSave’ is set to ‘true’ in the loop, otherwise, it will be false (the default). So this will be **true** for **all fields in a record during quick-edit** (or other ajax-stuff), **except for the field you edited**. In other words: it expects only the edited field to be in user-format.

So let's take a look at what happens when treating, for instance, number fields. Take a [look here](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L773), at where this happens. It explicitly checks if the $ajaxSave flag is **false**. That means that the conversion from expected user format to database format will happen only for the field you actually edited in the quick-edit.

 ! So why should you care?

All is good right? The application does what it needs to the field values that need it. Well, yes but you might write some code that does some things the application didn't take into account. Let's imagine for instance that you open some related module's record in your [save_module method](https://github.com/tsolucio/corebos/blob/master/data/CRMEntity.php#L124). Or you (like I did a bunch of times) append an aftersave event listener to an existing module's save action. This, in turn, opens up some related record and does some special stuff, then saves that record using the 'save' method after using 'sanitizeRetrieveEntityInfo'.

Well, that whole operation also takes place when you quick-edit a record right? If you, for instance, create an aftersave event for Invoices that looks up the related SalesOrder, opens it, does some stuff and then re-saves it, all that code is **part of the same request**. And remember, that request has some special variables set, that makes 'insertIntoEntityTable' think that **only the field matching the name in $_REQUEST['fldName']** is formatted in user-format.

So what happens when, like in the example, you open up a SalesOrder, sanitize the data, and then save it? Well, every field in that SalesOrder gets written to the database as-is. So a number that gets sent in as 1.234,56 will be saved as 1.23456 and when you open that SalesOrder, you will see 1,23 (if and when your decimal separator is a comma, and your number of decimals is 2, but you get the idea).

 ! So what to do about it?

Now that you understand when this happens, and what happens, let's look at how you can prevent it from happening. Basically. there are two things you can do:

**1. Don't sanitize**

This is an option. We know that as long as $_REQUEST[‘file’] and $_REQUEST[‘ajxaction’] are set and have the correct values, converting from user- to database-format will be skipped. So you could make sure that all your values are in the database format. There is one caveat to this though. The only case in which conversion will happen is when the field name in $_REQUEST['fldName'] matches a field name you send in. This could happen when you have a financial field on one of the inventory modules for instance, that all have the same field name. Of when you have a field name 'subject' (which occurs in multiple modules). Sure, the last one won't suffer from lack of database conversion, but it's the mechanics I want you to understand.

 !!! In fact, I think it actually will suffer as normal text fields may lose special characters like accents and our ñ

**2. Temporarily disable conversion skipping**

The second one, that you will often see used in the native application code is to temporarily disable conversion skipping. So before you start the 'save' (with sanitized data!), you would store the $_REQUEST['ajxaction'] value in a temp value:

```PHP
$ajxholder = $_REQUEST['ajxaction'];
```

Then you would remove the request variable all together:

```PHP
unset($_REQUEST['ajxaction'];
// perform your sanitized save here
$_REQUEST['ajxaction'] = $ajxholder; //re-instate the request variable
```

This way, you temporarily remove the request flag that skips the conversion, then after that re-instate it so other code that might come after you still works as expected.

 ! The future?

Personally, I would prefer a 'smarter' way of doing things in 'insertIntoEntityTable'. Without breaking existing functionality, we could make the system perform an educated guess about what it is receiving. That should be quite simple. We know the user that is currently performing a save, we know his or her date format, we know his or her number formatting. We also know what the database wants. So some simple regular expressions could match the data coming into what we know would be user-format and if it is, convert it. If it's already database-formatted, just leave it as-is.

So now you're looking at me to implement that right? Sure, no problem. Just don't ask me when, I can be quite busy.

 ! Closing comment

Your proposal sounds like a very sane approach and would probably avoid a lot of errors and may even simplify the save process, especially on the developer side. I can’t guarantee to get to this in a timely manner either but I would ask you to sync with me before you start in order to not overlap each other. I will do the same.

Thank you VERY much for the time and sharing the knowledge, it has been extremely useful, even for me. :-)


Cover Photo by David Lázaro on Unsplash
<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@dlazaro66?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from David Lázaro"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">David Lázaro</span></a>


**<span style="font-size:large">Thanks for reading.</span>**

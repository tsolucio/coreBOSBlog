---
title: May 2015
date: 2017/07/09 20:08
metadata:
    description: 'coreBOS work during May 2015.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: May.png
header_image_height: 202
header_image_width: 350
taxonomy:
    category: blog
    tag: [development, 2015, evolution, webservice]
---

In May 2015 we construct upon the work of the previous months to add functionality through events and global variables and also an important development to support image fields.

===

 ! Query generator enhancements
 - Support for IN operator
 - Support for NOT IN operator
 - Fix some errors for better support of IN operator

<br/>

 ! Webservice Query Language enhancements

We enhance the supported query language syntax in the webservice interface by adding a direct connection to the QueryGenerator class we enriched during the past two months, permitting access to the directly related fields and support for parenthesis, "not in", and "not like" operators in the conditions.

You can [find examples in our unit tests project](https://github.com/tsolucio/coreBOSTests/blob/master/include/Webservices/VtigerModuleOperation_QueryTest.php) and in the [coreBOS Webservice Developer tool](../corebos-webservice-develo).

You can [read more information on the documentation project page](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebosws:querylanguage#basic_query_language).


 ! coreBOS Events

We add some more events for developers to plug in their logic.

The **corebos.entity.link.delete**, **corebos.entity.link.before**, and **corebos.entity.link.after** events will permit the developer to add their code when two records are unrelated or before and after they are related. In all events you will receive the name of the two modules and the exact two IDs of the records. You can see an example in the [coreBOS Events Example code](https://github.com/tsolucio/corebos/blob/master/build/HelperScripts/coreBOSEventsExample.php#L50) and get some more context in [this thread](http://discussions.corebos.org/thread-681-post-3554.html).

The **corebos.entity.import.overwrite**, **corebos.entity.import.merge**, and **corebos.entity.import.create** events, together with the **Import_Full_CSV** global variable will permit the developer to add some functionality to the import process. Continue reading below for more information.

 ! Global variables
 - **Import_Full_CSV:** Read the next section for more information
 - **Debug_Send_VtigerCron_Error:** All emails on this list will receive an email when the cron process produces a catchable error
 - **Calendar_sort_users_by:** Comma separated list of user column fields by which the user list on the calendar will be sorted. By default it is first_name,last_name
 - **Calendar_call_default_duration:** Initial number of minutes assigned to a call when creating. The default is 15 minutes.
 - **Calendar_other_default_duration:** Initial number of hours assigned to an event that is not a call when creating. The default is 1 hour..

<br/>

 ! Developer enhancements for import process

Constructing on the new import events and the **Import_Full_CSV** global variable we add the possibility to import all the CSV columns in order to do more actions during the normal import.

When the import process executes, only the mapped columns are imported. In other words, if you have a CSV with 10 columns but only 5 are mapped to fields in the module, then only those 5 will be read. The other 5 will be discarded. With the **Import_Full_CSV** global variable set to 1 all of the columns will be read. Only the 5 mapped columns will be saved but all 10 columns will be available to work with. That means that the 3 import events will receive all 10 columns and your code will be able to work with them to set the values of the columns that will be imported.

Let's suppose that you want to import a column whose value is the result of some operation on a few other columns. Basically you have three options:

**1.-** Open the CSV file in some spreadsheet program and make the calculations there before importing

**2.-** Create custom fields on the module to import all columns and add a workflow to execute the calculations

**3.-** Add code to intercept the import process. When a record has been read and all the values loaded, right before saving, you will get the whole record, with all the values so you can do the calculations and save the record directly with the definite result.



 ! Image field support on all modules
Image field support for all modules. uitype 69 fields simply work, even in inventory module product lines!!
[plugin:youtube](https://youtu.be/vgbrz092VDE)

<br/>

 ! Some others:

 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Security and optimizations
 - Translation.
 - Alphabetical sorting everywhere
 - Eliminate calendar code in favor of Calendar4you
 - Inventory lines better logic showing buttons when modules are inactive
 - Return more information on lead conversion fail in order to make detecting the conversion problem easier
 - Better error control on failed workflows

**<span style="font-size:large">Thanks for reading.</span>**


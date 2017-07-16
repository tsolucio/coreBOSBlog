---
title: March 2015
date: 2017/06/26 02:08
metadata:
    description: 'coreBOS work during March 2015.'
    keywords: 'CRM, vtiger, opensource, corebos, birthday'
    author: 'Joe Bordes'
header_image_file: March.jpg
header_image_height: 148
header_image_width: 341
taxonomy:
    category: blog
    tag: [development, 2015, evolution, events, workflow, birthday]
---

March is the first birthday of coreBOS. The gift for this year is a whole set of new features and functionality. We start breaking away from our vtiger crm origin and enjoy the liberty of being able to enhance and fix the code with no restrictions, giving true value to the users of coreBOS through our constructive work.

===

There are so many things to talk about in this month that I have had to make some separate blog posts and more documentation in the wiki, so it has been a while since my last monthly development post. Let's dive in.

 ! Workflow enhancements 
 - make the extension fully translatable and translate it
 - fix error in the _round_ function
 - fix error detecting the _has changed_ event on picklists
 - fix error in the save calendar event
 - add _format date_ function 
 - Detail view direct save functionality to launch workflows from actions

Let's look into those last two

With the **date format function** you will be able to put dates in your emails in any format you need, even creating textual representations as required. For example, you could do something like this

```
format_date(get_date('today'),'Y'))   // 2017
format_date(get_date('yesterday'),'m'))   // 06
format_date(get_date('tomorrow'),'d'))   // 27
format_date(get_date('today'),'d/m/Y'))  // 26/06/2017
```

But you can also create fields with precalculated values. For example, you could create a custom field to hold the year quarter each invoice was paid on in order to create reports.

The **Detail view direct save** action is a helpful utility to automate some workflow processes. The typical use case is when you have a workflow that is launched when a field is saved. Instead of forcing the user to edit the field, we can create an action link on the right panel that will do this save process, indirectly launching the workflow. With this, the user launches two or more actions with one click.


 ! Scheduled workflows
 
A long time missing feature which we actually implemented years ago for vtiger crm 5.0.4 (or 5.0.3, I don't remember) and that was ignored by them (as usual). 

Due to the importance of this feature I [dedicated an individual post for it](../ScheduledWorkflows).

 ! Reports
 - translations yes/no fields
 - limit related modules to two. Since the user can easily create very complex queries that either cannot be executed or would bring down the server if they were launched, we limit the number of relations that they can choose
 - order the list of related modules
 - currency fields fixes

<br/>

 ! coreBOS events for tax override and multi tax modules

Another advanced development that makes the system much more flexible and adaptable to many other countries and use cases.

Using the recent coreBOS [eventing system](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_hooks), we add a whole set of events that permit developers to totally override the default taxing logic.

You can [read all about them](../AdvancedTax), and the multi-taxing extensions for coreBOS that uses them to permit a completely flexible and powerful taxing configuration [in this post](../AdvancedTax).


 ! coreBOS javascript hooks

We add a javascript class that permits the developer to plug in their functionality into any coreBOS function or class method. This function is called **corebosjshook** and it will permit us to launch our own code **before** or **after** the selected function or **completely override** it with our own code. [Read all about it here](../coreBOSJSHook).

 ! Convert campaigns to a normal module

As we tend to standardize the base module code we also modify the application standard modules to make them use this base so they all have the same functionality and directly inherit the new functionality.

This month we clean up and standardize the campaign module giving it support for import, export, and deduplication, among others.

 ! Global variables

We start adding global variables throughout the application as we get used to the power and flexibility of this module and it's functionality. This month, besides making a few fixes and optimizations we add

 - product default units
 - service default units
 - product/service default
 - debug record not found

<br/>

 ! Comments related user email for workflow notifications

We add an autofill user field on comments. It fills in with the assigned user of the related entity. So, for example, if you, as user Joe, add a comment on an account assigned to user Lorenzo, this new field will get filled in with the email of Lorenzo so you can easily create workflows that inform Lorenzo that a comment has been added to a record assigned to him.

 ! Update exchange rate cron

This scheduled task launches, by default, twice a day. It connects to the Yahoo finance service and updates all the additional currencies activated in your application with respect to your base currency.

If you are interested in connecting with some other service [contact us](http://corebos.org/page/contact).

 ! Generic cache library

We extend the existing cache object, which only has support for a handful of global variables, with the functionality to hold any value in memory. You can use this in your code like this:

```
// save your information
VTCacheUtils::updateCachedInformation('key_for_your_data', 'your data');
```

When we retrieve it, we will get an array indicating if the information exists in the cache or not and the value if it exists.

```
list($value,$found) = VTCacheUtils::lookupCachedInformation('key_for_your_data');
if ($found) {
	// variable found in cache
	return $value;
} else {
	return 'Not found';
}
```

 ! Inventory details module

A genius idea from our community member Omar for which [I have dedicated a full post](../InventoryDetails). **Thank you Omar!!!**

 ! Search picklists on translated value

Each picklist value is created and saved with one string value. Any field where a picklist is shown will hold the string value of the select option in the field, but when it is shown it will be translated to the language of the user. Now, when the user searches for values in this picklist field he will introduce the text he sees, but that is not the text saved in the field so the search does not work.

We try to mitigate this problem with this fix, where we look for the inverted translation of the given string and search for that value. It is like a very dumb translator that is trying to help. We will get some right, but we will also get some wrong. At least it is better than getting it always wrong. Obviously searching for the real value saved in the field still works always and **we will dedicate time to fixing this correctly**.

 ! Some others:

 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Security and optimizations
 - Translation.
 - Migrate script from vtiger 6.x
 - Alphabetical sorting everywhere
 - Helper script text to picklist
 - Potentials related to contacts filtered by account
 - vtlib nonduplicate picklist entries
 - Mail converter search contacts on secondary email also
 - Headers script and header CSS links in popup so developers can plug in their code in the capture popup screen
 - QueryGenerator fixes

**<span style="font-size:large">A VERY active month!! Happy Birthday coreBOS.</span>**


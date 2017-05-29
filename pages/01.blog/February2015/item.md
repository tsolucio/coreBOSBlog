---
title: February 2015
date: 2017/05/29 23:08
metadata:
    description: 'coreBOS work during February 2015.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: february.jpg
header_image_height: 118
header_image_width: 425
taxonomy:
    category: blog
    tag: [development, 2015, evolution, events, workflow]
---

This month is centered on **security issues** and another customization game changer: **Global Variable module**

===

 ! Global variable module

We release the Global Variable module this month. This module permits the implementor, administrator, and users to customize the behavior of the application to their requirements. [Read all about it on this post](../GlobalVariable).

 ! Security, oWASP, htaccess, XSS

 - fix XSS vulnerability in compose email message
 - fix XSS vulnerability in error output
 - X-FRAME Deny
 - Some exceptions to add to your htaccess if your behind user and password in your site

<br>

 ! Branding. White label

One of those rare requests we get from time to time is to white label or directly change the brand and name of the application. This normally requires changing translation files creating update conflicts. Now that we have the global variable module we start a project to make this possible without changing the files. This month sees the first steps in this process which is a reality today.

 ! coreBOS.filters.modcomments **canadd** and **query criteria**

We add two new filters so that the programmer has full control over the comments shown and who can add/edit them. At the moment of writing this post, these filters have lost a lot of potential because the comments module is now a normal module that can be configured using the system privileges and also with the record level access business map. Still, these filters are supported and very powerful for fine tuning requirements.


 ! Workflow enhancements
 - translate the whole extension
 - if a task has been deleted for a scheduled workflow/email we ignore the work
 - establish relations when creating records from workflows
 - support for 4 new variables in workflow emails:

**HelpDesk Support email**<br/>
**HelpDesk Support name**<br/>
**Company Logo**<br/>
**Record CRM ID**<br/>


 ! Recycle bin enhancements

 - fixes and translations
 - add empty module and empty selected functionality

<br>

 ! Some others:

 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Security and optimizations
 - Translation.
 - Migrate script from vtiger 6.x
 - Optimize database: while creating the vtiger crm 6.x migration scripts we extract all the optimizations that are applicable to coreBOS
 - Alphabetical sorting everywhere
 - Transfer tags on lead conversion: if we convert a Lead that has tags they are not lost but transferred to the contact
 - Email template enhancements: now all emails are merged against the user sending the email, which permits us to sign the messages with user information
 - Email variable merge on leads fails when only custom fields are selected
 - Save uploaded images for email templates to storage directory for backups and because it makes much more sense than to put them in the test directory
 - New method in DataTransform class to sanitize Text Fields for Insert
 - Mass Edit or Ajax Edit on Invoice/SalesOrder is reducing Qty in Stocks from related products
 - Favicon on login page

**<span style="font-size:large">Thanks for reading.</span>**


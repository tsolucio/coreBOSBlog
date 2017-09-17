---
title: March 2016
date: 2017/09/17 20:08
metadata:
    description: 'coreBOS work during March 2016.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: March.png
header_image_height: 152
header_image_width: 726
taxonomy:
    category: blog
    tag: [development, 2016, functionality]
---

This month is the second birthday of the coreBOS application. As we continue to empirically demonstrate that this project has a lot of life in it and an enormous potential, with constant development, we release the first version of another game changer: **Business Maps** and squash another all time classic.

**<span style="font-size:large;color:red;">Happy birthday coreBOS!</span>**

===

 ! Business Maps

The Business Mappings and Conditions module permits implementors to define high-level configuration options for the execution of the application.

With this module, we achieve a much more configurable application without the need to depend on specific programming knowledge.

In the near future, I will dedicate a whole blog posts series on the different business map types and how they work. If you can't wait [start reading our documentation](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings) and asking questions in the forum and gitter.


 ! Currency and Decimal Support 

Correct locale support is a very complex issue. At this point in time, we have a long running project to make coreBOS know how to work with all the different combinations.

This month sees the release of this project whereas coreBOS now supports the different country combinations and up to 6 decimals.

 ! Workflow

 - Background log messages
 - Support for time fields in expressions

<br/>

 ! FAQ and Price Book

With our ongoing effort to standardize all the modules, we dedicate some time to these two modules and add support for import, export, quick create and deduplication along with the normal application functionality.

<br/>

 ! Import

 - Import script for calendar, price book, and emails
 - Import boolean fields with yes/no value
 - Import currency field 117 and conversion rate support

<br/>

 ! Emails

 - Email attachment error message when attachment cannot be uploaded
 - Mark emails with attachments on related list

<br/>

 ! Reports

 - Fixes in relations
 - Support for SMS status

<br/>

 ! Some others:

 - Limited support for user capture using uitype 10
 - Backup support port number of FTP server
 - Webservice corrections for date formatting
 - Better custom field support on email templates
 - User validation to avoid decimal and grouping separator being the same
 - Show only one row per calendar event when related to various contacts
 - QueryGenerator support for currency fields
 - Cost price field on product
 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Translation. Notice warnings, eliminate unused code, cleanup

**<span style="font-size:large">Thanks for reading.</span>**


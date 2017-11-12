---
title: November 2016
date: 2017/11/12 20:08
metadata:
    description: 'coreBOS work during November 2016.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: November.png
header_image_height: 153
header_image_width: 1089
taxonomy:
    category: blog
    tag: [development, 2016, functionality]
---

PHP7 and MySQL compatibility take up a lot of our time this month, but we still fit in some interesting development and user functionality along with a new advanced menu system and some bug fixes.

===

 ! Lightning Design System Menu

As we start to follow [LDS directives](https://www.lightningdesignsystem.com/) and apply them in different parts of the application we decide to implement a full menu editor extension and use LDS to power the new menu.

The enhanced menu system permits you to add hierarchical submenús with different types of entries like direct URLs or separators so you can configure and adapt the menu to your specific needs and it even looks wonderful.

 ! Workflow

 - System workflows cannot be edited nor deleted
 - Support users invites on events

<br/>

 ! Product/Service Divisible Selling validation

Inventory modules validation that forces Product and Service to be sold in indivisible packs.

There is a new field in the Product and Service that indicates if it can be sold divided or not and a module validation script enforces the setting.

An important side effect of this development, which was contributed by [Luke](https://github.com/Luke1982), is that we now have all the information of the product lines in the validation infrastructure.

 ! Global Variables Definitions

A very useful documentation project appears this month where we add a translatable language file for global variables that describe each one, giving information of their status, their default value and what they are for.

This documentation is directly accessible on the list, detail and edit views.

 ! Global Variables

 - Mail Manager folder to save attachments: **Email_Attachments_Folder**
 - **PBX_Get_Line_Prefix**

<br/>

 ! Developer

 - [predelete check](http://corebos.org/documentation/doku.php?npprocess=1&id=en:devel:corebos_hooks#corebosfilterpredeletecheck)
 - open popup hook on all uitype10 (multimodule)
 - links can now be loaded per module with a new **"load on module parameter"**. If it is not given it will load on all modules.
 - **custominfo fields on detail view**. We add two empty hidden fields on the detail view for any developer to use freely. These are essential when you need to have some context of where you were coming from before the detail view.
 - **corebos.add.tax** event which you can hook into when a new tax is created in the application. Thanks [Luke](https://github.com/Luke1982)
 - We add "quick create" information to the describe field webservice call

<br/>

 ! PHP7

 - Update adodb, htmlpurifier, nusoap, phpexcel, http_session, tcpdf, and http_request
 - Smarty
 - Eliminate chat

<br/>

 ! Mailmanager

 - eliminate html_safe in favor of htmlpurifier
 - eliminate qquploader in favor of dropzone
 - Force SSL verify peer

<br/>

 ! Warnings prosecution starts

It will still be a few more weeks before we completely release a full PHP7 compatible coreBOS but all the hard work is done and we start another project to eliminate all the warnings that are present in the code.

Our goal is to be able to execute the application with PHP error reporting set to E_ALL

At this point in time, there are modules that you cannot even access in this mode. As of the moment I am writing this article, I can say that you could now run the application in E_ALL mode even in production. Obviously, this is not recommended, but it can be done.

This project will consume a LOT on our time during the next months

 ! Other changes:

 - Inline edit was not saving previous value on cancel
 - Uitype 10 1:m on same module
 - Calendar: better module support
 - Session tab blocking
 - Mobile interface changes and enhancements
 - RSS migrate magpierss to simplepie
 - Eliminate zend json in favor of native php among other changes (PHP7)
 - Settings inventory notifications move to workflows
 - MySQL strict SQL fixes
 - Deduplication show dates correctly
 - Dropzone, update and fix product multi-upload
 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Translation. Notice warnings, eliminate unused code, cleanup

**<span style="font-size:large">Thanks for reading.</span>**


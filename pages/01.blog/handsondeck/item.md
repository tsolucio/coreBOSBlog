---
title: All hands on desk!
date: 2020/11/19 16:08
metadata:
    description: 'Help us test a few big impact projects.'
    keywords: 'CRM, vtiger, opensource, corebos, community, blog'
    author: 'Joe Bordes'
header_image_file: handsdeck.jpg
header_image_height: 512
header_image_width: 768
taxonomy:
    category: blog
    tag: [test, denormalize, calendar, 2020]
header_image_file: handsdeck.jpg
---

We are ready to release three big internal changes. We have validated them but I would like to ask you to give them a try before we release them into the main product.

===

The three projects represent a massive change in the code with very little to no impact on the visible part of the application. We have dedicated a lot of time to validate all the changes and I am feeling confident enough to release the code into the world but before I do that I would like to get some feedback from the implementors.

Let's talk about the changes first.

 ! Module Denormalization

This is, by far, the biggest of the three. The goal of the project is to move the columns in vtiger_crmentity to the main table of the module. The reason we want to do this is to reduce the size of the vtiger_crmentity table because in very (VERY) big installs with millions of records on some modules, the necessary join that is made to get the information from vtiger_crmentity makes the whole system slow.

This project will permit us to activate, on a per-module basis, the functionality. Effectively copying the columns to the main table of the module and deleting the rows from crmentity.

As you can imagine, this obligates us to change the whole code base, checking if the module we are working with has the columns in the central table or the main table. The impact of something like this is enormous but following our philosophy, we have gone to extremes to do this without any disruption for the users. Those of you with big installs will be able to benefit from the change, those of you who don't have this issue can just keep working normally.

 !!!! **Developer Notice** from a developer's point of view there IS a change, now we have to use a different approach to find the common central fields. As with the user experience we have tried to make this as easy as possible but...

I will dedicate a full post about this functionality as soon as we officially release it.

 ! Eliminate Calendar

In early 2017 we released a new Calendar module which has defined a progressive path towards the elimination of the internal calendar chaos we inherited from vitger crm. This project is another big step in this long-running task where we have taken the opportunity of having to go through the application to implement the denormalization project and eliminated all the direct calendar references from the code and finally eliminated the old calendar modules.

The Calendar is DEAD, long live the Calendar!

 ! Module Memory Reduction

The internal representation of a module contained a reference to the database access object and to the logging system object. Analyzing the codebase we saw that this was rarely used anywhere but it was a cause of memory usage and extra time moving those objects around when they are not needed. So we eliminated them in favor of the global object reference we use everywhere.

As a side effect, we have easier to read debugging messages as you can dump a module object and see all the relevant information easily.

 ! What do we have to show

So, after all this effort, what do we have to show?

> **Nothing**.

Incredible as that answer may seem, the final result of all those changes should be that the application just keeps working as it did and this is exactly what I need you to test: that all your typical functionality works as it did before. Whatever it is that you use keeps working as before: reports, workflows, editing, duplicating, de-duplicating, importing... whatever.

 ! How to apply new changes

**Warning** Work on a copy, DO NOT do this on a production install. Copy the install to another directory and database, and work there. These changes are not reversible (or at least not easily reversible)

**=> Update an existing install**

- copy the directory you want to test with: `cp -a origin destination`
- copy the database: `mysqldump`, create a new database, and load the dump
- edit config.inc.php file in the test/destination directory. change database connection variables, site_URL, and root_directory
- add a link to coreBOS repository if you don't have it already `git remote add corebos https://github.com/tsolucio/corebos`
- fetch the changes: `git fetch corebos`
- merge the denormalize branch: `git merge corebos/denormalize_module`
- resolve any conflicts
- login to the application, go to coreBOS Updater and apply all

You are ready to test. Please open tickets in github with the prefix **DENORM**. If you can't do that contact me on [gitter](https://gitter.im/corebos/discuss) or the [forum](https://discussions.corebos.org/).

When you finish, delete the directory and the database.

**=> New install**

I tested the install process and everything should be working if you start fresh, but feel free to give it a try and get back to me if you run into any issue. This is just a normal install but starting from the denormalize_module branch, so the steps would be:

- `git clone https://github.com/tsolucio/corebos sometestdirectory`
- `cd sometestdirectory`
- `git checkout denormalize_module`
- check permissions and launch the normal install process

**=> Online testing**

For those of you who just want to give it a test run, I set up an online demo install (using the procedure depicted in the previous section) which [you can access here](http://test.coreboscrm.com/denorm)


**<span style="font-size:large">Thanks in advance for your help!</span>**

<span>Photo by <a href="https://unsplash.com/@stijnswinnen?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Stijn Swinnen</a> on <a href="https://unsplash.com/s/photos/hands-on-deck?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
---
title: coreBOS Updater. Concept.
date: 2017/03/27 17:06
metadata:
    description: 'coreBOS updater: keep your coreBOS up to date. More information.'
    keywords: 'CRM, vtiger, opensource, fork'
    author: 'Joe Bordes'
header_image_file: cbupdater.png
header_image_height: 200
header_image_width: 200
taxonomy:
    category: blog
    tag: [fork, start, release, updater]
---

[I wrote about coreBOS Updater when it was released](../corebos-updater)

And also [documented it a little on the project's documentation wiki](http://corebos.org/documentation/doku.php?id=en:devel:corebosupdater&noprocess=1)

There are [many examples of what can be done with coreBOS Updater inside coreBOS](https://github.com/tsolucio/corebos/tree/master/build/changeSets), as we have been using the tool **for 3 years** now with excelent results.

So I'm not going to write about how it works here but of what it has brought to the application, the tremendous impact in maintenance and deployment, the dynamism and ease with which both developers and users can update their coreBOS and how it completely killed version numbers.

When we started developing coreBOS Updater we were looking for **a way to apply database changes to be in sync with the code**. Let me try to explain that.

As we develop new features and/or fix errors, we modify the code, we change the contents of the many files that are contained in the project. Some of these changes require also database changes for them to work. Nowadays distributing file changes is extremely simple in general and specially simple when using git and we all share a very similar file structure and contents, but distributing database changes is hard, each one of us has different contents with many dynamic identifiers assigned differently, custom fields, etc. This is the reason most applications have migration scripts. The producer knows you are using one version of their software and create a tailored script with all the database changes to convert your database to the next version. This is a complex, time consuming, error prone task. It is a problem both for the producer and the person responsable of implementing the migration/upgrade.

 ! We needed to eliminate this process from coreBOS so we could spend our time doing valuable things.

**coreBOS Updater** substitutes the migration script for many smaller scripts that are included in the application as they are needed. So if the developer needs to make a database change for his code to work he will create it at that moment, when he remembers and knows what needs to be done, he will record the change in the Updater and move along. When you update your code you receive the file changes and also the database update, as soon as you load the change it will be applied to your database along with any others that may have arrived. The Updater is smart enough to know which changes are pending in each database, it will mark them for you and permit you to block or undo changes if you need to. In short it will keep your database in sync with your code in small gradual steps that are easy to apply, debug and control.

You can imagine **a world full of coreBOS installs**, each one at a different point of the development process and **coreBOS Updater** knowing precisely what each one needs to get up to date with the current state of the project.

 !!! The **impact** that Updater has brought to coreBOS is even bigger than I could have imagined.

It has permitted us to roll out features and fixes at an incredibly fast pace, not having to worry about the database nor the different state in which each client has his install. We can juggle an infinite amount of installs easily and **so can you!** It has also eliminated completely the need for version numbers which will be the subject of my next post

See you soon 

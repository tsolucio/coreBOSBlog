---
title: Denormalization Project Released
date: 2021/02/14 18:08
metadata:
    description: 'Official release of the coreBOS Denormalization project.'
    keywords: 'CRM, vtiger, opensource, corebos, community, blog, database, Denormalization'
    author: 'Joe Bordes'
header_image_file: denormalize.png
header_image_height: 556
header_image_width: 990
taxonomy:
    category: blog
    tag: [database, Denormalization, 2021]
---

**Official release of the coreBOS Denormalization project.**

===

Today sees the official release of the **Denormalization Project** that we [explained a few months ago](../denormalize).

This is a very big internal change in the code and the database structure (almost 300 commits). All the tests we have been doing in the last months seem to indicate that there should be no impact in functionality and very little visible change.

Since we were changing the whole code base with this project I decided to mix in another two projects that also impact the code:

- final elimination of the old vtiger CRM calendar module, now we exclusively use coreBOS Calendar module
- elimination of a local copy of the database object in every module instantiation to reduce memory consumption (and make debugging easier)

Besides those two projects there are a few interesting enhancements that arrive also:

- [Woocommerce integration](../woocommerce)
- Upsert workflow task
- new workflow expression functions
- bug fixes, code optimizations and clean up that we found as we worked
- Run Web service call change
- SQL optimizations and refactor unused code

<span></span>

 !! Breaking change

Of those changes, the **Run Web Service Call** change is worth commenting as it is a <span style="color:red">**breaking change**</span>. Those of you that follow coreBOS know that we try to not make this type of change but in this case, it was necessary to convert the workflow task into something really powerful. I will talk about the change and implications in the regular changelog blog post I do every month, but feel free to look for me if you are using this workflow task and have to update. I will explain and help you adapt your workflow.

 !! So, this change is complex. Very different than what we normally do in coreBOS, which is small incremental changes.

I would ask you to:

- make a copy of your install on another server: code and database
- apply the update in the test install
  - update the code as usual (git pull corebos master)
  - log in, wait a moment as the necessary changesets are applied
  - go to coreBOS updater, load (should be no new ones), and apply all
- test your install: normal processes, workflows, make sure data is being saved correctly, ...
- inform me on how it goes. Any feedback is appreciated
- when you are satisfied, make a copy of the production database (for good measure and it is always a good idea anyway) and update the production install
- watch it for a few weeks: randomly check on workflows, information, calculations, reports...
- contact me if you find anything strange
- after that you can start updating other installs you may have

**Thanks for your help and confidence!!**

**<span style="font-size:large">Don't hesitate to inform me about any issues you may run into. Enjoy!</span>**

---
title: coreBOS Updater
date: 2014/07/23 11:56
metadata:
    description: 'Initial post: coreBOS opensource project started'
    keywords: 'CRM, vtiger, opensource, fork'
    author: 'Joe Bordes'
header_image_file: cbupdater.png
header_image_height: 200
header_image_width: 200
taxonomy:
    category: blog
    tag: [fork, start, release]
---

###How to keep your coreBOS application up to date

**coreBOS 5.5** has brought a new tool to our powerful business operating system, **coreBOS Updater**.

Since we have a very stable and tested code base, and thanks to the powerful code administration and distribution system that [Git/GitHub](https://github.com/) gives us, it just seems natural to put your coreBOS install under code versioning with git (be that private or open) and point a remote to the [public, open source coreBOS project](https://github.com/tsolucio/corebos).

Once you have that setup, updating your code with our (constant) changes is fairly easy, as git carries all the heavy weight during **merge**, leaving us to fix the minor details.

So with the approach above and the fact that the majority of changes we make are also **tested and stable**, you really don't have to wait for us to release an official download to get the new features, you just update your code and **apply the database changes** the new code may require.

 ! <span style="font-size: x-large">Wait!! Apply database changes??? How do you do that? git doesn't do that, how do I know what changes I need to apply?</span>
 
###Enter coreBOS Updater.

**coreBOS Updater** is a tool that will control the state of our database with respect to the code and will be able to automatically apply the pending changes that are needed. This way the upgrade process is converted into these steps:

 * update your code with git, or manually if your brave  
 * log into the application and go to the coreBOS Updater module
 * click on the “Load Updates” button
 * click on the “Apply All” button

**You are finished! That easy!** coreBOS updater has taken care of all the pending database changes and your code and database are in sync and ready for you to start working.

Going forward **all future releases of coreBOS will follow this procedure** to apply database changes for the upgrades.

[Read all about it on the projects wiki/documentation page](http://corebos.org/documentation/doku.php?id=en:devel:corebosupdater).
---
title: coreBOS 5.5 has arrived!!
date: 2014/06/30 09:08
metadata:
    description: 'coreBOS 5.5 new release'
    keywords: 'CRM, vtiger, opensource, fork, release'
    author: 'Joe Bordes'
header_image_file: newrelease.jpg
header_image_height: 300
header_image_width: 300
taxonomy:
    category: blog
    tag: [fork, start, release]
---

 !!! We have just released a new version of the coreBOS project.

Let me start by saying that this release is not what I expected. I had in mind for this release a set of new functionality based on the many modules, extensions and patches that we have constructed in the past years, instead the surprisingly **high amount of people** who have approached the project and expressed their needs and expectations have made me change my priorities a little.

Truth is that I have returned to my initial vision, where I see **coreBOS** as the **core foundations** you construct your business upon, not an on-demand CRM nor an application, but as a **business tool** you can count on to get out of the way and let you do your business, optimizing your resources, like a good **operating system** should do.

That is what many people asked me for, a **solid, trustworthy and proven base** that they can keep on growing on. So I focused on the core functionality needed and came up with three big lines for this release:

 * **REST enhancements**. [Customer Portal](http://corebos.org/documentation/doku.php?id=en:devel:coreboscp&noprocess). from coreBOS 5.5 forward we have a whole new set of webservice functionality to support advanced application development like our [coreBOSCP Customer Portal Project](http://corebos.org/documentation/doku.php?id=en:devel:coreboscp&noprocess) and many others. This is the way to go to extend coreBOS.
 * **PHP 5.4 and 5.5 support and code cleanup**. coreBOS now runs correctly on PHP 5.4 and PHP 5.5. Besides fixing the code we have started upgrading the libraries and documenting the dependencies and are relentlessly hunting down all the notice and warning messages (we have eliminated hundreds already).
 * **[Code changes](http://corebos.org/documentation/doku.php?id=en:devel:packagemodules&noprocess) and [updates](http://corebos.org/documentation/doku.php?id=en:devel:corebosupdater&noprocess) enhancements**. A whole new distribution method that will make future upgrades, both in the code and in the database MUCH easier. This prepares us to start launching the new functionality we have right around the corner.

I am very happy to see all the REST enhancements, because they are at the center of many of the **satellite projects and open development initiatives** I am juggling right now with my team and with other community members who have shown their support (INCREDIBLE! you wouldn't believe how many projects have started and are coming along), but I am personally very satisfied with the structure my team came up with for the code, it makes it easier to upgrade going forward, specially the [**coreBOS Updater**](http://corebos.org/documentation/doku.php?id=en:devel:corebosupdater) which I'm sure will prove to be a life saver in the near future.

From where I stand right now I would expect a **new version in a couple months** maximum if not sooner, that version should see a stable and updated code base (finish upgrading the libraries that haven't been upgraded yet), a final set of REST changes that are needed for inventory modules and email support and the new features that are in development right now along with changes we already have should start appearing in that one or the next :-)

You can find the code in the usual places, our [documentation wiki](http://corebos.org/documentation/doku.php?id=en:installupdate&noprocess), [github](https://github.com/tsolucio/corebos), [sourceforge](http://sourceforge.net/projects/corebos/), [website](http://corebos.org/page/downloads)

**We continue our journey!!
Keep tuned :-)**

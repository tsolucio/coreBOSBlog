---
title: coreBOS Upgrade Script
date: 2022/02/06 11:08
metadata:
    description: 'Learn how, when, and why to use the coreBOS upgrade script.'
    keywords: 'CRM, vtiger, opensource, corebos, update, upgrade'
    author: 'Joe Bordes'
header_image_file: upgrade.jpg
header_image_height: 665
header_image_width: 1000
taxonomy:
    category: blog
    tag: [update, updater, upgrade, 2022]
---

Learn how, when, and why to use the coreBOS upgrade script.

===

**coreBOS is an evergreen software.** This means that it is continuously in a production state and usable. While we add new features, fix bugs, and refactor major technological decisions made in the past without disrupting your business. That is the whole point of the project; being a reliable business software that you can trust to follow you into the future without causing major issues in your company. After all, you already have enough things to take care of every day.

coreBOS accomplishes this task with a lot of care and a serious approach based on the power of git and coreBOS updater. But for this to work seamlessly you have to update your coreBOS frequently. As I said before, we try hard to maintain an easy upgrade path from older versions of coreBOS. Usually, you just update your code (git pull), login, go to coreBOS updater, load and apply all changes. That easy!

The login process will apply fundamental changes that would stop the application from working. If you can't log in, you can't get to the updater and it can't do its magic. So, even if you are missing some changes, coreBOS knows how to get you up to date.

Now, even with all that effort, some of the changes that we have made inside coreBOS are so important, with such a big technological impact, that, if your coreBOS is very old, you may find that the log in process is not able to apply the necessary changes to let you in.

For this specific case, we created many years ago, a "catch-all" script that you can run to get back into your coreBOS. This script, which you can find in `build/HelperScripts/installupdater.php`, must be copied to the root of your install and executed from the browser.

It will apply a set of the most important coreBOS updater changes that are needed to be able to access your coreBOS. Note that it does not apply a full upgrade, you still have to go to coreBOS updater and apply all the changesets there, various times. The upgrade script is just applying all those changes that can block the log in process. So you can get in and apply the changesets.

So, in short. If you are trying to update an old coreBOS and follow the typical procedure of updating your code, but when you try to log in you cannot get past the authorization screen then you can copy the installupdater.php script to the root of your install, run it from the browser and try to login again.

 !!! Why now with this blog post?

In the past recent months, we have updated various old coreBOS and some vtiger CRM applications that required us to review the functionality in the upgrade script and modify some of the older changesets to adapt to the new codebase.

The procedure we applied in those upgrades was to run the upgrade script various times. Each time we would get different errors. These were all due to custom code changes, custom workflow scripts, and custom modules. Obviously, each database had its' own set of custom changes and required specific code changes to undo the changes, document them, and configure the functionality using one or more of the generic, non-invasive coreBOS ways. So there is no easy way of updating if you are in a situation where your old database has custom changes. Each case has to be studied and fixed specifically. The good news is that we have a lot of experience and you will end up in a product that will avoid this situation going forward.

 !!! Caution.

Note that this only applies to very old coreBOS installs and vtigerCRM 5.4 migrations, it is a precise process that depends a lot on the modules and changes applied to the database you are trying to update. Keep in mind that this is an edge case that we have only tested a few times. So, if you run into this case and the script doesn't catch your particular situation, please contact us so we can add it to the code.

**<span style="font-size:large">Ask for help, we are happy to assist. Enjoy!</span>**

<a href='https://www.freepik.com/photos/technology'>Cover Technology photo created by rawpixel.com - www.freepik.com</a>
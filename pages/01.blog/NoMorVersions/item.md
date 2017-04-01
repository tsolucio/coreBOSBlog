---
title: coreBOS Updater: No More Versions
date: 2017/04/01 22:06
metadata:
    description: 'coreBOS updater: keep your coreBOS up to date. No More Versions.'
    keywords: 'CRM, vtiger, opensource, fork'
    author: 'Joe Bordes'
header_image_file: nomoreversions.jpg
header_image_height: 300
header_image_width: 500
taxonomy:
    category: blog
    tag: [version, release, updater]
---

 !!! We don't release many versions.

Some may be worried, they shouldn't be, there is a simple explanation: **we have been hexed by the Scarlet Witch**, she said: **"No more versions!"**  (For all those Marvel comics lovers out there!)

A few years ago coreBOS released a novel concept: **coreBOS Updater**. We knew what we were after, we had no idea how incredible the impact would be!

It turns out that with our move to git and total (real) open source, code changes between different installations of coreBOS based projects has become child's play.

Git is an incredible tool that has permitted us to almost eliminate migrations, all the heavy lifting of moving code changes from one installation to another is done by git, we simply have to lime some minor conflicts and we can do it so quickly and often that you don't even notice that you are doing migrations, **it is incredible**. This has been a mind boggling revelation and liberation, finally we can make changes freely, making the application evolve at a tremendously rapid pace in benefit of everyone.

While we were discovering the fantastic feeling of liberty and power this new approach gave us, **coreBOS Updater arrived** and tied the database changes that each code version required with the underlying git control system. All of a sudden we could distribute any new functionality or bug fix and make database changes that anybody could apply easily, but even better, coreBOS Updater "knows" the state of your code and will make sure your database is in complete synchronization with that code state: 

 ! Incredible, powerful and simple!

We were free to make any changes to the application at any time. As often as we wanted, as quickly as they were needed. coreBOS Updater could even handle private customizations in the same way, making it easy to apply changes for a clients particular needs and documenting them forever!

Since then we have been learning how the system works, trying it on different production installs, seeing the impact in our day to day work, slowly taking conscious of the extent and life changing spell that we are under. Just like the Marvel 2004 event impacted the Marvel Universe in such a way that it was never the same;

 ! Life after coreBOS Updater has changed totally.

Such is the power of coreBOS Updater and git that now I know and can confidently confirm that we **may never release another official version again (!)** and, if we do, it will be pure marketing.

The simple idea is that thanks to git and coreBOS Updater all you have to do to get the latest version of the code is _git pull_ and apply all the coreBOS Updater changes. You can do this as many times as you want, basically every time we upload a change, which is almost every other day, really! That is what makes it so ridiculous to release new versions, I would have to release a new version every other day, we would approximately be on version 4000, as of the day I am writing this article. That would be very time consuming.

So don't worry about us not releasing new versions, in reality **we are releasing new versions, almost every day** and all you have to do to enjoy the changes is keep your code in sync with git and coreBOS Updater!

You can compare it to the applications on your cell phone or computer, you get updates daily which you blissfully apply and you don't even know, nor care, what version of the app you are using. coreBOS needs you to do some magic with git to update your files, because you can change the code in order to adapt it to your needs, which is something you don't do with your cell phone apps, but the concept is the same.

If you really want to know what version you are on, you have to ask git. This command will give you the information you are looking for:

```
git log -1
```

I just executed this command on my development install and got this answer:

```
commit 63329a1c6d34d55669d97e259c0b1ec70db4fc49
Author: Joe Bordes <joe@tsolucio.com>
Date:   Sat Apr 1 01:40:29 2017 +0200

    style(Reports) eliminate warnings and format code
```

As you can see git tells us the version **63329a1c6d34d55669d97e259c0b1ec70db4fc49** and the date it was released on.

 !! Git is capable of downloading the exact set of changes and applying them to bring your code up to date.

If you downloaded the application directly from GitHub without using the _git clone_ command, then you can open your _vtigerversion.php_ file and you will see the same information there.

```
<?php
...
$coreBOS_commit_info = '2017-04-01 01:40:29 +0200 (63329a1)';
?>
```

As you can see these version numbers are **not user friendly** nor are they any good for commercial and marketing needs, so we mark certain big events as specially important and dub them with a commercial number like [coreBOS 7](http://blog.tsolucio.com/ha-llegado-corebos-7/) which brought full PHP 7 support, among other things.

**Thanks for reading**

P.D.: I am seeing similar trends in many other projects on github. I wouldn't be surprised at all to see a near future where version numbers lose all their significance and become a simple marketing scheme. For example, I am following [BackupPC](https://github.com/backuppc/backuppc). They released their version 4.0.0 and announced it to the world. Automatically, people started reporting issues and sending code changes, which they attended and accepted (which is what real open source projects do), so 20 days later they released version, 4.1.0 and then version 4.1.1 only 6 days later! The fact is that they could just stop wasting their time setting up releases and tell people to download directly from the github project.

![Scarlet Witch](scarletwitch.gif)

**<p style="font-size: larger">Enjoy!</p>**

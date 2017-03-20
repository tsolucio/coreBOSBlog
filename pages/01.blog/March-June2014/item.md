---
title: March-June 2014: coreBOS 5.5
date: 2017/03/20 10:00
metadata:
    description: 'coreBOS work during March to June 2014. coreBOS 5.5 is released'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: march-june.png
header_image_height: 114
header_image_width: 700
taxonomy:
    category: blog
    tag: [development, 2014, evolution]
---

## March-June 2014: coreBOS 5.5

 ! So, what was I doing during these first months of life of coreBOS?

Well, mostly I was very nervous, expectant, waiting for the reactions of the community. I had been asked hundreds of times to leader this fork. We had just finished [another vtiger Europe day](http://crmevolutivo.com/doku.php/vtgt2013) where everyone who assisted spoke to me about forking vtiger crm. What I received, in general, **was a cold shoulder and another total disappointment** from my vtiger crm experience. Very few from the event followed. Not only was I ignored but many straight out told me I was wrong and stupid. That, obviously made me feel terrible. But there were also some who supported and applauded my initiative. I have to thank both groups. The first for giving me the courage and prowess to push forward and the second for giving me the reasons and support to convert **coreBOS into a reality**.

### Development

coreBOS was conceived at the beginning of 2014. It was long overdue and should have been done sooner, but things come when they need to, I suppose.

We spent the first few months organizing the project and release a first official commit on **March 25** starting from the existing code base of vtiger CRM 5.4.

From that date to the start of **July 2014** most of the work are things that vtiger crm should have had for years, and would have had if vtiger company were actually an open source company:

 - **security fixes** and patches that were already available in the community
 - **basic functionality** that our team or others had already shared with vtiger crm but were totally ignored as is still happening now in 2017, like
 - filling in email address when you send a PDF
 - support for open office on the merge
 - negative numbers on the inventory modules 
 - related list paging
 - a lot of translation fixes
 - custom fields on documents
 - among many others

On the developer side

 - we enhanced the **webservice** immensely with support for **inventory modules, documents and emails** and also a myriad of fixes and feature to make programming external programs easy, **this was our main goal at this point**.
 - more import options to search on related fields
 - restructure packaging to make it easier to maintain
 - **support for PHP5.4**
 - minor workflow enhancements

 !!! We release coreBOS 5.5 on June 30th

You can find a [full list of changes here](http://corebos.org/documentation/doku.php?id=en:devel:upgradecb542cb55changes).

All this necessary work conforms that **background noise** that is a **constant in coreBOS** even today and that you will see in all the posts.

 !! Every day, every week coreBOS changes!
 
 There is an implacable movement of the code whereas we **fix errors** found, **eliminate security issues** and **add features** or simply **cleanup the code** to make it easier to work with and maintain, but while all that is happening there are **big impact features** that make it into the application, those long running projects that take time to roll out and which are added when they are ready.

In this first period I am covering, the big game changing feature was **[coreBOS Updater](../corebos-updater)**.

Due to the importance of this extension, (importance that I wasn't capable of seeing at that point in time), I will dedicate the next post to describing what **coreBOS Updater** is and how it does it's magic and, hopefully transmit how to keep your coreBOS install up to date.

**<span style="font-size:large">See you soon</span>**


---
title: March 2017
date: 2017/12/10 20:08
metadata:
    description: 'coreBOS work during March 2017.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: March.png
header_image_height: 103
header_image_width: 550
taxonomy:
    category: blog
    tag: [development, 2017, functionality]
---

A **message queue** and a native **key-value store** along with a special focus on security are our gift for this coreBOS third birthday, but, not satisfied with that we throw in a long list of enhancements and fixes and start this blog series.

**<span style="font-size:large;color:red;">Happy birthday coreBOS!!</span>**

===

 ! Asterisk

We standardize the PBXManager module and correctly define fields in order to enable searching on list view and linking to other records.

 ! Workflow

 - Create Entity Enhancements: permit creating same entity as default duplicate: dangerous, possible infinite loop
 - More flexible picklist options
 - Task enhancement: after_retrieve task event so we can easily add functionality to our task edit screens

<br/>

 ! Developer

Two incredibly powerful developer tools arrive this month

 - [coreBOS Message Queue and Task Manager](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_mqtm)
 - [coreBOS Settings and Configuration](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_settings) Generic key-value store
 - Application API call to save attachments via executefunctions endpoint

<br/>

 ! Security

This month again sees a lot is security issues fixed

 - path traversal
 - SQL injection
 - XSS
 - Request class to avoid http response splitting

<br/>

 ! Other changes:

 - Better IP detection for native IP access blocking
 - Permit user login based on IP via global variable
 - Now that reports use paging we send the SQL as JSON payload if debugging is active (Thanks for the idea Omar)
 - Fix TagCloud moving effects (Thanks Paul)
 - Fix picklist editing for picklists with a lot of entries
 - Add global variable in Convert Lead to preselect opportunity section
 - Fix FAQ export
 - Database optimizations
 - Fix some global variable calls when user is still not defined
 - Background log for workflow email task
 - Global variable rename code in changeset
 - Mobile fixes, optimizations, and enhancements
 - Eliminate obsolete Microsoft Word Merging: use the CRMNOW extension or GenDoc
 - Fix Query Generator relation errors with uitype10 custom fields
 - Webforms: cleanup and add posting acceptable Domain to avoid spam
 - Backup: emit error message if enable script cannot be written
 - Block increment of AutoNumber/uitype4 fields at database level to avoid duplicates
 - PHP7 Update TCPDF, TagCloud, and Validator
 - Fix user decimal support: Thanks Kiko
 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today)
 - Translations

**<span style="font-size:large">Thanks for reading.</span>**


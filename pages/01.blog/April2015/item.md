---
title: April 2015
date: 2017/07/02 20:08
metadata:
    description: 'coreBOS work during April 2015.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: April.jpg
header_image_height: 90
header_image_width: 180
taxonomy:
    category: blog
    tag: [development, 2015, evolution, events, workflow]
---

April finds us working on workflows, calendar, and list view while keeping pace with the constant line of fixes and enhancements.

===

 ! Query generator enhancements
 - Support for reference module fields in select and conditions
 - Support for id fields in conditions
 - Support for exists, empty and not empty operator
 - Support for two user fields in where conditions
 - Fixes for related modules and fields

You can see some of these enhancements and other supported queries in our [unit tests for this class](https://github.com/tsolucio/coreBOSTests/blob/master/include/QueryGenerator/QueryGeneratorTest.php)

 ! Support for related fields on list view and filters

Thanks to the work done enhancing the query generator class upon which the list view is based we get the added functionality to be able to see and filter on the fields of directly related modules.

[plugin:youtube](https://youtu.be/HZWwf8cSmkI)

 ! Workflow enhancements exists condition operator

This workflow condition operator also appears thanks to the enhancements made on the Query Generator class as it permits us to generically construct the query necessary to launch the search.

[plugin:youtube](https://youtu.be/wfH513Ut9cA)


 ! Calendar enhancements
 - Show all modules with date fields, in their own section
 - Birthday field support
 - Clean up and eliminate unused calendar module, progressively eliminate calendar in favor of Calendar4you
 - Fix bugs

<br/>

 ! Webservice 
- Ticket history when modifying ticket via web service. To be consistent with the functionality of the application.

<br/>

 ! Mail Manager enhancements 
 - Add Projects and Potentials to the set of supported modules
 - Permit relating emails to all supported entities

<br/>

 ! Global variables

We add the **Inventory_Tax_Type_Default** global variable which accepts two values; **group** or **individual** and will establish the tax mode on inventory modules to Individual line or Group tax

 ! Reports
 - support for second user field (uitype 101)
 - calendar report with related column

<br/>

 ! Some others:

 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Security and optimizations
 - Translation.
 - coreBOS Updater from CLI and ignore blocked changesets (help with [Perspectives](../cbPerspective)
 - HelperScript runwftask: permits executing individual workflow tasks from the command line. Ideal for testing a misbehaving workflow
 - [IsEntityModule utility function](https://github.com/tsolucio/corebos/blob/master/include/utils/VtlibUtils.php#L366) to check if a module is an extension or not
 - Payment enhancements set amount and more related entities
 - Set Portal/MySites URLs to coreBOS
 - Support for date fields on user module (created with vtlib)


**<span style="font-size:large">Thanks for reading.</span>**


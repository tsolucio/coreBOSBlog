---
title: March 2018
date: 2018/04/15 01:08
metadata:
    description: 'coreBOS work during March 2018.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: March.png
header_image_height: 132
header_image_width: 441
taxonomy:
    category: blog
    tag: [development, 2018, functionality]
---

We continue dedicating a lot of time to standardizing the code, we finish the On-Demand functionality and add a whole set of functionality to move along our goal to create a flexible, fast and secure framework upon which to base your business.

===

 ! coreBOS Standard Code Formatting, Security, Optimizations and Clean Up

100 code formatting and cleanup commits that affect every part of the application. It is a very big effort to get all the code looking similar before we start refactoring the UI, but also we eliminate redundant code, make micro-optimizations, eliminate warnings and fix some bugs in a clear goal to make the application faster, less memory intensive and more secure.

 - reduce SQL columns and eliminate duplicate variable assignment in calendar and CRMEntity
 - eliminate function in favor of direct SQL execution in Documents
 - eliminate redundant code in merge email template now that most modules are normal
 - eliminate unnecessary condition and webmails module dependencies which are obsolete from Emails and MailManager
 - eliminate duplicate code in main javascript module, Reports, Inventory modules and Products
 - assign and return values directly, eliminate unused variables and obsolete code in utils, Reports, and RecycleBin
 - refactor DateTime Field: create new private method getDTComponents from duplicate code
 - refactor Reports: move duplicate functions to common location: getVisibleCriteria and getShareInfo
 - security in Reports by cleaning variable being sent to the browser and eliminate unnecessary assignment
 - security in RSS by filtering input variables
 - rename .inc file in menu

<br/>

 ! Developer
 - enhance getEntityField to return FQN
 - **Field Set Business Mapping**. A new business map arrives that will permit you to define a heterogeneous set of fields from any modules. It is used, for example, to define the set of fields to sync between satellite and master coreBOS on demand installs.
 - sanitizeTime method which permits you to convert any DateTime field to the current user's timezone
 - option to not reload document listview after file folder move or generic listview after mass delete operation. In certain AJAX based actions on Documents and Mass Delete the full result of the new List View is returned only to be discarded by the javascript function. In this scenario, we can use the parameter **__NoReload** to avoid the generation and transfer making the operation MUCH faster.
 - translation infrastructure to override default translations with custom ones. We can now easily customize our translations without modifying the base translation files. In any language directory we can create a file named **{language_prefix}.custom.php** and put inside a variable called **$custom_strings** which will be an array of labels that will override the existing labels.
 - modify getPricesForProducts to return cost_price if needed
 - support for standard application message on List View via the standard **error_msg** and **error_msgclass** parameters
 - getOrderByColumn method to get the correct _order by_ specification for all types of fields in QueryGenerator
 - _changelabel_ and _changestatus_ events for taxes. Thanks [Luke](https://github.com/Luke1982)
 - getRelatedListInfo action in ExecuteFuncions to retrieve Related List Info from the relation ID. Thanks [Kiko](https://github.com/kikojover)
 - send browser variables to Popup for correct validations inside popup (for quick create)
 - support for preSaveCheck hook in MassEdit

<br/>

 ! On-Demand

Lookout for a blog post on this awesome functionality!

 - central sync server variables
 - users with permission to get full sync information for on-demand sync service
 - more user change log information

<br/>

 ! Reports
 - external report URL opened in new tab. Thanks to [denaldd](https://github.com/denaldd) for fixing this functionality which now correctly opens URL reports in their own tab
 - permit field customization by calling module method before showing values on the screen. This very useful functionality is a first stepping stone towards colored formatting in reports. Keep an eye out for some additional changes and a blog post on this one in the months to come.

![Report Custom Formatting](ReportsColorFormatted.png)

<br/>

 ! Others
 - load LDS CSS in popup
 - Changes to support Colorizer on Related Lists with a different name than the related module
 - Install TAX block and listen to new tax events in InventoryDetails. Fill in the new tax fields with the applied tax for each line
 - hide S&H taxes row if none are defined
 - add support for sorting on all fields, even special related field, thanks to the new function in query generator
 - send current IP to Login template so it can be shown if needed
 - MailManager_Show_SentTo_Links global variable which will permit you to hide the module based filters in Mail Manager
 - show field usage in red on delete field check
 - Get address in editview if account or contact is given
 - support HTML in application UI name via Application_UI_NameHTML global variable, so you can apply custom formatting to the header name
 - filter emails and closed events from calendar popup
 - respect user settings calender reminder interval NONE by not calling the backend every minute
 - fix incorrect variable for project detection in Mail Scanner
 - permit Edit on create, add preSaveCheck and standardize MassEditSave for the Payments module
 - fix mass document download. If we download some documents and after we want to download some others, the previous zip was not removed correctly and returned to the user both the first and second selection. Thanks [Omar](https://github.com/omarllorens)
 - fix Popup basic and advance search when we use next, previous, last and first icons navigation
 - base Convert Lead action on Edit permission not create
 - Leads email validation in convert form
 - set correct HTMLPurifier encoding in MailManager which was breaking on Windows
 - retrieve product cost when creating a Purchase Order from product action
 - fix Related Lists field values by moving the main table to end of select fields SQL so its fields dominate over other modules with the same field names. For example, if we have a Contacts related list that mixes account fields we would get the account phone number instead of the contacts because the field has the same name.
 - permit generating PDFs with special characters in the name in the Reports module
 - fix select fields validation with empty values
 - do not validate non-checked fields in mass edit
 - correctly recover saved user value and support only direct relation in workflow AssignRelatedTask
 - edit owner fields in workflow conditions
 - translations in Contacts, Emails, HelpDesk, ModComments, Products, and On-Demand

![March Insights](corebosgithub1803.png)

**<span style="font-size:large">Thanks for reading.</span>**


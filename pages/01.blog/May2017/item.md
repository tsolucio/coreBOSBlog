---
title: May 2017
date: 2017/12/24 20:08
metadata:
    description: 'coreBOS work during May 2017.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: May.png
header_image_height: 126
header_image_width: 420
taxonomy:
    category: blog
    tag: [development, 2017, functionality]
---

Wow! We definitely compensate for the little work that was done last month, this month is crazy full of changes: new calendar module, google contacts, new business map, validations, mobile, security, fixes and enhancements everywhere!

===

 ! cbCalendar long-running project

The calendar code we inherited from vtiger CRM was a mess and was really stopping us from giving service and having the module benefit from all the work we are doing on the rest of the modules, so this month sees the arrival of a still young version of the future of the eventing system in coreBOS.

Now we have only one event concept that can hold many types but all have the same functionality, there is no more distinction between task and event and the new event is a normal module inheriting all the features of all the other modules.

[plugin:youtube](https://youtu.be/YaDr8Z9Z998)

 ! Google Contacts Integration

This very good development created by [Albana Celepija](https://github.com/AlbanaCelepija) (Thank you!!), permits us to synchronize the contacts we have in our application and the ones we have in our Google account.

[plugin:youtube](https://youtu.be/nSNMemzoikY)

 ! Validations

Starting this month validations can be easily added to any module via business maps while respecting the existing custom file validations which are now deprecated in favor of the business map.

 - evaluate validations on save
 - evaluate required and accepted only if a value is set
 - evaluate all rules together only once
 - fixes while testing validation mapping and add support for custom validation rules via mapping
 - validate_notDuplicate query

<br/>

 ! Development

 - Allow module developers to set a custom listview template via the **$custom_list_template** variable while retaining all logic in Listview.php. Thanks [Luke](https://github.com/Luke1982)
 - We can now dynamically load getvtlib_open_popup_window_function in existing modules using **__hook_getvtlib_open_popup_window_function**
 - Add javascript hook for related list load

<br/>

 ! Security

 - Avoid SQL injection via global variable
 - Filter parameters to avoid potential SQL injection
 - Eliminate var_export and eval in install

<br/>

 ! Mobile

 - Implemented week view in prev-next buttons handlers. Thank you [Phil Sabaty]()
 - Support to Timecontrol module if is installed and active on Mobile module
 - **Mobile_Related_Modules** Global Variable to activate related list
 - Do not show error on related lists with no function
 - Panel Menu on the right, same side that open panel menu button
 - Add ID information to blocks and fields on Detailview and Editview, to have more control from javascript

<br/>

 ! User Privileges

 - Change loading of privilege files to code in an attempt to reduce the memory consumption of information we already have. cleanup some code along the way
 - Minor speedup in the create user files process by adding cache

<br/>

 ! Rich text editor and new business map

Activate RTE on uitype 19 fields via the [Extended Field Information Business Mapping](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:fieldinfo).

 ! Other changes:

 - Problem with special characters in password when saving the Asterisk settings
 - Eliminate use of the from_html() method in favor of htmlpurifier where possible
 - Set current user for modules with no assigned user field (FAQ)
 - Comments block on FAQ was not shown in all languages
 - Eliminate redundant getListViewSecurityParameter method and format central CRMEntity method
 - The special "Amount" label is shown with currency in the list header but was only working in English, now it works correctly in all languages
 - Make Tooltip URL fields actionable
 - Return false on "has" Session method when asking for existence of array element and array does not exist
 - Workflow: return null on empty field cache instead of undefined+warning
 - Workflow: set empty default values when saving workflow
 - Return false if field name is given with no module instance when instantiating via vtlib
 - PicklistDependency: send dependencies via POST to avoid GET limit on big picklists dependencies
 - Set cache directory for TCPDF library
 - Make "getRelatedRecords" return creator's first and last name. Thanks [Luke](https://github.com/Luke1982)
 - ModComments support for Import, Export, and Deduplication
 - Support for created by field on import
 - EmailTemplates) support for HelpDesk fields
 - Webservice haspermission method now support calls with normal CRMID as well as with webserviceID
 - getCustomFieldArray(module) function support for all modules
 - Avoid infinite loop trying to open invalid directory
 - Change Menu creation to Smarty template and CSS, making 10% faster. Thanks [Luke](https://github.com/Luke1982)
 - Correctly translate dashboard graphs when on home page
 - Support for field names and values with special characters in Charts
 - Add Description fields to OpenOffice Merge test template and define where and how to support RTE fields if necessary
 - Set correct variable for FROM EMAIL on email edit
 - Get "Reply to" from the header in Mail Converter. Thanks [Kiko](https://github.com/kikojover)
 - Add HTML ID to related list row so we can manipulate it in javascript
 - Add module name to related list so we can search for the columns and get the uitype of the related columns
 - In Related Lists, treat column as a string if we could not find the uitype so at least it is shown
 - Check for at least one Global Variable record for a given variable, if none exists, we return the default value directly
 - QueryGenerator: do not split query value on comma for equality condition
 - QueryGenerator: hasWhereConditions method to ask if a query has conditions or not
 - Add Query generator condition glue to work correctly with filters in imports
 - Eliminate unused function array_csort
 - Set chart type to verticalbarchart if none specified
 - Return webservice ID and linetype on inventory modules line information
 - ListView error in loop limit when updating total page count in browser
 - ListView missing global variable substitution on total page count
 - Mass/Edit: move getDBValidationData function to EditViewUtils in order to eliminate include/FormValidationUtil.php file
 - Optimize index.php by move frequent actions to top of evaluation and eliminate unused prefixes
 - Set non selected Leads module mapping to 0 in order to avoid MySQL strict mode error
 - Module_Popup_Edit close window on cancel
 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today)
 - Translations. Adding some Italian translations. Thanks [Lorida](https://github.com/loridacito)

**<span style="font-size:large">Thanks for reading.</span>**


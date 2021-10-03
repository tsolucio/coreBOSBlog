---
title: August 2021
date: 2021/09/19 11:08
metadata:
    description: 'coreBOS work during August 2021.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: August.png
header_image_width: 808
header_image_height: 256
taxonomy:
    category: blog
    tag: [development, 2021, functionality]
---

Wow! just wow

===

 ! Features and Implementor/Developer enhancements

- **Application views** We add a specific system to support a set of different "views". Changing the action parameter we can easily change from one view to another. For the moment we hard code 4 types of views (plus the existing List View) for some plans we have for the next few months. It is similar to adding acton scripts in each module but a little more integrated into the look and feel of the application. Using this we implement a Kanban view to prove we have gotten it right and we make a set of changes as we do that to offer infrastructure to the new views.
  - basic entry points for new views
  - support for different views: List, Kanban, Dashboard, Pivot, and Advanced List
  - basic integration of advanced TUIGrid view (needs validation). can be activated via a global variable
  - load actions from common directory if not found in the module directory
  - insert custom code into ListView process via the **custom_list_include** variable
  - extract filter section into its own file and support hiding the paging section and/or the whole section
  - extract search section into its own file and support hiding it

- **Kanban view** first semi-functional version of kanban functionality for a module [based on a business map](https://corebos.com/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:kanban). I will make an official release when the functionality is complete.
  - generic layout and look and feel
  - vanilla javascript kanban library
  - [Kanban View Business Map](https://corebos.com/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:kanban)
  - dynamic fill in lanes on load
  - infinite scroll
  - separate action button
  - direct operations
  - code for ordering cards in place but far from functional
  - drag and drop change control field

![kanban view](kanbanview.png)

- Import: here I was thinking that the import functionality was one of the most finished parts of the application and we get a whole bunch of changes two months in a row!
  - [Adisa updated the wiki](https://corebos.com/documentation/doku.php?noprocess=1&id=en:import_basic#step_3duplicate_record_handling)
  - add **Import_ApplyValidationRules** global variable which will force the existing validation rules on each record being imported
  - deactivate mandatory field mapping using **Import_ValidateMandatoryFields** global variable, so you can execute partial imports
  - logging system to get feedback on the import process: **wonderful!!** This is great, you can activate the debug log and get a new import logging file with details of the import process. fantastic!
  - merge based on condition map. incredible, you can now apply conditional workflow functions to decide if a record is duplicated or not
  - permit skipping new records on merge/overwrite deduplication (before you were forced to update somehow)
  - return a controlled error message on update/revise error
  - variable to indicate that an import process is running and a workflow function (Importing) to get that state
  - add skipcreate and mergecondition to Import Business map
  - avoid importing empty picklist values: set to Field_Metadata::PICKLIST_EMPTY_VALUE
  - expression based deduplication condition tests
  - make sure validation has the information it needs to validate
  - mark skipped create records as skipped, not failed

- Two new Login Pages

| BlueWhite | BlueWhiteBoxed |
| --------- | ------------ |
| ![BlueWhite](BlueWhite.png) | ![BlueWhiteBoxed](BlueWhiteBoxed.png) |

- rowGenerator to loop on database results. Luke [describes here](https://github.com/tsolucio/corebos/issues/1070) a new PHP construct to loop over database results in a much more memory and speed efficient manner. We add this functionality to coreBOS so it can be used where necessary. Probably would be nice to add this to the [streaming functionality we learned about in the previous blog](../query-stream-format) post to make it even faster and support larger data sets (anyone up to it?)
- powerful and flexible autofill of email addresses in the send email popup. Thanks George!
![select email popup](selectemail.png)
- Components
  - icon component
  - permit adding any entry in DropdownButtons menu with a string. useful for separators
  - support icon button in dropdown menu component and use it in kanban view
  - tooltip on the left of icon
- code to clean picklists with incorrect values, just open the picklist editor and you will see the new functionality if you have a picklist with incorrect values
- service to load the DetailView contents without having to save: DETAILVIEWLOAD
- PopupEdit support callback function with parameters: Module_Popup_Save Module_Popup_Save_Param
- **listfields** script to get a list of all the fields of a module (HelperScripts)
- **listmodules** script to get a list of modules in the install (HelperScripts)
- **Web Service Enhancements**
  - support comma-separated and array list of IDs to relate when creating a record
  - vtws_getCRMID function
  - correctly support comma-separated relations virtual field
  - do not return empty relations virtual field in Documents create, no other module does that and it is always empty anyway
- **Workflow Enhancements**
  - add support for context (SetManyToManyRelation_Record) in Set many to many relations
  - add support for context (SetManyToManyRelation_Records) and any type of IDs in set M:M relations tasks
  - **executeSQL** expression language function
  - **getRelatedIDs** expression function with optional parameter to set record from
  - **regexreplace** expression function
- [Masquerade](https://elgentos.nl/blog/anonymizing-databases-introducing-masquerade/) support. A special mention to the masquerade integration that was finished and released this month. We will create a specific blog post to inform you about it.

<span></span>

 ! coreBOS Standard Code Formatting, Security, Optimizations, and Tests

We continue working with [Sonarqube](https://www.sonarqube.org/).

| Last Run July | Last Run August |
| --------- | ------------ |
| ![Sonarqube Last Run Previous Month](SQ014.png) | ![Sonarqube Last Run This Month](SQ016.png) |

- coreBOS Standard Formatting: eliminate warnings initializing vars, eliminate useless code and comments, format code
- Eliminate technical debt
  - eliminate/change variables, parameters, and functions. sonarqube
  - eliminate unused files in ADODB
  - eliminate unused code in Leads and Emails
  - update obsolete HTML
  - cleanup javascript
  - boolean checks should not be inverted.sonarqube
  - change Business Map local variable name and reduce returns
  - apply LDS to Calendar settings screen
  - reduce cognitive complexity, format function headers, move string to constant in Global Variable
  - reduce cognitive complexity: merge conditions, reduce duplicate code and change switch to if in Inventory Details
  - vtlib package manipulation: reduce cognitive complexity and useless code
- Refactor and duplicates
  - correct license text in some files
  - string literals should not be duplicated: attachment postfix entity string
  - string literals should not be duplicated: multipicklist separator
  - apply basic LDS and cleanup Calendar event settings
  - change strange GenDoc variable check for PHP empty
  - abstract getPriceBookRelatedProducts to work with services and eliminate duplicate code
  - simplify Reports cell print output logic
  - duplicate vtlib code into common function
- Documentation:
  - create funding.yml: please consider pitching in with some financial support, every little bit helps
  - correct capitalization of type casts
  - correctly set variable type in CRMEntity to avoid false positive in static analysis
  - function headers, and comments
  - non-stop wiki enhancements
- Optimizations
  - eliminate unused function results
  - eliminate redundant require and unused optional parameter in CRMEntity
  - use forEach instead of map where we don't modify the original array
  - CronWatcher: use empty instead of count to see if array is empty
  - iterate over not deleted records in generate document workflow task
  - use DETAILVIEWLOAD in MasterDetail to avoid saving record and launching workflows
  - increment database column in one call
  - use direct SQL value instead of variable
  - delete unused properties and method in set M:M relations workflow task
  - simplify switch and optimize conditional in WSApp
  - PHP8 support
    - avoid named parameters in call_user_func_array
    - change obsolete each for foreach
    - flatten arrays for prepared statements in web service
    - type cast for math operator in workflow
- Security
  - reduce contact information exposure
  - add support for samesite Cookie property (still not used though)
  - eliminate unused third party dockerfiles to avoid snyk false positives noise
  - send delete action via POST and validate CSRF
  - validate CSRF on Execute Functions. Add permission access and eliminate warning
  - send Pricebooks form wth post and validate CSRF and permissions to change value
  - exclude more files from Sonarqube analysis
  - sanitize Workflow DOM (snyk)
  - update TagCanvas to 2.11
  - update ChartJS to latest 2.x version
  - update DOMPurify to 2.3.1
  - update Smarty 3.1.39
- **Unit Tests:** keeps getting more and more assertions

<span></span>

 ! Others

- minimum value for rand must be a number
- check edit/delete permissions for MasterDetail records
- migration from vtiger crm 7*. not finished and no plan to finish but I share just in case someone is interested
- add primary key on ModTracker details table to support Masquerade
- apply LDS to PriceBooks edit list price form
- apply standard error message to AutoNumber settings when no module has an autonumber field
- add field metainformation for uitype 63
- set the correct number of parameters in GenDoc eval_existe call and respect cache file name if given
- don't unset global variable to return correct crmid in GenDoc record save
- support for Issue and Receipt modules in web service (product lines)
- clear whitespace from email addresses to avoid errors
- missing parameter, missing switch default, eliminate useless code and fill in else case with quoted_printable_decode in MailManager and Converter
- add security check for message retrieval in Mobile
- fix error in vtlib module export with empty related lists
- call correct functions with the correct parameters in Profile settings
- apply LDS to ViewPermissions test functionality
- Translations
  - GenDoc and Picklist pt_br Thank you SlemerNet!

<span></span>

![August Insights](corebosgithub2108.png)

**<span style="font-size:large">Thanks for following.</span>**

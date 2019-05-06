---
title: April 2019
date: 2019/05/19 18:08
metadata:
    description: 'coreBOS work during April 2019.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: April.png
header_image_height: 114
header_image_width: 341
taxonomy:
    category: blog
    tag: [development, 2019, functionality]
---

This month we start another long-running project to update and release all the closed code in coreboscrm and as a [birthday present](../happy_birthday_2019) coreBOS gets three new modules and a whole bunch of new functionality while we keep up the constant evergreen updates and fixes. Enjoy!

===

add horizontal scroll in Header to reach all the menu items
cbSR()
cbSR(App)
cbSR(Autocomplete)
cbSR(CI) exclude sendgrid libraries
cbSR(CRMEntity/Sendgrid)
cbSR(DetailView) avoid warning in multipicklist
cbSR(Emails)
cbSR(EventHandler+Workflow)
cbSR(GenDoc)
cbsr(GenDoc/Labels)
cbSR(General.js)
cbSR(Header) code formatting
cbSR(Home) aggregate widget
cbSR(Home) eliminate warning
cbSR(Import) eliminate warning
cbSR(ListView/Contacts)
cbSR(MailScanner) CC enhancement code formatting
cbSR(Mobile)
cbSR(QueryGenerator)
cbSR(Reports)
cbSR(Users)
cbSR(Users) code formatting and eliminate warning due to missing parameter
cbSR(Users) eliminate warning and apply formatting
cbSR(Utils) formatting and warnings while creating unit tests for user_privileges change
cbSR(Validations) eliminate incorrect continue to avoid PHP 7.3 warning
cbSR(Webservice:Create) eliminate warning deleting inexistent files
cbSR(Workflow) m2m task
chore(Backup) fix method name spelling
chore(BusinessAcions) add license
chore(Calculator) eliminate calculator code
chore(Calendar) eliminate unused method
chore(OOMerge) RTF copy of test template
chore(Users) move method to better location and apply code formatting
CI(Files) add new modules, User directory and new scripts to CI

opt(Email) fetchEmailTemplateInfo now supports language templates
php(7.x) migrate sizeof to count
sec(Updater) execution bit
style(changeSets/cbQuestion) Code formatting
style() code formatting
style(Home) Code Formating


Don't do multicurrency autocomplete in Purchase Orders
(Eleminate search from users grid boxes)
email template images
(enable_backup) save backup variable with corebos_settings instead of file
feat(Announcement) move to button bar in order to optimize space
feat(audit_trail) store audit_trail using CoreBOS_Settings class
feat(BusinessMap) support for currentuserID variable and reset current_user on incorrect context
feat(Calculator) eliminate it from application
feat(Debug) deactivate activity reminder variable to make debug log less noisy: ActivityReminder_Deactivated
feat(DecisionTable) Adding maptype and class
feat(DecisionTable) Evaluating map
feat(Docker) support environment variables for docker image
feat(Emails) support for selecting emails on related lists
feat(EventHandler) add new events for workflow
feat(ExecuteFunctions) implement fetch based call which turns out to be identical in speed to the one we have so I leave it commented for future reference
feat(Header) move subheader into header to recover vertical space
feat(Home) Add Aggregate Filter Widget
feat(Integrations) column layout for access menu and box the elements to make them standout more
feat(Inventory) Add customizeable restraints to P/S autocomplete
feat(Inventory) Allow more comparators when expanding P/S autocomplete restraints
feat(Inventory) Allow role-based control over P/S autocomplete
feat(Inventory) Apply the 'fillfields' directive in P/S autocomplete
feat(Inventory) Permit fine-tuning the fields to search in for P/S autocomplete
feat(MailScanner) cc condition for mailscanner
feat(Mobile): add new action ExecuteFunctions to call it from javacript. We added some functionts from corebos base
feat(Mobile): add support to uitype 50
feat(Mobile): now when select a product or sevice from timecontrol, we hide the unnecessary fields for each type
feat(Module) icon definition
feat(Modules) define default sort order using global variables
feat(MsgTemplate) hard coded email into MsgTemplate
feat(MsgTemplate) update hard coded email into MsgTemplate
feat(PBX) add and save PBX UUID. add PBX aftersave events
feat(PBX) PBX_callerNumberSeparator GV to permit separting the incoming number in more than one
feat(PBX) permit indicating which PBX event field you want to use for searching via the PBX_callerNumberField GV and change PBXManager_SearchOnlyOnTheseFields to PBX_SearchOnTheseFields to indicate a set of alternative application fields to search on
feat(QueryGenerator) range operators
feat(Report/Calendar) module icons
feat(SendGrid) SendGrid integration and dashboard
feat(ShowMessageWidget)
feat(Users) define user privileges storage in one variable
feat(Utils) add cut size parameter to textlength_check function
feat(Utils) add force refresh cache to get_group_array for unit tests
feat(Utils) getModuleIcon information function
feat(ViewManagement) get all views via WS
feat(ViewManagemet) add retrieval permissions check and getAllViews method
feat(Webservices/cbRule) Adding cbRule webservice endpoint
feat(Workflow) add events to updade fields and mass delete
feat(Workflow) add new events for mass edit
feat(Workflow) many2many select/unselect all from grid
feat(Workflow) many2many support unrelate ALL related records
feat(workflow) set many to many relation
fix(App) use creator as last modifier when record has not been modified
fix(BusinessActions) add missing user parameter to webservice call
fix(Calendar) pass correct parameter due to user_privileges change
fix(cbQuestion) Adding context parameter
fix(cbRule) Enhancement for DecisionTable
fix(cbupdater) merge conflict
fix(Company) html decode company information
fix(Contacts) avoid fatal error if portal login template does not exist
fix(CustomerPortal) hard coded email to message: get right translations
fix(CustomerPortal) support all languages, create contact language with correct values, avoid sending twice and use correct parameters. optimize send email function. related to d5c099ec01f569fef05ed295ad06f81f92cf88e6
fix(CustomView)Public filter without admin approved
fix(DecisionTable) Casting values to String and adding the case on testMap
fix(DecisionTable) Code formatting
fix(DecisionTable) Cummulating rules and check hitPolicy for aggregation
fix(DecisionTable) Handling hitpolicy and orderby
fix(DecisionTable) Processing output for each rule
fix(DecisionTable) Returning correct crmObject and removing convertMap2Array method
fix(Email) sending email template: get the right one if deleted and decode html
fix(ExecuteFunctions) correctly return error state for ajax calls
fix(GenDoc) add organizationname to map Company Name
fix(GenDoc) translate user fields
fix(GlobalVariable) Fixed get global variable user role condition
fix(GlobalVariable)no Address select Global variable
fix(GlobalVariable)position global variable call in javascript
fix(GlobalVariable)remeve if add else in accounts javascript
fix(GlobalVariable)remove if and add else
fix(Header) move small spinner to right so it is more visible in the new layout
fix(Header) move 'top' below menu so it still works (more or less) after fixed menu change
fix(Header) show settings menu only to admin users and set user name to bold
fix(Header) user settings label for settings button and menu
fix(HelperScripts) update createuserfiles to work with new class system
fix(Home) aggregate widget on text fields
fix(Home) Aggregate widget: warnings and optimizations
fix(Home)Fine tune Aggregate Widget
fix(Home) recover 'more' link which does seem to be working
fix(Home)remove home link
fix(Import) incorrect assignment. related to 355115a643b7cd67c1303e4434f9f06226e3ea85
fix(Include)remove double dots
fix(Include)translate field labels
fix(Inventory) Correct parameter formatting in P/S autocomplete
fix(Inventory) Correct variable name in query appending
fix(Inventory) Don't add double commas after the alias query
fix(Inventory) Join custom field tables in P/S autocomplete query
fix(InventoryModules) show stock and quantity in user format
fix(KCFinder) images and security
fix(MassEdit) support multipicklist
fix(Menu) correctly avoid separator and submenus in Settings menu
fix(Message) add icon
fix(Mobile): error name to units in timecontrol
fix(Mobile): Fields with uiytpe (10, 101, 117, 26, 357, 51, 52, 53, 57, 66, 68, 73, 76, 77, 78, 80) alwyas was showed, while in the profile was indicated like not to show
fix(Mobile): filter fields wit not permission when we are creating
fix(Mobile): Fix detectModuleName, we have to get always the module name if we have a recordid, if not we can have problems on related list with more than one module related
fix(Mobile): inputs id must be with internale field name not label translated
fix(Mobile): Not show empty blocks on edit view
fix(Mobile) PHP 7.3 support by specific assignment and use correct object for translation
fix(ModuleUpdate) Make 'import_Field' public since PackageUpdate references it
fix(MsgTemplate) add icon
fix(MultiPicklist) correctly rename and delete elements
fix(OOMerge) support detail view OOMerge generation from GenDoc widget
fix(Payment) use ISO format for history log date
fix(PBXManager) use correct module name in changeset
fix(Picklist) sorting. related to 848df82eae5143c089f293b881b4eaed3c8ca52f and 604687a17134c268a08f57f1d5d7da8233265e90
fix(Potentials) sales stage histroy number formatting
fix(Reports) attachments on scheduled reports
fix(Users) correctly set subordinate array and correct variable name
fix(Users) incorrect variable for user name in asterisk repeated extension error message
fix(Users) Label Translation
fix(Users:Privileges) set module sharing to private if sharing privileges are not defined
fix(Users) Remove Unused Variable
fix(Webservices) add Non Admin Acess Query in Inventory modules product/service autocomplete search
fix(Workflow) m2m list only modules related N:N and translated module name
fix(Workflow) m2m unrelated parameter order was incorrect, optimize code and call unlink events
fix(Workflow) many2many selected table elements
fix(Workflow) mass update related query based on relatedlist query
fix(Workflow) move workflow specific capture code from main capture script to workflow script
fix(Workflow) rename many2many script and property, format table CSS
fix(Workflow) support for templating on modules with no assigned user ID like FAQ
fix(WS) incorrect variable capitalization
i18n(App) pages
i18n(App) pt_br
i18n(BusinessActions) incorrect label
i18n(cbMap) Decision Table
i18n(GlobalVariable) Application_Popup_Address_Selection
i18n(Home) aggregate widget
i18n(LastViewed) translated hardcoded strings and apply code formatting
i18n(MsgTemplate) pt_br
i18n(Payments) pt_br
i18n(pt_br)
i18n(Reports) es
i18n(Sendgrid/Whatsapp) settings
i18n(Users) grid header and contents
i18n(Users) pt_br
i18n(Workflow) Many to Many Relation Task
install(Database) update

Merge branch 'Luke1982-ldsheader'
Merge pull request #499 from Luke1982/updateLDS

ui(Toolbar) apply some LDS to tool bar just to get announcement correct: module icons
(UserPrivileges) check if there are permissions for both file and db pattern
(UserPrivileges) Get userPrivileges from Usel Model instead of UserPrivileges object
(UserPrivileges) more sharing privileges for modules
(UserPrivileges) sharingPrivileges not being generated
(UserPrivileges) use of UserPrivileges class on remaining files
(UserPrivilegesWriter) Flush Privileges
(UserPrivilegesWriter) flushPrivileges to flushAllPrivileges



 ! Release closed code project

We are working on standardizing and releasing most of the closed code we have. This is more work than it seems as some extensions need to be adapted to the current functionality in coreBOS and others require changing libraries which have a closed source license (which is mainly why they weren't already being shared openly). In this ongoing effort, this month sees two extensions arrive: **Document Generator** and **Message Templates**.

<span></span>

 ! Release Document Generator Module

Our proposal project for formatting output is released into the coreBOS project. Now you will be able to easily create OpenOffice templates for your invoices and similar outputs. We also move the native OpenOffice and RTF merging capabilities on Accounts, Contacts, Leads and Support Tickets to the same Document based configuration in order to eliminate the admin settings section and some legacy code.

You can read all about [Document Generator Templates on the wiki](http://corebos.com/documentation/doku.php?noprocess=1&id=en:extensions:extensions:gendoc).

 - released GenDoc as standard service
 - released GenDoc Label Helper extension
 - integrate OOMerge with GenDoc functionality
 - eliminate obsolete specific code for OOMerge which is now using GenDoc infrastructure

<span></span>

 ! Release Message Template Module

An application like coreBOS requires a powerful and flexible templating management system for emails, SMS and Whatsapp messages (among others). We create a workflow syntax based template system that is capable of understanding the previous, much more limited syntax in order to maintain backward compatibility while giving the new messages all the power they need. We substitute the existing template capture features with this new module and add support for related documents.

 - fill in field picklist and insert into the body
 - load meta variables only if picklist is available
 - migrate templates usage to new module: workflow, mail manager and email send screen
 - migrate email templates to the new module and eliminate settings section
 - load attachments from MsgTemplate: if documents are related with the message template these will be added to the email when the template is selected

<span></span>

 ! Features/Implementor
 - transfer calendar records on Accounts and HelpDesk when deduplicating
 - transfer more related entities on Leads conversion
 - add globally accessible **getCRUDMode** method to make Business Validation and Condition Expression more flexible
 - add **go back** button on [MassEdit1x1](../xmaspresents18) feature
 - allow uitype 14 fields to show and save more than 23 hours
 - convert User List to BunnyJS Grid
 - send password change email to users if the Application_SendUserPasswordByEmail Global Variable is set
 - add native Partita IVA validation for our Italian users
 - add a condition for multiple fields on notDuplicate Validation [Thanks Timothy](https://github.com/tebajanga)
 - including **requiredWith** and **requiredWithout** on the Validations Business map. [Thanks Timothy](https://github.com/tebajanga)
 - adding SMS support for vendors
 - permit user to define return URL protocol on Webforms so we can support https, by default we still use http to maintain backward compatibility
 - fix Vendors contacts related list to support adding contacts directly from that related list if the option is added
 - do not show inactive modules and respect module entry label if changed in Menu
 - format 0 for consistent user preferences
 - Business Maps XSD based validations. Very useful job from [Glory](https://github.com/glorymoshi) which permits us to validate the XML of our business maps without leaving the application

<span></span>

 ! Workflow Enhancements

This is our non-stop project: making the workflow system more and more powerful with each iteration.

 - EmailTask: add the use of message template and attachments associated with the template into drop-zone
 - **EmailTask: if an attachment is a GenDoc template, merge and send the result, not the template**
 - EmailTask: create a message for workflow email to register and track these emails
 - many to one update workflow update one module per task
 - add a condition to mass related update so we can conditionally update only some related records
 - testing and adjusting mass related record update
 - fix an error referencing null object on expressions
 - include external functions only once
 - move "evaluate on execute" in workflow task to make it clearer that it is only used on delayed tasks
 - retrieve record despite sharing privileges when performing update field task and standardize method call
 - correctly manage translated field names
 - **LOGICAL OPERATORS:** Elisa calls our attention to the fact that the workflow system doesn't have the possibility to easily evaluate logical conditions. This makes creating business rules and validation business maps more complicated than it should be so we set out to slowly start adding this type of support. This month not only sees the birth of this feature but also implements four operators. [Thanks Timothy](https://github.com/tebajanga)
   - add **isNumeric** and **isString** logical operators methods
   - add **OR** and **AND** methods, so we can do cool evaluations like this

```
AND(isString($(account_id : (Accounts) accountname)), isNumeric($(account_id : (Accounts) employees)))
```

<span></span>

 ! Developer
 - we add support for context variables in Business Questions and pass that context into the detail view widget which permits us to do some really cool things [like these graphs](http://corebos.com/documentation/doku.php?noprocess=1&id=en:devel:add_special_block#developer_blocks)
 - support for setting business rule when creating Business Actions
 - **range operators** for QueryGenerator. These four new operators permit us to easily define intervals of number and text fields as [can be seen in our unit tests](https://github.com/tsolucio/coreBOSTests/blob/master/include/QueryGenerator/QueryGeneratorTest.php#L1285). The new operators are:
  - [] both start and end values are included in the range
  - [[ start is include and end is excluded from the range
  - ]] start is excluded and end is included in the range
  - ][ both start and end values are excluded from the range
 - Condition Expression Business Maps now support a new type that compiles workflow templates
 - a new method in CRMEntity named **retrieve_entities_info** permits us to retrieve a set of CRMIDs in one call
 - Emails module gets a revamp this month with a whole new set of hooks and abstractions that permit us to completely override the emailing system. Right now our default email system is [PHPMailer](https://github.com/PHPMailer/PHPMailer) but with the changes in the Emails module, you can now program the application to use any other system you want. We will be releasing an integration with [SendGrid](https://sendgrid.com/) very soon and I plan to dedicate the next blog post to explain how these changes work
   - hooks for intercepting email sending
   - getMergedDescription now merges workflow syntax variables after all old format has been done
   - getAllAttachments function to get all the related files as attachments
   - support attachment files as an array of name and full path in send email
 - add full Users image information with the same structure that we use in web service to the user object
 - add Webservice support for Business Mapping global variables and return the JSON structure of the business map also
 - add **[MassDelete](https://github.com/tsolucio/corebos/blob/master/include/Webservices/MassDelete.php)** web service endpoint to delete multiple records at once. [Thanks Kliv](https://github.com/klivstudiosynthesis)
 - add **[upsert](https://github.com/tsolucio/corebos/blob/master/include/Webservices/upsert.php)** web service endpoint. [Thanks Kliv](https://github.com/klivstudiosynthesis)
 - dereference IDs and Images for consistent return format in Update and Revise and html-decode reference names

<span></span>

 ! Developer Action Call: a new pattern for actions

[Albert](https://github.com/albertxhani) proposes and constructs a new way to call actions. Closer to pure MVC, this form of executing code will permit us to call class methods directly which makes for a more structured code.

The action must be called like this:
```
index.php?action=index&module=Leads&action=LeadsAjax&actionname=test&method=init
```

where `actionname` is the class name that contains our actions and `method` is the name of the method we want to execute inside the class.

The class must live inside the `actions` directory of the module and must be named exactly as indicated in the actionname parameter.

So the above call would live in:

`modules/Leads/actions/test.php`

We can create multiple methods inside the action class and call each one given the method name in the
URL (the same way a controller works in a MVC).

There is an example in [this Pull Request](https://github.com/tsolucio/corebos/pull/490/files).

[Thanks Albert](https://github.com/albertxhani)

<span></span>

 ! coreBOS Standard Code Formatting, Security, Optimizations and Clean Up

 - constant formatting and warning battle: Changesets, Ajax/ListViewController, AssignedTo, BusinessMaps, CRMEntity, MailManager, MsgTemplate, Product, QueryGenerator, TransferRelatedRecords, Users, Workflow
 - eliminate a block of repeated code in Developer Block
 - fix comments and debug message in InventoryUtils
 - Products avoid warnings on image field retrieving and saving
 - Workflow review and format code for massive update many to one
 - Debug Message Reduction project: CommontUtils (get merged description) and Workflow
 - an optimization that avoids calling ispermitted if from_wf is true and avoid sending empty values if there is no access to the record (CRMEntity)
 - simplify query in Documents
 - security: retract executable bit
 - Continuous Integration:
   - add check on new changesets
   - add php file lint
   - include changesets
   - my personal code validation check script, in case that helps someone
   - add new executable file
   - add new lint file to permitted executables

<span></span>

 ! Others
 - now that we have eliminated the last Settings section we reorganize the ones that are left
 - Application_User_SortBy: construct correct SQL with restricted user access
 - get the right number of colors for the Business Question graph
 - mysql strict in Calendar get activitytype
 - urlencode activity types for Calendar popup edit
 - eliminate duplicate call to transfer parent method in Campaigns
 - fix select leads query in Campaigns
 - mysql strict in Potentials Sales Stage history with hidden fields
 - do not lose multicurrency/tax on Product/Service edit
 - correct Products/Service multicurrency and taxes save from web service (they were being lost)
 - Scheduled Reports: use attachment parameter instead of global REQUEST variable
 - standardize report SQL group by field name
 - Time validation: cap max hours at 838 since MySQL can't handle more
 - add slashes to error message so it does not break javascript
 - change typeofdata in Assets and Calendar date fields
 - add some right padding on Currency fields for better UI
 - emit complete Dropzone event on document attachment relation
 - do not send template based email if the template is not found
 - Send picklist values via POST for larger lists
 - correct CSS for global autocomplete
 - avoid validating inexistent images
 - InventoryDetails:
   - change sanitizeRetrieveEntityInfo to catch more fields
   - eliminate errors in MasterDetail configuration when the user does not have access to InventoryDetails module
   - error when trying to update inventory lines, sometimes the requestindex does not correspond with the line order that is returned by the query and updates data on the wrong line
 - fix SQL query to return correct tax values
 - correct action name on change password redirect
 - update softed style.css: a few very nice CSS changes that make the application a bit nicer and faster. Thanks John.
 - Continuous translation effort:
  - correct label on Inventory Modules
  - add label to field in delete related records workflow and apply LDS
  - cbPulse
  - Documents: merge template label
  - Emails/Message: missing labels and pt_br
  - Inventory: financial info block label
  - MassEdit1x1: go back
  - Services: multicurrency div header
  - Settings: BPM header and code formatting
  - Workflow: mass update related, more consistent translation and add a missing label
  - Fix no space with - youhave - in the test email
  - added and fixed German translations in many modules. [Thanks Henning](https://github.com/partnerwerk)

![March Insights](corebosgithub1904.png)

**<span style="font-size:large">Thanks for reading.</span>**


---
title: February 2022
date: 2022/03/19 16:08
metadata:
    description: 'coreBOS work during February 2022.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: February.png
header_image_height: 281
header_image_width: 1200
taxonomy:
    category: blog
    tag: [development, 2022, functionality]
---

We start some important projects this month and we get a nice set of visual improvements, while we keep fixing and enhancing the application. Very proud!

===

 ! Features and Implementor/Developer enhancements

- **Documents Folder**: We initiate our journey to supporting subfolders in the Documents module. The goal is to have a folder structure that permits to have any document and any subfolders inside. We will create a grid view to navigate this structure and also enhance the WebDAV view to see this structure. This is a breaking change as we convert the existing picklist-based, flat, folder list to a full-fledged module with a recursive relation. We will dedicate a full post to this change as soon as we can.
  - DocumentFolders: subfolders for Documents module
  - correct function name
  - correct update SQL for folder migration
  - standard relation with Documents
  - create ToastListView for Documents tree view mode
  - moduleView variable is missing in Documents module
  - move all folders and subfolders files
  - keep search block for Documents module up to date
  - move files in tuigrid mode
  - allow tuigrid to support multiple instances for Documents
  - init tree view for Documents
  - support Documents folder view
- **LDS Styles**: we continue to apply LDS everywhere. Thanks Egi!
  - Updated LDS
  - App Launcher UI and new Icons on Settings
  - new buttons on ListView Buttons
  - new buttons on the Detail View Template, modified CSS, added new UI from LDS
  - style.css, edited CSS, paddings, and fonts
  - added Montserrat font
- **Service Contracts: Warranties support.** We add a relation between Service Contracts and Terms and Conditions. This is to represent a warranty entity. A service contract now has a set of terms and conditions that define the contract. Using the master-detail functionality we can easily implement a contract-conditions relation. Additionally, we set a recursive relation on terms and conditions itself to set "default" conditions
- support multifield Actions in Field Dependency Map
- add Global Variable to control Start && End Hour in Calendar View
- add the possibility to not eliminate groupby when creating Count query
- support BPM Flow/Validations on Kanban View. Thanks Denald!!
- Master Detail
  - show records on Master Detail blocks based on map conditions (nice!!)
  - use conditions directly in Master Detail map
- convert specific notification insert to generic one: the first step towards showing any notifications inside the application
- support any Pivot map when passed as a parameter
- direct WebDAV file listing initial layout
- eliminate Web Service post/get: we just support both
- if `taxX_group_percentage` is present in Web Service, set this value and not percentage tax by default
- add expression workflow for return date time from given year, weeks and dayofweek
- add workflow `isHealty` function to check on status of each task. base empty method
- add `current_userandgroup` current user and group meta variable on filter

<span></span>

 ! coreBOS Standard Code Formatting, Security, Optimizations, and Tests

- coreBOS Standard Formatting: eliminate warnings eliminate useless code, variables and comments, format code
- Documentation:
  - define setupTemporaryTable header
  - function headers, and comments
  - non-stop wiki enhancements
- Optimizations
  - refactor listview functions
  - assign Menu value directly
- Security
  - PHP8 type casting for math
  - use array_merge for prepared query
  - sanitize inputs/outputs
  - change eval to call_user_func to avoid code injection in Business Rule
- Updates
  - LDS
  - composer libraries
  - add Mautic API
- **Unit Tests:** keeps getting more and more assertions

<span></span>

 ! Others

- set correct size for Business Actions checkbox
- Business Map test record comment not showing correctly
- shows calendar event creation message next to slot event if page scrolled
- change salutation field display type to make it available
- use application message when no duplicate is found on modules
- get correct deduplication count query with field that contains "from"
- do not show related list block if user does not have permission to module
- show filter navigation and number of records if module is not Documents
- ListView
  - add GridListView class
  - calculate temporary permission table for saved SQL query
  - get all checked rows in tree view
  - get last page in listview reload
  - hide actions if a record is a folder in Documents module
  - show SQL error message by setting default variables correctly
  - stay in current page after massedit
  - uncheck checkboxes after massupdate action
  - refactor, save active instance into object
- set correct description for Master Detail condition tag
- Mobile: refresh previous results when use autocomplete, because index is not refreshing
- load notification script after validations
- Working on vtiger crm updates
  - fine-tune the update script
  - option to not output the newly loaded Updater changesets
  - set correct index for findupdate to align it with the code coreBOS Updater check
  - adapting some old changesets for update scenario, make them not stop on error for updates and mark as applied on error
  - correct HTML and delete merge conflict string
- support many to many User related list by non-admin users
- Workflows: correctly register activated once
- update year in License
- Translations
  - Document Folder pt_br
  - Global Variable
  - Workflow: mass create JSON objects

<span></span>

![February Insights](corebosgithub2202.jpg)

**<span style="font-size:large">Thanks for reading.</span>**

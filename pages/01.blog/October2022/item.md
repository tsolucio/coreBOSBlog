---
title: October 2022
date: 2022/11/20 18:08
metadata:
    description: 'coreBOS work during October 2022.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: October.png
header_image_height: 300
header_image_width: 1547
taxonomy:
    category: blog
    tag: [development, 2022, functionality]
---

Slow vacation month brings important enhancement in workflow system supporting dot notation for array support, a Clickhouse ingestion end-point, some global variables, and a new application Cache layer object along with the typical pace. Yes, like coreBOS slow ;-)

===

 ! Features and Implementor/Developer enhancements

- add module label Browser Variable
- cbAppCache global object: slowly migrating all the custom cache to our cache library
- ClickHouse notification service: we can use coreBOS as an ingestion end point to send information to any Clickhouse table defined in a connected Clickhouse server
- Business Maps
  - support array values for fields
  - support workflow expression parameters in SQL condition query
  - add getDestinationFields function in Mapping file
  - export specific map object on direct converttoarray call
- RelatedListsBlock
  - add tooltip block in RelatedListBlock map
  - add editview block in map and select specific fields in edit/create view
  - add title tag to be able to modify the title
  - add tooltip for parent records in relatedlist widget
- WebService
  - return success FALSE when one or more creates failed in a MassCreate operation regardless if there have been successes
- Workflow
  - add EUVATValidation expression function to validate VAT for EU countries
  - applymaptoarrayelementsandsubarray, adjust parameter check to support clean/invert and delete subarray element from master array always
  - applyMaptoArrayElementsAndSubarray support for inverting clean array keys
  - clean array elements function
  - support for dot notation in mapping and templates

<span></span>

 ! coreBOS Standard Code Formatting, Security, Optimizations, and Tests

- coreBOS Standard Formatting: eliminate warnings, eliminate useless code, variables, and comments, format code. Campaigns, Users, RelatedList Widget, General javascript
- Documentation:
  - function headers, and comments
  - non-stop wiki enhancements (working a lot on this)
- Security
  - XSS in RelatedList link parameters
- Optimizations
  - delete duplicate Browser variable
  - group DOM load event actions
- **Unit Tests:** keeps getting more and more assertions.

<span></span>

 ! Global Variables

- **Webservice_WriteRunWS_Logs** globally activate specific logging files for web service calls. We will add an option in the web service map soon to fine-tune the logs for each call when this variable is active.
- **Application_ListView_Show_Create_Message** hide "create record message" on empty record set in List View

<span></span>

 ! Others

- convert Workflow message from a warning to informative

![Create Entity workflow task](CreateEntityWFTask.png)

- vertical menu adjustments

![Vertical Menu](VerticalMenu.png)

- Business Maps support for dot notation when OrgfieldID is not given (which is wrong, but...coreBOS tries to help)
- start using **cbAppCache** global variable. on our way to standardizing a cache layer
  - use coreBOS Cache instead of static variable which was returning incorrect values in **get_user_array**
- Clickhouse support: cast port to 0 integer when not configured
- encode related lists labels in Layout Editor
- use correct variable name for fieldid in MasterDetail widget
- avoid total record count error when total count is not present in Related List
- get related master record id in Related List Widget
- apply LDS to Home page form
- add all supported languages in tuigrid listview
- set User in Global Variable call to get the correct value
- order user list by ename field and include user with no status to avoid search errors
- Widget button is submiting the form
- fix Field Dependency: readonly action issue
- Custom View: save current roleid in cbCVManagement filter
- Web Service
  - restore value of current module in global space. fixes #1351
- Workflow
  - change applymaptoinventoryarrayelements to more generic applyMaptoArrayElementsAndSubarray now that we support Dot Notation
  - set workflow context always
  - use correct variable for module name retrieving table alias. fixes #1363
- Translations
  - Clickhouse webhook secret
  - missing map translations
  - Workflow expression ES

<span></span>

![October Insights](corebosgithub2210.png)

**<span style="font-size:large">Thanks for reading.</span>**

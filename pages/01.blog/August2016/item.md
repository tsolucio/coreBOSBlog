---
title: August 2016
date: 2017/10/22 20:08
metadata:
    description: 'coreBOS work during August 2016.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: August.png
header_image_height: 150
header_image_width: 819
taxonomy:
    category: blog
    tag: [development, 2016, functionality]
---

While reviewing all the changes that happen this month two ideas kept coming to my mind: we are creating something important here and we definitely were not on vacation that August :-)

===

 ! Business Maps

 - List columns mapping enhancement that permits defining the columns to see in global search and ask if a mapping exists for a module
 - Master-Detail layout business map
 - Add support for Field mapping in Workflows

<br/>

 ! Commit info on zip download

We recommend installing coreBOS [directly from GitHub](https://github.com/tsolucio/corebos) or similar repository because we are constantly updating the code, but for those that don't, it is extremely useful to know exactly which version of the aplicación they downloaded. With the special magic we add in the version file this month that is exactly what we get as you can see in the next before and after comparison.

**<span style="font-size:large">vtigerversion.php BEFORE</span>**

```
....
$coreBOS_app_version = '7.0';
$coreBOS_app_name ='coreBOS';
$coreBOS_app_url = 'http://corebos.org';
$coreBOS_commit_info = '$Format:%ci$ ($Format:%h$)';
?>
```

**<span style="font-size:large">vtigerversion.php AFTER</span>**

```
....
$coreBOS_app_version = '7.0';
$coreBOS_app_name ='coreBOS';
$coreBOS_app_url = 'http://corebos.org';
$coreBOS_commit_info = '2017-09-21 15:43:19 +0200 (b0b3b30fc)';
?>
```

 ! Create other entities on lead conversion

When converting a lead, the application will automatically create a contact, account, and potential. It's not uncommon to want to create additional entities that fit into your business logic.

To cover this necessity we combine the power of some existing **Business Maps** to accomplish the task. You can [read about this functionality on our documentation site](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:lead_conversion#creating_additional_records_in_other_modules).

 ! Workflows

 - **Create inventory modules tasks:** Thanks to a community contribution by [Luke](https://github.com/Luke1982) we get a new workflow task associated to the inventory modules that permits us to automatically convert these types of records into other inventory module types. With support for the native mapping and the Field Mapping Business Map you can fine tune the conversion to your needs.
 - **Duplicate record task:** in combination with the [Duplicates Record business map](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:duplicaterecords) this workflow task permits to mass duplicate records and its related entities.

<br/>

 ! Global Variables

 - **Application_ListView_SearchPanel_Open**
 - **Application_AdminLoginIPs**
 - **Debug_Popup_Query**
 - **ModComments_DefaultCriteria** and **ModComments_DefaultBlockStatus**
 - **Application_TrackerMaxHistory**
 - **use description** functionality whereas you can use the description field to define long text values so it is easier to maintain
 - Global variable definitions

<br/>

 ! Developer enhancements

 - **getFieldFromEditViewBlockArray** and **getFieldFromDetailViewBlockArray**
 - **getMultiCurrencyInfoFrom:** For modules with multi currency functionality this function returns all the information of the currency being used on one record
 - **getjslanguage:** this call permits us to get language translations that live in the application in to our browser. Inside our modules' language directory we create files named after each language, like **en_us.js**, we put inside the translation labels in a JSON array and then call the getjslanguage function with this URL:
 ```
 https://YOUR_SERVER/YOUR_COREBOS/index.php?module=Utilities&action=getjslanguage
 ```

<br/>

 ! Inventory modules enhancements

We introduce an extremely important enhancement which keeps inventory lines instead of eliminating them every time. Before this change, every time a record of an inventory module was edited all the lines were deleted and then created again, so we lost any information that we were tracking in the inventory details module. After this change, we only delete lines that are really deleted and we edit and add the new ones so all the information we save on inventory details is kept.

This enhancement permits us to use the Master-Detail Business Map to configure editing inventory details fields in inventory lines as can be seen in this video.

[plugin:youtube](https://youtu.be/zfuEuGUhKm0)

<br/>

 ! Validator

On our way to adding a generic and easily configurable validation system we study and select the [Valitron library](https://github.com/vlucas/valitron) from among the many available. We integrate it into the application making it available to developers and add a few custom validations like IBAN.

 ! Control potential sales stage and inventory status history on module

These status change history records were being saved either directly in the Save.php script of the module or hardcoded in the main CRMEntity class. The first is wrong because we can save from other parts of the application (webservice, workflow...), effectively changing the status without that change getting recorded. The second is wrong because we have code and functionality specific to one module inside the general main class.

The reason this was done this way is that we need to record the status before and after saving and we didn't have the events when this code was created.

Instead of solving this necessity using events [we override the class save process](https://github.com/tsolucio/corebos/blob/master/modules/Potentials/Potentials.php#L120). We pick up the status and then call the parent save as normal, reproducing an equivalent functionality.

This approach is very powerful and used in various parts of the application.

 ! Documents mass download action

A new action button on the documents list view permits us to download a set of document attachments in a compressed format.

 ! Some others:

 - Documents and Calendar standardize and cleanup
 - Product service cost on inventory details
 - Very big scheduled reports broke the scheduled tasks controller
 - If a Potential record is related to a campaign we automatically relate the parent account or contact to that campaign
 - Move currency position to currency settings, not user preferences
 - Mobile. We keep working on this project that keeps getting more and more useful
 - Uitype inexistent will show field as read-only
 - We can now activate and deactivate Comments for modules in settings
 - Calendar fixes
 - Inline edit via post to support large data sets like comment fields
 - Security clickjacking
 - Dutch Translations. Thanks [Luke](https://github.com/Luke1982)!!
 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Translation. Notice warnings, eliminate unused code, cleanup

**<span style="font-size:large">Thanks for reading.</span>**


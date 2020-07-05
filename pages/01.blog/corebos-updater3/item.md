---
published: true
title: coreBOS Updater Automation
date: 2020/07/05 13:58
metadata:
    description: 'coreBOS updater: automation of implementor tasks.'
    keywords: 'CRM, vtiger, opensource, corebos, automation'
    author: 'Joe Bordes'
header_image_file: daniele-levis-pelusi.jpg
header_image_height: 308
header_image_width: 438
taxonomy:
    category: blog
    tag: [2019, updater]
---

coreBOS Updater is a revolutionary way of creating and maintaining software as I have [discussed in the past](../corebos-updater2). In this blog post, I will uncover some of the undocumented features that make it a breeze to customize new installs while keeping up with the ongoing project.

===

Updater permits us to use the vtlib API and direct database access to make any modifications we may need inside a running coreBOS. During the time we have been using this feature we have found the need to create helper methods which mostly are about **mass operations** made easy. Let's see some of these operations.

 !!! Mass Actions

A usual task when starting a new project with coreBOS is to **create and hide fields**. After the initial analysis meeting, you will have a list of fields that you will either have to hide or delete and another list with the ones you have to create

- **massCreateFields($fieldLayout)**

This function accepts an array with modules, blocks and field definitions and will create the blocks if they do not exist, and all the fields inside those blocks. The structure of the array is rather simple as [can be seen here](https://github.com/tsolucio/corebos/blob/master/modules/cbupdater/cbupdaterWorker.php#L341) It supports uitype 10 capture fields and picklists permitting to assign all necessary values. You can find some examples in the `build/changeSets` directory, [specifically this one](https://github.com/tsolucio/corebos/blob/master/build/changeSets/2019/addPaymentFieldsToAccounts.php#L27)

- **massHideFields($fieldLayout)**

This function accepts an array with modules and fields and will **hide** them all globally. The structure of the array is simple as [can be seen here](https://github.com/tsolucio/corebos/blob/master/modules/cbupdater/cbupdaterWorker.php#L408).

- **massDeleteFields($fieldLayout)**

This function accepts an array with modules and fields and will **delete** them. The structure of the array is simple as [can be seen here](https://github.com/tsolucio/corebos/blob/master/modules/cbupdater/cbupdaterWorker.php#L434). You can find some examples in the `build/changeSets` directory, [specifically this one](https://github.com/tsolucio/corebos/blob/master/build/changeSets/2019/addPaymentFieldsToAccounts.php#L72)

- **massMoveFieldsToBlock($fieldLayout, $newblock)**

This function accepts an array with fields and a block. It will move all the fields to the indicated block. The block MUST exist.

- **orderFieldsInBlocks($fieldLayout)**

This function accepts an array with modules, blocks and fields and will **order** them. You can find some examples in the `build/changeSets` directory, [specifically this one](https://github.com/tsolucio/corebos/blob/master/build/changeSets/2018/addFinancialFields.php#L117)

<span></span>

 !!! Some other useful functions are:

- deleteWorkflow($wfid)
- deletePicklistValues($values, $tableName, $moduleName)
- deleteAllPicklistValues($tableName, $moduleName)
- setQuickCreateFields($moduleName, $qcfields)
- convertTextFieldToPicklist($fieldname, $module, $multiple = false)
- setTooltip($tooltips)
- removeAllMenuEntries($module)
- installManifestModule($module)
- isModuleInstalled($module)

<span></span>

 !!! Updates without coding

A few months ago we enhanced coreBOS updater to permit implementors to use some of these advanced functions directly creating records.

The concept is simple: you can now create, update, and delete some coreBOS updater records. These manual updates must contain a JSON formatted structure that coreBOS Updater will recognize and execute.

The supported JSON formats are all the high-level helper methods we describe above, and you can read all the details, with some examples, in [our documentation wiki](https://corebos.com/documentation/doku.php?noprocess=1&id=en:devel:corebosupdater#corebos_updatercustom_changesets_without_coding).

Don't hesitate to reach out to us if you think we should add any other functionality or you need any help with any of the existing functions.

**<span style="font-size:large">Have fun!</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@yogidan2012?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Daniele Levis Pelusi"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Daniele Levis Pelusi on Unsplash</span></a>

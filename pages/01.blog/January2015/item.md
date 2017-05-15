---
title: January 2015
date: 2017/05/13 00:00
metadata:
    description: 'coreBOS work during January 2015.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: january.jpg
header_image_height: 229
header_image_width: 545
taxonomy:
    category: blog
    tag: [development, 2015, evolution, events]
---

This month turns out to be a rather slow month, we are busy learning to use the new [eventing system](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_hooks), creating examples and new events to cover typical request were we usually had to change the base code, but we still make some interesting enhancements.

===

 ! Better OpenOffice merge functionality

 - We add [examples](https://github.com/tsolucio/corebos/tree/master/build/oo-merge), [documentation](http://corebos.org/documentation/doku.php?noprocess=1&id=en:openoffice_integration) and macro file to help with multiline text fields (description and addresses).
 - Change oo-merge dependency on pczlib to the much faster native PHPZIP.
 - Directly apply oo-merge language changes for all supported languages.

Although it is a basic functionality compared with our advanced **OpenOffice Document Generator integration**, it is still a very powerful and simple to use feature.

 ! Mass upload images on products with drag and drop

[plugin:youtube](https://youtu.be/usWQDoCVw_w)


 ! Quick create in popup

Have you ever ran into the use case where you need to select a record from a module but that record doesn't exist yet? Sure, you can open a new tab browser, create the record and reload the select screen, but if you find yourself in this situation a lot you can also activate the **quick create popup** feature as explained in the next video.

[plugin:youtube](https://youtu.be/8aXt3UT6BsE)

 ! Contact/Account/Vendor address on Inventory Modules

Select shipping or billing address for contact/account/vendor capture on inventory modules

[plugin:youtube](https://youtu.be/qEcjkgRIN14)

 ! coreBOS.filter.editview.setobjectsvalues event
This was a very useful event when we created it, that permits any developer to set advanced default values for any field on a module depending on different conditions the user may have specified.

You can find an example in the HelperScripts directory:
 - [Register the event](https://github.com/tsolucio/corebos/blob/master/build/HelperScripts/coreBOSEventsLoader.php#L32)
 - [Call the code to set some values on the Leads records](https://github.com/tsolucio/corebos/blob/master/build/HelperScripts/coreBOSEventsExample.php#L117)

 !!!! Now, **coreBOS** has the [field mapping business map](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:mapping) which permits doing this without even coding. I will talk about this functionality in a few posts when we get to the creation of business maps.

By the way at this point in time the business map concept, functionality and code are already being developed.


 ! Some others:

 - Eliminate warnings, notice, MySQL strict and code cleanup (this one is a constant every month, even today).
 - Security and optimizations
 - Translation and special characters support.
 - Correct behavior when pressing enter on advanced search.
 - Add vendors to the calendar. **Thanks MSL!**
 - Developer function [getUItypeByFieldName](https://github.com/tsolucio/corebos/blob/master/include/utils/CommonUtils.php#L2522).
 - Automatically execute javascript code included in Detail View Widget content
 - Add noprint class on mail manager to permit printing of individual emails
 - Vendor Related List on Contacts
 - Workflow formula fix: eliminate html newlines and convert empty strings to space to avoid parsing error

**<span style="font-size:large">Thanks for reading.</span>**


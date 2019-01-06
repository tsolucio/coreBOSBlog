---
title: Christmas Presents
date: 2019/01/06 02:08
metadata:
    description: 'coreBOS end of year notable features.'
    keywords: 'CRM, vtiger, opensource, corebos, features'
    author: 'Joe Bordes'
header_image_file: element5-digital-462727-unsplash.jpg
header_image_height: 470
header_image_width: 464
taxonomy:
    category: features
    tag: [features, functionality, customizations]
---

Christmas 2018 has brought coreBOS a lot of presents, so I thought I would dedicate this first post of the year to show off some of the most important ones and wish you all a wonderful and happy year ahead.

===

 ! Business Actions

We have moved all the actions in the application like buttons and links on listview and detailview, and CSS and script hooks to a standard module. Thanks to this it is now extremely easy to delete or add new actions by simply modifying a record in the application. We have also taken this a bit further adding role and coreBOS rules permission on these actions, so now we can actually show an "add time" link only on open projects.

[plugin:youtube](https://youtu.be/sRvU2SWtggY)

 ! Field Dependency Business Map

This map brings to the application a highly demanded feature which is the possibility to modify fields and blocks depending on the values introduced in other fields. A very important functionality enhancement

[plugin:youtube](https://youtu.be/HrUY11Np2k0)

 ! Column Search

We have added a direct list view search functionality which permits us to quickly launch a limited advanced search. This search is always grouped by an OR condition and only supports fields that are currently on the list view but it is a quick and handy way to create advanced searches.

[plugin:youtube](https://youtu.be/j3KJO7rBBZg)

 ! Save and Repeat

Activating the **Application_SaveAndRepeatActive** global variable we will have access to the possibility to repeat the create/edit action indefinitely, making it a lot easier to mass create a large list of records that we cannot import and have to introduce manually.

[plugin:youtube](https://youtu.be/ydhGX0HQy3w)

 ! Mass Edit 1x1

The application now supports a one by one mass edit feature which permits you to select a bunch of records and edit each one individually. This is a useful feature for those cases where we need to change one or more fields on a set of records and there is no practical way of grouping them for a complete mass edit.

[plugin:youtube](https://youtu.be/pmJPD6aqmwA)

 ! Product Component

This new module replaces the very poor product bundle relation that existed in the application. Now that we have a module to represent the relation instead of some hidden internal table we can easily register the units of each subproduct, add our own custom fields on the relationship and get reports.

Also, this enhancement comes with two global variables that will permit us to roll up the unit and cost price on to the parent product.

[plugin:youtube](https://youtu.be/N4m-0oTL1vU)

 ! Some other enhancements which deserve mentioning

 - LDS upgrade. A massive task by Luke has brought an up to date LDS library which will permit us to move forward the project to get coreBOS based on LDS guidelines. Thanks [Luke](https://github.com/Luke1982)
 - "**was**" condition in the workflow system so now you can create workflows that launch depending on the PREVIOUS value of a field
 - coreBOS rule validation. A very powerful change from Timothy permits us to create validations that launch a coreBOS rule against the record being edited, opening the range of possibilities enormously. Thanks [Timothy](https://github.com/tebajanga)
 - map validation. Besart has added an action on business maps to validate the XML making it a lot easier to get them right. Thanks [Besart](https://github.com/besartmarku)
 - manual workflow execution which permits us to launch any workflow from a link inside the application or from a web service call

**<span style="font-size:large">Incredible!!!  Upgrade and enjoy the power of your coreBOS</span>**

<span></span>


Photo by Element5 Digital on Unsplash
<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
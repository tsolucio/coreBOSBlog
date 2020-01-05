---
title: Christmas Presents
date: 2020/01/05 02:08
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

Similar to last year, Christmas 2019 has brought coreBOS some presents, so I thought I would dedicate this first post of the year to show off some of the most important ones and wish you all a wonderful and happy year ahead.

===

 ! Record Versioning

[This functionality permits](https://corebos.com/documentation/doku.php?id=en:adminmanual:recordversioning&noprocess=1) us to easily save the state of a record for future reference. In other words, with a simple click, we will be able to create a version of all the information on a record and then continue working on it without losing those changes and permitting us to load them whenever we need them.

The duplication of related entities is managed by the [duplicate record business map](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:duplicaterecords&norpocess=1) and is also supported by the Duplicate workflow task.

[plugin:youtube](https://youtu.be/mABXVGkl8Nc)

 ! Process Flow Management

This set of four modules and the powerful workflow system will permit you to enforce the business logic your company has on any module. You will be able to control the status changes that your records should go through using coreBOS. For example, you will be able to enforce the Potentials Sales Stage values and block your users from going to certain values from others or simply logging the flow while launching workflow tasks on each change.

[plugin:youtube](https://youtu.be/QOKuNtXGls4)

 ! Spreadsheet Editing

This integration with [Ethercalc](https://ethercalc.net/) permits us to select a set of records on any modules and edit them massively in an Ethercalc spreadsheet. Besides the advantage of editing freely any field on any column in a spreadsheet way, ethercalc will permit us to share the spreadsheet with other users and work collectively. One warning though, we still haven't implemented control for multiple spreadsheets editing the same records. There are a few other restrictions that we are still working on also, but it is almost ready.

[plugin:youtube](https://youtu.be/7UdJp56wHmI)

 ! Workflow Enhancements

In the last 6 weeks or so we have implemented some important changes in the workflow system. Besides making it much more robust to errors in individual tasks and reporting these errors in a controlled manner both on execution and in the user interface, we implemented a "context environment" for the execution. This means that now a workflow execution has a context of information that is shared among all the workflows and tasks that participate in one individual execution. The variables in this context can be set from outside the execution and internally by each task. So a task can now send information to other tasks or get information from outside. Imagine the case where we have a very complex algorithm to decide who we have to send an email to. We can implement this decision (using a decision table, for example) and set the value in the context before launching the "Send Email" workflow task. The "Send Email" workflow task will load the receiver email from the context instead of the workflow task definition. With this, we get all the functionality that the coreBOS Send Email task gives us while permitting the flexibility to fine-tune each case.

We have also added some new functionality for the implementors:

- Image Generator task which permits us to generate al types of QR and EAN codes that will be loaded into image fields on the module
- Relate and Unrelate triggers that will permit us to launch workflows when two records are related or unrelated
- Webservice call workflow task

<span></span>

 ! Business Map Editors

From the start of the Business Map project we set up a place to create graphical editors for the maps: **Generate Map** action link in the right panel. Up to now, we have been concentrating on creating the maps we needed instead of implementing the generators themselves. This month, tying in with the MapGenerator project that has been going on in parallel for some months now, we finally define the infrastructure to permit an easy way to create the map editing functionality and implement three generators. More to come in the next year!

[plugin:youtube](https://youtu.be/RFTBS9SbZHE)

**<span style="font-size:large">Incredible!!!  Upgrade and enjoy the power of your coreBOS</span>**

<span></span>

Photo by Element5 Digital on Unsplash
<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
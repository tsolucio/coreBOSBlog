---
published: true
title: Workflow System
date: 2019/08/01 13:58
metadata:
    description: 'Presenting the coreBOS workflow and business process management system'
    keywords: 'CRM, vtiger, opensource, corebos, email, sendgrid'
    author: 'Joe Bordes'
header_image_file: glenn-carstens-peters-RLw-UC03Gwc-unsplash.jpg
header_image_height: 373
header_image_width: 560
taxonomy:
    category: blog
    tag: [implementation, 2019, workflow, bpm]
---

The coreBOS workflow system permits us to automate business processes, it is a powerful BPM engine which we start to shed some light on in this post.

===

A workflow in coreBOS is defined as a series of actions that take place when something happens inside the application.

Analyzing that definition we can start to understand the different parts of a workflow.

  - a "series of actions" tells us that we will find a set of tasks or processes capable of performing certain work for us in a certain order
  - "take place when something happens" tells us that coreBOS has some events that will launch or trigger the workflow

Let's talk about the events and leave the tasks for future posts. coreBOS has [an extensive eventing system](2do) distributed throughout the application which you can plug into using the programming environment. There is a subset of those events that we can listen on in the workflows. These events are:

  - on save, where we can differentiate between create, update or both
  - delete
  - time based
  - manual launch

The actual list of events looks like this

2do

Where the events firstnsave, all modification, modification are triggered when a record is saved. The delete event is triggered ritgj before a record is deleted. Note that this a tricky event, if you send an email for example the email will not be sent because all emails are put on a queue and sent in the background by the time the email is actually processed the record has been deleted and 


Besides detecting the event and triggering the workflow we can add a condition that must be met to actually launch the workflow.

These conditions is our first encounter with the expression language and require a full blog post for them so remember to follow us on Twitter for the expression functions and tune in next month for the next post

**<span style="font-size:large">Continue reading in the next part of this series.</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@glenncarstenspeters?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Glenn Carstens-Peters"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Glenn Carstens-Peters on Unsplash</span></a>

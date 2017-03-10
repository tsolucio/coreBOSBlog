---
title: Two Surprising coreBOS use cases
date: 2014/08/27 11:49
metadata:
    description: 'coreBOS use cases'
    keywords: 'CRM, vtiger, opensource, use case'
    author: 'Joe Bordes'
header_image_file: woman-in-awe.jpg
header_image_height: 310
header_image_width: 700
taxonomy:
    category: blog
    tag: [usage, case]
---

### coreBOS doesn't cease to surprise me!

This week I ran into two use cases of **coreBOS** which surprised me. Still, after all these years, coreBOS users find productive and useful ways to use the product that I haven't seen before.

**1.- Nagios creating tickets**

A client asked about using "update field" workflow, indicating that when you try to fill in a text box like ticket solution or description the new lines were not being respected. They needed to fill in the solution field in the text and needed to format the text in different lines.

I had a look at the problem and fixed it (currently available on github and officially in the next release). Then I went to see the workflow they were using it for. What I found was that they have **Mail Converter** configured to read a Nagios warning email account. When the subject of the email contains "_Server down_", they create a ticket in the system, then the "update field" workflow kicks in and fills in the important fields of the ticket like status and the solution field with the procedure to be followed to solve the problem.

Really elegant! If they had asked me I would have probably made some sort of template tickets with the different procedures and had them duplicating the record... their solution is MUCH better!!

**2.- Technician launched cross sales.**

I was visiting a client last week and we were talking about different issues they are running into with **coreBOS** and some solutions. He explained to me a procedure he has in place. His technician visit clients to do different work: cleaning windows, fixing wood floor, cleaning in general, ...

He has a procedure in place with his staff such that when a technician reaches a new client, or simply detects a certain set of parameters, they connect to coreBOS and fill in some special fields on that account record. These fields are mostly check boxes like: has wood floor, number of windows, has glass doors, number of desks in office, ...

As these different fields get filled in and depending on their values, the accounts are automatically included in different marketing campaigns for follow up and cross sales. He even made told me that in some occasions the technician has made the comment that somebody in the office would say:

**Hey! I just got and email from you company saying that you also do....**

Reinforcing the commercial email and making it much more effective.

**<p style="font-size: larger">Don't hesitate to share with us the uses you put coreBOS to!!</p>**
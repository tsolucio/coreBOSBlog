---
title: GDPR Considerations
date: 2018/11/11 20:08
metadata:
    description: 'coreBOS GDPR customizations.'
    keywords: 'CRM, vtiger, opensource, corebos'
    author: 'Joe Bordes'
header_image_file: matthew-henry-87142-unsplash.jpg
header_image_height: 443
header_image_width: 470
taxonomy:
    category: gdpr
    tag: [gdpr, functionality, customizations]
---

Many clients ask me what are our GDPR rules with coreBOS. This question makes me smile and answer with another question: **what does your GDPR compliance documentation say that your coreBOS must do?** The general idea is that it isn't the software itself that makes your company compliant, it is how you decide to configure that software. With that said, let's see what some of the coreBOS users are doing.

===

GDPR compliance is all about responsibility, it is called **proactive liability**. This concept comes to say that you must know what is happening in your company, what can be done and what can't be done and be able to prove that the correct procedures are being applied in each case. In order to accomplish this, you must have a written document that states these procedures and limitations. Once you have that you will be able to adapt your software, be it coreBOS or any other, to the requirements of this compliance document. This document will also guide to other actions that may have nothing to do with software like putting a lock on a cabinet drawer.

 ! Legal Base

The first procedure that most coreBOS users implement is the proof of legal base to work with a client. You must be able to prove at any given moment that you have explicit consent from your clients to have their data and work with them. The easy way to do this in coreBOS is to add a few custom fields on the Documents module to indicate the type of consent and when it was given and then upload the specific contract or file that establishes the relation.

Some of our users prefer to save this relation separately, on another module, so we created a new module called **Personal Consent** which has a relation field to Accounts and Contacts, the type of relation picklist field, the from and to date of the relationship and then you can add any documents to the record to prove the consent. We even have some clients that create this record directly from their website using the web server API to record the cookies and website information consent.

A few values of types of relationships can be: Contractual, Vital interest, Legal obligation, Public interest, Legal interest on behalf of third party,... but these really depend on your business sector and needs.

 ! Access/Portability/Rectification/Objection/Erasure

The next set of actions to control are the requests to Access/Portability, Rectification, Erasure, and Objection. The general idea here is to create a ticket which records the fact that a client has requested this right and document all the steps taken in the ticket. This serves as a register of what has happened to the client's request and data so we have traceability. It also serves as a support for establishing procedures as we can add workflows to control time spans and/or overdue requests or send emails as actions are taken on the request. As above, you should add some picklist to separate these GDPR requests from other normal tickets and you can also create or [add another module only for this type of request](http://corebos.org/documentation/doku.php?id=en:extensions:extensions:arco&noprocess=1).

With that out of the way let's see some of the configurations we can do for each of the requests.

 !!! Access/Portability

When a client asks to see all the information you have about them, you must, once again go to your GDPR compliance documentation and see exactly what that means. We can do something simple like showing them the relation of fields we have and their value, this can be done exporting the Account/Contact record in CSV so they can achieve the portability and send the information somewhere else, or you can go to the detail view and print the information to a PDF, you could even go to the length of creating a nicely formatted [PDF using GenDoc](http://corebos.org/documentation/doku.php?id=en:extensions:extensions:gendoc&noprocess=1). But, in reality, this is not all the information we have of them, we also have their invoices with the products they bought and how many times, their tickets, maybe we have some high-level sensible fields like sexual preferences or some illness, maybe you have a coreBOS registering loans and payments, or medical interventions, ... the possibilities are endless and exactly what and how you should give them all this information must be defined and then adapt your coreBOS to the requirements of your compliance documentation.

 !!! Rectification

This is easy; create the ticket, indicate the changes to be made and edit the record accordingly. You should have ModTracket active to record the changes. Inform the client.

 !!! Objection

This one is rather easy also. If your company sells, sorry, I mean shares, information with other companies you must inform your clients and give them the right to establish with whom you can do that. The idea here is to associate some checkbox to each portion of information and mark the checkbox to permit or not sending the information depending on the demands of the client. Then you can create GenDoc outputs and different reports depending on the values of these checkboxes.

 !!! Erasure

This can be easily accomplished using the [Archive record pattern](../ArchiveRecordPattern). Additionally, you can add some logic to control the actual elimination of the record like adding a date field which automatically gets filled in when the record is assigned to the archive user, then you could create a scheduled workflow to actually eliminate the record when the legal time span has expired or simply create a scheduled report that lists all the records due to be deleted a certain week and have that sent out weekly to the person in charge of this task.

Note that as with all the other options we can adapt coreBOS to your needs (in fact that is what this is all about), for example we have a client that uses the archive pattern and wanted any user in the system to be able to search for accounts by accountname no matter what their personal permission is, so we added a rule to accomplish this particular task for them. You could also [use RAC](http://corebos.org/documentation/doku.php?id=en:adminmanual:businessmappings:record_access_control&noprocess=1) (to some extent) for something like this.

 ! Security Breaches

Another requirement of the GDPR is to keep a detailed record of security breaches. I recommend using the projects module for this. As with tickets and documents, add a picklist to categorize the breach project from the others and then use the tasks, milestones, and workflows to take and document all the necessary steps and their result.

We have some clients that use a specific module to record the breach, this module is called **Security Breach** and serves only to record that the event happened, when and what steps were taken. A very simple version of the information.

 ! Other things you can do

- configure ModTracker to have a relation of changes that happen on each record. I recommend you [use metabase](https://www.metabase.com/) to access this information.
- configure Audit Trail to have a relation of actions executed by each user. I recommend you [use metabase](https://www.metabase.com/) to access this information.
- permission system: define correctly your roles and profiles, make sure your settings are aligned with your business requirements in order to guarantee the confidentiality of data
- some installs require to save some sensible information that only a few people can access: we have you covered with our [Confidential Information module](http://corebos.org/documentation/doku.php?id=en:extensions:extensions:confidentialinfo&noprocess=1)
- if you need an easy way to register when external drives are taken off-site and/or backups are made, you can [use this module.](http://corebos.org/documentation/doku.php?id=en:extensions:extensions:registercopiaseguridad&noprocess=1) We have at least one client who has integrated his backup system to create a record in his coreBOS (via web service) each time the backup finishes (just to stimulate your imagination).
- security: 
 - make sure your users have strong passwords
 - activate the password expiration service
 - configure a company-wide [http-basic authentication password](https://en.wikipedia.org/wiki/Basic_access_authentication) to your coreBOS
 - run the bettersafe.sh script and make sure you have the right file system permission set
 - configure unique user login
 - limit the IP your users can login from using the **Application_AdminLoginIPs** and **Application_UserLoginIPs** global variables
- Some other actions that fall outside of the scope of coreBOS
 - limitation of computer access
 - protection against unlawful access
 - setup a VPN
 - don't host your customer portal and website on the same computer as your application
 - firewalls
 - DMZ
 - intrusion detection
 - encrypt filesystem and/or database
 - ...

<span></span>

 ! Customer Portal

Finally, we have to talk about the customer self-service application. Although not strictly mandatory by the GDPR, as you can imagine from the explanation above it would be really nice if your clients could do some of that work themselves. Obviously depending on how much burden and on the number of requests you get it can be more or less necessary.

The idea is to have a satellite application for customers to manage their data, a place they can do things like:

- see and edit their data (Access and Rectification)
- export their data (Portability)
- define their sharing data preferences (Objection)
- ask questions: tickets
- make cancelation requests (Erasures)
- access FAQ and company policies
- see the contractual relationship with the company (Legal basis)
- upload ID documents and similar

You can implement any set of those and from there each company can add other services depending on their requirements: invoices, contracts, projects, quotes, ...

Keep in mind that this is actually another application independent of coreBOS that requires it's own support, customizations, and maintenance, like additional hosting and security measures (as it is an open application on the internet)


 ! Closing notes

I hope to have accomplished two things with this article:

1.- transmit the idea that what coreBOS must do to adhere to GDPR lies more in the requirements of your particular GDPR compliance document than in the application

2.- show you some of the possibilities and flexibility of coreBOS to adapt to the needs of your compliance document.

If you need any help adapting your coreBOS to your needs, [contact us](http://corebos.org/page/contact), we probably have solved the issue before, but even if we haven't we will be able to make coreBOS do what you need.

Photo by Matthew Henry on Unsplash
<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@matthewhenry?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Matthew Henry"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-1px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M20.8 18.1c0 2.7-2.2 4.8-4.8 4.8s-4.8-2.1-4.8-4.8c0-2.7 2.2-4.8 4.8-4.8 2.7.1 4.8 2.2 4.8 4.8zm11.2-7.4v14.9c0 2.3-1.9 4.3-4.3 4.3h-23.4c-2.4 0-4.3-1.9-4.3-4.3v-15c0-2.3 1.9-4.3 4.3-4.3h3.7l.8-2.3c.4-1.1 1.7-2 2.9-2h8.6c1.2 0 2.5.9 2.9 2l.8 2.4h3.7c2.4 0 4.3 1.9 4.3 4.3zm-8.6 7.5c0-4.1-3.3-7.5-7.5-7.5-4.1 0-7.5 3.4-7.5 7.5s3.3 7.5 7.5 7.5c4.2-.1 7.5-3.4 7.5-7.5z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Matthew Henry</span></a>

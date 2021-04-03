---
title: Customer Portal Login
date: 2021/04/04 10:08
metadata:
    description: 'Presentation of the Customer Portal Login and native restrictions.'
    keywords: 'CRM, vtiger, opensource, corebos, portal, login, external, web service'
    author: 'Joe Bordes'
header_image_file: portal.jpg
header_image_width: 690
header_image_height: 431
taxonomy:
    category: blog
    tag: [functionality, portal, login, webservice]
---

Presentation of the Customer Portal Login and native restrictions.

===

coreBOS is a very powerful application to manage your business needs, but it is also widely used as a backend for frontend applications. A task at which it is REALLY good thanks to the powerful web service API and backend tools like workflows and business maps that permit you to do a lot of customizations in a low code way.

When being used in this scenario it usually comes up that the people we want to log in to coreBOS are not coreBOS users but our clients or employees. In the past, I have mostly seen three approaches to this issue.

### Contact Login

The external application uses one coreBOS user that imposes permission and privileges restrictions and validates the contacts using some fields and a password on the contact record.

This is a valid approach. It has two major drawbacks.

- One is that all the specific Contact restrictions must be implemented in the external application. If you want to get a list of the invoices of the logged in contact you must add that condition to the query in your external application code, making it prone to [Sensitive Data Exposure](https://owasp.org/www-project-top-ten/2017/A3_2017-Sensitive_Data_Exposure) while being harder to implement.
- The other is that if some contacts require a different permission configuration you won't be able to do that unless you, again, implement that into your application.

So, mostly the drawback is that coreBOS isn't helping you do it right, it isn't helping you do the heavy lifting, but, besides that, now with all the javascript (mess) going around, it turns out that all of a sudden our code is out in the open, totally accessible to anyone who knows how to right-click on the browser window, so we can't even use this approach as it is totally insecure. The user will just be able to change anything they want and access whatever the user you used to connect has permission to do.

### User per Contact

The idea is to create a user for each Contact/Employee that needs to access the application. With this, you can implement a normal web service login and the permissions you grant to each user will define what they can do. If you configure a strict policy and make modules private along with some [Record Access Control](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:record_access_control&noprocess=1) rules you will be able to implement your application using simple web service calls and native methods as coreBOS will take care of the permissions for you.

In essence, this is like giving each contact a log in access to your coreBOS.

The drawbacks of this approach are

- a lot of users and Record Access Control rules with complex permissions make the system slower and harder to maintain, especially when almost all the users will have the same settings because the majority of the Contacts will all share the same privileges.
- the contacts will be able to login to the web service API directly

### Custom API

Using the vtigerCRM/coreBOS infrastructure, a whole new interface is created to cater to the specific needs of the external application. Think of the old SOAP based customer portal or the (obsolete) Outlook plugin support.

## Customer Portal Login

As of February 2021, we have created an easier way to accomplish this type of external application. We now have a way of permitting a Contact to log in to the web service API and get a valid user session in return. We can map each Contact to a different user or the same one, making it easy to group privileges together. Then coreBOS will do the heavy lifting for you by honoring that Contact and applying the corresponding restrictions to the methods called.

You can [read about this functionality in the documentation.](https://corebos.com/documentation/doku.php?id=en:devel:corebosws:manual:portallogin&noprocess=1)

**<span style="font-size:large">It is all about being that core Business Operating System upon which your applications can shine!</span>**

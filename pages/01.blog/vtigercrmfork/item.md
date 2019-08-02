---
published: false
title: vtigercrm fork
date: 2019/10/07 13:58
metadata:
    description: 'Thoughts and look back on decision to create coreBOS'
    keywords: 'CRM, vtiger, opensource, corebos, fork'
    author: 'Joe Bordes'
header_image_file: clark-tibbs-oqStl2L5oxI-unsplash.jpg
header_image_height: 405
header_image_width: 607
taxonomy:
    category: blog
    tag: [business, 2019, vtigercrm]
---

coreBOS now has an abstraction layer to send emails. Instead of the hardcoded phpmailer library, we can easily use any email service to send emails like [SendGrid](https://sendgrid.com/), [MailChimp](https://mailchimp.com/) or [sendinblue](https://sendinblue.com) among others.

===

We have created an internal API that abstracts the email service. We can use any email library or service to implement this API and have coreBOS sending emails with that service.

Once we created the API, we implemented the interface using the phpmailer library and set it as the default system to use, **so anyone updating coreBOS will not notice any difference**. Then, to make sure the change was correct we implemented an interface using [SendGrid](https://sendgrid.com/) functionality and released that to the open source project.

You can get an idea of how that works watching the next video

[plugin:youtube](https://youtu.be/9VgDkQfBAM4)

As you can see in the video, not only do we have coreBOS sending emails through SendGrid, which gives us full control and statistics of outgoing emails but we get full status notifications **INSIDE coreBOS**. Note that this is much more powerful than an integration like the typical MailChimp or phplist integrations that existed before as we get all the email events directly in coreBOS and can launch workflows to automate any task in your coreBOS, we just connected a powerful BPM motor to our email outbox. seriously, the power is incredible.

Let me express that again. Many people approach us asking for an integration with MailChimp, they want to send their contacts to a MailChimp campaign and get new contacts and status updates from there because MailChimp gives them information about the email campaigns that are sent from there. There are variations on this request like synchronizing information with [HubSpot](https://www.hubspot.com) or [Act-ON](https://www.act-on.com/) (both integrations exist in corebos) because those platforms fill in some additional information. What we are implementing with features like this email API is to get the notification of those events directly inside your coreBOS, where your data already lives. There is no need to send contacts back and forth, send the events directly to coreBOS.

The API requires only three methods and an event handler to return a class path and name where coreBOS can find the three methods. you can [continue reading here](https://corebos.com/documentation/doku.php?id=en:devel:sendemailservice&noprocess=1) for an explanation on how that can be done.

**<span style="font-size:large">The power of the coreBOS framework continues to grow!</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@clarktibbs?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Clark Tibbs"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Clark Tibbs on Unsplash</span></a>

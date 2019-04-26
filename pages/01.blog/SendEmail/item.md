---
title: Sending email from within coreBOS
date: 2019/03/03 13:58
metadata:
    description: 'How to correctly send emails from within coreBOS dvelopment processes'
    keywords: 'CRM, vtiger, opensource, corebos, email'
    author: 'Joe Bordes'
header_image_file: mikaela-wiedenhoff-693940-unsplash.jpg
header_image_height: 326
header_image_width: 302
taxonomy:
    category: blog
    tag: [development, 2019, email]
---

Recently I was tasked with taking charge of coreBOS project where the lead programmer had been doing some complex customizations. In general, the code changes I found were correct except for one that was done consistently wrong: **sending an email from within the system**. This struck me as very odd, I mean it can't be that difficult to send an email like that, or could it?

Continue reading to see how to send an email using coreBOS infrastructure.

===

The problem to solve seems simple: send an email to an account or contact and have an email record created and related in the application so we can see it in the "More Information" related list.

Sending the email itself is rather simple. coreBOS gives us a send_email functon which you can call with an email address, subject and body and the email will go out using the configured outgoing server settings. This looks like this:

``` php
include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';
$current_user = Users::getActiveAdminUser();
$to_email = 'to@somedomain.tld';
$from_name = 'Company/User name'; // Not mandatory
$from_email = 'from@yourdomain.tld';
$subject = 'Email Subject';
$content = 'Email Content/Body';
$rdo = send_mail('HelpDesk', $to_email, $from_name, $from_email, $subject, $content);
```

The only curious parameter here is the first one which will add the current user's signature to the email being sent as long as it does not have the value 'Calendar'. This parameter should be called **addSignature** with a value of true or false, but it is called **module** and will add the signature as long as the value is not Calendar. Things of inheriting a complex code base with a lot of history and programming hands.

Now, our first issue is that there is no record created for this email we just sent. The email went out but we have no visual registration of this fact. Ideally, we should see the email on the Emails related list of the account or contact we sent the email to.

It turns out that this is a totally independent operation, which is not something I like to much, but has the advantage of separation of concerns and permitting the application to send an email to any address be it in the application or not. We must:
 - create an email record before sending the email
 - send the email
 - check if the email was sent correctly
 - delete the record we just created if the email was not sent

I did some tests and ended up creating a helper function that creates the email for us in an easy manner. I recommend you use a recent version of coreBOS to make sure you have this helper function. This looks like this:

```php
include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';
$current_user = Users::getActiveAdminUser();
$to_email = 'to@somedomain.tld';
$from_name = 'Company/User name';
$from_email = 'from@yourdomain.tld';
$subject = 'Email Subject';
$content = 'Email Content';
$accountid = vtws_getEntityId('Accounts').'x74'; // 74 is an account ID in the coreBOS Tests database
$email = array(
	'saved_toid' => $to_email,
	'parent_type' => 'Accounts',
	'parent_id' => $accountid,
	'from_email' => $from_email,
	'subject' => $subject,
	'description' => $content,
);
$wsemailid = createEmailRecord($email);
list($emwsid, $emailid) = explode('x', $wsemailid);

$rdo = send_mail('HelpDesk', $to_email, $from_name, $from_email, $subject, $content, '', '', array(), $emailid);
if ($rdo != 0) {
	// Delete the $emailid record
	$focus = CRMEntity::getInstance('Emails');
	DeleteEntity('Emails', 'Emails', $focus, $emailid, $emailid);
}
```

With that code, we accomplish our goal. Now let's see some additional tricks we can do.

! Sending attachments

This is a complex issue mostly due to the many different places we can actually get the files to be attached and that we also have to add the attachments to the email record being created. The send_mail function gives us a set of options to attach files:

- **current:** get file name from $_REQUEST['filename_hidden'] or $_FILES['filename']['name']
- **all:** all files directly related to the crmid record, this is mostly only useful for email records but could be useful in some use cases
- **attReports:** get file name from $_REQUEST['filename_hidden_pdf'] and $_REQUEST['filename_hidden_xls']
- **array** of filenames or document IDs: array('themes/images/webcam.png','themes/images/Meetings.gif', 42525);
- **array** of direct content (see example code below for structure)

An example looks like this:

``` php
include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';
$current_user = Users::getActiveAdminUser();
$to_email = 'to@somedomain.tld';
$from_name = 'Company/User name';
$from_email = 'from@yourdomain.tld';
$subject = 'Email Subject';
$content = 'Email Content';
$accountid = vtws_getEntityId('Accounts').'x74'; // 74 is an account ID in the coreBOS Tests database
$att1 = 'themes/images/up.gif';
$att2 = 'themes/images/email.gif';
$attachmentsinfo = array(
	'direct' => true,
	'files' => array(
		array(
			'name' => 'up.gif',
			'content' => file_get_contents($att1)
		),
		array(
			'name' => 'email.gif',
			'content' => file_get_contents($att2)
		),
		)
);
$email = array(
	'saved_toid' => $to_email,
	'parent_type' => 'Accounts',
	'parent_id' => $accountid,
	'from_email' => $from_email,
	'subject' => $subject,
	'description' => $content,
	'files' => array(
		array(
			'name' => basename($att1),
			'type' => filetype($att1),
			'size' => filesize($att1),
			'content' =>  base64_encode(file_get_contents($att1)),
		),
		array(
			'name' => basename($att2),
			'type' => filetype($att2),
			'size' => filesize($att2),
			'content' => base64_encode(file_get_contents($att2)),
		),
	),
);
$wsemailid = createEmailRecord($email);
list($emwsid, $emailid) = explode('x', $wsemailid);

$rdo = send_mail('HelpDesk', $to_email, $from_name, $from_email, $subject, $content, '', '', $attachmentsinfo, $emailid);
if ($rdo != 0) {
	// Delete the $emailid record
	$focus = CRMEntity::getInstance('Emails');
	DeleteEntity('Emails', 'Emails', $focus, $emailid, $emailid);
}
```

! Sending copies and modifying reply to

We have three more parameters that permit us to send Carbon Copies (CC), Blocked Carbon Copies (BCC) and modify the Reply To email field. That looks like this:

``` php
include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';
$current_user = Users::getActiveAdminUser();
$to_email = 'to@somedomain.tld';
$from_name = 'Company/User name';
$from_email = 'from@yourdomain.tld';
$cc = 'cc@someotherdomain.tld';
$bcc = 'bcc@someotherdomain.tld';
$replyto = 'replyto@someotherdomain.tld';
$subject = 'Email Subject';
$content = 'Email Content';
$rdo = send_mail('HelpDesk', $to_email, $from_name, $from_email, $subject, $content, $cc, $bcc, array(), 0, 0, $replyto);
```

! Merging Variables

Another typical requirement is to want to use some template string for the subject and/or body and have the variables merged with the real values of some application record. This task is not done by the send_mail function, that function just sends whatever you give it in the subject and content parameters. So we must do the merging before. There are two ways to do that in coreBOS, one uses the application email template syntax and the other uses the more modern and powerful workflow templating syntax.

The first method uses the **getMergedDescription** function which looks like this:

``` php
$merged = getMergedDescription($template, '74', 'Accounts')
```

The second uses the **VTSimpleTemplate** class and looks like this:

``` php
$entityId = '11x74';
$util = new VTWorkflowUtils();
$adminUser = $util->adminUser();
$entityCache = new VTEntityCache($adminUser);
$ct = new VTSimpleTemplate($template);
$merged = $ct->render($entityCache, $entityId);
```

You can find some examples of each in our unit test project:
- [Tests for getMergedDescription](https://github.com/tsolucio/coreBOSTests/blob/master/include/utils/CommonUtilsTest.php#L280)
- [Tests for VTSimpleTemplate](https://github.com/tsolucio/coreBOSTests/blob/master/modules/com_vtiger_workflow/VTSimpleTemplateTest.php)

Additionally, there are two special merge cases that are directly handled by send_mail because the images are directly embedded in the email using the standard CID format instead of as an attachment. These are **logo** and **qrcode**.

For these to work you must put the strings ```<img src="cid:logo" />``` and ```<img src="cid:qrcode{$fname}" />``` wherever you want the logo or image to appear and then tell the send_mail function that it must include the CID image.

This looks like this:

``` php
include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';
$current_user = Users::getActiveAdminUser();
$to_email = 'to@somedomain.tld';
$from_name = 'Company/User name';
$from_email = 'from@yourdomain.tld';
$cc = 'cc@someotherdomain.tld';
$bcc = 'bcc@someotherdomain.tld';
$replyto = 'replyto@someotherdomain.tld';
$subject = getMergedDescription('Email for: $contacts-lastname$', '1086', 'Contacts');
$logo = 1;
$qrScan = 1;
$content = getMergedDescription('Hi $contacts-lastname$,
...
Thank you
<img src="cid:logo" />', '1086', 'Contacts');
$rdo = send_mail('Accounts', $to_email, $from_name, $from_email, $subject, $content, $cc, $bcc, array(), 0, $logo, $replyto, $qrScan);
```

Note that abusing the qrcode CID option you can actually embed any image you want in the body of the email. The QRCode syntax expects to find the image referenced in the cache/images directory. So if you save an image to ```cache/images/qrcodemyspecialimage.png``` and then put in the body of the email a reference like ```<img src="cid:qrcodemyspecialimage" />``` you should get that image embedded in the email. Only PNG files are supported.

! Closing notes

Well, it turns out that, like most things, it IS a bit more complex than it seemed but this is actually due to the many different possibilities that sending an email has, joined with the flexibility that coreBOS gives you to cover those possibilities.

You can [find here](https://github.com/tsolucio/corebos/blob/master/modules/Emails/mail.php#L13) a small explanation of the different **send_mail** parameters.

I trust this will make you more productive and optimize your customizations.

**<span style="font-size:large">Enjoying the power of the coreBOS framwework.</span>**


<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@mikaela_wiedenhoff?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Mikaela Wiedenhoff"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Mikaela Wiedenhoff on Unsplash</span></a>

<?php
$Vtiger_Utils_Log = true;

include_once 'vtlib/Vtiger/Module.php';
include_once 'modules/Emails/mail.php';

$current_user = Users::getActiveAdminUser();

/** Function used to send an email
 * $module     - module: only used to add signature if it is different than "Calendar"
 * $to_email   - "TO" email address
 * $from_name  - name that will be shown in the "From", it  will also  be used to search for the user signature
 * $from_email - email address from which the email will come from, if left empty we will search for a username equal to
                    $from_name, if found that email will be used, if not we will use $HELPDESK_SUPPORT_EMAIL_ID
                    if the "FROM EMAIL" field in set in Settings Outgoing Server, that one will be used
 * $subject    - subject of the email you want to send
 * $contents   - body of the email you want to send
 * $cc         - add email address with comma seperated. - optional
 * $bcc        - add email address with comma seperated. - optional
 * $attachment - accepted values are:
                    current: get file name from $_REQUEST['filename_hidden'] or $_FILES['filename']['name']
                    all: all files directly related with the crmid record, this is mostly only useful for email records
                    attReports: get file name from $_REQUEST['filename_hidden_pdf'] and $_REQUEST['filename_hidden_xls']
                    array of filenames or document IDs: array('themes/images/webcam.png','themes/images/Meetings.gif', 42525);
                    array of direct content:
                        array(
                            'direct' => true,
                            'files' => array(
                                array(
                                    'name' => 'summarize.gif',
                                    'content' => file_get_contents('themes/images/summarize.gif')
                                ),
                                array(
                                    'name' => 'jump_to_top_60.png',
                                    'content' => file_get_contents('themes/images/jump_to_top_60.png')
                                ),
                            )
                        );
 * $emailid    - id of the email object which will be used to get the attachments when $attachment='all'
 * $logo       - if the company logo should be added to the email, for this to work you must put
                      <img src="cid:logo" />
                    wherever you want the logo to appear
 * $replyto    - email address that an automatic "reply to" will be sent
 * $qrScan     - if we should load qrcode images from cache directory   <img src="cid:qrcode{$fname}" />
 */

$to_email = 'joe@tsolucio.com';
$from_name = 'TSolucio';
$from_email = 'joe@tsolucio.com';
$subject = 'Email Subject';
$content = 'Email Content with <img src="cid:logo" />  <img src="cid:qrcodefname" />';
$cc = '';
$bcc = '';
$logo = 1;
$replyto = 'tsolucio@gmail.com';
$qrScan = 1;
$attachmentsinfo = array('themes/images/webcam.png','themes/images/Meetings.gif');
$attachmentsinfo = array(
    'direct' => true,
    'files' => array(
        array(
            'name' => 'summarize.gif',
            'content' => file_get_contents('themes/images/summarize.gif')
        ),
        array(
            'name' => 'jump_to_top_60.png',
            'content' => file_get_contents('themes/images/jump_to_top_60.png')
        ),
        )
);
$attachmentsinfo = array(42543,'themes/images/Meetings.gif');

$attachmentsinfo = 'all';

$ticketid = vtws_getEntityId('HelpDesk').'x2636';
$att1 = 'themes/images/up.gif';
$att2 = 'themes/images/email.gif';
$email = array(
    'saved_toid' => $to_email,
    'parent_type' => 'HelpDesk',
    'parent_id' => $ticketid,
    'from_email' => $from_email,
    'ccmail' => $cc,
    'bccmail' => $bcc,
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

$rdo = send_mail('HelpDesk', $to_email, $from_name, $from_email, $subject.'HD', $content, $cc, $bcc, $attachmentsinfo, $emailid, $logo, $replyto, $qrScan);
$rdo = send_mail('Calendar', $to_email, $from_name, $from_email, $subject.'CL', $content, $cc, $bcc, $attachmentsinfo, $emailid, $logo, $replyto, $qrScan);
var_dump($rdo);
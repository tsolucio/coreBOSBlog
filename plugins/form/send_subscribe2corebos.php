<?php
include 'user/plugins/form/WsWebform.php';
$config = array(
    // Connection parameters
    'url' => 'https://xxx/',
    'user' => 'xxx',
    'password' => 'xxx',
    // Entity mapping to process form fields
    'map' => array(
        // WebServices module name
        'Contacts' => array(
            // Field mapping
            'fields' => array(
                // [Entity field name] => [form field name]
                'firstname' => 'firstname',
                // Use just the field name if both are the same
                'lastname',
                'email',
            ),
            'defaults' => array(
                'cf_1306' => '1',
            ),
            // Fields that should match to find a duplicate
            'matching' => array(
              'email',
            ),
            // Optionally, an entity can include other related entities
            'has' => array(
                'SubsList' => array(
                    'relatewith' => array(
                        'crmid' => '56x141673',
                    ),
                ),
            ),
        ),
    ),
);
$webform = new WsWebForm($config);
$cbformdata = unserialize($form->serialize());
$webform->send($cbformdata['data']);

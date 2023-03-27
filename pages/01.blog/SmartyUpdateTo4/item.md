---
title: Smarty Update to 4.3
date: 2023/03/27 11:08
metadata:
    description: 'Read about the impact of updating the Smarty library.'
    keywords: 'CRM, vtiger, opensource, corebos, community, blog, smarty'
    author: 'Joe Bordes'
header_image_file: smartylogoorange.png
header_image_height: 274
header_image_width: 265
taxonomy:
    category: blog
    tag: [smarty, 2023]
---

Read about the impact of updating the Smarty library to 4.3.0.

===

 !!!!  Smarty template engine update

In the past days, I have updated the coreBOS Smarty template library to the latest version (4.3.0).
They have introduced a breaking change: [PHP functions can no longer be used directly as modifiers.](https://github.com/smarty-php/smarty/issues/813)

 !!!! Impact on your life

This means that we can no longer use any PHP function after the tube (|) operator. We can only use the native Smarty supported modifiers.

So, from now on,

`{$SOME_VARIABLE|vtlib_purify}`

must be

`{vtlib_purify($SOME_VARIABLE)}`

This means that as of today:

- I will not accept any pull request that has the unsupported syntax (even if I haven't officially pushed the update yet). We must all start using the new syntax immediately.
- We have to update all the deprecated calls in coreBOS (read below)
- We have to update all the deprecated calls in our custom modules

<span></span>

 !!!! The change

I didn't get into the details but it seems that both for the language compiler and for some philosophical stance they want to distinguish supported modifiers from any PHP/coreBOS function. So we can use their internal modifiers, like `escape`, `replace`, `cat`, ([a whole bunch of others](https://www.smarty.net/docs/en/language.modifiers.tpl)), ...

`{$header|replace:' ':''}`

is valid while

`{'LBL_Hide'|getTranslatedString:'Settings'}` 

is **NOT** because getTranslatedString is a function external to Smarty even though there is no visual indicator of the fact.  Whatever ...

 !!!! coreBOS Update

I analyzed all the templates in coreBOS and found that 80% of the incorrect calls are for getTranslatedString, that is all over the place. The other 20% was a mix of different PHP and coreBOS functions (a lot of vtlib_purify). I migrated all the 20%. For `getTranslatedString` I added it to Smarty as a plugin (see below). So we can still use getTranslatedString as before because coreBOS adds it to Smarty as an internal modifier. This is done with one line of code and it makes it indistinguishable from the native modifiers. Really, I don't get it, anyway...

So, with the change I have made, all of coreBOS base code will work again as normal. Usual stuff, a lot of work no one sees to obtain the same result.

The issue is with our custom modules. Any custom module that has its own templates MAY be using a PHP function as a modifier and will need to be migrated to the new syntax. **This is important information: we must update the custom module templates as we find these errors**  To see the errors, work with error_reporting and display_errors `on`. The deprecation message will appear on the screen. It must be fixed and the corresponding repository updated.

I suppose mostly you will run into the vtlib_purify function, that is the one that gave me most work. I also had some html_entity_decode and urlencode functions.

 !!!! Register plugin in Smarty

To add the getTranslatedString support I had to add this line of code:

```diff
diff --git a/Smarty_setup.php b/Smarty_setup.php
index 1c06bb084..2770186c7 100644
--- a/Smarty_setup.php
+++ b/Smarty_setup.php
@@ -51,6 +51,7 @@ class vtigerCRM_Smarty extends Smarty {
                $this->loadFilter('output', 'trimwhitespace');
                $this->registerPlugin('function', 'process_widget', 'smarty_function_process_widget');
                $this->registerPlugin('function', 'corebos_header', 'smarty_function_getCustomHeader');
+               $this->registerPlugin('modifier', 'getTranslatedString', 'getTranslatedString');
        }
 }
 ?>
```

Really, I don't see the point...

**<span style="font-size:large">Let me know if you run into any issues or have any questions.</span>**


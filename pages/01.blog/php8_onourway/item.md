---
title: 'On our way to PHP 8'
date: 2022/10/02 08:08
metadata:
    description: 'coreBOS PHP 7.4 and 8 roadmap'
    keywords: 'opensource, corebos, PHP'
    author: 'Joe Bordes'
header_image_file: UpgradePHP8.jpg
header_image_height: 576
header_image_width: 1024
taxonomy:
    category: blog
    tag: [2022, php]
---

With PHP 8.1 around the corner and PHP 8.2 in the making, it is time to officially say goodbye to PHP 7.3 and lower.

===

coreBOS dropped PHP 7.3 and lower support some time ago, but coreBOS is so big that only a small subset of the application was really affected. All the important functionality is still working correctly with lower levels of PHP, so if you don't use the parts that need PHP 7.4, you can work perfectly well. I have seen many installations with this hack to get it working:

```diff
diff --git a/vendor/composer/platform_check.php b/vendor/composer/platform_check.php
index 92370c5a0..14acec985 100644
--- a/vendor/composer/platform_check.php
+++ b/vendor/composer/platform_check.php
@@ -4,7 +4,7 @@
 
 $issues = array();
 
-if (!(PHP_VERSION_ID >= 70300)) {
+if (!(PHP_VERSION_ID >= 70100)) {
     $issues[] = 'Your Composer dependencies require a PHP version ">= 7.3.0". You are running ' . PHP_VERSION . '.';
 }
 
```

 !!! For some time now PHP 7.4 has been the recommended version.

We have also been supporting PHP 8.0 for a long time now, but we are missing some third-party libraries that haven't been updated yet to be able to release an official PHP 8.0 supported version.

I have been using PHP 8 personally and have seen some installations with this hack to get it working with that version.

```diff
diff --git a/index.php b/index.php
index 5bec7aa4a..94a1d3d97 100644
--- a/index.php
+++ b/index.php
@@ -14,7 +14,7 @@
  * at <http://corebos.org/documentation/doku.php?id=en:devel:vpl11>
  *************************************************************************************************/
 
-if (version_compare(phpversion(), '5.4.0') < 0 || version_compare(phpversion(), '7.5.0') >= 0) {
+if (version_compare(phpversion(), '5.4.0') < 0 || version_compare(phpversion(), '8.1.0') >= 0) {
        require_once 'modules/Vtiger/phpversionfail.php';
 }
 
diff --git a/ping.php b/ping.php
index 6d78bcf44..0e19df4bf 100644
--- a/ping.php
+++ b/ping.php
@@ -18,7 +18,7 @@
  *  Proud member of the coreBOS family!  http://corebos.org
  *************************************************************************************************/
 
-if (version_compare(phpversion(), '5.4.0') < 0 || version_compare(phpversion(), '7.5.0') >= 0) {
+if (version_compare(phpversion(), '5.4.0') < 0 || version_compare(phpversion(), '8.1.0') >= 0) {
        echo 'NOK: incorrect PHP version';
        die();
 }
```

Similar to the "lower than PHP 7.4" hack above, most of the application works correctly in PHP 8.0 but there are some parts that don't. If you don't use those parts, you can work perfectly well.

Since, not only does technology not stop, but it moves VERY fast and we have to keep up the pace, one of our most important libraries [has dropped lower than PHP 7.4 support](https://github.com/ADOdb/ADOdb/issues/868) on its way to PHP 8.

This means that we will be OFFICIALLY (and TOTALLY) dropping PHP 7.3 and lower support and quickly moving to PHP 8.x in the coming months. So, please start getting your servers ready to update your PHP version.

One last note about this update that I am excited about is the support for an SSL connection to MySQL. I expect most of our users to not need this as they should have MySQL service closed inside the server and not accessible through the internet, but for those installs that have the MySQL database on another server for performance issues, this is a really important security enhancement.

**<span style="font-size:large">Keep moving!!</span>**

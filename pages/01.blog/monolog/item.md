---
title: Logging Library Update
date: 2021/03/12 11:08
metadata:
    description: 'Information on substitution of log4php library for monolog'
    keywords: 'CRM, vtiger, opensource, corebos, community, blog, logging, monolog'
    author: 'Joe Bordes'
header_image_file: monolog.png
header_image_height: 556
header_image_width: 990
taxonomy:
    category: blog
    tag: [database, Logging, 2021]
---

Learn about our new logging infrastructure.

===

One of the 10 big projects we have on our road map for this year is **Security**. Inside this project, we are designing a health and monitoring system that will give us traceability of our coreBOS install and we are slowly moving the libraries we use to the composer based/controlled vendors directory. To move forward in those two tasks we had to migrate the, now deprecated, [log4php library](https://logging.apache.org/log4php/) to the more modern [monolog library](https://seldaek.github.io/monolog/). In the rest of the post, I will compare what we had with log4php with what we have with monolog to make the transition easier.

 !!! Activating log messages

Similar to the way log4php was working, the whole logging system is activated by one variable in the config.inc.php file:

**$LOG4PHP_DEBUG = true;**

If this variable is set to false, a stub logging class will be loaded that will completely ignore all messages sent to it. This permits us to have a very low impact on performance for production systems even though the system is full of log messages everywhere.

Once the logging is active we have eight areas of interest:

* SECURITY: security exceptions
* INSTALL: install process
* MIGRATION: migration steps
* APPLICATION: all the application processes
* SOAP: SOAP interface messages. This is obsolete and deprecated.
* SQLTIME: profile and time the SQL queries in the application
* BACKGROUND: workflow and background tasks messages
* JAVASCRIPT: frontend javascript messages

With log4php we could only indicate the level of message reporting that we wanted to see in the log files, they were all enabled. We used the file **log4php.properties** to set the messaging log level to write in the logs. We could also set the name of the log file and the rotation size of those files.

With monolog, we use the file **include/logging/config.php**. This file, which also contains the same eight areas of interest, permits us to enable each area individually. So we can activate only one area and all the others will do nothing, which can come in handy when we have to debug in a production install while people are working.

We can also:

* define the messaging log level, which works exactly the same as in log4php.
* define the name of the log file, but this name will be slightly different than what we had before. Now, the log files rotate daily, not per file size. So we will see in the logs directory a file with the selected name and a date. This file will grow indefinitely with all the messages of the day. When a new day comes, that file will be closed and a new log file for the new day will be created.
* define the maximum number of retention days that we want to save. In log4php we defined the size of the files that we wanted to keep before rotating them and deleting the old ones. With monolog, we define how many days we want to save before it starts deleting files. The default is 10 days.

Normally, you will edit the config file, enable the area you want and set the log level to get similar functionality as we had with log4php.

> **NOTE:** the main application log file name has changed from vtigercrm.log to corebosapp-{date}.log

A few more comments:

* you can eliminate the messages of a certain level by adjusting the **enableLogLevels** element in the config.php file
* the message format in the log files has changed slightly
  * the initial date now contains microseconds and is enclosed in brackets
  * log4php put next, the level and channel separated by a space, now we have the channel name, a name of the section of code emitting the message, followed by the log level separated by a dot
  * next, in log4php we had a message, which could be a string, an array, or an object. With monolog, we have a string message and an array separated by ' :::: '. The array will be shown as a JSON encoded string. So all our log messages are the same. This consistency will permit us to create a monitoring system.

<span></span>

 !!! Logging messages

Once the logging infrastructure is activated we can use the same interface we used to use: the global variable $log (or $logbg)

``` php
global $log;
$log->fatal('hello log');
```

All of the standard log levels are supported.

As explained above, for message consistency, monolog only accepts two parameters in the call, a string and an array. That means that we can now call our logging system like this

``` php
global $log;
$log->fatal('hello log', array($one, $two));
```

But to maintain compatibility with what we used to do, coreBOS will also accept a call like this

``` php
global $log;
$log->fatal(array($one, $two));
```

Internally, it will set the message to an empty string and pass in the array as the second parameter.

<span></span>

 !!! Log handlers

monolog uses the concept of 'handler' as a destination for the log messages. The fact that coreBOS creates files with dates and rotates them is simply because that is the handler I decided to use. I could have [chosen from a rich set of other handlers](https://github.com/Seldaek/monolog/blob/main/doc/02-handlers-formatters-processors.md#handlers).

monolog has a very powerful feature that permits us to chain log handlers together. In other words, we can configure monolog to send the same message it receives to many different destinations at the same time.

I have implemented support for this functionality using the **include/logging/confighandlers.php** file. There we can define other handlers we want to plug in to the logging engine. There is an example there that you can activate and you should see the same messages that go into the log files appear in the apache error.log file.

The goal of this will be to send the log messages to the monitoring system going forward.

**<span style="font-size:large">Contact us if you run into any issues. Enjoy!</span>**

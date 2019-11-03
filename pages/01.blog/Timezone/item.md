---
published: true
title: coreBOS Timezone Management
date: 2019/11/03 13:58
metadata:
    description: 'Explanation of how coreBOS manages timezone on datetime fields.'
    keywords: 'CRM, vtiger, opensource, corebos, timezone, date, time'
    author: 'Joe Bordes'
header_image_file: times.jpg
header_image_height: 2516
header_image_width: 4120
taxonomy:
    category: blog
    tag: [2019, time, timezone]
---

This month we have a guest post from **Hena** in response to [this forum question](https://discussions.corebos.org/showthread.php?tid=1606). I reviewed it and added a link to it in our wiki also. Thanks Hena!

===

There is a configuration variable in the system called **$default_timezone**. You can find this variable in the config.inc.php file usually set to its default value UTC, which means Universal Time Coordinated.

It is needed to define the time zone of all the date and time fields in the application, for example, to calculate the time and date of each saved, modified or deleted record but also when saving calendar start and end times, among others.

This variable is modifiable by the implementor. This means that at any time, the implementor can change the timezone of the project, but, what are the implications of this action? The way it works is more or less like this:

To be able to show any date in the timezone selected by the user in their preferences, we need to save **ALL** the date-time fields in the application in the **SAME timezone**, so **ALL** the date-time fields in the database **MUST** be in the same timezone.

This is rather logical because if not it would be impossible to compare and transform them all to any other timezone. So the timezone used in the database is the one defined in the config.inc.php file, and each user can configure in what timezone they want to see those dates. coreBOS will convert each date-time coming out of the database to the timezone of the user and each date-time coming from the user to the timezone of the database. Consequently, if you change the default timezone in the config.inc.php file, all of a sudden **ALL** the dates in the database are wrong as the application will THINK that they are in this new timezone when they REALLY aren't! That will be fatal to data availability because it would break all the dates.

 !!! One of the obvious questions may be: what if I change it back to UTC as it was before the modification?

The problem is IF any information is created or modified in between the change. Imagine that you have a database with a certain timezone, 1000 records and you change the timezone. The application will work normally and if you don't stop to notice that the date-time fields in those 1000 records are incorrect with an equivalent hour offset to the difference in the two timezones used in the $default_timezone variable, then you could continue to work and create let's say 100 more records until you see the problem. Now you set the variable back to the original timezone and the first 1000 records are ok, but the other 100 are not as they were saved in the second timezone. If you modified any of the 1000 records during the change, those are wrong too. You end up with mixed timezone fields in the database.

!!! So, what is the correct way to change the timezone of a coreBOS install?

The solution is to stop all work, for example, enter maintenance mode so nobody can use the system. Then you dump the database, transform all date-time fields to the new timezone, change the default timezone in config.inc.php and let everyone back in. To make this task a little easier you can [use the convertTZ helper script](https://github.com/tsolucio/corebos/blob/master/build/HelperScripts/convertTZ.php) which accepts the two timezones and then searches the database for all the date-time fields and converts them.

!!! So, if this variable is so important and delicate, why do we even permit changing it?

The purpose of this variable appears when the final user of coreBOS works in **only one timezone** and they want to access the information directly from the database with an external application (typically reporting). If you access the data only from inside the application you don't care how the information is being saved because you will see it in the timezone you selected for your user. But, if you access the information directly from the database, then you will want to show those dates in the correct timezone, so either your external application does the conversion, just like coreBOS does, or you save them in the correct timezone to start with. The idea is that when you **START a project, BEFORE introducing ANY information you must choose the timezone of the users using that coreBOS install**. Once you have started,  that variable can NOT be changed anymore.

Notice that in the last paragraph I said "when the final user of coreBOS works in only one timezone", that means that if your coreBOS install has users working in different timezones then when your external application accesses those dates it will have to convert them accordingly to show them to the final user in their timezone, but your external application will be able to operate and compare them consistently as they are all in the same timezone independently of how each user chooses to see them.

!!! One last question before you leave. Which fields does coreBOS consider date-time fields?

Very few, actually. The three internal fields that control **createdtime, modifiedtime and viewedtime** of each record and all the date-time fields (uitype 50). Then there is the very special case of the [Timecontrol module](../Timecontrol) which, for historical reasons (it was created before we had uitype 50), is "timezone aware" albeit having separate fields for the date and the time.

HTH

**<span style="font-size:large">Consistent and reliable solutions!</span>**

Photo by Luis Cortes on Unsplash
<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@luiscortestamez?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Luis Cortes"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Luis Cortes</span></a>
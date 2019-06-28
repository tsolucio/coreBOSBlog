---
title: Making Decisions in coreBOS
date: 2019/05/05 13:58
metadata:
    description: 'How to setup a decision making system in coreBOS'
    keywords: 'CRM, vtiger, opensource, corebos, business map, decision'
    author: 'Joe Bordes'
header_image_file: burst-530182-unsplash.jpg
header_image_height: 312
header_image_width: 500
taxonomy:
    category: blog
    tag: [implement, 2019, decisions, business map]
---

Making Decisions in coreBOS just got a lot easier. We already had [Condition Expression](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:condition_expression&noprocess=1) and [Condition Query](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:condition_query&noprocess=1) **Business Maps** which were put together in [coreBOS Rules](https://corebos.com/documentation/doku.php?id=en:devel:corebos_rules&noprocess=1) to give developers a very powerful condition evaluation engine, and, now, we have added upon this another business map to make it even more flexible: [Decision Table Business Maps](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:decisiontable&noprocess=1).

Continue reading to learn how to use this new functionality.

===

Evaluating some conditions and returning a result is an extremely common task in computer science, almost everything we do can be reduced to it. Due to this, **coreBOS as a framework** had to give it's developers and implementors a way to make these decisions at some high-level/abstract way that frees developers from having to modify the code to make those decisions each time the final user has some business logic change (which is also extremely common).

**Enter Decision Table Business Maps**

The concept of a **Decision Table** is very well defined and all the logic and process behind it also. There is a full [Decision Model and Notation Specification](https://www.omg.org/spec/DMN) which defines all the cases and how the problem should be approached and it is all framed in the [BPM](https://en.wikipedia.org/wiki/Business_process_management) environment. coreBOS implements it's own Decision Table logic based on the standard specification but very adapted to the specific coreBOS environment and infrastructure. 

The [coreBOS Decision Table Business Map documentation page](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:decisiontable&noprocess=1) explains very well the different options and gives a fundamental explanation of how decision making can be done so I decided to record a video showing and explaining the functionality with some live examples.

[plugin:youtube](https://youtu.be/pHX4FfhFYdQ)

! External References

You can find a few useful links about Decision Model and Notation (DMN) here:
  * [DMN Tutorial](https://camunda.com/dmn) [(PDF)](https://corebos.com/documentation/lib/exe/fetch.php?media=en:adminmanual:businessmappings:dmn_tutorial_-_dmn_1.1_tutorial_for_beginners_-_learn_dmn_camunda_bpm.pdf)
  * [Decision Table Reference](https://docs.camunda.org/manual/latest/reference/dmn11/decision-table) [(PDF)](https://corebos.com/documentation/lib/exe/fetch.php?media=en:adminmanual:businessmappings:dmndecisiontablereference.pdf)
  * [Decision Table Constructor](https://github.com/steffenbrand/dmn-decision-tables)
  * [DMN Specification](https://www.omg.org/spec/DMN)
  * [coreBOS Decision Table Business Map](https://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:decisiontable&noprocess=1)
  * [coreBOS Decision Rules Module](https://github.com/tsolucio/DecisionTable)

! Enjoy

Hopefully, I have been able to convey the potential this new business map has and I trust it will optimize your customizations.

**<span style="font-size:large">Enjoying the power of the coreBOS framework.</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@burst?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Burst"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Burst on Unsplash</span></a>



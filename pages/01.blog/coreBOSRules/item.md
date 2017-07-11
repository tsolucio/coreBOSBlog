---
title: coreBOS Rules
date: 2017/07/11 00:58
metadata:
    description: 'coreBOS Rules Developer tool.'
    keywords: 'CRM, vtiger, opensource, corebos, developer'
    author: 'Joe Bordes'
header_image_file: rule.png
header_image_height: 409
header_image_width: 850
taxonomy:
    category: blog
    tag: [service, developer, code, development]
---

**Business rules** are, most of the time, defined outside the application. They are even often written in a different language than the one used to create the application. The **coreBOS Rule class** provides an engine allowing to simply execute business rules while being **efficient** and **extensible**.

===

I set out to integrate the [HOA\Ruler library](https://hoa-project.net/En/Literature/Hack/Ruler.html) into coreBOS.

 !!!! The goal was to have an easy interface with which we could separate business decisions from code.

As I read their documentation of a very well designed solution, I started to change my mind about using their product, but not because it isn't a VERY good product, which it is, but because it turns out that we already have a rule system!

They define the rules as three parts:

**1.- Defining a rule**. A **rule** is a string matching a specific syntax, which is described by the grammar of the language used

When I read about the grammar and the correct syntax, I saw that we would have to, at least, modify it to accept coreBOS entity field names and the extended form of these fields that permits us to access the fields on related modules.

**2.- Defining a context**. The context defines the values to be used to evaluate the rule

This was fairly easy, as it is basically the column values of the record we want to evaluate the rule against, but it does get complicated if we want to have access to all the related modules field values, as we would be forced to load all the values of the related records even if they weren't going to be used and also load functions that could be needed in the evaluation...

**3.- Use of an asserter** for the execution. This is simply some code that reads the rule, changes the variables with values from the context and evaluates the rule to return a result.

HOA\Ruler is a predicate, so it only returns True/False results, which is a bit limiting in such an extensive application as coreBOS where we would like to be able to return, numbers, strings, arrays of records,...

So, after reading the documentation of the HOA\Ruler project (which I recommend, it is a very interesting read). I understood that we already have a rule system inside coreBOS and that there was no need to add another external library.

**1.- To define a rule in coreBOS we can use the workflow expression language**. The benefits are clear, as it already supports natively all the fields and the relations, if you know how to use the workflow, you already know how to use the rules, any enhancements we make on the workflow expressions to make rules more flexible and powerful, will also make workflows better, ...

**2.- The context is the CRM entity record** we want to use to evaluate the rule, it is simply a normal CRM Entity that the application already knows how to work with.

**3.- The asserter or evaluator** needed to be implemented. I had a quick look at the existing [Condition Query](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:condition_query) and [Condition Expression](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:condition_expression) business maps because I knew that these maps did something very similar and about an hour or so later I had a working prototype of coreBOS Rules.

After creating the initial working code I saw that my suspicions were confirmed and we already have a very powerful and flexible rule system inside coreBOS.

I then added some [unit tests](https://github.com/tsolucio/coreBOSTests/blob/master/modules/cbMap/cbRuleTest.php) and finished testing and [implementing the class](https://github.com/tsolucio/corebos/blob/master/modules/cbMap/cbRule.php).

I then [documented the usage on the wiki page](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_rules) which should be your next stop if you want to learn how to use this development tool.

**<span style="font-size:large">Join the [conversation on gitter](https://gitter.im/corebos/discuss) and let me know if you need any help.</span>**


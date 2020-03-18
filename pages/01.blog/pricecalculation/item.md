---
published: true
title: coreBOS Price Modification
date: 2019/09/01 13:58
metadata:
    description: 'Presentation of the coreBOS Price Modification Module.'
    keywords: 'CRM, vtiger, opensource, corebos, price, inventory, product, service'
    author: 'Joe Bordes'
header_image_file: jj-ying-UcI5OAPD820-unsplash.jpg
header_image_height: 300
header_image_width: 186
taxonomy:
    category: blog
    tag: [2019, price, product, service, inventory]
---

As part of the project to share more of our code, last month saw the release of the **Price Modification** module. This post will present this module and explain a little how it works.

===

A normal coreBOS obtains the product and service price from the **unit price field** on the product or service. For example, when we are creating a quote and select a product on any line, the price that is filled in is a copy of the value in the unit price field of the selected product at that moment.

This behavior is rather limited as we cannot set a different price depending on many of the possible reasons we may have to do so like, the selected account, or the geographic zone that the account belongs to, the number of units purchased or simply some promotion the product may be on today.

The purpose of the **Price Modification** module is to permit us to define a very flexible and powerful pricing system. The module is a complex rule escalation system that permits us to define a **price/discount** or a **cost/margin** value to be used as the line unit price of the selected product.

 !!! The Module

The Price Modification module has five fields that define the rule to be applied and four related lists with Accounts, Contacts, Products, and Services that define which records are affected by the rule.

Each record in the module defines an individual price modification rule that will be applied if it passes all the conditions evaluated during the escalation search process. The first record found that passes all the conditions will be used to return the modified price.

The five fields are grouped into three sets:

1.- **how to apply**
 - **Category:** this is a Product/Service category. If one is selected this particular record will affect ALL the products/services in that category. This is an easy way to massively apply a price modification to a whole set of products without having to select them.
 - **Active:** this checkbox permits us to mark a record to be ignored or not by the evaluation process

2.- **what to return**

The **Return Type** picklist permits us to indicate if we want to have the price modified in one of two possible ways:

 - **price/discount:** means that we will use the value of the record as a discount, so we will return the same unit price of the Product/Service but also return a discount to be applied to it
 - **cost/margin:** means that we will read the cost price on the Product/Service and apply the value on the record as a margin on top

3.- **Value to use**

The value of the record can be obtained in one of two ways

 - **discount:** this is a numeric field that will represent the discount or margin to be applied
 - **map:** this is a business map that will be evaluated with the [coreBOS Rule infrastructure](http://corebos.com/documentation/doku.php?id=en:devel:corebos_rules&noprocess=1). This means that not only can we apply expressions or some SQL but also have all the power of the [Decision Table Business maps](../DecisionTable) to obtain the value. The coreBOS rule receives almost all the context of the line; the product, the client and the inventory module, so we can establish rules that will return different discounts or margins depending on any condition like geographic location of the client, some random variable or a promotion of the product. The possibilities are endless.

As an example, while I was testing I created and selected this map:

```XML
<map>
<expression>if $bill_country == 'Spain' then 10 else 20 end</expression>
</map>
```
which applies a 10% discount or margin to all Accounts whose billing country is Spain and a 20% discount to all other countries.

 !!! The Search Process

The search process follows these steps.

 - In all the searches done only records marked as "Active" are considered.
 - The global variable Application_B2B will decide if we search for Accounts or Contacts
 - Search for a record with the category of the Product/Service and with the Account/Contact selected in the related list of the record
 - Search for a record with the category of the Product/Service and with an EMPTY related list of Account/Contact
 - Search for a record with a category of NONE, the Product/Service and Account/Contact selected in the related list
 - Search for a record with a category of NONE, an empty Product/Service related list and Account/Contact selected in the related list
 - Search for a record with a category of NONE, the Product/Service selected in the related list and an empty Account/Contact related list
 - Search for a record with a category of NONE, and empty related list

In lay-mans terms that would be something like, search for the category of the product and a client, if you can't find it, search for the category of the product with no client selected (so it is a global discount on the category), if not found, search for a record with the related product and client (a discount for that product to that client), then search for a record related only to the client (a global discount for that client), now search for a record related only to the product (a global discount on the product) and finally a record not related to anything (a default value).

If a record is found, the value will be obtained and the return type selected will be applied. If no record is found the normal unit price field and a discount of 0 will be returned (the current default behavior).

 !!! Additional Information

You can [download the module from its' home in github](https://github.com/tsolucio/PriceCalculation)

The module can be activated or deactivated in Settings > Module Manager > Module Status

There is a hidden and rudimentary test file you can use to evaluate the search results of your current configuration: TestPrice.php

For this to work we introduced a new event in coreBOS: **corebos.filter.inventory.getprice**, which means that you will need an up to date coreBOS and also that anyone can now create a module or extension that implements any type of logic to retrieve the price and discount of the product.

 !!! Closing Comments

The [Decision Table Business Map](http://corebos.com/documentation/doku.php?id=en:adminmanual:businessmappings:decisiontable&noprocess=1) is powerful enough to do all the above escalation by itself and even implement a much more complex (or simpler) rule system. So we could have implemented a simple change in coreBOS to detect a specifically named Decision Map and use it to obtain the price (like we do with many other business maps) but there were some significant conditions that made us take the Price Modification module path which I would like to share with you and leave here for future reference.

 - we already had a Discount Line module with a similar escalation in coreBOSCRM, so I wanted to maintain compatibility (something that seems to be not respected anymore)
 - the idea of adding the **inventory.getprice** event is powerful, it permits us to implement this feature but also opens the possibility that anyone can also implement their own price calculation system
 - creating a decision map is not as easy as creating records in a module
 - the way we implemented this module we use coreBOS Rules which are more powerful than just Decision Tables (see the example above)
 - this module supports calling directly the decision table: if you create one record with no category and no records selected in the related lists, it will be applied by default to all the products, so if we select a business map that is a decision table, then we are effectively applying a decision table to the product calculation process


**<span style="font-size:large">The incredible (and hidden) power of the coreBOS ecosystem.</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@jjying?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from JJ Ying"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by JJ Ying on Unsplash</span></a>

---
published: false
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

This behaviour is rather limited as we cannot set a different price depending on many of the possible reasons we may have to do so like, the selected account, or the geographic zone that the account belongs to, the number of units purchased or simply some promotion the product may be on today.

The purpose of the **Price Modification** module is to permit us to define a very flexible and powerful pricing system. The module is a complex rule escalation system that permits us to define a **price/discount** or a **cost/margin** value to be used as the line unit price of the selected product.

 !!! The Module

The Price Modification module has five fields that define the rule to be applied and four related lists with Accounts, Contacts, Products, and Services that define which records are affected by the rule.

Each record in the module defines an individual price modification rule that will be applied if it passes all the conditions evaluated during the escalation search process. The first record found that passes all the conditions will be used to return the modified price.

The five fields are grouped in three sets:

1.- **how to apply**
 - **Category:** this is a product/service category. If one is selected this particular record will affect ALL the products/services in that category. This is an easy way to massively apply a price modification to a whole set of products without having to select them.
 - **Active:** this checkbox permits us to mark a record to be ignored or not by the evaluation process

2.- **what to return**

The **Return Type** picklist permits us to indicate if we want to have the price modified in one of two possible ways:

 - **price/discount:** means that we will use the value of the record as a discount, so we will return the same unit price of the product/service but also return a discount to be applied to it
 - **cost/margin:** means that we will read the cost price on the product/service and apply the value on the record as a margin on top

3.- **Value to use**

The value of the record can be obtained in one of two ways

 - **discount:** this is a numeric field that will represent the discount or margin to be applied
 - **map:** this is a business map that will be evaluated with the [coreBOS Rule infrastructure](http://corebos.com/documentation/doku.php?id=en:devel:corebos_rules&noprocess=1). This means that, not only can we apply expressions or some SQL but also have all the power of the [Decision Table Business maps](../DecisionTable) to obtain the value. The coreBOS rule recieves almost all the context of the line; the product, the client and the inventory module, so we can establish rules that will return different discounts or margins depending on any condition like geographic location of the client, some random variable or a promotion of the product. The possibilities are endless.

 !!! The Search Process

The search process follows these steps





**<span style="font-size:large">The power of the coreBOS ecosystem.</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@jjying?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from JJ Ying"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by JJ Ying on Unsplash</span></a>

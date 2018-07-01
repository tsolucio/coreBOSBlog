---
title: Workflow Aggregation Trick
date: 2018/07/01 13:08
metadata:
    description: 'Learn how to capture information from related records with a workflow.'
    keywords: 'CRM, vtiger, opensource, corebos, workflow, aggregation, howto'
    author: 'Joe Bordes'
header_image_file: DataAggregation.jpg
header_image_height: 250
header_image_width: 450
taxonomy:
    category: blog
    tag: [workflow, aggregation, functionality]
---

Learn how to capture information from related records with a workflow.

===

! The Question

How can I show some information of one contact on the organization list view?

! The Problem

We want to select ONE contact from the list of contacts related to an organization and show some of his information on the list view.

From a list view filter, we can access natively information of directly related records. For example, if we are defining a filter in the Potentials module we can easily access information from the Organization or Contact related to the Potential record because there is only one, but we cannot access information on the related lists because there are many. In that case either we would be obligated to repeat the rows and go against the way list view works where there is only one record per line or we would have to add some conditions to show only one of all the related records which doesn't seem very functional nor logical.

! The Solution

In order to select a contact from all the related contacts and show a field from that contact, we add a custom field on the account and fill it in with the values of the selected contact. Once the field is on Organizations it can be treated like any other field and be shown on the list view.

This request has some complications and my first thought was that we would have to add some code to get it done, but **coreBOS does not cease to surprise me** and I found a way to do it directly using workflows. It is a little bit of abusing the knowledge I have of how the internals of the system work, but the solution is rather simple and logical once you see it.

In the workflow task expression engine, we have a function called **aggregation**, this function will select some records from the set of related records of the entity launching the workflow and apply an operation on one of its fields. The profile of the function looks like this:

```
aggregation(operation, RelatedModule, relatedFieldToAggregate, conditions)
```

Where:
  * **operation:** 'sum', 'min', 'max', 'avg', 'count', 'std', 'variance'
  * **RelatedModule:** any of the modules related to the module launching the workflow
  * **relatedFieldToAggregate:** the field on the related module we want to operate with
  * **conditions:** any additional conditions that we want to add to filter the set of related records

Thus, from an account it is easy to calculate the sum of all invoices with an expression like:

```
aggregation('sum', 'Invoice', 'hdnGrandTotal')
```

or the sum of all PAID invoices:

```
aggregation('sum', 'Invoice', 'hdnGrandTotal', '[invoicestatus,e,Paid,or]')
```

So, although this function is clearly made to operate on numeric fields we can apply the 'max' and 'min' functions to string fields and get the actual result because the computer knows how to sort text strings and can actually calculate the maximum and minimum of a set of strings. So, to get the first name of the "owner" contact we would create an update field workflow task and load this expression into the destination field:

```
aggregation('max', 'Contacts', 'firstname', '[title,e,Owner,or]')
```

Have a look at this video to see this in action!

[plugin:youtube](https://youtu.be/TBDMJ-V_OwM)

! Another Solution

You can do this with **reports**. There it is possible to create a view with information from related modules and filter on them. This is a valid solution although it does obligate you to go to the Reports module to see the information you want.

<br>
**<span style="font-size:large">I trust this will help you make your coreBOS more useful!</span>**


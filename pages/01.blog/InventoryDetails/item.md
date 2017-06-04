---
title: Inventory Details Module
date: 2017/06/04 23:58
metadata:
    description: 'coreBOS Inventory Details Module.'
    keywords: 'CRM, vtiger, opensource, corebos, inventory'
    author: 'Joe Bordes'
header_image_file: Inventory.jpg
header_image_height: 333
header_image_width: 500
taxonomy:
    category: blog
    tag: [development, 2015, inventory, details, reporting]
---

A genius idea and implementation from our community member [Omar](https://github.com/omarllorens), which comes to solve many of the problems inherited from the non-standard master-detail Inventory modules. **Thank you Omar!!!**

===

**coreBOS** inherits four inventory modules from vtiger crm; **quotes, sales orders, purchase orders and invoice** and adds two more from the open source community; **packing slip and receive products** (**Thanks [IT-Solutions4You](http://www.its4you.sk/en/)**).

 !! These six modules are master-detail modules.

The correct way to create this type of modules in coreBOS is creating two standard modules related by a capture field. Each detail record has a pointer to its master.

If you do it like this the whole system is ready to support them. You will be able to import normally, report on them, filter, search, use workflows, ... everything. If you need a special interface to make creating and editing the detail lines easier, you can do so easily as you will just be doing normal (CRUD) operations on a module.

It turns out that the six modules we inherit do not do it this way, the product lines are stored directly in a database table and the application is all full of specific code to support reporting, importing or simply showing and editing the detail lines. **Sincerely, a mess**.

This was producing us, and the coreBOS users, a lot of problems and a lot of time, especially in reports, until Omar had the initiative to create a normal module to store the detail product lines.

We create a new standard module called **InventoryDetails** with all the information of the line, plus all the calculations that could be needed for reporting issues, we even add relations to the account, contact, and vendor making reporting on and accessing this information, a breeze.

We add some code and events to keep the product lines synchronized with the records in the InventoryDetails module, even when you edit them, which brings a few other enhancements:

 - You can add custom fields for other issues and keep control of the lines.
 - Now we can launch workflows on the product lines. Since every time a product line is saved, it's related InventoryDetail record is also saved and that is a normal record on a normal module we can define workflows as we would with any other module. So you can do additional calculations or send out emails when certain conditions are met.
 - Since we can add custom fields on the InventoryDetails module and keep the values of most fields, even when the other details of the line change this took us to another enhancement that has been a long time classic: **more editable information on the product lines**.

Let's have a closer look at this last one.

 !!! Editable information on product lines
 
Thanks to the **InventoryDetails module** and the [business map functionality](http://corebos.org/documentation/doku.php?noprocess=0&id=en:adminmanual:businessmappings) we are able to add editable information on the product lines. The [master-detail business map](http://corebos.org/documentation/doku.php?noprocess=1&id=en:adminmanual:businessmappings:masterdetailmapping) will permit us to specify the set of fields on the InventoryDetails module that we want to edit. The idea is that all the product lines have a corresponding InventoryDetails record, so we can save the additional product line information there without having to modify the artificially forced internal product tables nor the code that manages these tables.

The business map would look something like this

```
<map>
  <originmodule>Invoice</originmodule>
  <targetmodule>InventoryDetails</targetmodule>
  <detailview>
    <fields>
      <field>
        <fieldtype>corebos</fieldtype>
        <fieldname>units_delivered_received</fieldname>
        <editable>1</editable>
        <mandatory>1</mandatory>
        <hidden>0</hidden>
      </field>
      <field>
        <fieldtype>corebos</fieldtype>
        <fieldname>cost_price</fieldname>
        <editable>1</editable>
        <mandatory>1</mandatory>
        <hidden>0</hidden>
      </field>
   </fields>
  </detailview>
</map>
```
Which adds two fields on the invoice product lines.

The next video has a complete demonstration of this functionality.

[plugin:youtube](https://www.youtube.com/watch?v=zfuEuGUhKm0)

 !!! InventoryDetails impact

In short, the three major benefits this module has brought are:
  - much easier and complete reporting on product lines
  - workflows on product lines
  - edit more information on inventory module product lines

**<span style="font-size:large">Thanks for reading.</span>**


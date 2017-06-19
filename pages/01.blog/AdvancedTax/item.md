---
title: Advanced Tax Control System
date: 2017/06/19 20:00
metadata:
    description: 'coreBOS Advanced Tax Control System.'
    keywords: 'CRM, vtiger, opensource, corebos, taxes, vat, tva, iva, impuesto'
    author: 'Joe Bordes'
header_image_file: tax.jpg
header_image_height: 208
header_image_width: 420
taxonomy:
    category: blog
    tag: [development, 2015, events, tax]
---

Easily define different tax rates for clients and products, putting the system to work for you so you don't have to remember all those minor details.

===

 ! Another advanced development that makes the system much more flexible and adaptable to many other countries and use cases.

Using the recent coreBOS [eventing system](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:corebos_hooks), we add a whole set of events that permit developers to totally override the default taxing logic.

The new events that we add are
 - **corebos.filter.TaxCalculation.getTaxDetailsForProduct:** get all the tax details which are associated to the given product
 - **corebos.filter.TaxCalculation.getProductTaxPercentage:** get the product's tax percentage
 - **corebos.filter.TaxCalculation.getAllTaxes:** get the list of Tax types
 - **corebos.filter.TaxCalculation.getTaxPercentage:** get the tax percentage
 - **corebos.filter.TaxCalculation.getTaxId:** get the taxid
 - **corebos.filter.TaxCalculation.getInventoryProductTaxValue:** get the tax value which is associated with a product for PO/SO/Quotes or Invoice
 - **corebos.filter.TaxCalculation.getInventorySHTaxPercent:** get the shipping & handling tax percentage for the given inventory id and tax name

Using these events we add two new modules that you can download from GitHub. The [Tax Type module](https://github.com/tsolucio/coreBOSTaxType) will permit us to tag products, clients and vendors with a tax classification, while the [Tax module](https://github.com/tsolucio/coreBOSTax) will permit us to define a tax value for each tax type by means of escalation rules depending on the configured values during the creation of the inventory record.

With these modules we can establish configurations like different taxes per client, depending on their billing localization or their legal status of tax retention.

I must say that the default tax settings is mostly complete, especially in coreBOS CRM which has tax retention and these advanced taxing modules are only needed in some countries (Canada) or specific configurations, but, still it is an interesting project to study to understand how the eventing system works, to see how powerful and flexible the coreBOS system is and to know that this option is available if you need it.

[plugin:youtube](https://youtu.be/nKT8p9Af-Zc)



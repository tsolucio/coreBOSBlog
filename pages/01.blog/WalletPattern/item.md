---
title: Payment and Wallet ConTroL Patterns
date: 2019/07/05 18:58
metadata:
    description: 'Some business patterns to control amounts of money of your clients with coreBOS'
    keywords: 'CRM, vtiger, opensource, corebos, money, amount due'
    author: 'Joe Bordes'
header_image_file: julius-drost-GTmLKWZzZuo-unsplash.jpg
header_image_height: 410
header_image_width: 344
taxonomy:
    category: blog
    tag: [implementation, configuration, functionality, wallet, payment]
---

A common use case of coreBOS is to control the amount of money a client owes us or that he has prepaid us. Information we need to know in order to reclaim those amounts or to reimburse them in subsequent purchases.

===

One very trivial and manual way of doing this is just creating a field on the account (or contact) module with the amount and updating accordingly each time a monetary movement is produced. This approach is just a little better than writing down the amount in a note pad or [the dreaded spread sheet](https://www.wrike.com/blog/spreadsheets-costing-time-money/), but just as effective. Let's look into a more interesting solution.

The **coreBOS Payment module** serves the purpose of registering all the movements of money that happen in the company. It is like a very basic accounting ledger more oriented towards liquidity control than full accounting.

Using the payment module we can easily register all the movements of money coming from and going to our clients, additionally relating them to invoices or other coreBOS records. The payment module has a checkbox field named "credit" which indicates if the money movement is **incoming** (credit not checked = debit) to our business or **outgoing** (credit checked) from our company. So we can sum all the incoming and outgoing amounts and a simple difference will give us the positive or negative balance of our client, their current wallet contents. We can obtain these numbers using workflows and save the amounts in the same field we proposed as a solution at the start of this article, obtaining a fully traceable history of movements along with the total current state of the clients' balance with just a few custom fields and workflows. You can even define workflows to alert you of certain situations you may want to control.

Let's see some things we can do with this approach.

 ! Total Paid Amount

Simply applying the logic explained above and accumulating the amounts accordingly on a field in the account or contact we will obtain the all-time total amount of money obtained by a client. Sadly there is no way of breaking down that amount per time which would be the work of a reporting system, not workflows.

 ! Invoice Amount due and Paid status

Instead (or also) of accumulating the amount on the Account or Contact, we can accumulate them on the Invoice, effectively implementing a full payment control system on each invoice and even automatically changing the invoice status accordingly.

 ! Wallet or Current Balance Control

In this scenario, we want to collect money from a contact and distribute that money to another contact or provider while retaining a percentage for our work. So, for example, if a contact pays a service we will have a debit payment record related to the service and the contact which increments the amount of money received by him. If we now need to pay a provider with that money while keeping a percentage, we will create **four** new payment records:

 - one of type credit with the amount sent to the provider related to the contact (so it decrements his wallet)
 - one of type debit with the amount sent to the provider related to the provider (so it increments the providers' wallet)
 - one of type credit with the amount saved as commission related to the contact (so it decrements and empties the contacts' wallet)
 - one of type debit with the amount saved as commission related to the company which increments the company's wallet

Effectively managing the "current" amount in each parties wallet.

 ! Bank Accounts and Liquidity

Installing the [Banks](http://corebos.com/documentation/doku.php?id=en:extensions:extensions:bank&noprocess=1) and the [BankAccounts](http://corebos.com/documentation/doku.php?id=en:extensions:extensions:bankaccounts&noprocess=1) modules, we can relate them with the payment movements effectively controlling the expected balances in the companies bank accounts. If we add the expected payments, like power and water bills, salaries and expected invoice due dates we should be able to foresee liquidity issues and make the necessary transfers ahead of time to save on interests.

We even have an automatic "Transfer Money" action in the Bank Accounts module that creates the payment records for us!

 ! Closing thoughts

I'm sure I left out some interesting use cases of the payment module, but I am also sure that I stimulated your imagination and that you will find the correct configuration of the payment module for your company. Don't hesitate to share it with us in [gitter](https://gitter.im/corebos/discuss) and/or [the forum](http://discussions.corebos.org).


**<span style="font-size:large">Getting your business under ConTroL with coreBOS!</span>**

<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@juliusdrost?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Julius Drost"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Photo by Julius Drost on Unsplash</span></a>

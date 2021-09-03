---
title: 'Query Streaming'
date: '2021/09/05 21:58'
metadata:
    description: 'Learn how the new web service streaming query option works!'
    keywords: 'webservice, query, stream, coreBOS, streamraw, format, data'
    author: 'Adisa Sinani'
taxonomy:
    category:
        - blog
    tag:
        - query
        - stream
        - streamraw
        - format
header_image_file: datahasabetteridea.jpg
header_image_height: 700
header_image_width: 700
---

Learn how the new web service streaming query option works by the hand of this guest post from [Adisa Sinani](https://github.com/adisasinani) (thanks!)

===

Increasingly, businesses need to make data-driven decisions – regardless of where data lives, and what is more important immediately.
In this post, we’re going to take a look at how query streaming works on coreBOS and its implications.

| Query       |                                  |
|:-------------|:----------------------------------|
| Send Type:  | `GET`                              |
| operation   | `query`                        |
| query       | `select account_id from Accounts;` |
| sessionName | `$sessionName`                   |
| format(optional)     | `stream` or `streamraw`                   |
| URL format | `http://corebos_url/webservice.php?sessionName=sessionName&operation=query&query=[query command]&format=stream/streamraw`|

<p></p>

coreBOS has a [query return limit](https://corebos.com/documentation/doku.php?noprocess=1&id=en:devel:corebosws:querylanguage) of 100 records, which is due to timeout and resource restrictions.

If you want to obtain more records you must use the limit modifier.

So, if we have an Accounts table with 150 records, we could easily query it as following:

``` sql
SELECT * FROM vtiger_account LIMIT 150;
```

Any select statement with a limit modifier will **try** to return all the records indicated in the limit. If the limit is set too high, most probably the query will fail or run out of memory before finishing.

!! Stream Format

To be able to query a larger amount of data we implemented a streaming connection. 

``` shell
curl --location --request GET \
'http://corebos_url/webservice.php?operation=query&query=select *  from Accounts;&format=stream&sessionName=58d8c2f5612e931b1b601' \
-H 'Connection: keep-alive' -H 'Cache-Control: max-age=0' --output IDetailsRaw
```

!! Stream Raw Format

After launching the SQL query we loop over all the records and apply formatting to the fields.

We convert uitype 10 fields adding the module webservice id(70 to 15x70), dates, currency, etc.

Considering that a good part of the time is spent on that, we added another format type: `streamraw`.

StreamRaw retrieves the fields as we would get them from the database.

Let's have a look at the difference!

When querying for 40K records on Accounts:

* stream: 2m:06s
* streamraw: 22.50s

``` shell
curl --location --request GET \
'http://corebos_url/webservice.php?operation=query&query=select *  from Accounts;&format=streamraw&sessionName=58d8c2f5612e931b1b601' \
-H 'Connection: keep-alive'   -H 'Cache-Control: max-age=0' --output IDetails
```

!!! Important!
As mentioned, the result when using the streamraw format type is different. StreamRaw:

* uses columns names, not field names
* does not eliminate deleted related records; if a relation field (uitype 10) is pointing to a deleted record, stream raw will give you the ID of the deleted record, stream will show it as empty
* reference fields are not prefixed with their module web service ID
* does not HTML encode characters
* values set to 0 are sent as such instead of set to the empty string
* date, numbers, and currency fields are not formatted
* owner fields are not transformed
* on both formats the rows of the result are outside the array, which is done on purpose so that the reader doesn't have to wait till the end to start processing.

**Last Remarks:**

When querying on coreBOS, we suggest you go with around 30K records, just to be safe! For streaming, obviously, you can go higher.

**<span style="font-size:large">Enjoy!</span>**

<span>Cover photo by <a href="https://unsplash.com/@franki?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">
Franki Chamaki</a> on <a href="https://unsplash.com/">Unsplash</a></span>
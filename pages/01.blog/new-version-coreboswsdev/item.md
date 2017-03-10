---
title: New version of coreBOS Webservice Development
date: 2014/06/17 01:22
metadata:
    description: 'corebos webserivce REST development'
    keywords: 'CRM, vtiger, opensource, webserivce, REST, development'
    author: 'Joe Bordes'
header_image_file: loopback_logo.png
header_image_height: 380
header_image_width: 1000
taxonomy:
    category: blog
    tag: [webservice, development, release]
---

### Webservice Library and Development/Testing updates.

We have released a new version of the [coreBOS Webservice Library](https://github.com/tsolucio/coreBOSwsLibrary) and the [coreBOS Webservice Development platform](https://github.com/tsolucio/coreBOSwsDevelopment).

The [coreBOS Webservice Library](https://github.com/tsolucio/coreBOSwsLibrary) has seen an update of it's PHP and Javascript versions to make them smaller, faster and more useful.

 * PHP version now uses native JSON calls instead of depending on a third party library
 * We have updated the http CURL library for security and more modern PHP version support
 * Some minor bug fixes and elimination of notice and warnings
 * Javascript version has also seen dependencies eliminated and now just requires one file
 * Both versions now support doUpdate and getRelatedRecords functionality
 * We have changed the structure of the project to make it easier to understand what you need depending on your programming language

We have done some minor fixes in the Python version although I don't think this is very useful. I am currently working on an updated version of the Java library and **it would be REALLY nice** if somebody could **contribute a .NET** version.

The [coreBOS Webservice development platform](https://github.com/tsolucio/coreBOSwsDevelopment) has seen a whole bunch of unit tests to validate the REST enhancements, some bug fixes and a **whole new section dedicated to javascript development**, based on the updated library, we can now test the javascript library and see how the current set of unit test and examples work to help us get up to speed in our own projects.

<p style="font-size:larger">This is really a simple way to integrate your system and projects with coreBOS, converting coreBOS into that extremely powerful backend that it is!</p>

<p style="font-size:larger">Surprise us with your projects and extensions and let us know what you are doing with it!</p>
---
title: coreBOS WebDAV
date: 2021/01/03 23:45
metadata:
    description: 'Introducing a new way to interact with your documents in coreBOS.'
    keywords: 'CRM, vtiger, opensource, corebos, webdav, files, documents'
    author: 'Joe Bordes'
header_image_file: webdav.jpg
header_image_height: 431
header_image_width: 900
taxonomy:
    category: blog
    tag: [files, documents, webdav, 2021]
header_image_file: webdav.jpg
---

Another integration project brings us a whole new way to interact with our document management system in coreBOS. Let's see all the new things we can do (and what is pending).

===

coreBOS released a [WebDAV](https://en.wikipedia.org/wiki/WebDAV) integration with [sabre/dav](https://sabre.io/) this week.

Wikipedia says that WebDAV (Web Distributed Authoring and Versioning) is an extension of the Hypertext Transfer Protocol (HTTP) that allows clients to perform remote Web content authoring operations.

In English, that means that we can access a directory of files through the browser (on any remote server) as if it were a local file system that we can access with our operating system file management program. In this case, what we are accessing is the coreBOS Document records as if they were a local file system. The integration will permit us to access the Document records both from the folder structure in coreBOS or from the module structure. So we will see a list of folders and the documents inside or a list of modules/records and their related documents.

This method of accessing our documents opens a very interesting set of features like **mass uploading documents** or **inline editing of documents**.

We have implemented a fully translatable user interface to navigate through the document system but you can also access it from your operating system file management tools. There are many tutorials on the internet on how to connect to a WebDAV server from different operating systems, the only important thing to keep in mind is that you must connect with your coreBOS user and access key when asked to authenticate as the coreBOS permission system rules are applied.

You can [read about the configuration here](https://corebos.com/documentation/doku.php?noprocess=1&id=en:integrations:webdav), and I invite you to dedicate some time to watch the video presentation I made with all the details when you have some time.

[plugin:youtube](https://youtu.be/Ri9xRfXaux4)

The key points you will see in the video are:

- how to activate WebDAV in your coreBOS using global variable
- browser UI
- Create folders and documents. Uploading
- Operating system access
- Working with Documents using your File Manager. Mass upload documents
- Open Office access. Direct edit of GenDoc templates (!)
- [TiddlyWiki](https://tiddlywiki.com/) saving
- Pending issues

<span></span>

 ! What is Pending?

Not much really, all the main goals I had in mind have been implemented, but, as usual, when you get into something you start seeing other things that could be nice to have.

- add **property support** via a business map that defines the list of fields to show. WebDAV permits adding extra information to the files exported, it would be correct to permit each coreBOS install to define which fields on the Document module we would like to be able to see.
- **optimize search** the search is rather slow, we need to dedicate some time to see why and make it faster and also add support for searching on the property fields defined in the previous pending issue
- **support for subdirectories** ??  another long-standing one (any support you can give is welcome)... to be continued

**<span style="font-size:large">Enjoy.  Happy New Year!</span>**

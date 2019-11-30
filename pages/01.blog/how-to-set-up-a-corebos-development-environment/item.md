---
title: 'How to set up a coreBOS development environment'
media_order: image.png
date: '2019/12/01 11:21'
metadata:
    description: 'how to set up a coreBOS development environment:git workflow'
    keywords: 'coreBOS, webservice, development, git, github'
    author: 'Adisa Sinani'
taxonomy:
    category:
        - blog
    tag:
        - development
        - git
        - gitHub
        - code
        - webservice
        - 'unit tests'
header_image_file: image.png
header_image_width: 622
header_image_height: 319

---

The purpose of this blog post is to help everyone have an empowering and welcoming first experience as they start contributing to the **<span style="color:red;">coreBOS Open Source project</span>**! 
<br>
Have a look at the [wiki documentation](https://corebos.com/documentation/doku.php?id=en:devel:setupdevel) if you want to read a more detailed information about setting up your coreBOS development environment using Git.

* ** What you’ll learn**
	* How to access the code of a coreBOS install.
	* How to access this coreBOS install via web services.
	* How to execute all the unit tests accessing the demo data.
<br>
<br>
* **What you’ll need**
	* **LAMP**(Linux, Apache, MySQL, PHP) stack.
	* **Code editor**, anyone you prefer and work with.
	* And obviously, you need to have **Git** installed because coreBOS is a git-based open source project. That means that contributing to the project is basically the same as for any other git-based project.

To set up a development install for coreBOS you will need to take these steps:
* **fork** the project on GitHub
* **clone** your fork on your local development computer
* **set the permissions** on the files so your user is the owner of all files (so you can edit them normally with your user) and the webserver user is the group (so it can write the files it needs to write to work)
```
chgrp -R www-data <name of directory where you cloned the corebos repo>
```
* **install** the project as you would normally
* once you can log in, drop to the command line (we we assuming Linux here)
* move the renamed install directory and file back to their original place:
	* the directory “install” and the file “install.php” will be renamed after the installation is complete to something like 8432658395801x3fab13af3.42704102install for security reasons. Rename them back to their original name:
```
mv 8432658395801x3fab13af3.42704102install/ install
```
```
mv 8432658395801x3fab13af3.42704102install/ install
```
	* now, rename Migration directory back into the modules directory:
```
mv 8432658395801x3fab13af3.42704102Migration modules/Migration
```
* change to build directory and **delete the coreBOSTests** directory.
```
git clone https://github.com/tsolucio/coreBOSTests coreBOSTests
```
* drop the database and load the one you will find in **build/coreBOSTests/database/coreBOSTests.sql**
* from the root directory of your install run the commands:
```
build/HelperScripts/createuserfiles
```
```
build/HelperScripts/update_tabdata
```
* finally, go to the root of your web server and install the coreBOS Webservice Development tool with:
```
git clone https://github.com/tsolucio/coreBOSwsDevelopment
```
* import the project code into your IDE and you are ready to start developing.

<span style="color:green;font-weight:bold;font-size:large;">Welcome to the coreBOS development team!  :-) </span>

Now, **<span style="color:red;font-size:large;">go forth and build!</span>**

What if you get stuck? That’s perfectly fine.

* The best place to contact the developer community is on our [Gitter chat group](https://gitter.im/corebos/discuss).
* The blog is mostly developer-oriented and there is a lot of information on the [documentation site](http://corebos.com/documentation/doku.php?id=en:start).
* You can ask in [the forum](https://discussions.corebos.org/).

Don't hesitate to get in touch, we are a **really friendly and helpful community**. :)

**<span style="font-size:large;">We look forward to seeing your code!</span>**
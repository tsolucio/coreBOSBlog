---
title: coreBOS Perspectives
date: 2017/05/01 19:00
metadata:
    description: 'Quickly convert your coreBOS into a powerful dedicated market segment verticalization.'
    keywords: 'CRM, vtiger, opensource, corebos, perspective, skeleton'
    author: 'Joe Bordes'
header_image_file: perspective.jpg
header_image_height: 230
header_image_width: 485
taxonomy:
    category: blog
    tag: [development, 2014, evolution, perspective]
---

 ! Concept

A perspective is a set of code and database changes that convert a stock coreBOS system into a verticalization prepared for a clearly defined market segment.

===

The perspective concept stands upon two coreBOS features; [coreBOS Updater](../corebos-updater2) and the **code structure and packaging system**. Since we have laid out the code in such a way that we do not need to create .zip packages and all the code is simply there, in place, ready to be modified we can easily define a perspective as:

  * a composer.json file to install new modules
  * an .xml coreBOS Updater changeset file and it's associated worker scripts
  * a patch to change the code (this should not be required)

The patch will add the code changes that the verticalization needs, while the coreBOS updater .xml changeset and the composer.json files will define the set of database changes and new modules that are needed to convert the base application into the **market segment verticalization** we want.

 ! How it works

The fundamental part of a Perspective is the **composer.json** file and the [ComposerInstall project](https://github.com/tsolucio/ComposerInstall) which must be installed with the perspective.

Using [composer](https://getcomposer.org/) with a specifically crafted composer.json file you can install as many modules as you like in one operation. The idea is that you will have each module or extension in it's own repository, you will define the composer.json file to connect to each one, download it and install or update it accordingly.

 !!!! This is the reason we put all our modules in their own repository

So using [composer](https://getcomposer.org/) we can install all the modules we need. Additionally we need two more things to convert a stock coreBOS into a verticalization:

  * one or more database changes to tie all the modules together. Each module will have installed what it can in it's postinstall, but there will always be some steps that need to be taken once all the modules are installed
  * patch the base files. Ideally this would not be needed, but, in some cases it is still a necessity

In order to apply the final set of coreBOS Updater changes, we created the [cbPerspective extension](https://github.com/tsolucio/cbPerspectiveCS). That will permit you to create some coreBOS updater changsets and group them together in a final install step which can be easily integrated into the composer definition file. So, the goal of cbPerspective is not to be used as it is in it's repository, but to be customized for each verticalization. In other words, you will have a **TelemarketingPerspecitve** extension, in it's own repository which will be an adapted copy of cbPerspective with a set of coreBOS updater changesets to be applied after installing all the new modules to convert a stock coreBOS into a **telemarketers dream application**.

With that extension created and composer you will be able to install all the new modules and make all the post-database changes you need with the command:

```
composer install
```

For example, this is a composer.json perspective file:

```
{
  "repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/tsolucio/ComposerInstall"
  },
  {
    "type": "vcs",
    "url": "https://github.com/tsolucio/adocDetail"
  },
  {
    "type": "vcs",
    "url": "https://github.com/tsolucio/adocMaster"
  },
  {
    "type": "vcs",
    "url": "https://github.com/tsolucio/coreBOSPackingSlip"
  },
  {
    "type": "vcs",
    "url": "https://github.com/tsolucio/coreBOSEmployee"
  },
  {
    "packagist": false
  }
  ],
  "require": {
    "tsolucio/ComposerInstall": "dev-master",
    "tsolucio/coreBOSPackingSlip": "dev-master",
    "tsolucio/adocDetail": "dev-master",
    "tsolucio/adocMaster": "dev-master",
    "tsolucio/coreBOSEmployee": "dev-master"
  },
  "scripts": {
    "post-install-cmd": [
        "tsolucio\\ComposerInstall\\ComposerInstall::postPackageInstall",
        "php modules/cbupdater/loadapplychanges.php modules/ConfigEditor/composer.xml"
    ],
    "post-update-cmd": "tsolucio\\ComposerInstall\\ComposerInstall::postPackageUpdate"
  }
}
```

If you feed this composer.json file to composer from the top of a coreBOS install you will get coreBOSPackingSlip, adocDetail, adocMaster and coreBOSEmployee modules installed in one step. If one of those modules were a cbPerspective extension it would have been installed with all the rest and would have launched it's coreBOS updater changesets. So all you have left is to apply any specific patch to the base code to get your verticalization.

 ! Closing notes

The way perspectives were created was as a head start for **developers and implementors**.

Imagine you have to start a project, normally you will create a new repository for the project, merge in the latest version of coreBOS and start installing modules, applying changes and modifying code.

With perspectives this initial setup  changes a little and would be like this:

  * create a new repository for the project
  * merge in the latest version of coreBOS
  * install coreBOS to get a valid database for your project
  * find a perspective for your projects' market segment and copy it's composer.json file to the root of your project
  * launch composer install to get all the modules and changes applied
  * now start customizing for your clients' particular needs

As you can see the only difference is that the perspective gives us a standard set of modules and settings for a specific market segment, making our initial setup easier and more efficient while benefitting from common experience of others in this type of configurations.

Each perspective will have it's own repository where you will be able to find the main composer.json file, some information about what it does and any additional changes that may be required to fully apply the perspective. Normally each **perspective** will have a customized [cbPerspective extension](https://github.com/tsolucio/cbPerspectiveCS), renamed in it's own repository to match the perspective as cbPerspective is just a template extension.

Maintaining a whole bunch of separate modules is hard work, specially since you usually find and fix an error in the module or add a feature that everyone should have, directly on the client's private repository, but it is well worth the effort.

Finally I would like to comment that I ran into a very similar concept when creating this blog site. When I decided to use [GRAV](https://getgrav.org), I found that they use the concept of **SKELETON PACKAGES** to implement the same functionality. Have a [read here for more information](https://getgrav.org/downloads/skeletons) on this feature and this very recommendable CMS.

**<span style="font-size:large">Thanks for reading.</span>**


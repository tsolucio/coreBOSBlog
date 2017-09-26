---
title: coreBOS Development Guidelines
date: 2017/09/26 12:08
metadata:
    description: 'Rules and recommendations to develop and contribute to the coreBOS project.'
    keywords: 'CRM, vtiger, opensource, corebos, erp, development'
    author: 'Joe Bordes'
header_image_file: developmentguidelines.jpg
header_image_height: 426
header_image_width: 640
taxonomy:
    category: blog
    tag: [development, contribution, collaboration, guidelines]
---

During the last few weeks, coreBOS has seen some new developers arrive to the project and some long time adept start collaborating more frequently so I thought it was time to set in writing the rules and guidelines we try to follow in this project. This idea has been floating around my head for a long time as I dedicate a lot of time to formatting and validating code changes and pull requests for the project. I strongly recommend that all developers that wish to help out read these guidelines and try to adhere to them as much as possible, but don't worry, I'll still be here to impose them :-)

===

At coreBOS, we base a lot of our open source project directives based on the wonderful work done by [Karl Fogel in his book Producing Open Source Software](http://producingoss.com/). So, I mostly followed his recommendations when creating the [coreBOS Development Guidelines](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:developmentguidelines).

You can find [the full set of rules on our documentation site](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:developmentguidelines), but let's go over the main rules.

 !!!! Where to speak with other developers and look for help

This one is easy: [Gitter](https://gitter.im/corebos/discuss)!!

Come on over and join the conversation, we are a **really friendly and helpful community.**

 !!!! How to Contribute and Report Bugs

coreBOS is an open source project that is managed in git on GitHub, so the best way to collaborate is to [follow the forking workflow](https://www.atlassian.com/git/tutorials/comparing-workflows#forking-workflow) and use [GitHub Issue Section](https://github.com/tsolucio/corebos/issues) to report bugs.

 !!! Contact me if you need help.

 !!!! Code Formatting and Structure

Here we have a set of rules that is an adaption of the [PHP-FIG Standards Recommendations](http://www.php-fig.org/psr/).

On our [development guidelines page](http://corebos.org/documentation/doku.php?noprocess=1&id=en:devel:developmentguidelines) I mostly try to indicate the parts where we are not aligned with them. Those points aren't many and you will be mostly correct if you follow their recommendations, so you MUST read the PHP-FIG guidelines. The few places we diverge are due to my personal preferences and the reality of the code base we have inherited.

 !!! Keep in mind that I like compact code, reduce empty lines and tabs instead of spaces

 !!!! Error Reporting and MySQL Strict

All development MUST be done using **error_reporting set to E_ALL** and MySQL set to **Strict Mode**.

This is **REALLY** important. We have undergone a big effort to eliminate all the warnings and notice messages in the code to enable our developers to work in E_ALL mode and for our users to be able to install coreBOS in MySQL Strict mode.

This helps the programmer avoid errors and create more compatible and error resistant code. For example, during the elimination process I fixed some errors as you can see here:

 - [fix(Database) convert string to variable by adding missing dollar sign](https://github.com/tsolucio/corebos/commit/1e8f8525267021e73c27700cee56a0d4035a2936)
 - [fix(Currency) wrong module name variable being used](https://github.com/tsolucio/corebos/commit/333dfa432806472cabad8c5347593e8960aff7b7)
 - [fix(Calendar) incorrectly typed variable name](https://github.com/tsolucio/corebos/commit/1a02b528a92a69ef13323f67755164c1305fb387)

This also reduces the strain on the server as PHP does not have to trigger the warnings, which also impacts performance.

If you run into any part of the code that has a lot of warnings let me know and I will attend.

 !! Note that production installs must use E_ERROR.

 !!!! Security

Security is hard. It is a very complex and **important** issue which requires a lot of dedication and time. There is no way around it except studying and understanding security issues.

Reserve time for it, read, learn and apply. Iterate. Constantly.

 !!! Talk to us about it, share your findings.


 !!!! Commit Guidelines

We try to follow the [AngularJS Conventions](https://docs.google.com/document/d/1QrDFcIiPjSLDn3EL15IJygNPiHORgU1_OOAqWjiDU5Y/mobilebasic?pli=1) for commit messages. Besides that it is important to follow a few steps **before** emitting a commit:

 - eliminate debug messages
 - pass a lint process or, at least, launch a syntax validation on the files (php -l)
 - make as many commits as you need to ensure concise and cohesively related changes (the git "-p" directive is your friend)


**<span style="font-size:large">Welcome to the coreBOS Development process!!</span>**


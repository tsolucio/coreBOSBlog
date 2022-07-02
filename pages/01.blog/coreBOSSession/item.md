---
title: coreBOS Session Management
date: 2022/07/03 18:08
metadata:
    description: 'Session Management enhancement for additional security measures.'
    keywords: 'CRM, vtiger, opensource, corebos, security, session'
    author: 'Joe Bordes'
header_image_file: 4824.jpg
header_image_width: 943
header_image_height: 503
taxonomy:
    category: blog
    tag: [security, session, 2022]
---

Session Management enhancements for additional security measures and functionality.

===

 ! Session Management Enhancements

Session management is a fundamental part of the authentication process of any web application. Web applications are stateless, which means there is no defined way in the HTTP protocol to identify one HTTP request from another. If an application needs to know any information about a request to relate it to another request or to some internal state it MUST send some (hidden) identifier to the response of the first page, capture that information in the next request and recover the context as required. All that must be done by the application.

The most common situation of this flow is the authorization process where your users identify themselves and log in to the application. We don't want to have them log in every time they send a request so we do the login request once and then send an identifier to each page they visit which is sent back with each request and permits us to identify the user.

To make this easier, many frameworks, such as J2EE, ASP .NET, PHP, and others, provide their own session management features and associated implementation. In other words, these platforms take care of this for you. PHP gives us a $_SESSION storage array and a set of commands to manipulate session information. Really simplified, the functionality is that you use `start_session`, write elements in $_SESSION, and PHP will create a session ID and a file where it will save the array, then it will send a cookie to the browser and read that cookie on each request, recover the information in the file and fill in the $_SESSION array for us. This makes it easy to have a stateful web experience.

There are some drawbacks of using the native PHP session management:

- the files are usually stored in a read-all directory which presents a security risk as users could read the session information of others
- the name of the cookie must be defined correctly or you will not be able to use different installs of your web application. This was an issue in vtigerCRM where you couldn't log in to two different installs in the same browser at the same time. We fixed that in coreBOS many years ago.
- since the session information is saved in files inside the server the application is being executed in, it is difficult to implement a load balancing structure where you have various identical coreBOS installs working together to serve requests. Each coreBOS must recognize the sessions created on the other servers so they must share a mounted file system
- OWASP recommends a couple of additional security measures that are not supported by the native PHP implementation

We set out to fix some of these shortcomings and rewrote a good part of the session management library coreBOS had. As with many of our efforts a lot of work with little visible impact in the application. So, if we did this correctly, the users shouldn't notice much at all, definitely you will not notice the amount of effort and time we have dedicated.

The goals we had in mind and that we have achieved are:

- consolidate all three entry points we have: Application, Web Service and Mobile. All three now use the same library and we have eliminated other libraries
- we have made all three entry points separate, so you can log in to each one independently of the others in the same browser
- security checks following standard guidelines about fixation, hijacking, and cookie settings
- moved the session information to the database, we now have a database-backed session management making it easy to do load balancing and distributed coreBOS configurations
- we added session locking to:
  - the **browser user-agent**, so when a user tries to access the session from a browser different than the one he logged in with we reset the session
  - the **user IP**, so when a user tries to access the session from a different IP than the one he logged in with we reset the session
- review the whole session library for security issues and optimizations. we closed three security issues we were aware of.

Besides those goals, we added some other functionality.

- coreBOS now supports "directing" to the requested URL. Before, when you tried to access a page in coreBOS before you were logged in, the link was lost after login, obligating you to recover the link again. Now the coreBOS session management will save that destination for you and send you the correct page after login
- we have created global variables for some functionality
  - **x_Session_LockUserAgent**, where "x" can be Application, Webservice, or Mobile. This global variable restricts access to the same browser the login was made from. The default value is active/true (1)
  - **x_Session_LockIP**, where "x" can be Application, Webservice, or Mobile. This global variable restricts access to the same user IP the login was made from. The default value is deactive/false (0)
  - **x_MultipleUserLogins**, where "x" can be Application, Webservice, or Mobile. This global variable allows the same user to log in multiple times from different browser sessions. The default value is active/true (1)

<span></span>

 ! Interesting links

- [Session Management - OWASP Cheat Sheet Series](https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html)
- [Trick-Out Your Session Handler](https://web.archive.org/web/20081221052326/http://devzone.zend.com/node/view/id/141)
- [Essential PHP Security](https://web.archive.org/web/20191014045252/http://phpsecurity.org/about)
- [zebra_session library](https://github.com/stefangabos/Zebra_Session/blob/master/README.md)

<span></span>

 ! Code changes. Commits

- add [zebra_session library](https://github.com/stefangabos/Zebra_Session)
- integrate Zebra Session to move the session to database to work with ADODB and coreBOS
- correctly set session name and ID
- change web service session to coreBOS_Session
- SAML SSO with the new session management library
- KCFinder support for new session manager
- delete web service and mobile session management and move to coreBOSSession
- correct web service extendsession support
- change destroy to kill and save authenticated user data
- change session started with database-backed session status and eliminate one destroy
- database session_status
- delete obsolete session management library
- eliminate previous session management code
- make session cookie secure
- regenerate sessionIDs on privilege escalation
- use current URL instead of siteURL and base directory name for session name
- better session started detection
- create database table if not exists
- do not set lastpage on ajax calls
- eliminate include of deleted session management library
- global variables **x_MultipleUserLogins** to permit multiple user logins from browsers
- **x_Session_LockIP** and **x_Session_LockUserAgent** GVs
- set module and user for correct retrieval of GVs
- user and section support in the database. regenerate ID

**<span style="font-size:large">Taking care of coreBOS day by day!!</span>**

Photo <a href='https://www.freepik.com/vectors/psychological-counseling'>Psychological counseling vector created by pch.vector - www.freepik.com</a>
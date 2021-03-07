---
title: coreBOS and Salesforce
date: 2021/03/07 11:08
metadata:
    description: 'coreBOS and Salesforce differences.'
    keywords: 'CRM, vtiger, opensource, corebos, salesforce, blog'
    author: 'Joe Bordes'
header_image_file: Salesforce.png
header_image_height: 305
header_image_width: 1200
body_classes: "table table-striped table-hover"
taxonomy:
    category: blog
    tag: [salesforce, comparison, 2021]
---

A few months ago a good friend and collaborator asked me about the differences between Salesforce<sup>TM</sup> and coreBOS. A few days ago the [same question came up in the forum](https://discussions.corebos.org/showthread.php?tid=986&pid=8753#pid8753). Let's see what I think about it.

===

For me, there are three main differences.

 ! 1.- Resources

The money and people availability that both projects have is totally different. They have the resources to invest in things that we can only put on our to-do list and wait to get to. This means that they have more functionality than we do for sure.

 ! 2.- Influence in the roadmap

Related to the resources is the accessibility to the team. In coreBOS you can actually contact the people that are directing the product. That gives you the power to influence it and push it in the direction that is beneficial to you. Besides the fact that coreBOS strives to be a flexible platform that you can adapt to your business instead of a functionality-packed on-demand product, the fact is that YOU can mark, to some extent, the pace of the project. I doubt you can do that with Salesforce.

 ! 3.- OpenSource

You have full control of your data and project. For good and bad :-)

 ! Comparison

As you can see, what I find fundamental and important is probably not what you were expecting when you started reading the article, but I did prepare a more detailed comparison that I will share next. Be warned, this is a **very** opinionated comparison basedon [this feature list from Salesforce](./salesforce-only-in-lightning-features.pdf).

| Salesforce Feature | State in coreBOS |
| ------------------ | ---------------- |
|Customize home with components|WIP. Currently implementing a POC with Reports home page. If it works we will do home, substitute Dashboard and implement on module home page|
|Customize record home with components|WIP. Currently implementing a POC with Reports home page. If it works we will do home, substitute Dashboard and implement on module home page|
|Keyboard Shortcuts|In many places but inconsistent and not maintained|
|Navigate to a Record Directly from an Action Success Message|Quick create takes you to record directly, no option to otherwise unless in selection popup screen in which case it selects the created record|
|Favorites|<span style="background: #FFD3D3;"> not supported </span>|
|Personalized Navigation|yes, to some extent, role based not user based|
|Lightning Apps|in coreBOS we don’t impose any design system. We natively support LDS and you can use any LDS styling in your custom widgets but you are free to include and use others|
|Lightning Console Apps|-|
|Utility Icons for Lightning Apps|-|
|Global actions|<span style="background: #FFD3D3;"> no similar concept </span>|
|App Launcher|since we don’t have a market place and all modules look the same we don’t have an App Launcher with Apps but we do use the App Launcher construct in our integrations page|
|User Switcher|<span style="background: #FFD3D3;"> no similar concept </span>|
|Record Detail tab never forgets|we have some sticky sections controlled by global variables but it isn’t a full-blown memory of the state you choose, and even when we do save it, it is usually in the session, so it’s lost at logout|
|Troubleshoot Record Errors Quickly and Easily|there is some control but it could be a lot better|
|More specific dialog titles when creating records|we don’t have record “types” but you can customize the header as you like with global variables and expression language|
|Launch a Lightning Component from an Action|we can launch actions through the Business Actions module, so it is similar|
|Quick View Hovers|<span style="background: #CEFFC5;"> equivalent </span>|
|Utility Bar|<span style="background: #FFD3D3;"> no similar concept </span>|
|Highlights Panel|<span style="background: #FFD3D3;"> no similar concept </span> inside the application but we do export this type of information for external apps|
|Help Menu|not really, we link to the wiki, but there is a lot of documentation to be done. Just to be clear: there is a LOT of documentation, but there is also a lot of functionality not covered|
|Page layout per app|<span style="background: #FFD3D3;"> no similar concept </span>. On our roadmap|
|Sync all collapsible sections|<span style="background: #FFD3D3;"> no similar concept </span>|
|Lists in App Builder|not yet, soon to be added|
|Create Custom Tab Sets on Record Pages|<span style="background: #CEFFC5;"> equivalent </span>|
|Create Custom Lightning Experience Record Pages|<span style="background: #FFD3D3;"> no similar concept </span>|
|Assign filters to report chart components|<span style="background: #CEFFC5;"> equivalent </span>|
|Assign custom record page|-|
|App Page templates|-|
|New Records highlight panel|-|
|Read-Only Lightning Pages|-|
|Dynamic Report Chart Components|<span style="background: #CEFFC5;"> equivalent </span>|
|Embed Wave|<span style="background: #FFD3D3;"> no similar concept </span>|
|Flow Component|external install: [Process Flow Perspective](https://github.com/coreBOS/ProcessFlowPerspective)|
|Assign Record Pages by App, Record Type, and Profile|<span style="background: #FFD3D3;"> no similar concept </span>|
|Customize Person Account Pages|We have contacts=person but it is just a normal module like all the others, customizable like any other|
|Customize Your Console App Record Pages|-|
|Clone Salesforce Default Lightning Pages|-|
|Component - Related Record|this could easily be done and included as a widget:  VERY easily done|
|Component - Related List|not yet, soon to be added|
|Component - Flow|external install: [Process Flow Perspective](https://github.com/coreBOS/ProcessFlowPerspective)|
|Component - Accordion|<span style="background: #FFD3D3;"> no similar concept </span>|
|Einstein Recommendations|<span style="background: #FFD3D3;"> no similar concept </span>|
|Dynamic Lightning Pages|<span style="background: #CEFFC5;"> equivalent </span>|
|Pinned Workspace Regions|<span style="background: #FFD3D3;"> no similar concept </span>|
|Sorting Results|we permit sorting alphabetically. We don’t have a “sort by relevance” feature. This could be done as we have a native integration with elastic search. Our biggest hurdle here is to have enough data to understand what “relevance” means for each company|
|More searchable objects|we search all our modules|
|Create a custom object item from within a lookup|<span style="background: #CEFFC5;"> supported </span>|
|Instant results|<span style="background: #FFD3D3;"> no similar concept </span>|
|Narrow search results to a specific object|<span style="background: #FFD3D3;"> no similar concept </span>|
|Global Search in Setup|<span style="background: #FFD3D3;"> no similar concept </span>|
|Know When Spell Correction Is Applied to Your Term|<span style="background: #FFD3D3;"> no similar concept </span>|
|Personalize the way search results display|<span style="background: #FFD3D3;"> no similar concept </span>|
|Top Results|each user has a global variable where they can set which are their top results modules|
|Advanced lookups powered by a full search engine|<span style="background: #FFD3D3;"> no similar concept </span>|
|List view charts|<span style="background: #FFD3D3;"> no similar concept </span> yet, this is on our roadmap|
|Delete Charts from List Views||
|Search for a list view on the fly|<span style="background: #FFD3D3;"> no similar concept </span>|
|Kanban|WIP. Currently implementing an external app for this|
|Continuous scrolling|<span style="background: #FFD3D3;"> no similar concept </span>|
|Create and edit list views from the same page|<span style="background: #FFD3D3;"> no similar concept </span>|
|Snapshot of list view details|<span style="background: #CEFFC5;"> equivalent </span>|
|List View Column Widths Dynamically Adjust to Content|not yet but we are almost ready to change the whole list view and the new data table does have this sort of functionality|
|Set Custom Column Widths on More List Views|not yet but we are almost ready to change the whole list view and the new data table does have this sort of functionality|
|Smart Column Widths|not yet but we are almost ready to change the whole list view and the new data table does have this sort of functionality|
|Reset Custom List View Column Widths|not yet but we are almost ready to change the whole list view and the new data table does have this sort of functionality|
|Wrap Text in List Views|not yet but we are almost ready to change the whole list view and the new data table does have this sort of functionality|
|Update Record Owners from list views|you can update any field from a list view|
|Mass Inline Editing|you can update any field from a list view and with no theoretical limit|
|Programmatic Lists Component|-|
|Filters in List view|<span style="background: #CEFFC5;"> supported </span>|
|Related List Drill-in|the same as normal list views, we use the same approach|
|setup|we have reduced considerably our setup options in favor of normal modules that do the work, so you can add buttons and configure many options from normal modules|
|setup|besides that we have a central setup screen for application settings and another screen for integrations|
|Development Capabilities|we are a very developer friendly platform, with all sorts of components to make it  easy to customize your coreBOS|
|Dynamic Picklists|<span style="background: #CEFFC5;"> supported </span>|
|User Interface API|we are not good in this area, we stick to what we have: consistency|
|Base Lightning Components|not a rich library but a modest one :-)|
|Lightning Locker Service|<span style="background: #FFD3D3;"> no similar concept </span>|
|Lightning Testing Service|<span style="background: #FFD3D3;"> no similar concept </span>|
|Lightning Component Framework|<span style="background: #FFD3D3;"> no similar concept </span>|
|Salesforce Lightning Inspector Chrome Developer Tool|normal developer console|
|Lightning Out|full support for external applications|
|Lightning Container Components|we have developer widgets which won’t be as powerful but it is a similar concept|
|Lightning Experience Stylesheets for Visualforce|<span style="background: #FFD3D3;"> no similar concept </span>|
|Salesforce Lightning Design System|<span style="background: #CEFFC5;"> supported </span>|
|Custom Lightning Page Templates|<span style="background: #FFD3D3;"> no similar concept </span>|
|Themes & Branding|very limited|
|Assistant|similar concept although ours is obsolete and in urgent need of an update|
|Key Deals|<span style="background: #CEFFC5;"> supported </span>|
|Performance Chart|<span style="background: #CEFFC5;"> supported </span>|
|Einstein Opportunity Insights|<span style="background: #FFD3D3;"> no similar concept </span>|
|Einstein Account Insights|<span style="background: #FFD3D3;"> no similar concept </span>|
|Task Filter Options from the Home page|<span style="background: #CEFFC5;"> supported </span>|
|News|we support RSS, maybe could be done|
|Path|this could be done by enhancing the BPM Process Flow Perspective, now it hand-holds you through the process, but it doesn’t tell you why, we could add a help message on each step|
|All Activity History|activities are easy to list, all of them, what would be more interesting would be an activity timeline including emails, messages, and other modules as required. This has been on our todo list for a long time|
|Account Logos|we don’t look for them but you can add images to any module and creating an integration to pull them in which shouldn’t be difficult, maybe even possible using integromat (or similar) if the information is publically available|
|Automated Account Fields|<span style="background: #FFD3D3;"> no similar concept </span>|
|Forecasts|external install: [Sales Forecast](https://github.com/tsolucio/salesforecast) (not as complete)|
|Take actions from Activity Timeline|no activity timeline (yet)|
|Account Hierarchy|limited|
|Campaign Hierarchy|<span style="background: #FFD3D3;"> not supported </span>|
|Lead Convert|similar concept although without so many options|
|Accounts to Leads Matching|<span style="background: #FFD3D3;"> not supported </span>|
|Convert Lead to an Existing Opportunity|<span style="background: #FFD3D3;"> not supported </span>|
|Specify Contact and Opportunity Record Type|<span style="background: #FFD3D3;"> not supported </span>|
|Hide Create Opportunity section in Lead Convert modal|<span style="background: #CEFFC5;"> supported </span>|
|Navigate to Account, Contact, Opportunity|<span style="background: #CEFFC5;"> supported </span>|
|Add Members to Campaigns from Accounts|<span style="background: #FFD3D3;"> not supported </span>|
|Email Quote PDFs with One Click|<span style="background: #FFD3D3;"> not supported </span>, requires two clicks if configured correctly|
|Add Activities for Quotes and Contracts|<span style="background: #CEFFC5;"> supported </span>|
|Opportunity Workspace|<span style="background: #FFD3D3;"> no similar concept </span>|
|Reply to and Forward Emails|<span style="background: #CEFFC5;"> supported </span>|
|Send through Gmail and Office365|<span style="background: #CEFFC5;"> supported </span>|
|Microsoft Exchange|<span style="background: #FFD3D3;"> not supported </span>|
|email templates|<span style="background: #CEFFC5;"> supported </span>|
|List Email|<span style="background: #CEFFC5;"> supported </span>|
|Send List Emails to Campaigns from the Campaign record|<span style="background: #CEFFC5;"> supported </span>|
|Send List Email from your regular list views|<span style="background: #CEFFC5;"> supported </span>|
|Send Error-Free Emails by Predefining Fields|<span style="background: #CEFFC5;"> supported </span>|
|When sending email, choose among multiple emails addresses in the from field|<span style="background: #CEFFC5;"> supported </span>|
|Send email from anywhere|could be added …|
|Merge Fields When Emailing|<span style="background: #CEFFC5;"> supported </span>|
|Previews for Email Attachments|<span style="background: #FFD3D3;"> not supported </span>|
|Templates can be created when Emailing|<span style="background: #FFD3D3;"> not supported </span>|
|Activity timeline|<span style="background: #FFD3D3;"> not supported </span>|
|Activity Composer|<span style="background: #FFD3D3;"> no similar concept </span>|
|Lightning Dialer|only asterisk and rather obsolete design|
|Custom voicemail Greeting|<span style="background: #FFD3D3;"> not supported </span>|
|Notes Homepage|<span style="background: #FFD3D3;"> no similar concept </span>. We have documents which can contain notes, comments and conversations|
|Private Notes|<span style="background: #CEFFC5;"> supported </span>|
|Calendar|only one calendar|
|Create More Record Associations with the Related To Lookup Field|<span style="background: #CEFFC5;"> supported </span>|
|Pop-out Email Composer|<span style="background: #CEFFC5;"> supported </span>|
|See and Edit Your Email Signature as You Write|<span style="background: #FFD3D3;"> not supported </span>|
|Share and add notes to records|supported as comments|
|Review List Emails before they’re sent|<span style="background: #FFD3D3;"> not supported </span>|
|Email Template Object Home|<span style="background: #CEFFC5;"> supported </span>|
|Email Templates - Handlebars merge field syntax|we have our own syntax based on the workflow expression language|
|Email Templates -Preview email|<span style="background: #FFD3D3;"> not supported </span> but on our todo list, we want to integrate GrapeJS|
|Task Notifications|<span style="background: #CEFFC5;"> supported </span>|
|Task list view|<span style="background: #CEFFC5;"> supported </span>|
|Duplicate Management|<span style="background: #CEFFC5;"> supported </span>|
|Einstein|<span style="background: #FFD3D3;"> no similar concept </span>|
|View All Contact Fields on Case Pages|limited support|
|Snap-In Chat|we support natively Mattermost and Mibew|
|Lightning Service Console|not sure|
|Lightning Knowledge|not sure|
|Knowledge record types|<span style="background: #FFD3D3;"> not supported </span>|
|Preview Case Details with Case Hovers|<span style="background: #CEFFC5;"> supported </span>|
|Compact Case Feed|<span style="background: #FFD3D3;"> not supported </span>|
|Filter case feeds|not sure|
|View, Create, Edit, and Delete Case Comments|<span style="background: #CEFFC5;"> supported </span>|
|See Email Attachments|<span style="background: #CEFFC5;"> supported </span>|
|Reply to Social Posts in the Case Feed|<span style="background: #FFD3D3;"> not supported </span>|
|Route Work to Agents|<span style="background: #FFD3D3;"> not supported </span>|
|Twitter Actions in Case Feed|<span style="background: #FFD3D3;"> not supported </span>|
|Search by Attached Files to Find Articles Faster|<span style="background: #FFD3D3;"> not supported </span>|
|Macros|<span style="background: #FFD3D3;"> not supported </span>|
|Reports & Dashboards|we recommend using external tools|
|Present and Share information|<span style="background: #CEFFC5;"> supported </span>|
|Customizable dashboard components|limited|
|Dashboard editor|wip|
|Hide totals and subgroups from report view|<span style="background: #CEFFC5;"> supported </span>|
|Interactive filters when viewing reports|<span style="background: #CEFFC5;"> supported </span>|
|Keyboard Shortcuts for dashboards|<span style="background: #FFD3D3;"> not supported </span>|
|Dashboard Component|<span style="background: #FFD3D3;"> not supported </span>|
|Sort Data in Dashboard Component Charts and Tables|<span style="background: #FFD3D3;"> not supported </span>|
|Edit, Clone, and Delete Dynamic Dashboards|<span style="background: #FFD3D3;"> not supported </span>|
|charts|only limitted charts|
|Subscribe Other People to Reports|<span style="background: #FFD3D3;"> not supported </span>|
|Interactive chart filtering|<span style="background: #FFD3D3;"> not supported </span>|
|Formatted Exports|limited|
|Dynamic Filtering with URL Parameters|<span style="background: #FFD3D3;"> not supported </span>|
|Subfolders|<span style="background: #FFD3D3;"> not supported </span>|
|Last Run Date displayed for reports|<span style="background: #FFD3D3;"> not supported </span>|
|Report Builder|similar concept|
|Tables in Dashboards|limited|
|Subscriptions|<span style="background: #FFD3D3;"> not supported </span>|
|Themes and color|limited|
|Dashboard component|limited|
|Edit Filters in view mode|<span style="background: #FFD3D3;"> not supported </span>|
|Omit totals from report|<span style="background: #CEFFC5;"> supported </span>|
|Undo/redo when editing dashboards|<span style="background: #FFD3D3;"> not supported </span>|
|Role hierarchy by person|<span style="background: #CEFFC5;"> supported </span>|
|File Preview Player|<span style="background: #FFD3D3;"> not supported </span>|
|File sharing|on the road map|
|Add Salesforce Files to a Record from the Related List|<span style="background: #CEFFC5;"> supported </span>|
|Customize the Files Detail Page|<span style="background: #CEFFC5;"> supported </span>|
|Drag Files onto Files and Attachments Related Lists|<span style="background: #FFD3D3;"> not supported </span> on related lists|
|Authenticate Effortlessly to External File Sources|<span style="background: #FFD3D3;"> not supported </span>. Note there is an old third party extension for this but I would prefer to use MinIO or Nextcloud|
|Chatter|Acievable with Mattermost integration?  WIP|
|New filters in “what I follow” feed|third party extension|
|Create a Report on the Top 100 Feed Item Views|<span style="background: #FFD3D3;"> not supported </span>|
|Identify External Users at a Glance|Acievable with Mattermost integration?  WIP|
|Live Comments|Mattermost|
|Mute|Mattermost|
|See who likes your comment|Mattermost|
|Edit feed post and comments in multiple places|Mattermost|
|Rich Content and Inline Images in more places|<span style="background: #CEFFC5;"> supported </span>|
|Add and Remove files when editing post|<span style="background: #FFD3D3;"> not supported </span>|
|Use a Record’s Follow Action to Add It to a Stream|<span style="background: #FFD3D3;"> not supported </span>|
|Sort Feed Global Search Results by Relevance|<span style="background: #FFD3D3;"> not supported </span>|
|Out of the Office feature|<span style="background: #FFD3D3;"> not supported </span>|
|Multiple attachments on posts|<span style="background: #FFD3D3;"> not supported </span>|
|Chatter streams|<span style="background: #FFD3D3;"> not supported </span>|
|Post Pinning|Mattermost|
|Consolidated Publisher|<span style="background: #FFD3D3;"> not supported </span>|
|Question Publisher|<span style="background: #FFD3D3;"> not supported </span>|
|Feed recommendations|<span style="background: #FFD3D3;"> not supported </span>|
|Feed refresh|<span style="background: #FFD3D3;"> not supported </span>|
|In-app notifications|can be accomplished with our mattermost integration|
|Share a Post with a Group|Acievable with Mattermost integration?  WIP|
|Group and Profile banners|Acievable with Mattermost integration?  WIP|
|Manage Members with Ease|Acievable with Mattermost integration?  WIP|
|Filter Groups to Show Unread Posts|Acievable with Mattermost integration?  WIP|
|Filter a Profile to See a User’s Posts|Acievable with Mattermost integration?  WIP|
|See Group Email Notifications on the Group Page|Acievable with Mattermost integration?  WIP|
|Get Group Info (and Even Join) in the Tile View|Acievable with Mattermost integration?  WIP|
|Group setup|Acievable with Mattermost integration?  WIP|
|Account and Contact Management|<span style="background: #CEFFC5;"> supported </span>|
|Opportunity Management|<span style="background: #CEFFC5;"> supported </span>|
|Lead Management|<span style="background: #CEFFC5;"> supported </span>|
|Sales Data|<span style="background: #CEFFC5;"> supported </span>|
|Mobile|supported. Limited|
|Workflow and Approvals|<span style="background: #CEFFC5;"> supported </span>|
|Files Sync and Share|<span style="background: #FFD3D3;"> not supported </span>|
|Reports and Dashboards|limited. We recommend external tools, metabase, superset, redash or similar|
|Sales Forecasting|<span style="background: #CEFFC5;"> supported </span>|
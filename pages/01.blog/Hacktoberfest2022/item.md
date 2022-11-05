---
published: true
title: Hacktoberfest 2022
date: 2022/11/06 02:58
metadata:
    description: 'Participating in Hacktoberfest 2022.'
    keywords: 'opensource, projects, statistics'
    author: 'Joe Bordes'
header_image_file: Hacktoberfest2022.png
header_image_height: 270
header_image_width: 550
taxonomy:
    category: blog
    tag: [2022, statistics]
---

Hacktoberfest 2022 and coreBOS.

===

This year, as the previous ones, I tried to create the four Pull Requests on projects different than coreBOS. So I started out the first weekend of October searching in GitHub and flipping through hundreds of open source projects to see which ones I could help. I found some interesting projects which I ended up adding to my [tiddlywiki](https://tiddlywiki.com/) for future reference and did **six pull requests**. Three of them were in supported Hacktoberfest repositories and three were in repositories that were not participating but I had some interest in.

I dedicated about 30 minutes to [Mautic](https://www.mautic.org/) documentation. I had in mind to create one or more pull requests in that project but it turned out that I had to learn how to work with [Read the Docs](https://readthedocs.org/) and I saw that the new documentation project was still in an early phase so it would take me more time than I wanted to dedicate. Note that I am totally aligned with the work of Read/Write the Docs, I believe in what they are doing, I just couldn't do that now.

While reading the many interesting open source projects out there, none really catched my attention enough to dedicate significant time to, so I started thinking that I should pickup one or more of those coreBOS tasks that we have in our endless to-do list, which, I know, we will never get to and do those. As I read the different projects and implemented the six pull requests, this idea got stronger until I landed on the [Hi-Folks/statistics](https://github.com/Hi-Folks/statistics) project.

**HiFolks/statistics** is a PHP package that provides functions for calculating mathematical statistics of numeric data. It is like the library PHP needs to get closer to Python. I liked it as soon as I saw it. My mind related it to the workflow system where we could add it to make many calculations with the data saved inside coreBOS. I put it in the back of my mind and continued scanning. Shortly after, with three pull requests already accepted, I decided to dedicate the rest of my time for Hacktoberfest to include the statistics library into the workflow system as my fourth pull request.

Some days later, coreBOS had support for a rich set of statistical calculations on data in the workflow system. Since many parts of the application support the workflow engine, we can use those calculations in all of those places. I recorded a video presentation of the functionality.

[plugin:youtube](https://youtu.be/BgIb8J3pxuI)

I want to thank [Digital Ocean](https://www.digitalocean.com/), and all the supporters and participants in Hacktoberfest for this awesome event.

By the way, by the time I finished implementing the coreBOS enhancement one of the three pull requests in the non-participating projects was accepted, so the statistics enhancement was not officially my fourth pull request, but I still count it as a hacktoberfest effort.

**<span style="font-size:large">See you again next year!</span>**

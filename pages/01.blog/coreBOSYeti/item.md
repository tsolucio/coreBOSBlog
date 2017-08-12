---
title: coreBOS & YetiForce
date: 2017/08/12 13:58
metadata:
    description: 'coreBOS YetiForce collaboration.'
    keywords: 'CRM, vtiger, opensource, corebos, YetiForce'
    author: 'Joe Bordes'
header_image_file: corebosyetiforce.png
header_image_height: 162
header_image_width: 378
taxonomy:
    category: blog
    tag: [waste of time]
---

A few days ago [I was incorrectly asked if PDFMaker worked in YetiForce](https://github.com/YetiForceCompany/YetiForceCRM/issues/4774)<sup>1</sup>. I answered politely that I didn't know and stated the fact that PDFMaker does work correctly with coreBOS. This was all that was needed to get attacked, once again, from the leader of YetiForce.

===

Normally, I just ignore this person because he is obnoxious and disrespectful and discredits himself every time he posts something. But, these offensive comments also reach many others that may take them seriously, as he does talk as if he was in possession of the absolute truth. As if that wasn't enough, he goes and escalates the nonsense [posting another issue](https://github.com/YetiForceCompany/YetiForceCRM/issues/4806)<sup>2</sup> asking me to make public my position towards a collaboration between coreBOS and YetiForce.

He already knows my position as we have spoken about this in the past. Personally, I think there is no need to say what I try to convey in the rest of this post, and I really encourage you to stop reading now and go do something much more fruitful like banging your head against the wall.

![keep calm and bang your head](bang-your-head-syndrome.png?resize=400,200)

 !! Ok, so you decided to keep on reading, take the rest of the post for what it is worth, which isn't much. I will try to be brief.

Every time I read one of the comments of this person, I can't help thinking what a terrible person he is, so much hate and aggressiveness. He thinks that the only way to make his product shine is criticizing how bad everyone else is doing it. It seems his product can't shine on its own. It is a well-known formula of many TV shows that put an "_inferior clown_" next to the star to make them shine more.

![disney effect](disneyformula.jpg)

You can see this almost everywhere he posts, just making noise and filling the internet with junk, as if there wasn't enough junk already!

 !! Let's get to the case.

I have consistently ignored your attacks to coreBOS and mainly plan to do the same, you discredit yourself alone, you don't need me to help you with that and I have better things to do, but I would like to call your attention to a few things that affect coreBOS and what others may think of our product.

#### Goals

You have no idea what our goals for coreBOS are nor all the work and enhancements that we have done to accomplish that goal, much as I have no idea what your goals are and what you are doing to accomplish them, so stop saying that we haven't done anything, that **simply is not true** (like most of the things you say about others). You have no idea, believe me, I can say the same about coreBOS that you say about Yeti:

 !!!! "It’s incredible how much we changed in the system in such a short time"
 
our focus and goals are not the same as yours, so you can't measure our effort with your rules. Concentrate on your product and giving service to your clients and community members and stop wasting our time with your unwanted hype.

#### Security

You constantly throw this idea around making a fool of yourself to those of us who know how it works. You are a very intelligent person, so I'm sure you know what I am going to explain next, which leads me to conclude that you are saying all that simply as your strategy to call attention to your product, misleading all the people who do not really know **you are lying to them**.

Please learn to read and understand your code and the tools you use to measure it. SensioLabs is good, but not that good. It is an automated software that is trying to do what only a professional programmer can do. Personally, I don't like the results of SensioLabs software, it gives too many false positives.
Look at some pieces of code from the latest SensioLabs report:


**Database queries should use parameter binding**
```
in build/changeSets/2017/syncSeactivityRelWithAllRelIdOnCbCalendar.php, line 37
//Insert into seactivity rel
if($rel_id != '' && $rel_id != '0') {
	$res_rel = $adb->pquery('SELECT * FROM vtiger_seactivityrel WHERE activityid = ?',array($activityid));
	if($adb->num_rows($res_rel) > 0) {
		$adb->pquery('UPDATE vtiger_seactivityrel SET crmid = ? WHERE activityid = ?',array($rel_id,$activityid));
		$this->sendMsg('UPDATE RELATION ACTIVITYID: '.$activityid.' WITH REL_ID: '.$rel_id);
	} else {
		$adb->pquery('insert into vtiger_seactivityrel(crmid,activityid) values(?,?)',array($rel_id,$activityid));
		$this->sendMsg('ADD RELATION ACTIVITYID: '.$activityid.' WITH REL_ID: '.$rel_id);
//>> If provided by the user, the value of $activityid may allow an SQL
//>> injection attack. Avoid concatenating parameters to SQL query strings,
//>> and use parameter binding instead.
	}
} elseif ($rel_id=='' || $rel_id=='0') {
```

$activityid and $rel_id are coming from two SQL queries straight from the database, they are almost constants, so SensioLabs should see that and not bother me with this, but it is even worse: sendMSG is **NOT** a database call, it is a simple output method!! Not only is this a false positive it is ridiculous to even waste my programming time looking at it when the software can do that for me.

I counted **31 false positives** more before getting to one that I had to look into. That is a **LOT** of noise, both for the analyst who has to read the report and for those who are just looking at the numbers. By the way, the one I looked into was another false positive.

**Logical operators should be avoided**
```
in include/RelatedListView.php, line 39
function GetRelatedListBase($module,$relatedmodule,$focus,$query,$button,$returnset,$id='',$edit_val='',$del_val='',$skipActions=false)
{
	$log = LoggerManager::getLogger('account_list');
	$log->debug("Entering GetRelatedList(".$module.",".$relatedmodule.",".get_class($focus).",".$query.",".$button.",".$returnset.",".$edit_val.",".$del_val.") method ...");
	global $GetRelatedList_ReturnOnlyQuery;
	if (isset($GetRelatedList_ReturnOnlyQuery) and $GetRelatedList_ReturnOnlyQuery) return array('query'=>$query);
//>> The and operator does not have the same precedence as &&.
//>> This could lead to unexpected behavior, use && instead.
	require_once('Smarty_setup.php');
	require_once("data/Tracker.php");
	require_once('include/database/PearDatabase.php');
	global $adb, $app_strings, $current_language;
```

This is a good catch which could produce unexpected behavior but it is not the case inside and "if". Without entering programming discussions the thing is that this is also a false positive and there are 91 of those in the report. These could be avoided by the SensioLabs software.

There are 28 reports on the incorrect use of "exit". 21 are used in command line tools that must return the exit code following unix standards. SensioLabs doesn't know that these scripts can only be used on the command line, so it isn't their fault, but we, as readers of the report must understand the output and give it the importance it has, no more. By the way, there are 6 more "exit" which are in code that is there simply for historical reference and will never be used and the last one is included in the Smarty library.

We could continue, but I have better things to spend my time on and I think you get the idea:

SensioLabs is _just_ a statistical report made by a machine, you have to study and understand the report to be able to talk about it, not just throw comments around to scare people.

 !!!! **NOTE** that I am **not** saying that coreBOS does not have security issues. It does, and it also has a lot of bugs. I **AM** saying that you have to read and understand the tools you use and be VERY critical about what you read and see.

So what I understand when you start throwing images around is that you actually have no idea of your code nor how to use this tool which is so important for you. So don't give it so much ostentation, our software is most probably just as insecure and full of bugs as yours is, in fact I know of a lot of them that are in your code as I'm sure you know a lot that are in mine.

By the way, we use [RIPS](https://www.ripstech.com/) for security, it is a much more intelligent tool than SensioLabs, and doesn't bother us with so many false positives, and, **yes, we do security audits regularly** and don't go bragging about it every time we make a comment.

 !!!! We prefer to spend our time helping our users.

#### Questions and Answers

To answer some of your questions:

##### When will you put Sensiolabs in order, because it shows a bit low quality of coreBOS after leaving Vtiger.

Never. It is a just statistical report we don't use to measure or goals. We take security very seriously and we dedicate a lot of time to security and functionality to accomplish our goals. Don't be mistaken about this. Your accusations are simply not true. Study your code and get more knowledge before opening your mouth.

##### When will you fix basic security for headers

Rest assured we will get to it. Thanks for helping out.

##### When will you fix dozens of SQL injection errors, XSS, and when will you start following the basic safety rules recommended by OWASP for example?

Constantly. This is a non-ending task and as I tried to explain above, there aren't that many in our code. In fact, I am sure there are VERY little, albeit what Sensiolabs says.

##### Has coreBOS ever undergone any security audits?

Yes, regularly. Much to your surprise, I am sure. As I said before, you have no idea what we are doing nor what you are talking about.

##### What would YetiForce have to do/change/add/rebuild for coreBOS to consider cooperation?

There is nothing you can do for this to happen. I'm sorry, but it is you.

##### It probably impossible, because we both think our own product is better, and I don’t think I can be convinced that coreBOS is better.. because it’s not :D.

This is what makes us so different: I don't think my product is better than yours or that yours is better than mine. The way I see it, each has different goals, each its own weaknesses and strong points, each has its own market segment. I am not looking for world domination like you are, **I am doing my best to help my clients and the users of coreBOS to do their business and make the world a better place**. I am a win-win person while you are a win-lose person.

 !!!! It is impossible for us to work together, never gonna happen.

#### Ending notes.

I tried to be as respectful and brief as possible and did this for the many people that may be reading your nonsense and think that my silence gives consent, which is not the case, I ignore you because it is pathetic.

You will never imagine how much it hurts me to have spent so much time on this port instead of on important things I have to do. It is a total waste of our time.

Stop criticizing and start being constructive, concentrate on your goals and converting YetiForce into the ultimate software nobody but me will be able to live without. In the mean time I will be here helping people do their business and help others.

 !!! **<span style="font-size:large">I really wish you the best with your project.</span>**

I would appreciate we finish our relation here, just go on with your life and I will go on with mine. I will do my best to ignore your response to this post :-)

![good bye](goodbye.jpg?resize=350)

#### References
 - ![Yetiforce Issue 4774](YetiforceIssue4774.pdf?link&display=text) (1)
 - ![Yetiforce Issue 4806](YetiForceIssue4806.pdf?link&display=text) (2)

 
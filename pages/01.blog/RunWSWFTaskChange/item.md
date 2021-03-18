---
title: Run Web Service Workflow Task Change
date: 2021/03/18 11:08
metadata:
    description: 'Learn how a breaking change in the run web service workflow task may affect you.'
    keywords: 'CRM, vtiger, opensource, corebos, workflow, webservice, blog'
    author: 'Joe Bordes'
header_image_file: sendreceiveinformation.jpg
header_image_width: 479
header_image_height: 184
taxonomy:
    category: blog
    tag: [workflow, webservice, 2021]
---

Those of you that follow coreBOS know that we rarely introduce breaking changes, but in the next blog post, I will explain one that we had to introduce to make the [Run Web Service workflow task](../RunWSWFTask) much more flexible.

===

The [Run Web Service workflow task](../RunWSWFTask) is one of those tasks that has surprised me, I see it being used as a powerful integration mechanism in an ever more connected and service-based world.

In the first version of this task, the response of the call was processed before returning it to the next tasks in the workflow. We JSON encoded the response and then stripped out all the slashes and quotes, effectively breaking the JSON object. We did this because the workflow system didn't have any way to work with the JSON object nor PHP arrays.

Due to the increment in the usage of this workflow task and the need to process complex responses from other systems we added JSON and Array processing capabilities into the workflow system. We now have workflow expression functions that can JSON encode and decode and other functions that work with PHP arrays, so we have modified the Run Web Service workflow task to return the response it gets with no processing (or very little) and delegates the processing to the next steps in the workflow.

Let's see what that means with an example. Let's suppose we have this response from a web service call:

``` PHP
$a = [
	'one' => array(1,2),
	'two' => 'path/to/file',
	'three' => 'back\\slash',
	'four' => array(
		'sub_one' => array(3, 4),
		'sub_two' => 'some value',
	),
];
```

We have an array with 4 elements, the first and fourth are themselves arrays with further levels of nesting. Before the breaking change this was processed and returned with this result:

`{one:[1,2],two:path  to  file,three:back  slash,four:{sub_one:[3,4],sub_two:some value}}`

while the valid JSON of that would be:

`{"one":[1,2],"two":"path\/to\/file","three":"back\\slash","four":{"sub_one":[3,4],"sub_two":"some value"}}`

Now, if you configured the task to return the whole response you will get this second version, a correct JSON encoded string which you can process using the workflow expression language as an object.

But we have also added the possibility for you to traverse the object and retrieve any element in the structure. For example, if we wanted to access the second element in the array of the first element (one), we would use this syntax:

`one.1`

where "one" is the index of the array from the response, and the "1" is the index of the array contained inside the "one" element (0 based). Not sure that is very clear, so let's do another one with the fourth element of the response:

`four.sub_one.1`

that will return "4", and

`four.sub_two`

will return "some value"

I am going to leave here a small script I created to test all of this and make sure I got it right.

``` php
<?php
require_once 'modules/com_vtiger_workflow/expression_functions/application.php';
$a = [
	'one' => array(1,2),
	'two' => 'path/to/file',
	'three' => 'back\\slash',
	'four' => array(
		'sub_one' => array(3, 4),
		'sub_two' => 'some value',
	),
];
$j = json_encode($a);
var_dump($a, $j);
$r2 = str_replace(array('"','/','\\'), array('',' ',' '), $j);
echo $r2."\n";
echo __cb_getfromcontextvalueinarrayobject($a, 'two')."\n";
echo __cb_getfromcontextvalueinarrayobject($a, 'three')."\n";
var_dump(__cb_getfromcontextvalueinarrayobject($a, 'four')); // this returns an array so I dump it
echo __cb_getfromcontextvalueinarrayobject($a, 'four.sub_one.1')."\n";
echo __cb_getfromcontextvalueinarrayobject($a, 'four.sub_two')."\n";
```

the result of that is

``` shell
array(4) {
  'one' => array(2) {
    [0] => int(1)
    [1] => int(2)
  }
  'two' => string(12) "path/to/file"
  'three' => string(10) "back\slash"
  'four' => array(2) {
    'sub_one' => array(2) {
      [0] => int(3)
      [1] => int(4)
    }
    'sub_two' => string(10) "some value"
  }
}

string(106) "{"one":[1,2],"two":"path\/to\/file","three":"back\\slash","four":{"sub_one":[3,4],"sub_two":"some value"}}"

{one:[1,2],two:path  to  file,three:back  slash,four:{sub_one:[3,4],sub_two:some value}}

path/to/file

back\slash

array(2) {
  'sub_one' => array(2) {
    [0] => int(3)
    [1] => int(4)
  }
  'sub_two' => string(10) "some value"
}

4

some value
```


**<span style="font-size:large">Contact me for any help you may need!</span>**

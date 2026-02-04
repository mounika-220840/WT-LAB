<?php

//string
$name="mounika ruppa";
echo "hi $name <br>";

//integer
$num=55;
echo "number=$num <br>";

//float
$value=123.5647;
echo "float value:$value <br>";

//Boolean
$val=True;
echo "boolean:";
var_dump($val);
echo "<br>";

//array
$stu=array("name","class","id no","branch");
echo "values:";
print_r($stu);
echo "<br>";


//task 2:
//local scope
function local_scope()
{
    $var="i am mounika";
    echo "$var <br>";
}
local_scope();

//global scope
 $msg="i am 18 years old";
function global_scope(){
    global $msg;
    echo "$msg <br>";
}
global_scope();
//static scope

function static_scope(){
    static $val="someting came up";
echo "$val <br>";
}
static_scope();

//task 3:

?>
<?php

$post = filter_input_array(INPUT_POST);
/*
switch (true)
{
  case (false === $post):
    echo 'POST is false!';
    break;
  case (null === $post):
    echo 'POST is NULL!';
    print_r($_POST);
    break;
  case (!empty($_POST)):
    print_r($_POST);
    break;
  default:
    echo 'WTF?!?!?!';
}
*/
//echo "You said '{$post['say']}'";
//print_r($post);
print_r($_POST);
?>
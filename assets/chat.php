<?php
header('Content-type: application/json');
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
$response = $post['say'];
$out = array('botsay' => "You said, '$response'.", 'botName' => 'TestBot');
echo json_encode($out);


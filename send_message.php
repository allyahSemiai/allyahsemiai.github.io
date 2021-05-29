<?php 

require_once 'class_dataBase.php';
require_once 'class_contact_send_message.php';

$response=json_decode($_POST['response'], false);
$name=$response->name;
$email=$response->email;
$subject=$response->subject;
$message=$response->message;
if(!empty($response)){
    /*$contact= new contact();*/
    /*$message=$contact->create_contact($name, $email, $subject,$message);*/ //require database
    $message=json_encode("thanks for your mail, I'll respond you as soon as possible");
    echo $message;
}else{
    $message=json_encode("you must fill all of the fields");
    echo $message;
}

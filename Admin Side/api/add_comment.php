<?php

header('Conten-Type: application/json');
header('Access-Control-Allow-Origin: *');
        

$connect = new PDO('mysql:host=localhost;dbname=id18018970_soil_compatibility_db', 'id18018970_sc_db', 'Negative098*');

$error = '';
$comment_name = '';
$comment_content = '';
date_default_timezone_set('Asia/Singapore');

if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $c_name = $_POST["comment_name"];
 $comment_name = strtolower($c_name);
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Message is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
 $date = date("Y-m-d");
 $time = date('h:i A');
}

if($error == '')
{
 $query = "
 INSERT INTO sc_community_post 
 (parent_comment_id, comment, comment_sender_name, date, time) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name, :date, :time)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name,
   ':date' => $date,
   ':time' => $time
  )
 );
 $error = '<label class="text-success">Message Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>

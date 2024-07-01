<?php

header('Conten-Type: application/json');
header('Access-Control-Allow-Origin: *');

$connect = new PDO('mysql:host=localhost;dbname=id18018970_soil_compatibility_db', 'id18018970_sc_db', 'Negative098*');

$query = "
SELECT * FROM sc_community_post 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

date_default_timezone_set('Asia/Singapore');
$statement = $connect->prepare($query);
$statement->execute();


$result = $statement->fetchAll();
$output = '';
$current = date("Y-m-d");
$yesterday = date("Y-m-d", strtotime("yesterday"));

foreach($result as $row)
{
    if($row["date"]==$current)
    {
        $date = "Today";
    }
    else if($row["date"]==$yesterday)
    {
        $date = "Yesterday";
    }
    else
    {
        $date = $row["date"];
    }
    if($row["comment_sender_name"]=="feric" or $row["comment_sender_name"]=="mandi"){
        $name = '<i style="font-size:13px; color:#0370ff;" class="material-icons nav__icon">verified_user</i><font color="#5c5c5c">'.$row["comment_sender_name"].'</font>';
    }
    else
    {
       $name = '<font color="#5c5c5c">'.$row["comment_sender_name"].'</font>'; 
    }
 $output .= '
 <div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width: 100%;border-radius: 10px;background: #f2d12c;">
 <div style=" margin: 10px;" class="panel panel-default">
  <div class="panel-heading"><b style="text-transform:uppercase;">'.$name.'</b>
  
  ·<i style="font-size: 15px;">
  '.$date.'&nbsp;at '.$row["time"].'</i><br></div>
  <div style="color: green; margin-top: 10px;" class="panel-body"><b>'.$row["comment"].'</b></div>
  <div class="panel-footer" align="right"><a class="btn reply" id="'.$row["comment_id"].'"><u>Reply</u></a><hr></div>
   
 </div>
 </div>
 ';
 $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
 $query = "
 SELECT * FROM sc_community_post WHERE parent_comment_id = '".$parent_id."'
 ";
 $output = '';
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $count = $statement->rowCount();
 if($parent_id == 0)
 {
  $marginleft = 0;
 }
 else
 {
  $marginleft = $marginleft + 48;
 }
 if($count > 0)
 {
  foreach($result as $row)
  {
    $current1 = date("Y-m-d");
    $yesterday1 = date("Y-m-d", strtotime("yesterday"));
    
    if($row["date"]==$current1)
    {
        $date1 = "Today";
    }
    else if($row["date"]==$yesterday1)
    {
        $date1 = "Yesterday";
    }
    else
    {
        $date1 = $row["date"];
    }
    
    if($row["comment_sender_name"]=="feric" or $row["comment_sender_name"]=="mandi"){
        $name = '<i style="font-size:13px; color:#0370ff;" class="material-icons nav__icon">verified_user</i><font color="#5c5c5c">'.$row["comment_sender_name"].'</font>';
    }
    else
    {
       $name = '<font color="#5c5c5c">'.$row["comment_sender_name"].'</font>'; 
    }
    
    
    
   $output .= '

   <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
    <div class="panel-heading"><i class="material-icons nav__icon">subdirectory_arrow_right</i>
    Replied from <b style="text-transform:uppercase;">'.$name.'</b> <br> <i style="font-size: 12px; margin-left: 27px;">'.$date1.' at '.$row["time"].'</i><br></div>
    
    <div style="color:black; margin-left: 27px; margin-top: 10px;" class="panel-body">'.$row["comment"].'</div>
   </div><hr style="margin-left:'.$marginleft.'px">
   ';
   $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
  }
 }
 return $output;
}

?>
<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if(($name == "") && ($email == "") && ($message == "")){
            echo "0";
        }else{
        
        $email_from = "Soil Compatibility ".$email;
        $email_subject = "New Message";
        $email_body = "$message\n"."\n\n\n-$name";
                        
        $to = "feric.decenan.official@gmail.com";
        
        $headers ="From: $email_from \r\n";
        
        $headers .="Reply-To: $email \r\n";
        
        mail($to,$email_subject,$email_body,$headers);
        
        echo "1";
        }
    
    
    }else{
        echo "0";
    }



?>

<?php

$to_email = "pallaviharinkhede1718@gmail.com";
$subject = "Simple email test via php";
$body="Hi,This is test email send by PHP Script in 2022 from youtube";
$headers = "From: harinkhedepalak41@gmail.com";

if(mail($to_email,$subject,$body,$headers)) {
    echo "Email successfully sent $to_email...";
} else {
    echo "Email sending failed...";
}

?>
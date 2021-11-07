<?php 
    namespace Models;

     class Email{

        public static function SendMail($to, $subject, $msg){
            $header = "FROM: noreply@myjob.com";
            mail($to,$subject, $msg, $header);
        }
    }

?>
<?php 
  class Encryptar {

 
   function encrypt_($message, $encode = false)
    {
        
            return base64_encode($message);
       //MTIzNDU2
    }

     
   function decrypt_($message, $encoded = false)
    {
   
         $message = base64_decode($message, true);
     

        return $message;
    }


    function encrypt_md5($var)
    {
     return md5($var);
    }
}
 ?>
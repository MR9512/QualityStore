<?php 
   session_start();
   $folder_path = dirname($_SERVER["SCRIPT_NAME"]);
   $URL_path = $_SERVER["REQUEST_URI"];
   $URL=substr($URL_path, strlen($folder_path));

   define("URL", $URL);
   define("URLSYS","http://192.168.100.55/QualityStore/");
   define("URLIMG","C:/xampp/htdocs/QualityStore/img/");
?>
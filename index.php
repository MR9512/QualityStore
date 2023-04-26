<?php 

   require_once("Config/config.php");
   require_once("Router/router.php");

   $router = new Router();
   $router->run();

?>
<?php

session_start();
unset ( $_SESSION["session_id"] );
unset ( $_SESSION["admin_user"]);
header("Location: ./");	

?>
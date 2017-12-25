<?php
session_start();
//users
include_once("DAL/customer.php");
include_once("DAL/securityuser.php");
include_once("DAL/role.php");
/*
//item
include_once("DAL/item.php");
include_once("DAL/itemtype.php");
include_once("DAL/itemstatustype.php");

//cart
include_once("DAL/cart.php");
include_once("DAL/cartstatustype.php");
include_once("DAL/cartitem.php");
include_once("DAL/onlinecart.php");

//blog
include_once("DAL/blog.php");
include_once("DAL/blogcategory.php");
include_once("DAL/blogcomment.php");
include_once("DAL/blogcommentstatustype.php");
*/
//image
include_once("DAL/image.php");
include_once("DAL/imagecomment.php");
include_once("DAL/imagecommentstatustype.php");

//event
include_once("DAL/event.php");
include_once("DAL/eventtype.php");
include_once("DAL/eventcomment.php");
include_once("DAL/eventcommentstatustype.php");

//Utilities
include_once("Utilities/SessionManager.php");
include_once("Utilities/Authentication.php");
include_once("Utilities/Mailer.php");
?>
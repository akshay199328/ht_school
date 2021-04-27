<?php
error_reporting(E_ALL);
$db_host 		= "192.168.10.200"; # Database Host
$db_user 		= 'root'; # Database Username
$db_password 	= 'admin1234'; # Database Password
$db_name 		= 'billing'; # Database Name
define('APP_URL', 'http://192.168.10.201/workspace/sameer/billing'); # Application URL.
#Please include http and do not use trailing slash after the url. For example use in this format- http://www.example.com Or http://www.example.com/finance
$_app_stage = 'Live'; # Change Live to Dev to enable Debug

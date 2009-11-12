<?php
  $hostName= "localhost";
  $user = "root";
  $pass = "";
  $db = "eClinic";
  $link = mysql_connect( $hostName, $user, $pass );
  if ( ! $link )
  	die( "Couldn't connect to MySQL" );
  mysql_select_db( $db ) or die ( "Couldn't open $db: ".mysql_error() );

?>

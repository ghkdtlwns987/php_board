<?php
  session_start();
  if( isset( $_SESSION[ 'username' ] ) ) {
    $check = TRUE;
  }
?>
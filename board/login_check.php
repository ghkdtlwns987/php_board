<?php
  session_start();
  if( isset( $_SESSION[ 'id' ] ) ) {
    $check = TRUE;
  }
?>
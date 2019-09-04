<?php
  // Create Connection
  $conn = mysqli_connect("localhost", "root", "Happybird11.", "prodogmom");
  //check connection
  if(mysqli_connect_errno()){
    //connection failed
    echo 'Failed to connect to MySql '. mysqli_connect_errno();
  }
  ?>
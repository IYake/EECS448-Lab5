<?php

$_user = $_POST["user"];
var_dump($_user);
echo "stuff";












function getUserRows(){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");
  $query = "SELECT * FROM Users";
  if ($result = $mysqli->query($query)) {
      //includes row of column header
      $ct = mysqli_num_rows($result);
      return $ct;
      $result->free();
  } else {
    echo "Query failed: row count";
  }
  $mysqli->close();
}

function getUser($row_num){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
  $query = "SELECT * FROM Users LIMIT $row_num,1";
  if ($result = $mysqli->query($query)) {
      
      while ($row = $result->fetch_assoc()) {
          echo $row["user_id"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}
 ?>
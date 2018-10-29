<?php

//if form has been submitted
if ($_user = $_POST["user"]){
  echo "Displaying posts from " . "<b>" . $_user . "</b><br>";
  
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");
  $query = "SELECT content FROM Posts WHERE author_id='$_user'";
  
  if ($result = $mysqli->query($query)) {
      
      $postnum = 1;
      echo "<br>";
      while ($row = $result->fetch_assoc()) {
          echo "Post #" . $postnum . ": ";
          echo $row["content"];
          echo "<br><br>";
          $postnum++;
      }
      $result->free();
  } else {
    echo "User has no posts";
  }
    $mysqli->close();
}













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
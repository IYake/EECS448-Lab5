<?php 

$_submit = $_POST["submit"];
if ($_submit == "submit"){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");
  $query = "SELECT post_id FROM Posts";
  if ($result = $mysqli->query($query)) {
      
    while ($row = $result->fetch_assoc()) {
        $id = $row["post_id"];
        
        //if checkbox is checked for that post_id name
        if ($_post = $_POST["$id"]){
           echo "post_id " . $id . " deleted<br>";
         }
    }
    
      $result->free();
  } else {
    echo "Query failed: looping through post ids";
  }
  $mysqli->close();
}


function getPostRows(){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");
  $query = "SELECT * FROM Posts";
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

function getPost($row_num){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
  $query = "SELECT * FROM Posts LIMIT $row_num,1";
  if ($result = $mysqli->query($query)) {
      
      while ($row = $result->fetch_assoc()) {
          echo $row["content"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}

function getAuthor($row_num){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
  $query = "SELECT * FROM Posts LIMIT $row_num,1";
  if ($result = $mysqli->query($query)) {
      
      while ($row = $result->fetch_assoc()) {
          echo $row["author_id"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}

function getPostID($row_num){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
  $query = "SELECT * FROM Posts LIMIT $row_num,1";
  if ($result = $mysqli->query($query)) {
      
      while ($row = $result->fetch_assoc()) {
          echo $row["post_id"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}
 ?>
<?php 
$_post = $_POST["post_id1_ex"];
echo $_post . "<br>";
if ($_post == "on"){
  echo "first post is checked";
}





echo getPostRows();


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
          echo $row["content"] . $row["author_id"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}
 ?>
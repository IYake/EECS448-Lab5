<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");
$query = "SELECT * FROM Users";
if ($result = $mysqli->query($query)) {
    //includes row of column header
    $ct = mysqli_num_rows($result);
    $result->free();
} else {
  echo "Query failed: row count";
}
$mysqli->close();
/*$mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}*/
/* MAKE THE USER_ID BE FOR USERNAMES CHARACTERS NOT AN AUTO INCREMENT INT**/
/*$query = "SELECT * FROM Users LIMIT 2,1";

echo "<table><tr><th>user_id</th></tr>";
if ($result = $mysqli->query($query)) {
    //includes row of column header
    $ct = mysqli_num_rows($result);
    echo "$ct" . "<br>";
    
    while ($row = $result->fetch_assoc()) {
        //printf ("%s\n", $row["user_id"]);
        $user_id = $row["user_id"];
        echo ("<tr><td>" . $user_id . "</td></tr>");
    }
     
    $result->free();
} else {
  echo "Query failed";
}
echo "</table>";*/

function getUser($row_num){
  $mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  
  $query = "SELECT * FROM Users LIMIT $row_num,1";
  if ($result = $mysqli->query($query)) {
      //includes row of column header
      $ct = mysqli_num_rows($result);
      
      while ($row = $result->fetch_assoc()) {
          //printf ("%s\n", $row["user_id"]);
          echo $row["user_id"];
      }
      $result->free();
  } else {
    echo "Query failed";
  }
  $mysqli->close();
}
/* close connection */
//$mysqli->close();
 ?>
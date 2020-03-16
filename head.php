<?php include("config.php");
$que="select * from manage_website";
$query=$con->query($que);
while($row=mysqli_fetch_array($query))
{
  extract($row);
}?> 
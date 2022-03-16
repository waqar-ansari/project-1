<!DOCTYPE html>
<html>
<head>

<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>   


    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
 Name:
  <input type="text" name="name"><br><br>
  id:
  <input type="text"  name="id"><br><br>
  Email:
  <input type="text" name="email"><br><br>
  Mobile number:
  <input type="text"  name="mobile"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>

    </p>
  </div>

</div>










<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'employee');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>







<?php

error_reporting(0);
$name=$_POST['name'];
$id=$_POST['id'];
$em=$_POST['email'];
$mn=$_POST['mobile'];

$query="insert into employee values('$id','$name','$em','$mn')";
$data=mysqli_query($link,$query);
?>










    <script>

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == myModal) {
    myModal.style.display = "none";
  }
}


// When the user clicks the button, open the modal 
myBtn.onclick = function() {
  myModal.style.display = "block";
}



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  myModal.style.display = "none";
}


</script>



<?php
error_reporting(0);
$query="select * from employee";
$data= mysqli_query($link,$query);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);

echo $result['name']. " ". $result['id']. " ".$result['email']. " ".$result['mobile number'];



?>


<table border="2">
  <tr>
    <th>Id</th>
    
    <th>Name</th>
    
    <th>Email</th>
    
    <th>Mobile number</th>
    <th>Update</th>
</tr>

<?php
$query="select * from employee";
$data= mysqli_query($link,$query);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);

if($total!=0)
{
  while($result=mysqli_fetch_assoc($data))
  {
    echo"
    <tr>
    <td>".$result['id']."</td>
    <td>".$result['name']."</td>
    <td>".$result['email']."</td>
    <td>".$result['mobile number']."</td>
    </tr>
    ";

  }
}
else{
  echo"no record found";
}
?>
</table>
</body>
</html>

<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'online_book_store';

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

$action = $_GET['action'];
if($action == 'loginAction'){
  loginAction($conn);
}else if($action == 'signupAction'){
  signupAction($conn);
}else if($action == 'deleteAccount'){
  deleteAccount($conn);
}


mysqli_close($conn);

function loginAction($conn){
  // Get the login data from the POST request
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM register WHERE userName='".$username."' AND password='".$password."' LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $_SESSION['is_login'] = 'YES';
      $_SESSION['fullName'] =$row['fullName'];
      $_SESSION['DOB'] =$row['DOB'];
      $_SESSION['phone'] =$row['phone'];
      $_SESSION['email'] =$row['email'];
      $_SESSION['address'] =$row['address'];
      $_SESSION['userName'] =$row['userName'];
      $_SESSION['id'] =$row['id'];
    }
    echo "<script>window.location.href = 'loginafter.php';</script>";
  } else {
    echo "<script>alert('Invalid username or password');window.location.href = 'login.html';</script>";
  }

}

function signupAction($conn){
  session_start();
  $funllName = $_POST['funllName'];
  $dob = $_POST['dob'];
  $phoneNumber = $_POST['phoneNumber'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $id = $_SESSION['id'];


  $sql = "UPDATE register SET fullName='".$funllName."', dob='".$dob."' ,phone='".$phoneNumber."',email='".$email."',address='".$address."'  WHERE id='".$id."'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['fullName'] =$funllName;
    $_SESSION['DOB'] =$dob;
    $_SESSION['phone'] =$phoneNumber;
    $_SESSION['email'] =$email;
    $_SESSION['address'] =$address;
    echo "<script>alert('You account details updated successfully');window.location.href = 'profile.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


}

function deleteAccount($conn){
  $id=$_GET['id'];
  $sql = "DELETE FROM register WHERE id='".$id."'";

  
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Account deleted successfully');window.location.href = 'login.html';</script>";
} else {
  echo "Error deleting record: " . $conn->error;
}
}

?>

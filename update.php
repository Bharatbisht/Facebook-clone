<?php
session_start();
if(isset($_SESSION['password'])){
    edit();
}else{
    header('location:index.php');
}

function edit(){
$Name=$_SESSION['Name'];
$Address=$_SESSION['Address'];
$Gender=$_SESSION['Gender'];
$Email=$_SESSION['Email'];
$DOB=$_SESSION['DOB'];
$password=$_SESSION['password'];
$Image=$_SESSION['Image'];
?>
<head>
    <style>
    td{
        padding: 10px;
      }
    </style>
</head>
<form method="POST" enctype="multipart/form-data">
    <table  width="50%" border="1">
        <tr>
            <td>Nameid:<input type="text" name="uname" value="<?php echo($Name); ?>" required></td>
            <td>Emailid:<input type="text" name="email" value="<?php echo($Email); ?>" required></td>
        </tr>
        <tr> 
                <td colspan="2" align="center">Gender:<input type="radio" name="gender" value="Male" required>Male
                   <input type="radio" name="gender" value="Female" required>Female
                   <input type="radio" name="gender" value="Others" required>Others</td>  
        </tr>
        
        <tr>
                <td>D.O.B:<input type="text" name="date" value="<?php echo($DOB); ?>" required></td> 
                <td>Address:<input type="text" name="address" value="<?php echo($Address); ?>" required></td>
        </tr>

        <tr>
                <td>Create Password:<input type="password" name="password" value="<?php echo($password); ?>" required></td>
                <td>Confirm Password:<input type="password" name="password" value="<?php echo($password); ?>" required></td>
        </tr>

        <tr>
            <td align="center" colspan="2"><input type="submit" name="submit" value="Edit"></td>
        </tr>
    </table>
</form>
<?php
if(isset($_POST['submit'])){

$loginid=$_SESSION['LoginId'];
$Name=$_POST['uname'];
$Email=$_POST['email'];
$Gender=$_POST['gender'];
$Address=$_POST['address'];
$DOB=$_POST['date'];
$Password=$_POST['password'];
include('connect.php');
$con=new Connect();
$query="UPDATE `fbtable` SET `Name`='$Name', `Email`='$Email', `Address`='$Address', `DOB`='$DOB', `Gender`='$Gender', `Password`='$password' WHERE `LoginId`='$loginid'";
$con->update($query);
}
}
?>
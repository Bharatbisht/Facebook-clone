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
            <td>Nameid:<input type="text" name="uname" required></td>
            <td>Emailid:<input type="text" name="email" required></td>
        </tr>
        <tr>
                <td>Gender:<input type="radio" name="gender" value="Male" required>Male
                   <input type="radio" name="gender" value="Female" required>Female
                   <input type="radio" name="gender" value="Others" required>Others</td>
                <td><input type="file" name="photo" value="upload" required></td>  
        </tr>
        
        <tr>
                <td>D.O.B:<input type="date" name="date" required></td>
                <td>Address:<input type="text" name="address" required></td>
        </tr>

        <tr>
                <td>Create Password:<input type="password" name="password" required></td>
                <td>Confirm Password:<input type="password" name="password" required></td>
        </tr>

        <tr>
            <td align="center" colspan="2"><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
</form>
<?php
include('connect.php');
if(isset($_POST['submit'])){
   session_start();
 $_SESSION['uname']=$_POST['uname'];
 $_SESSION['email']=$_POST['email'];
 $_SESSION['gender']=$_POST['gender'];
 $_SESSION['date']=$_POST['date'];
 $_SESSION['address']=$_POST['address'];
 $_SESSION['password']=$_POST['password'];
 $imagename=$_FILES['photo']['name'];
 $tempname=$_FILES['photo']['tmp_name'];
 $folder="images/".$imagename;
 $_SESSION['imagename']=$folder;
 move_uploaded_file($tempname,$folder);
 header('location:checkid');
}
?>
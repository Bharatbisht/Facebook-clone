<?php
include('connect.php');
session_start();
if(isset($_SESSION['password'])){

homepage();
post();
showpost();

}else {

    header('location:index.php');

}

function homepage(){
    $loginid=$_SESSION['LoginId'];
    $conn=new Connect();
    $query="SELECT * FROM `fbtable` WHERE LoginId='$loginid'";
    $data=$conn->select($query);
    ?>
    <form method="POST">
        <table border="1" width="60%">
    <tr><td rowspan="6"><img src="<?php echo $data['Image'];?>" width="300px" height="200px"/></td>  <td>Name = <?php echo $data['Name'] ?></td></tr>
    <tr>                                       <td>Address = <?php echo $data['Address'] ?></td></tr>
    <tr>                                       <td>Gender = <?php echo $data['Gender'] ?></td></tr>
    <tr>                                       <td>Email = <?php echo $data['Email'] ?></td></tr>
    <tr>                                           <td>D.O.B = <?php echo $data['DOB'] ?></td></tr>
    <tr>                                            <td><button type="submit" name="edit">Edit</button></td><td><button type="submit" name="logout">Logout</button></td></tr>
</table>
</form>
<?php
if(isset($_POST['edit'])){
$_SESSION['Name']=$data['Name'];
$_SESSION['Address']=$data['Address'];
$_SESSION['Gender']=$data['Gender'];
$_SESSION['Email']=$data['Email'];
$_SESSION['DOB']=$data['DOB'];

header('location:update.php');
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}
}

// function for upload post

function post(){?>
<form method="POST" enctype="multipart/form-data">
Post:<input type="file" name="image" placeholder="status">
<input type="submit" name="submit" value="POST">
<form><br/><br/>
<?php
if(isset($_POST['submit'])){
    $loginid=$_SESSION['LoginId'];
    $imagename=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $post="Post/".$imagename;
    move_uploaded_file($tempname,$post);
    $con=new Connect();
    $query="INSERT INTO `post` VALUES('$loginid','$post')";
    $con->post($query);
}   
}

function showpost(){
    $con=new Connect();
    $loginid=$_SESSION['LoginId'];
    $query="SELECT `Post` FROM `post` WHERE `LoginId`='$loginid'";
    $run=$con->selectpost($query);
    while($data=mysqli_fetch_assoc($run)){
        ?><img src="<?php echo $data['Post']; ?>" width="100px" height="100px"/><?php
    }
}
?>

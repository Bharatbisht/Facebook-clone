<form method="POST">
<table align="center" style="border: 1px solid black">
    <tr><td>Create LoginID</td></tr>
    <tr><td><input type="text" name="loginid"></td></tr>
    <tr><td><?php check();?></td></tr>
    <tr><td align="center"><input type="submit" name="submit"></td></tr>
</table>
</form>
<?php
function check(){
if(isset($_POST['submit'])){
$loginid=$_POST['loginid'];
include('connect.php');
$con=new Connect();
$query="SELECT `LoginId` FROM `fbtable` WHERE LoginId='$loginid'";
$data=$con->select($query);

if($data['LoginId']!=$loginid){
    session_start();
    $_SESSION['loginid']=$_POST['loginid'];
    header('location:insert.php');
}else{
    echo("name already exists");
}
}
}
?>
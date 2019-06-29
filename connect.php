<?php
class Connect{
    function select($query){
        $con=mysqli_connect("localhost","root","","facebook") or die(mysqli_error);
        $run=mysqli_query($con,$query);
        if($run){
        $data=mysqli_fetch_assoc($run);
        return $data;
        }
        mysqli_close($con);
    }

    function allselect(){
        $con=mysqli_connect("localhost","root","","facebook") or die(mysqli_error);
     $query="SELECT * FROM `fbtable`";
     $run=mysqli_query($con,$query);
     if($run){
         return $run;
     }
    }

function insert($query){

        $con=mysqli_connect("localhost","root","","facebook") or die(mysqli_error);
    if(mysqli_query($con,$query)){
    ?>
    <h1><?php echo("Congratulation data inserted");?></h1>
    <a href="index.php">Continue to Login</a>
    <?php
    }else {
        echo("error something went wrong");
    }
     mysqli_close($con);
}
 
function update($query){
  $con=mysqli_connect("localhost","root","","facebook");
  $run=mysqli_query($con,$query);
  if($run){
      header('location:home.php');
  }else{
      echo "something wrong here";
  }
}
 function post($query){
      $con=mysqli_connect("localhost","root","","facebook");
      $run=mysqli_query($con,$query);
      if($run){
          echo("Post uploaded");
      }else{
          echo("error!");
      }
  }

  function selectpost($query){
    $con=mysqli_connect("localhost","root","","facebook") or die(mysqli_error);
    $run=mysqli_query($con,$query);
    if($run){
    return $run;
    }
}
}
?>
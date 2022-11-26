<?php
include 'backend/db.php';
$presentStatus=-1;

if(isset($_POST['btn1']) || isset($_POST['btn2'])){
  $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
  if(isset($_POST['btn1'])){
  
    $presentStatus=1;


  }else{
   
    $presentStatus=0;
  }
  
  $query = "INSERT INTO details (firstname,lastname,gmail,`address`,`status`) VALUES('$fname','$lname','$email','$address','$presentStatus')";
  $res = mysqli_query($con,$query);
  
  
}





?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>sample project</title>
    <link rel="stylesheet" href="suchi.css">
  </head>
  <body>
    <div class="main">
      <div class="box left">
        <form class="form" action="index.php" method="post" >
          <div class="inputBox">
            <br>
            <div class='first' id='first'>
            <h2>Form</h2>
            <input type='text'  id='fn' class='input' name='fname' value='' placeholder='First Name' required>
            <input type='text' class='input' name='lname' value='' placeholder='Last Name' required>
            <input type='email' class='input' name='email' value='' placeholder='Email' required>
            <input type='text' class='input' name='address' value='' placeholder='Address' required>
            <input  type="button" class='input' id="btn" value="submit" onclick=vanish()>
            </div>
            <div class='second' id='second'>
            <input type='submit'   class='input width50'  name='btn1' value='Accept' >
            <input type='submit'  class='input width50' name='btn2' value='Reject' >
            </div>
            
            <br>
            <br>
          </div>
        </form>
      </div>
      <div class="box right">
        <div class="inputBox">
          <table border="1" cellspacing="0" cellpadding="10px" width="100%" class="table">
          
            <?php
            
            if($presentStatus==1){
              echo "
              <tr><td colspan=4>Accepted</td></tr>
              <tr>

              <td>First Name</td>
              <td>Last Name</td>
              <td>Email</td>
              <td>Address</td>
              </tr>";
              $query2="SELECT * FROM details WHERE `status`=1";
              $rows=mysqli_query($con,$query2);
              if(mysqli_num_rows($rows)>0){
                
                while($r=mysqli_fetch_assoc($rows)){
                  // print_r($r);
                  echo "<tr>
                  <td>".$r['firstname']."</td>
                  <td>".$r['lastname']."</td>
                  <td>".$r['gmail']."</td>
                  <td>".$r['address']."</td>
                  </tr>"; 

                }
                
              }
            }elseif ($presentStatus==0) {
              # code...
              echo "<tr><td colspan=4>Rejected</td></tr>
              <tr>

                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Address</td>
                </tr>";
              $query2="SELECT * FROM details WHERE `status`=0";
              $rows=mysqli_query($con,$query2);
              if(mysqli_num_rows($rows)>0){
                while($r=mysqli_fetch_assoc($rows)){
                  // print_r($r);
                  echo "<tr>
                  <td>".$r['firstname']."</td>
                  <td>".$r['lastname']."</td>
                  <td>".$r['gmail']."</td>
                  <td>".$r['address']."</td>
                  </tr>"; 

                }
              }
            }
            
            ?>
            
            
          </table>



        </div>
      </div>
    </div>
    <script type="text/javascript">

    function vanish(){
      document.getElementById('first').style.display="none";
      document.getElementById('second').style.display="block"; 
    }

    </script>

  </body>
</html>

<?php
  session_start();

?>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <link href="css/global.css" type="text/css" rel="stylesheet">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
  <?php
    include'dbcon.php';

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['pwd'];

        $email_search = "SELECT * FROM registeration where email='$email' ";;
        $query = mysqli_query($con,$email_search);

        $email_count = mysqli_num_rows($query);
        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['id']=$email_pass['id'];

            if($password === $db_pass){
              ?>
              <script>
                  location.replace("home.php");
              </script>
              
              <?php
            }else{?>
            
                <script> swal("Error", "password is incorrect", "error");

                  </script>
             <?php

            }
        }else{?>
            <script>swal("Error", "Invalid email", "error");</script>
           <?php

        }
    }
  
  ?>

  <div class="container-fluid bg">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- Form start -->
        
  <form class="form-container" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
     <h2 class="secret">Secret Diary</h2>
     <h4>Store Your thoght permnently and securly</h4>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <br>
  
    <button type="submit" name="login" class="btn btn-success btn-block">Log in </button>
    <br>
    <a href="index.php">sign up </a>
  </form>
         <!-- Form end -->
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
    
    </div>
  </div>
  </body>
</html>
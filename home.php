<?php
session_start();

if(!isset( $_SESSION['id'])){
    header('location:login.php');
}
?>
<html>
    <head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <link href="css/global.css" type="text/css" rel="stylesheet">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     </head>
    <body>
    <?php
       include'dbcon.php';
       if(isset($_POST['add'])){
        $info = mysqli_real_escape_string($con, $_POST['info']);
        $id = $_SESSION['id'];
            $update = "UPDATE registeration SET message='$info' WHERE id='$id'";
            $updatequery = mysqli_query($con,$update);
       }

    ?>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Secret Diary</a>
    </div>
  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <br><br>
    <div class="text">
    <label>Write Here</label>
    <textarea name="post_description" id="post_decription" rows="20" cols="50"></textarea>
    </div> 
     
     <div class="form-group">

      <input type="hidden" id="data" name="data"/>
     </div>
    
    </body>
</html>

<script>
$(document).ready(function(){
   function autosave()
   {
     var post_description = $('#post_decription').val();
     var post_id = <?php echo $_SESSION['id'];  ?>;
      if(post_description != ''){
        $.ajax({
          url:"save.php",
          method:"POST",
          data:{postDescription:post_description,postId:post_id},
          dataType:"text",
          success:function(data){
            if(data != ''){
              $('#data').val(data);
            }
          }
        });
      }
   }

   setInterval(() => {
     autosave();
   },5000);
});
</script>


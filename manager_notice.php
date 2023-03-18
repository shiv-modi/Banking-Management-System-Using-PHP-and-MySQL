<?php
session_start();
if(!isset($_SESSION['loginid'])){ header('location:manager_login.php');}
?>
<script type="text/javascript" language="javascript">
$previous=window.history.forward(1);
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
document.attachEvent("onkeydown", my_onkeydown_handler);
function my_onkeydown_handler()
{
switch (event.keyCode)
{
case 116 : // F5;
event.returnValue = false;
event.keyCode = 0;
window.status = "We have disabled F5";
break;
}
}
</script>
    <head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.scss"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>               
    

    <?php
  $con = new mysqli('localhost','root','','charusat_bank');
  $array = $con->query("select * from useraccounts  where useraccounts.id = '$_GET[id]'");
  $row = $array->fetch_assoc();
?>


<script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal').modal({backdrop: 'static', keyboard: false}) ;
    });

</script>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-whatever="@mdo" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Notice to <?php echo $row['name'] ?> </h5>
     
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
          <input type="hidden" name="userid" value="<?php echo $row['id'] ?>">
            <label for="recipient-name"  class="col-form-label">Recipient:</label>
            <input type="text" class="form-control"  value="<?php echo $row['name'] ?>"readonly>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" maxlength ="50" name="notice" required></textarea>
          </div>
      
      </div>
      <div class="modal-footer">
        <a href="manager_home.php" class="btn btn-secondary" >Close</a>
        <button type="submit"name="send"class="btn btn-primary">Send notice</button>
      </div>
 <?php
     if (isset($_POST['send']))
         {
           if ($con->query("insert into notice (notice,userid) values ('$_POST[notice]','$_POST[userid]')")) {
           echo "<div  class='alert alert-success'>Successfully send</div> ";
           echo "<div  class='alert '>Page Redirect in 3 Second</div> ";
           header('refresh:3; url=manager_home.php ');
           die();
           }else
           echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
         }
         
         ?>  

    </div>
  </div>
</div>
</form>
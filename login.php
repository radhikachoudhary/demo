<?php 
session_start();
include('header.php');
?>
</body>
<div class="container">
  <div class="col-md-offset-4 col-md-3 login-display">
    <div class="error-msg">
      <?php 
      if(isset($_GET['error']) && $_GET['error'] != ""){ ?>
       <div class="alert alert-danger">
        <strong><?php echo $_SESSION['msg']; ?>
      </div>
      <?php }
      ?>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading"><strong>Login</strong></div>
      <div class="panel-body">
       <form class="form-horizontal form-style" action="action.php" method="post">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">          
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
        </div>
        <input type="hidden" name="confirm"  value="login"> 
        <div class="form-group">        
          <div class="col-sm-offset-3 col-sm-6">
            <input type="submit" name="login" class="btn btn-block btn-success" value="Login">
          </div>
        </div>
      </form>
    </div>
    <div class="panel-footer">Don't have an account?<a href="#">Sign Up</a>
    </div>
  </div>
</div>
</body>

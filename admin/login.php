<?php 
  session_start();
  include_once('../includes/dbconnect.php');
  
  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $userRole = $_POST['user_role'];

    $query = $conn->query("SELECT `account_id` FROM `admins` WHERE `username` = '$username' AND `password` = '$password' AND `user_role` = '$userRole'");
    $rowCount = mysqli_num_rows($query);
    if($rowCount === 1){
      while($row = mysqli_fetch_array($query)){
        $_SESSION['account_id'] = $row['account_id'];
      }
      $id = $_SESSION['account_id'];
      $queryUpdate = $conn->query("INSERT INTO `admin_log` (`admin_id`, `activities`, `activity_time`)
       VALUES ('$id', 'login', current_timestamp())");
      
      echo"
      <script>window.location.href='index.php'</script>
    ";
    }else {
      echo"
      <script>alert('Wrong Username Or Password')</script>
    ";
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo" style="width:100px">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label for="InputEmail">Username</label>
                  <input type="text" name="username" class="form-control form-control-lg" id="InputEmail" placeholder="Username">
                </div>

                <div class="form-group">
                  <label for="InputPassword">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" id="InputPassword" placeholder="Password">
                </div>

                <div class="form-group">
                <label for="InputPassword">User's Role</label>
                  <select name="user_role" id="" class="form-control">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="owner">Owner</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                  </select>
                </div>

                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Sign in</button>

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
               
               
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

<?php   
  session_start();
  include_once('../includes/dbconnect.php');

  $error_message = "";
  if(isset($_POST['register'])) {
    $username = $_POST['username'];
    if(empty($username)){
      $error_message = "Username must not be empty";
    }
    $email = $_POST['email'];
    if(empty($username)){
      $error_message = "Email must not be empty";
    }

    $imgFormat = ['jpg', 'jpeg', 'png', 'gif'];
    if($_FILES['user_img']['name']){

        $file_name = $_FILES['user_img']['name'];
        $file_size = $_FILES['user_img']['size'];
        $file_tmp = $_FILES['user_img']['tmp_name'];
        
        $target_dir = "../imgUpload/.$file_name";
        $target_file_name = 'imgUpload/'.$file_name;
        // Get file format
        $file_format = explode('.', $file_name);
        $file_format = strtolower(end($file_format));

        if(!in_array($file_format, $imgFormat)) {
            $error_message = "Invalid Image type";
        }
    
    }else {
        $error_message = "Profile Image required";
    }
    
    $userState = $_POST['user_state'];
    if(empty($username)){
      $error_message = "User state must not be empty";
    }
    $userRole = $_POST['user_role'];
    if(empty($username)){
      $error_message = "User role must not be empty";
    }
    $password = md5($_POST['password']);
    if(empty($username)){
      $error_message = "Password must not be empty";
    }


    if(empty($error_message)) {
      if(move_uploaded_file($file_tmp, $file_format)) {
        $queryInserted = $conn->query("INSERT INTO `admins` (`username`, `password`, `email`, `user_img`, `user_state`, `user_role`)
        VALUES ('$username', '$password', '$email', '$target_file_name', '$userState', '$userRole') ");

        if($queryInserted) {
          echo "
            <script>alert('Account created successful');window.location.href='login.php'</script>
          ";
        }else {
          echo "
            <script>alert('Please create an account')</script>
          ";
        }
      }
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
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
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
                <img src="./images/logo.svg" alt="logo">
              </div>
              <form class="pt-3" method="post" enctype="multipart/form-data">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light"> Add new Admins</h6>
                    <h6 class="font-weight-light"><?=$error_message?></h6>
                  </div>
                  <div class="brand-logo">
                    <!-- <img src="../Img/cut-in-a-moment-rotRaep7gpY-unsplash.jpg" class="image-fluid  rounded" style="width:100px; height:100px" type="file" alt="logo"> -->
                    <input type="file" name="user_img" class="" style="width:50px; height:50px; border-radius: 50%" id="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="InputPassword">Username</label>
                  <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
                </div>

                <div class="form-group">
                  <label for="InputPassword">Email</label>
                  <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="InputPassword">User's State</label>
                  <select name="user_state" class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>State</option>
                    <option>Abia</option>
                    <option>Imo</option>
                    <option>Enugu</option>
                    <option>Bayelsa</option>
                    <option>Cross river</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="InputPassword">User's Role</label>
                  <select name="user_role" id="" class="form-control">
                    <option value=""></option>
                    <option value="owner">Owner</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="InputPassword">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
            
                <!-- <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="register" >SIGN UP</a>
                </div> -->
                <button type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                <!-- <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div> -->
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

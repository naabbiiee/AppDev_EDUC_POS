<?php
    session_start();
    include('config/config.php');

    //login 
    if (isset($_POST['login'])) {
      $admin_email = $_POST['admin_email'];
      $admin_password = sha1(md5($_POST['admin_password'])); //double encrypt to increase security
      $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id  FROM  pos_admin WHERE (admin_email =? AND admin_password =?)"); //sql to log in user
      $stmt->bind_param('ss',  $admin_email, $admin_password); //bind fetched parameters
      $stmt->execute(); //execute bind 
      $stmt->bind_result($admin_email, $admin_password, $admin_id); //bind result
      $rs = $stmt->fetch();
      $_SESSION['admin_id'] = $admin_id;

      if ($rs) {
        //if its sucessfull
        header("location:dashboard.php");
      } else {
        $err = "Incorrect Authentication Credentials ";
      }
    }

    require_once('partials/_head.php');
?>

<style>
        body {
            background-color: #13293D;
            font-family: 'Anton', sans-serif;
            height: 100vh;
            margin: 0;
            height: 100vh;
            width: 100%;
        }

        body::before {
            content: "";
            background-image: url('../assets/background.png');
            background-size: cover;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.5;
}
</style>

<body class="bg-dark">
  <div class="main-content">
    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-yellow">Point Of Sale Management System</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 ">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83 text-dark"></i></span>
                    </div>
                    <input class="form-control text-dark" required name="admin_email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open text-dark"></i></span>
                    </div>
                    <input class="form-control text-dark" required name="admin_password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember Me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary my-2 text-dark">Log In</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>
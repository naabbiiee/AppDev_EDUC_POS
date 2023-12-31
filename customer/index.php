<?php
session_start();
include('config/config.php');
//login 
if (isset($_POST['login'])) {
    $customer_email = $_POST['customer_email'];
    $customer_password = sha1(md5($_POST['customer_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT customer_email, customer_password, customer_id  FROM  pos_customers WHERE (customer_email =? AND customer_password =?)"); //sql to log in user
    $stmt->bind_param('ss',  $customer_email, $customer_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($customer_email, $customer_password, $customer_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['customer_id'] = $customer_id;
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
    <div class="header py-7">
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
                    <input class="form-control text-dark" required name="customer_email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open text-dark"></i></span>
                    </div>
                    <input class="form-control text-dark" required name="customer_password" placeholder="Password" type="password">
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
                  <a href="create_account.php" class=" btn btn-success pull-right text-dark">Create Account</a>
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



<?php
session_start();
include 'api/dbcon.php';
$err = "";
if (isset($_POST["UserName"])) {
  $user = $_POST["UserName"];
  $pass = $_POST["Password"];

  $sql = "select * from login where UserName='$user' AND Password='$pass'";
  if ($res = mysqli_query($conn, $sql)) {
    $rowcount = mysqli_num_rows($res);
    if ($rowcount  > 0) {
      $row = mysqli_fetch_assoc($res);
      $_SESSION['did'] = $row["did"];
      if ($row["did"] == 1) {
        header("location:admin/Department_details.php");
      } else {
        header("location:users/tableuserplace.php");
      }
    } else {
      $err = "wrong username and password!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    IQAC Criteria-Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div>
              <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent text-center">
                    <h3 class="font-weight-bolder text-primary text-gradient">IQAC Criteria-Login</h3>
                    <p class="mb-0">Criteria-Placement & Progression</p>
                  </div>
                  <div class="card-body">
                    <p style="color: red;"><?php echo $err  ?></p>
                    <form role="form" method="post">
                      <label>User Name</label>
                      <div class="mb-3">
                        <input type="text" name="UserName" class="form-control" placeholder="Enter user name" aria-label="name" aria-describedby="name-addon" required>
                      </div>
                      <label>Password</label>
                      <div class="mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign in</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">

      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
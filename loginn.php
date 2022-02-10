<?php
session_start();
$errorMessage = '';
if (isset($_POST['username']) && isset($_POST['password'])) {
    include 'library/config.php';
    include 'library/opendb.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1){
        if($row['level']=="mahasiswa"){
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header('Location: mainMhs.php');
            exit;
        }
        else if($row['level']=="dosen"){   
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header('Location: mainDosen.php');
            exit;
        }
    }else{
        $errorMessage = 'Sorry, wrong username / password';
    }include 'library/closedb.php';
}
?>
<html>
<head>
    <title>Login Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <?php
        if ($errorMessage != '') {
    ?>
    <p align="center"><strong><font color="#990000"><?php echo
    $errorMessage; ?></font></strong></p>
    <?php
        }
    ?>
    <form action="" method="post" name="frmLogin" id="frmLogin">
    <div class="container" action="" method="post" name="frmLogin" id="frmLogin">>
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="id" class="form-control form-control-user" name="username" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <a><input name="btnLogin" type="submit" id="btnLogin" value="Login" class="btn btn-primary btn-user btn-block"></a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="regist.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>

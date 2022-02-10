<?php
session_start();
include 'library/config.php';
include 'library/opendb.php';

$errorMessage = '';
if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(nama, nrp, alamat, ttl, email, nohp, username, password) VALUES ('$nama', '$nrp', '$alamat', '$ttl', '$email', '$nohp', '$username', '$password') ";

    if (mysqli_query($conn, $sql)){
        header ("location:loginn.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }include 'library/closedb.php';
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Page</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama"
                                    placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nrp" placeholder="NRP">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="ttl"  placeholder="Tempat Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nohp"  placeholder="No. Hp">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="password" placeholder="Password">
                                </div>
                                <a>
                                    <input type="submit" name="register" value="Register Account" class="btn btn-primary btn-user btn-block"> 
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="loginn.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="s/sb-admin-2.min.js"></script>

</body>
</html>
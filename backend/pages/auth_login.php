<?php 
    session_start();
    include 'dbconnection/dbconnect.php';

    if(isset($_POST['btnlogin'])) {

        $username = $_POST['username'];
        $password = $_POST['userpassword'];

        $sql = "SELECT * FROM users WHERE Username=:username AND Password=:password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {

            $_SESSION['user'] = $data;

                if (isset($_SESSION['user']) && $_SESSION['user']['Role']!="CUSTOMER") {

                    header("location:index.php");
                } else {

                    header("location:../../index.php");
                }

        } else {

            header("location:auth_login_form.php?error=1");
        }
    }
?>
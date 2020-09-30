<?php 
	session_start();
    include 'dbconnection/dbconnect.php';
	include 'include/AutoID.php';

    if(isset($_POST['btnregister'])) {

        $userid = AutoID('users','User_id','USER_',4);
        $photo = $_POST['Photo'];
        $crdphoto = $_POST['CR_detail'];
        $role = $_POST['Role'];
        $fullname = $_POST['Fullname'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $passwordc = $_POST['Passwordconfirm'];
        $dob = $_POST['Dob'];
        $pho = $_POST['Phone_number'];
        $address = $_POST['Address'];
        $company = $_POST['Company'];

        $userapproval = 0;

        if ($role=="CUSTOMER") {
            $userapproval = 1;
        }

        $isemailconfirmed = 1;

        $basepath = "../images/users/";
        $fullpath = $basepath.$photo['name'];
        move_uploaded_file($photo['tmp_name'], $fullpath);

        $crdbasepath = "../images/commercial_certificates/";
        $crdfullpath = $crdbasepath.$crdphoto['name'];
        move_uploaded_file($crdphoto['tmp_name'], $crdfullpath);

        if ($username!="" || $email!="" || $role!="" || $password==$passwordc) {

            $sql = "SELECT * FROM users WHERE Email=:email OR Username=:username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user['Username']==$username) {

                echo "<script>alert('Username already exists in the database!');</script>";
            } else if ($user['Email']==$email) {

                echo "<script>alert('Email already exists in the database!');</script>";
            } else {

                // $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
                // $token = str_shuffle($token);
                // $token = substr($token, 0, 10);

                // $hashedPassword = password_hash($Cpassword, PASSWORD_BCRYPT);

                $sql1 = "INSERT INTO users (User_id, Role, Photo, Fullname, Username, Email, Password, Dob, Phone_number, Address, Company, User_approval, CR_detail, isEmailConfirmed) VALUES (:user_id, :role, :photo, :fullname, :username, :email, :password, :dob, :pho, :address, :company, :userapproval, :crdetail, :isemailconfirmed)";

				$stmt = $pdo->prepare($sql1);
				$stmt->bindParam(':user_id', $userid);
				$stmt->bindParam(':role', $role);
				$stmt->bindParam(':photo', $fullpath);
				$stmt->bindParam(':fullname', $fullname);
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $password);
				$stmt->bindParam(':dob', $dob);
				$stmt->bindParam(':pho', $pho);
				$stmt->bindParam(':address', $address);
                $stmt->bindParam(':company', $company);
				$stmt->bindParam(':userapproval', $userapproval);
				$stmt->bindParam(':crdetail', $crdfullpath);
				$stmt->bindParam(':isemailconfirmed', $isemailconfirmed);
				$stmt->execute();

                // require 'PHPMailerAutoload.php';

                // $mail = new PHPMailer();
                // $mail->SMTPDebug = 4;

                // $mail->isSMTP();                                      // Set mailer to use SMTP
                        
                // $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                // $mail->SMTPAuth = true;                               // Enable SMTP authentication
                // $mail->Username = 'claudiuscaesar79@gmail.com';                 // SMTP username
                // $mail->Password = 'caesar1997';                           // SMTP password
                // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                // $mail->Port = 587;                                    // TCP port to connect to
                        
                // $mail->setFrom('claudiuscaesar79@gmail.com', 'Baibao');
                // $mail->addAddress($email);
                // // $mail->addReplyTo('claudiuscaesar79@gmail.com', 'Information');
                // $mail->Subject = "Thank you for Registering. Please verify email with the link below.";
                // $mail->isHTML(true);
                // $mail->Body = "
                //     Please click on the link below:<br><br>
                    
                //     <a href='http://localhost/YangonlayFoodDelivery/Client-sidepages/Confirm_Email.php?email=$email&token=$token'>Click Here</a>
                // ";

                // if ($mail->send()) {
                    
                //     $msg = "You have been registered! Please verify your email!";
                //     echo "<script>alert('You have been registered! Please verify your email!');
                //     header('Client_Side_Home.php');</script>";
                // } else {

                //     $msg = "Something wrong happened! Please try again!";
                //     echo "<script>alert('Something wrong happened! Please try again!');
                //     header('Client_Side_Home.php');</script>";
                //     echo 'Mailer Error: ' . $mail->ErrorInfo;
                // }

                
                if($stmt->rowCount()) {
					header("location:index.php");           
				} else {
					echo "Error";
				}
            }
        } else {

            header("location:auth_register_form.php");
        }
    }

?>
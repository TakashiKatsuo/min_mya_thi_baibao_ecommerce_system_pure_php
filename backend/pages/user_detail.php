<?php 
	session_start();
	include 'dbconnection/dbconnect.php';

	if(isset($_POST["Userid"])){  
		$output = '';  

		$sql = "SELECT * FROM users WHERE User_id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id', $_POST["Userid"]);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$userstatusinfo='';
		$statuschangedby='';

		if ($data["User_approval"]==0) {
            $userstatusinfo= 'Not Yet Approved';
        } else {
            $userstatusinfo= 'Approved'; }

        if ($data["Status_changed_by"]==NULL) {
            $statuschangedby= '';
        } else {
            $statuschangedby= $data["Status_changed_by"]; }

		$output .= '  
		<div class="table-responsive">  
		<table class="table table-bordered"> 
		<tr>  
		<td width="30%" colspan="2" align="center"><h3>User</h3></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>User ID</h5></td>  
		<td width="70%">'.$data["User_id"].'</td>  
		</tr>  
		<tr>  
		<td width="30%"><h5>Role</h5></td>  
		<td width="70%">'.$data["Role"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Profile Photo</h5></td>  
		<td width="70%"><img src="'.$data['Photo'].'" height="150" width="200" class="img-thumbnail" /></td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Full Name</h5></td>  
		<td width="70%">'.$data["Fullname"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Username</h5></td>  
		<td width="70%">'.$data["Username"].'</td>  
		</tr> 
		<tr>  
		<td width="30%"><h5>Email</h5></td>  
		<td width="70%">'.$data["Email"].'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Password</h5></td>  
		<td width="70%">'.$data["Password"].'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Dath of Birth</h5></td>  
		<td width="70%">'.$data["Dob"].'</td>  
		</tr>
		<tr>  
		<tr>  
		<td width="30%"><h5>Phone Number</h5></td>  
		<td width="70%">'.$data["Phone_number"].'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Address</h5></td>  
		<td width="70%">'.$data["Address"].'</td>  
		</tr>
		<tr>
		<tr>
		<td width="30%"><h5>User Approval Status</h5></td>  
		<td width="70%">'.$userstatusinfo.'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Status Changed By</h5></td>  
		<td width="70%">'.$statuschangedby.'</td>  
		</tr>
		<tr>  
		<td width="30%"><h5>Commercial Registration Certificate</h5></td>  
		<td width="70%"><img src="../'.$data['CR_detail'].'" height="150" width="200" class="img-thumbnail" /></td>  
		</tr>';  
		echo $output;  
	}

?>
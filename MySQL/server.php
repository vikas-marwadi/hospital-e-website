<?php
	session_start();
	$username = '';
	$email = '';
	$fullname = '';
	$image='';
	$phone = '';
	$gender = '';
	$guardian_name = '';
	$guardian_no = '';
	$permanent_address = '';
	$local_address = '';
	$aadhar_no = '';
	$dob = '';
	$height = '';
	$weight = '';
	$date = '';
	$blood_group = '';
	$hospital_name = '';
	$hospital_city = '';
	$report_name = '';
	$reports = '';
	$errors = array();

	
	
	//connect to the database
	$db = mysqli_connect('localhost','root','','registration');

	//if register button is clicked
	if(isset($_POST['register']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$fullname = mysqli_real_escape_string($db,$_POST['name']);
		$phone = mysqli_real_escape_string($db,$_POST['phone']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		$image=$_FILES['image']['name']; 		//for accessing the image or other files that time we need to use this type of variable instead of $_POST

		$users=mysqli_query($db,"select username from users where username='$username'");
		$checkusername=mysqli_num_rows($users);
		$eml=mysqli_query($db,"select email from users where email='$email'");
		$checkemail=mysqli_num_rows($eml);
		if($checkusername>0)
		{
			array_push($errors, "Username is already taken.");
		}
		if($checkemail>0)
		{
			array_push($errors, "Email  is already taken.");
		}
			
		//ensure that form fields are filled properly
		if(empty($username))
		{
			array_push($errors, "Username is Required");  //add errors to an errors array
		}
		if(empty($email))
		{
			array_push($errors, "Email is Required");  //add errors to an errors array
		}
		if(empty($fullname))
		{
			array_push($errors, "Fullname is Required");  //add errors to an errors array
		}
		if(empty($phone))
		{
			array_push($errors, "Phone Number is Required");  //add errors to an errors array
		}
		if(empty($image))
		{
			array_push($errors, "User Image is Required or format is unsupported");  //add errors to an errors array
		}
		if(empty($password_1))
		{
			array_push($errors, "Password is Required");  //add errors to an errors array
		}
		if($password_1  != $password_2)
		{
			array_push($errors, "Two Password does not matched");
		}

		//if there are no errors then add user to database
		if(count($errors)==0)
		{
			$target='../Images/Database_Images/'.basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'],$target);
			$password = md5($password_1); //md5 function has encrypt the password before the storing in the database(security)
			$sql = "INSERT INTO users (username,fullname,email,password,image,phone) 
						   VALUES ('$username','$fullname','$email','$password','$image','$phone')";
			$sql1 = "INSERT INTO personal_detail (username) 
						   VALUES ('$username')";

			mysqli_query($db, $sql);
			mysqli_query($db, $sql1);
			$_SESSION['username'] = $username;
			$_SESSION['phone'] = $phone;
			$_SESSION['name'] = $fullname;
			$_SESSION['success'] = "You are Logged in";
			header('location: personal.php');  //redirect to home page
		}
	} 


	//log user in from login page
	if(isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		//ensure that form fields are filled properly
		if(empty($username))
		{
			array_push($errors, "Username is Required");  //add errors to an errors array
		}
		if(empty($password))
		{
			array_push($errors, "Password is Required");  //add errors to an errors array
		}

		if(count($errors) == 0)
		{
			$password = md5($password); //encrypt password before comparing with actual password
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1)
			{
				//log user in 
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are Logged in";
				header('location: profile.php');  //redirect to home page
			}
			else
			{
				array_push($errors, "Wrong Username/Password combination");
			}
		}
	}

	if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$gender = mysqli_real_escape_string($db,$_POST['gender']);
		$guardian_name = mysqli_real_escape_string($db,$_POST['guardian_name']);
		$guardian_no = mysqli_real_escape_string($db,$_POST['guardian_no']);
		$permanent_address = mysqli_real_escape_string($db,$_POST['permanent_address']);
		$local_address = mysqli_real_escape_string($db,$_POST['local_address']);
		$aadhar_no = mysqli_real_escape_string($db,$_POST['aadhar_no']);
		$dob = mysqli_real_escape_string($db,$_POST['dob']);
		$height = mysqli_real_escape_string($db,$_POST['height']);
		$weight = mysqli_real_escape_string($db,$_POST['weight']);
		$blood_group = mysqli_real_escape_string($db,$_POST['blood_group']);


		$hospital_name = mysqli_real_escape_string($db,$_POST['hospital_name']);
		$hospital_city = mysqli_real_escape_string($db,$_POST['hospital_city']);


		$sql1 = "UPDATE personal_detail SET gender = '$gender',
											guardian_name = '$guardian_name',
											guardian_no = '$guardian_no',
											permanent_address = '$permanent_address',
											local_address = '$local_address',
											aadhar_no = '$aadhar_no',
											dob = '$dob',
											height = '$height',
											weight = '$weight',
											blood_group = '$blood_group'
										WHERE username = '$username'";
		mysqli_query($db, $sql1);

		$sql2 = "INSERT INTO hospital_information (username,hospital_name,hospital_city,date) VALUES ('$username','$hospital_name','$hospital_city',CURDATE())"; 
		mysqli_query($db, $sql2);

		header('location: profile.php');  //redirect to home page
	}

	if(isset($_POST['add']))
	{
		$report_name = mysqli_real_escape_string($db,$_POST['reportname']);
		$reports = $_FILES['reports']['name'];
		$username = $_SESSION['username'];
		$_SESSION['report_name'] = $report_name;
		$_SESSION['reports'] = $reports;


		$target='../Database_reports/'.basename($_FILES['reports']['name']);
		move_uploaded_file($_FILES['reports']['tmp_name'],$target);
		$sql3 = "INSERT INTO report_information (username,report_name,reports,date) VALUES ('$username','$report_name','$reports',CURDATE())";
		mysqli_query($db,$sql3);

	}

	if(isset($_POST['delete']))
	{
		$r_n = $_SESSION['report_name'];
		$r = $_SESSION['reports'];
		$sql4 = "DELETE  FROM report_information WHERE report_name = '$r_n' AND reports = '$r'";
		mysqli_query($db,$sql4);
	}


	//logout
	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>


























<!-- <?php
	session_start();
	$username = '';
	$name = '';
	$email = '';
	$image='';
	$phonenum= '';
	$errors = array();
	
	//connect to the database
	$db = mysqli_connect('localhost','root','','registration');

	//if register button is clicked
	if(isset($_POST['register']))
	{
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$phonenum = mysqli_real_escape_string($db,$_POST['phone']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
		$image=$_FILES['image']['name']; 		//for accessing the image or other files that time we need to use this type of variable instead of $_POST
		//ensure that form fields are filled properly
		$users=mysqli_query($db,"select username from users where username='$username'");
		$checkusername=mysqli_num_rows($users);
		$eml=mysqli_query($db,"select email from users where email='$email'");
		$checkemail=mysqli_num_rows($eml);
		if($checkusername>0)
		{
			array_push($errors, "Username is already taken.");
		}
		if($checkemail>0)
		{
			array_push($errors, "Email  is already taken.");
		}
		if(empty($username))
		{
			array_push($errors, "Username is Required");  //add errors to an errors array
		}
		if(empty($name))
		{
			array_push($errors, "Name is Required");  //add errors to an errors array
		}
		if(empty($email))
		{
			array_push($errors, "Email is Required");  //add errors to an errors array
		}
		if(empty($image))
		{
			array_push($errors, "User Image is Required or format is unsupported");  //add errors to an errors array
		}
		if(empty($password_1))
		{
			array_push($errors, "Password is Required");  //add errors to an errors array
		}
		if($password_1  != $password_2)
		{
			array_push($errors, "Two Password does not matched");
		}

		//if there are no errors then add user to database
		if(count($errors)==0)
		{
			$target='Images/'.basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'],$target);
			$password = md5($password_1); //md5 function has encrypt the password before the storing in the database(security)
			$sql = "INSERT INTO users (username,fullname,email,password,image,phone_num) 
						   VALUES ('$username','$name','$email','$password','$image','$phonenum')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['fullname'] = $name;
			$_SESSION['email'] = $email;
			$_SESSION['phonenum'] = $phonenum;
			$_SESSION['success'] = "You are Logged in";
			header('location: profile.php');  //redirect to home page
		}
	} 


	//log user in from login page
	if(isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		//ensure that form fields are filled properly
		if(empty($username))
		{
			array_push($errors, "Username is Required");  //add errors to an errors array
		}
		if(empty($password))
		{
			array_push($errors, "Password is Required");  //add errors to an errors array
		}

		if(count($errors) == 0)
		{
			$password = md5($password); //encrypt password before comparing with actual password
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1)
			{
				//log user in 
				$_SESSION['username'] = $username;
				$_SESSION['name'] = $name;
				$_SESSION['age'] = $age;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['success'] = "You are Logged in";
				header('location: profile.php');  //redirect to home page
			}
			else
			{
				array_push($errors, "Wrong Username/Password combination");
			}
		}
	}

	//logout
	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?> -->
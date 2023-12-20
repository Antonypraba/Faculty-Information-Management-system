<!DOCTYPE html>
<html lang="en">

<head>

	
<?php
// Function to validate email
function validateEmail($email)
{
  // Use PHP's built-in function to validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false; // Invalid email format
  }

  // Custom validation for domain (example: only allow gmail.com)
  $allowedDomain = 'gmail.com';
  $emailParts = explode('@', $email);
  $domain = end($emailParts);
  if ($domain !== $allowedDomain) {
    return false; // Invalid domain
  }

  return true; // Email is valid
}

// Function to validate password
function validatePassword($password)
{
  // Password must be at least 8 characters long
  if (strlen($password) < 8) {
    return false; // Password is too short
  }

  // Password must contain at least one uppercase letter, one lowercase letter, and one digit
  if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
    return false; // Password does not meet requirements
  }

  return true; // Password is valid
}


?>

	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/ptu.jpg" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/loginbg.css">
	<!--===============================================================================================-->

<style>

</style>
</head>


<script>
	// Function to validate email
    function validateEmail($email) {
        // Use PHP's built-in function to validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false; // Invalid email format
        }

        // Custom validation for domain (example: only allow gmail.com)
        $allowedDomain = 'gmail.com';
        $emailParts = explode('@', $email);
        $domain = end($emailParts);
        if ($domain !== $allowedDomain) {
            return false; // Invalid domain
        }

        return true; // Email is valid
    }

    // Function to validate password
    function validatePassword($password) {
        // Password must be at least 8 characters long
        if (strlen($password) < 8) {
            return false; // Password is too short
        }

        // Password must contain at least one uppercase letter, one lowercase letter, and one digit
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
            return false; // Password does not meet requirements
        }

        return true; // Password is valid
    }

</script>
<body>

<div class="d-flex flex-column justify-content-center w-100 h-100">

<div class="d-flex flex-column justify-content-center align-items-center">
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/ptu.jpg" alt="IMG">
				</div>

				<form action="database/validate.php<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login100-form validate-form">
				
	
				<span class="login100-form-title">
						Faculty's Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="checkbox" name="remember" value="1">Keep me login
						<button type="submit" name="submit" class="login100-form-btn">Login</button>

					</div>

					<div class="text-center p-t-12">
						<span class="txt1">Forgot</span>
						<a class="txt2" href="#">Email / Password?</a>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
</div>
</div>

	

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.3
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
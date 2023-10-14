<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>

<body>

<?php
$fnameErr = $lnameErr = $fatherNameErr = $motherNameErr = $emailErr = $phoneErr = $websiteErr = $genderErr = "";
$bloodgroupErr = $religionErr = $countryErr = $divisionErr = $addressErr = "";
$accountUsernameErr = $accountPasswordErr = $confirmPasswordErr = "";
$ok = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate first name
  if (empty($_POST["firstname"])) {
  	$ok = false;
    $fnameErr = "First Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-zA-Z0-9]+$/", $firstname)) {
        $fnameErr = "firstname can only contain letters and numbers";
        $ok = false;
    }
    if (strlen($firstname) > 5) {
        $fnameErr = "firstname should be at most 5 characters";
        $ok = false;
    }
  }
  
  // Validate last name
  if (empty($_POST["lastname"])) {
  	$ok = false;
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lastname"]);
  }

  // Validate father's name
  if (empty($_POST["father'sname"])) {
  	$ok = false;
    $fatherNameErr = "Father's Name is required";
  } else {
    $fatherName = test_input($_POST["father'sname"]);
  }

  // Validate mother's name
  if (empty($_POST["mother'sname"])) {
  	$ok = false;
    $motherNameErr = "Mother's Name is required";
  } else {
    $motherName = test_input($_POST["mother'sname"]);
  }

  // Validate gender
  if (empty($_POST["gender"])) {
  	$ok = false;
    $genderErr = "gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // Validate email
  if (empty($_POST["Email"])) {
  	$ok = false;
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["Email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $ok = false;
    }
  }

  // Validate phone/mobile
  if (empty($_POST["Phone/Mobile"])) {
    $phoneErr = "Phone/Mobile is required";
    $ok = false;
  } else {
    $phone = test_input($_POST["Phone/Mobile"]);
  }

  // Validate website
  if (empty($_POST["Website"])) {
    $websiteErr = "Website is required";
    $ok = false;
  } else {
    $website = test_input($_POST["Website"]);
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
      $websiteErr = "Invalid URL format";
      $ok = false;
    }
  }

  // Validate blood group
  if (empty($_POST["bloodgroup"]) || $_POST["bloodgroup"] === "") {
    $bloodgroupErr = "Blood Group is required";
    $ok = false;
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }

  // Validate religion
  if (empty($_POST["religion"]) || $_POST["religion"] === "") {
    $religionErr = "Religion is required";
    $ok = false;
  } else {
    $religion = test_input($_POST["religion"]);
  }

  // Validate country
  if (empty($_POST["country"]) || $_POST["country"] === "") {
    $countryErr = "Country is required";
    $ok = false;
  } else {
    $country = test_input($_POST["country"]);
  }

  // Validate division
  if (empty($_POST["Division"]) || $_POST["Division"] === "") {
    $divisionErr = "Division is required"; $ok = false;
  } else {
    $division = test_input($_POST["Division"]);
  }

  // Validate address
  if (empty($_POST["rsc"]) || $_POST["rsc"] === "" || empty($_POST["postcode"]) || $_POST["postcode"] === "") {
    $addressErr = "Address details are required"; $ok = false;
  } else {
    $address = test_input($_POST["rsc"]);
    $postcode = test_input($_POST["postcode"]);
  }

  // Validate account username
  if (empty($_POST["username"])) {
    $accountUsernameErr = "Username is required"; $ok = false;
  } else {
    $username = test_input($_POST["username"]);
  }

  // Validate account password
  if (empty($_POST["password"])) {
    $accountPasswordErr = "Password is required"; $ok = false;
  } else {
    $password = test_input($_POST["password"]);
  }

  // Validate confirm password
  if (empty($_POST["confirm_password"])) {
    $confirmPasswordErr = "Confirm Password is required"; $ok = false;
  } else {
    $confirm_password = test_input($_POST["confirm_password"]);
    if (strlen($password) < 8) {
        $accountPasswordErr = "Password should be at least 8 characters";
        $ok = false;
    }
    if ($confirm_password !== $password) {
      $confirmPasswordErr = "Passwords do not match"; $ok = false;
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($ok) {
    // Redirect to the welcome page
    header("Location: welcome.html");
    exit();
}

?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate>
    <h1>Registration</h1>
    <table>
        <tr>
            <td>
                <fieldset>
			        <legend>General Information:</legend>
			        <table cellspacing="20">
			            <tr>
			                <td><label for="firstname"><b>First <br> Name</b> </label></td>
			                <td>: <input type="text" name="firstname" id="firstname" required> <?php echo "<br>" . $fnameErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="lastname"><b>Last <br> Name</b> </label></td>
			                <td>: <input type="text" name="lastname" id="lastname" required> <?php echo "<br>" . $lnameErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="father'sname"><b>Father's <br> Name</b> </label> </td>
			                <td>: <input type="text" name="father'sname" id="father'sname" required><?php echo "<br>" .  $fatherNameErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="mother'sname"><b>Mother's <br> Name <b></label> </td>
			                <td>: <input type="text" name="mother'sname" id="mother'sname" required><?php echo "<br>" .  $motherNameErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="gender">Gender:</label></td>
			                <td>: 
			                    <input type="radio" id="male" name="gender" value="male" required>
			                    <label for="male">Male</label>
			                    <input type="radio" id="female" name="gender" value="female" required>
			                    <label for="female">Female</label>
			                    <input type="radio" id="other" name="gender" value="other" required>
			                    <label for="other">Other</label>
			                    <?php echo "<br>" .  $genderErr;?></span>
			                </td>
			            </tr>
			            <tr>
			                <td><label for="bloodgroup">Blood <br> Group </label></td>
			                <td>: 
			                    <select name="bloodgroup" id="bloodgroup" required>
			                        <option value="" selected>Select Blood Group</option>
			                        <option value="A+">A+</option>
			                        <option value="A-">A-</option>
			                        <option value="B+">B+</option>
			                        <option value="B-">B-</option>
			                        <option value="AB+">AB+</option>
			                        <option value="AB-">AB-</option>
			                        <option value="O+">O+</option>
			                        <option value="O-">O-</option>
			                    </select>
			                    <?php echo "<br>" . $bloodgroupErr;?></span>
			                </td>
			            </tr>
			            <tr>
			                <td><label for="religion">Religion</label></td>
			                <td>: 
			                    <select name="religion" id="religion" required>
			                        <option value="" selected>Select Religion</option>
			                        <option value="Muslim">Muslim</option>
			                        <option value="Hindu">Hindu</option>
			                        <option value="Christian">Christian</option>
			                        <option value="Buddhist">Buddhist</option>
			                    </select>
			                    <?php echo "<br>" . $religionErr;?></span>
			                </td>
			            </tr>
			        </table>
			    </fieldset>
            </td>
            <td>
                <fieldset>
                    <legend>Contact Information:</legend>
                    <table cellspacing="20">
                        <tr>
			                <td><label for="Email">Email:</label></td>
			                <td>: <input type="text" name="Email" id="Email" required><?php echo "<br>" . $emailErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="Phone/Mobile">Phone/Mobile:</label></td>
			                <td>: <input type="text" name="Phone/Mobile" id="Phone/Mobile" required><?php echo  "<br>" .  $phoneErr;?></span></td>
			            </tr>
			            <tr>
			                <td><label for="Website">Website:</label></td>
			                <td>: <input type="text" name="Website" id="Website" required><?php echo "<br>" . $websiteErr;?></span></td>
			            </tr>
                            
                        <tr>
                            <td>
                                <label for="">Address:</label>
                            </td>
                            <td>
                                <p>
                                    <fieldset>
                                        <legend>Present Address</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <select name="country" id="country" required>
                                                            <option value="" selected>Select Country</option>
                                                            <option value="USA">USA</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="UK">UK</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                        </select><?php echo $countryErr;?></span>
                                                        <select name="Division" id="Division" required>
                                                            <option value="" selected>Select Division</option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Chottogram">Chottogram</option>
                                                            <option value="Khulna">Khulna</option>
                                                            <option value="Rangpur">Rangpur</option>
                                                        </select><?php echo $divisionErr;?></span></p>
                                                    </p>
                                                    <p>
                                                        <textarea name="rsc" id="rsc" placeholder="Road/Street/City" rows="6" cols="30" required></textarea><?php echo $addressErr;?></span></p>
                                                    </p>
                                                    <p>
                                                        <input type="text" name="postcode" id="postcode" placeholder="Post Code" required><?php echo $addressErr;?></span></p>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </p>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td>
            	<fieldset>
				<legend>Account information:</legend>
					<table cellspacing="20">
						<tr>
							<td><label for="username">Username </label></td>
							<td>: <input type="text" name="username" id="Username"><?php echo "<br>" . $accountUsernameErr;?></span></td>
						</tr>
						<tr>
							<td><label for="password">Password </label></td>
							<td>: <input type="password" name="password" id="password"><?php echo "<br>" . $accountPasswordErr;?></span></td>
						</tr>
						<tr>
							<td><label for="confirm_password">Confirm Password </label></td>
							<td>: <input type="password" name="confirm_password" id="confirm_password"><?php echo "<br>" . $confirmPasswordErr;?></span></td>
						</tr>
					</table>
				</fieldset>
            </td>
        </tr>
    </table>
    <p>
        <button type="submit">Registration</button>
    </p>
</form>

</body>
</html>


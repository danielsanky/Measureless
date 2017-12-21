<?php
// Stores the name of the class for hidden error messages
$HIDDEN_ERROR_CLASS = "hiddenError";

// when the user submits a form
$name=$_REQUEST["user_name"];
$email=$_REQUEST["address"];
$student=$_REQUEST["stud"];
$year=$_REQUEST["year"];
$sex=$_REQUEST["gender"];
$know=$_REQUEST["know"];
$song=$_REQUEST["song"];
$submit =$_REQUEST["submit"];

if (isset($submit)) {

  // log to the PHP console
  error_log("user submitted form");

  // Handle name
  $name=$_REQUEST["user_name"];
  // if the name field is not empty:
  if (!empty($name)) {
    $nameValid = true;
  } else {
    $nameValid = false;
  }

  // Handle email
  $isEmailEmpty = empty($email);
  $isEmailAddress = filter_var($email, FILTER_VALIDATE_EMAIL);

  $isEmailValid = !$isEmailEmpty && $isEmailAddress;
  if ($isEmailValid) {
    $emailValid = true;
  } else {
    $emailValid = false;

  }

  // the form is valid if the first name (and last name and email) is valid.
  $formValid = ($nameValid && $emailValid);

  // if valid, allow submission
  if ($formValid) {
    //create session to pass values to redirected page
    session_start();
    $_SESSION["name"] = $name;
    $_SESSION["address"] = $email;
    $_SESSION["stud"]=$student;
    $_SESSION["year"]=$year;
    $_SESSION["gender"]=$sex;
    $_SESSION["know"]=$know;
    $_SESSION["song"]=$song;
    // redirect to response.php
    header("Location: response(nojavascript).php");
    return;
  }else{
    error_log("Form not valid");
    // no form submitted
    $nameValid = true;
    $emailValid = true;

  }
} else {
  // log to the PHP console
  error_log("no form submitted");

  // no form submitted
  $nameValid = true;
  $emailValid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Measureless A capella</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all">
</head>
<body>
  <h1>Measureless A capella </h1>
  <?php
  include "includes/navigation.php";
  ?>
  <h2>Contact Us (No JavaScript)</h2>

  <div class="contact">
    <form action="contact(nojavascript).php" method="post" id="mainForm" novalidate>
      <p>If you would like to be on our contact list for future events and performances,
        feel free to sign up.</p>
        <div class="name">
          <label for="user_name">Name:</label>
          <input type="text" id="user_name" name="user_name" value="<?php echo($name);?>" required>
          <span class="error <?php if (!empty($name)) { echo($HIDDEN_ERROR_CLASS); } ?>" id="nameError">
            Name is required.
          </span>
        </div>

        <div class="address">
          <label for="address">E-mail:</label>
          <input type="email" id="address"  name="address" placeholder="name@domain.com" value="<?php echo( htmlspecialchars($email) );?>" required/>
          <span class="error <?php if(!empty($email)){ echo($HIDDEN_ERROR_CLASS);} ?>" id="emailError">
            Email Address is required.
          </span>
          <span class="error <?php if(empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){ echo($HIDDEN_ERROR_CLASS);} ?>" id="emailErrorFill">
            Email Address is invalid.
          </span>
        </div>

        <div class ="stud">
          <span>Are you a student?</span><br>
          <input type="radio" name="stud" value="Yes"
          <?php if ( $student == "Yes" ) { echo ("checked"); } ?> >Yes<br>
          <input type="radio" name="stud" value="No"
          <?php if ( $student == "No" ) { echo ("checked"); } ?>>No<br>
        </div>

        <div class="grade">
          <span>What year are you?</span>
          <select name="year">
            <option value="N/A" <?php if($year=="N/A"){ echo '"selected"';}?>>
            </option>
            <option value="High-school"<?php if($year=="High-school"){ echo("selected");}?>>
              High School</option>
              <option value="Freshman"<?php if($year=="Freshman"){ echo ("selected");}?>>
                Freshman</option>
                <option value="Sophomore"<?php if($year=="Sophomore"){ echo ("selected");}?>>
                  Sophomore</option>
                  <option value="Junior"<?php if($year=="Junior"){ echo ("selected");}?>>
                    Junior</option>
                    <option value="Senior"<?php if($year=="Senior"){ echo ("selected");}?>>
                      Senior</option>
                      <option value="other"<?php if($year=="other"){ echo ("selected");}?>>
                        Other</option>
                      </select>
                    </div>

                    <div class="gender">
                      <span>Gender:</span><br>
                      <input type="radio" name="gender" value="Male"
                      <?php if ( $sex == "Male" ) { echo ("checked"); } ?>> Male<br>
                      <input type="radio" name="gender" value="Female"
                      <?php if ($sex  == "Female" ) { echo ("checked"); } ?>> Female<br>
                      <input type="radio" name="gender" value="Other"
                      <?php if ( $sex == "Other" ) { echo ("checked"); } ?>> Other<br>
                    </div>

                    <div class="know">
                      <span>How did you find out about us?</span><br>
                      <input type="radio" name="know" value="Facebook"
                      <?php if ( $know == "Facebook" ) { echo ("checked"); } ?> >Facebook<br>
                      <input type="radio" name="know" value="Friend"
                      <?php if ( $know  == "Friend" ) { echo ("checked"); } ?> >Friend<br>
                      <input type="radio" name="know" value="Concert"
                      <?php if ( $know  == "Concert" ) { echo ("checked"); } ?> >Concert<br>
                      <input type="radio" name="know" value="Other"
                      <?php if ( $know  == "Other" ) { echo ("checked"); } ?>> Other<br>
                    </div>

                    <div class="song">
                      <span>Do you have any song suggestions for us to do
                        in future performances (Please include title and performer)?</span><br>
                        <textarea id="song" name="song"><?php if(isset($_POST["song"])) echo ($_POST["song"]);?></textarea>
                      </div>

                      <div class="button">
                        <button type="submit" name="submit" id="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </body>
                </html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Measureless A capella</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all">
  <!-- Load jQuery -->
  <script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
  <!-- Load validation -->
  <script src="scripts/clientValidation.js" type="text/javascript"></script>
</head>
<body>
  <h1>Measureless A capella </h1>
  <?php
  include "includes/navigation.php";
  ?>
  <h2>Contact Us</h2>

  <div class="contact">
    <form action="response.php" method="post" id="mainForm" novalidate>
      <p>If you would like to be on our contact list for future events and performances,
        feel free to sign up. All fields marked with an * are required</p>
        <div class="name">
          <label for="user_name">Name:*</label>
          <input type="text" id="name" name="user_name" required>
          <!-- this error message is hidden by default -->
          <span class="errorContainer hiddenError" id="nameError">
            Name is required.
          </span>
        </div>

        <div class="address">
          <label for="address">E-mail:*</label>
          <input type="email" id="address" name="address" required>
          <!-- this error message is hidden by default -->
          <span class="errorContainer hiddenError" id="emailError">
            Email Address is required.
          </span>
          <span class="errorContainer hiddenError" id="emailErrorFill">
            Not a valid Email Address.
          </span>
        </div>

        <div class ="stud">
          <span>Are you a student?</span><br>
          <input type="radio" name="stud" value="Yes">Yes<br>
          <input type="radio" name="stud" value="No">No<br>
        </div>

        <div class="grade">
          <span>What year are you?</span>
          <select name="year">
            <option value="N/A">        </option>
            <option value="High-school">High School</option>
            <option value="Freshman">Freshman</option>
            <option value="Sophomore">Sophomore</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="gender">
          <span>Gender:</span><br>
          <input type="radio" name="gender" value="Male"> Male<br>
          <input type="radio" name="gender" value="Female"> Female<br>
          <input type="radio" name="gender" value="Other"> Other<br>
        </div>

        <div class="know">
          <span>How did you find out about us?</span><br>
          <input type="radio" name="know" value="Facebook">Facebook<br>
          <input type="radio" name="know" value="Friend">Friend<br>
          <input type="radio" name="know" value="Concert">Concert<br>
          <input type="radio" name="know" value="Other"> Other
        </div>

        <div class="song">
          <span>Do you have any song suggestions for us to do
            in future performances (Please include title and performer)?</span><br>
            <textarea id="song" name="song"></textarea>
          </div>

          <div class="button">
            <button type="submit" name="submit" id="submit">Submit</button>
          </div>
        </form>
      </div>
    </body>
    </html>

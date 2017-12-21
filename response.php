<?php
$name=$_REQUEST["user_name"];
$email=$_REQUEST["address"];
$student=$_REQUEST["stud"];
$year=$_REQUEST["year"];
$sex=$_REQUEST["gender"];
$know=$_REQUEST["know"];
$song=$_REQUEST["song"];
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
  <h2>Contact Us</h2>
  <div class="response">
    <p>Dear <?php echo($name);?>,</p>
  </div>
  <div class="twoPar">
    <p>Thank you for responding and joining our contact list. We will E-mail you
      shortly at <?php echo($email);?> to inform you about upcoming events.</p>
      <p>We really appreciate it!!</p>
    </div>
    <div class="response">
      <p>Sincerely,</p>
    </div>
    <div class= "twoPar">
      <p>Your family at Measureless A capella</p>
    </div>
    <div class="responseList">
      <p>Responses to Other Questions:</p>
      <ul>
        <li>Student: <?php echo($student);?></li>
        <li>Grade: <?php echo($year);?></li>
        <li>Gender: <?php echo($sex);?></li>
        <li>How you know us: <?php echo($know);?></li>
        <li>Song Requests? <?php echo($song);?></li>
      </ul>
    </div>
  </body>

  </html>

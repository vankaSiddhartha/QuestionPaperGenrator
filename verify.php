<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // This block will execute only if the form is submitted via POST method
    
    // Retrieve the OTP entered by the user
    $entered_otp = $_POST['otp_input']; // Assuming you're getting it from a form submission

    // Retrieve the OTP stored in the session
    $stored_otp = $_SESSION['otp'];

    // Check if the entered OTP matches the stored OTP
    if ($entered_otp == $stored_otp) {
        // OTP is correct
        echo "<script>alert('otp is correct');</script>";
        echo "<script>window.location.assign('select.php');</script>";
        exit(); // Add this line to stop executing further PHP code
        // You can proceed with further actions here
    } else {
        // OTP is incorrect
        echo "<script>alert('otp is incorrect');</script>";
        // Handle the case where OTP doesn't match
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
           * {
    margin: 0;
    padding: 0;

    box-sizing: border-box;
}

/* Global styles */
body {
    width: 100%;
    height:100%;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f0f0f0;
    color: #333;
}
     .form {
  display: flex;
  margin-top:10%;
  align-items: center;
  flex-direction: column;
  justify-content: space-around;
  width: 300px;
  background-color: white;
  border-radius: 12px;
  padding: 20px;
}

.title {
  font-size: 20px;
  font-weight: bold;
  color: black
}

.message {
  color: #a3a3a3;
  font-size: 14px;
  margin-top: 4px;
  text-align: center
}

.inputs {
  margin-top: 10px
}

.inputs input {
  width: 32px;
  height: 32px;
  text-align: center;
  border: none;
  border-bottom: 1.5px solid #d2d2d2;
  margin: 0 10px;
}

.inputs input:focus {
  border-bottom: 1.5px solid royalblue;
  outline: none;
}

.action {
  margin-top: 24px;
  padding: 12px 16px;
  border-radius: 8px;
  border: none;
  background-color: royalblue;
  color: white;
  cursor: pointer;
  align-self: end;
}
    </style>
</head>

<body>
    <center>
    <form class="form"> <div class="title" >OTP</div> <div class="title">Verification Code</div> <p class="message">We have sent a verification code to your mobile number</p> <div class="inputs"> <input id="input1" type="text" maxlength="1"> <input id="input2" type="text" maxlength="1"> <input id="input3" type="text" maxlength="1"> <input id="input4" type="text" maxlength="1"> </div> <button class="action">verify me</button> </form>
</center>
</body>
</html>
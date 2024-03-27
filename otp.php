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
    <title>OTP</title>
    <style>
        body{
            width: 100%;
    height:100%;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f0f0f0;
    color: #333; 
        }
        input{
    display: block;
    height: 50px;
    width: 100%;
      background-color: white;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
    

    label {
        display: block;
        margin-bottom: 5px;
    }
    
   
    ::placeholder{
    color:white;
}
    button{
    margin-top: 50px;
    width: 100%;
    background-color: #f75842;
    color: #ffffff;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
form{
    height: 250px;
    width: 400px;
 
    position: absolute;
    transform: translate(-50%,-50%);
    top: 25%;
     background-color: white;
    left: 50%;
    border-radius: 10px;
    padding: 50px 35px;
    margin-top: 150px;
    
}
form *{
    font-family: 'Poppins',sans-serif;
    color:black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}

input{
    display: block;
    height: 50px;
    width: 100%;
    background-color:  #f0f0f0;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
input::placeholder {
color: #000000;
}
    

   
    </style>
</head>
<body>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="otp">Enter OTP</label>
        <input type="otp" placeholder="Enter Valid OTP" id="otp" name="otp_input" required>
        <button type="submit" name="submit" value="Submit">Submit</button>
    </form>
    </body>
</html>
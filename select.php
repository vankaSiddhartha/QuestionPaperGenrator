<?php
session_start(); // Start the session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // This block will execute only if the form is submitted via POST method
    
    // Retrieve the selected subject
    $selected_subject = $_POST['sub'];
    $selected_marks = $_POST['marks'];
    $_SESSION['marks'] = $selected_marks;
    // Store the selected subject in a session variable
    $_SESSION['selected_subject'] = $selected_subject;

    // Redirect to another page or perform further processing
    header("Location: qp.php?marks=$selected_marks");
    exit(); // Don't forget to exit to prevent further execution
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
    background-color: rgba(255,255,255,0.07);
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
    color:black;
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
    height: 350px;
    width: 400px;
    background-color:powderblue;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 25%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid white;
    box-shadow: 0 0 40px whitesmoke;
    padding: 50px 35px;
    margin-top: 150px;
         background-color: white;
    
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
select{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
   
}

input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
    

   
    </style>
</head>
<body>
    <form method="post">
        <label for="sub">Subjects</label>

        <select name="sub" id="subs">
          <option value="WT">Web Technologies</option>
          <option value="NNDL">NNDL</option>
          <option value="CD">CD</option>
          <option value="OOSE">OOSE</option>
        </select>
           <label for="sub">Marks</label>

        <select name="marks" id="marks">
          <option value="20">20M</option>
          <option value="40">40M</option>
          <option value="60">60M</option>
        </select>
       
       
        <button type="submit" name="submit" onclick="myfunc()">Submit</button>
   
    </form>
    <script>
  function myfunc() {
    // Redirect to select.php
    window.location.assign('qp.php');
  }
</script>
    </body>
</html>
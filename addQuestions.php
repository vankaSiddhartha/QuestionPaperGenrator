<?php
session_start(); // Start the session

// Database connection parameters
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "auth";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    // Retrieve form data
  $question = $_POST['addques'];
$select_co = $_POST['co'];
$marks = $_POST['marks']; // <-- Add semicolon here
$finalQues = $question . " " . $select_co . " " . $marks;


    // SQL query to insert the question into the 'wt' table
    $sql = "INSERT INTO wt (Question) VALUES ('$finalQues')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        
    //    echo "<script>
    //     swal({  
    //         title: 'Good job!',  
    //         text: 'Click!',  
    //         icon: 'success',  
    //         button: 'oh yes!',  
    //     });  
    // </script>";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
 

    <title>add question</title>
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
#addques{
    rows="4" cols="50"
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
height: 400px;
width: 400px;
top: 25%;
     background-color: white;
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
background-color: rgba(255,255,255,0.07);
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
       
        <label for="co">CO'S</label>

        <select name="co" id="co">
          <option value="(CO1)">C01</option>
          <option value="(CO2)">C02</option>
          <option value="(CO3)">C03</option>
          <option value="(CO4)">C04</option>
          <option value="(CO5)">C05</option>
        </select>
         <label for="marks">Marks</label>
        <select name="marks" id="marks">
            <option value="(8M)">8M</option>
            <option value="(4M)">4M</option>
            <option value="(10M)">10M</option>
        </select>
     <label for="addques">Add Question</label> 
   <input type="textarea" rows="4" cols="50" id="addques" name="addques" placeholder="add question here" required> 
   <button type="submit" name="submit" onclick="myfunc()">Submit</button>
   
</form>
</body>
</html>
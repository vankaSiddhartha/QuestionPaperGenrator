<?php
session_start(); 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "auth";
 $marks = $_GET['marks'];
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM wt";

$result = $conn->query($query);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

$questions = array();
while ($row = $result->fetch_assoc()) {
    $questions[] = $row['Question'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Question Paper</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
 <!-- Include Chart.js -->

<style>
  body, html {
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  display: flex;
}

#sidebar {
  width: 25%;
  background-color: #f4f4f4;
  padding: 20px;
  box-sizing: border-box;
  height: 100%;
  overflow-y: auto;
}

/* Add this CSS at the end of your existing styles */

/* Styling for the question list */
#questionList {
  list-style: none;
  padding: 0;
  margin: 0;
}

#questionList li {
  margin-bottom: 10px;
  cursor: pointer;
  padding: 15px;
  background-color: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s, transform 0.2s;
}

#questionList li:hover {
  background-color: #e0e0e0;
}

/* Styling for the question text */
.question-text {
  font-weight: bold;
  color: #333;
}

/* Styling for the question number */
.question-number {
  color: #555;
}


#main {
  flex-grow: 1;
  padding: 20px;

  box-sizing: border-box;
  text-align: center;
  height: 100%;
  overflow-y: auto;
}

#questionPaper {
   border: 2px solid #000; /* Add border to question paper */
  padding: 10px; /* Add padding to question paper */
  width: 70%;
  height: auto;
  margin: 0 auto; 
}

.question {
  border: 1px solid #ccc; /* Add border to individual question */
  padding: 10px; /* Add padding to individual question */
 
}
  body, html {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: Arial, sans-serif;
    display: flex;
  }

  #sidebar {
    width: 25%;
    background-color: #f4f4f4;
    padding: 20px;
   
    box-sizing: border-box;
    height: 100%;
    overflow-y: auto;
  }

  #questionList {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  #questionList li {
    margin-bottom: 10px;
    cursor: pointer;
  }

  #questionList li:hover {
    color: blue;
    
  }

  #main {
    flex-grow: 1;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    height: 100%;
     text-align:left;
    overflow-y: auto;
  }
  .separate-box {
    margin-bottom: 10px; /* Add margin bottom */
    border: 1px solid #ccc; /* Add border */
    padding: 5px; /* Add padding */
    border-radius: 5px; /* Add border radius for rounded corners */
  }
    #pieChartCanvas {
      display: block;
    margin: 10px auto;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  #banner{
    height:100px;
    width: 100%;
  }
  /* Existing CSS styles... */

/* Add more CSS styles here */

/* Styling for buttons */
button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-bottom: 10px;
  transition: background-color 0.3s, transform 0.2s;
}

button:hover {
  background-color: #45a049;
  transform: scale(1.05);
}

/* Styling for CO buttons */
.coButton {
  background-color: #008CBA;
}

.coButton:hover {
  background-color: #005f78;
}

/* Styling for undo button */
#undoButton {
  background-color: #f44336;
}

#undoButton:hover {
  background-color: #d32f2f;
}

/* Styling for print button */
#print {
  background-color: #555555;
}

#print:hover {
  background-color: #333333;
}

/* Styling for question paper */
#questionPaper {
  border: 2px solid #000;
  padding: 20px;
  width: 70%;
  margin: 0 auto;
  background-color: #f9f9f9;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

/* Styling for banner */
#banner {
  display: block;
  width: 100%;
  height: auto;
  margin-bottom: 20px;
  border-radius: 10px;
}

/* Styling for pie chart canvas */
#pieChartCanvas {
  display: block;
  margin: 10px auto;
  border: 1px solid #ccc;
  border-radius: 10px;
}

/* Additional styling for separate box */
.separate-box {
  background-color: #ffffff;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
}

/* Additional styling for question label */
.question > div:first-child {
  font-weight: bold;
  color: #333;
}

/* Additional styling for question text */
.question > div:last-child {
  margin-top: 10px;
  color: #555;
}

/* Responsive styling */
@media screen and (max-width: 768px) {
  #sidebar {
    width: 100%;
    padding: 10px;
  }

  #main {
    width: 100%;
    padding: 10px;
  }

  #questionPaper {
    width: 100%;
    height: 100%;
  }
}

 @media print {
  /* Adjust border style for question paper */
  #questionPaper {
    
   
  }

  /* Ensure that the banner image appears on print */
  #banner {
    display: block !important;
  }
}

</style>
</head>
<body>
  <div id="sidebar">
               <button id="add">Add</button>
    <button class="coButton" data-co="CO1">CO1</button>
    <button class="coButton" data-co="CO2">CO2</button>
    <button class="coButton" data-co="CO3">CO3</button>
    <button class="coButton" data-co="CO4">CO4</button>
<button class="coButton" data-co="CO5">CO5</button>
    <button class="coButton" data-co="8">8M</button>
        <button class="coButton" data-co="4">4M</button>
          <button class="coButton" data-co="10">10M</button>

<button id="showAll">ALL</button>
    <h2>Question List</h2>

    <ul id="questionList">
      <?php
      // Output each question as a list item
      foreach ($questions as $question) {
          echo "<li>$question</li>";
      }
      ?>
    </ul>

  </div>
  <div id="main">
      <button id="undoButton">Undo</button>
     <button id="print">Print</button>

  
    <div id="questionPaper">
      <img id = "banner" src="https://www.onlinesystem.anits.edu.in/nri/img/banner.jpg" alt="banner">
      <!-- Your question paper content here -->
    

    </div>
      
  
  </div>

  <script>

    const questionPaper = document.getElementById("questionPaper");
    const undoButton = document.getElementById("undoButton");
    const questionList = document.getElementById("questionList");
      const printButton = document.getElementById("print");
      const sidebar = document.getElementById("sidebar")
      const addBtn = document.getElementById("add");
        addBtn.addEventListener('click', function(e) {
    window.location.assign('addQuestions.php');
  });
    const addedQuestions = [];
    const showAllButton = document.getElementById('showAll');
showAllButton.addEventListener('click', showAllQuestions);
    function showAllQuestions() {
    const allQuestions = <?php echo json_encode($questions); ?>;
    
    questionList.innerHTML = '';

    allQuestions.forEach(question => {
        const listItem = document.createElement('li');
        listItem.textContent = question;
        questionList.appendChild(listItem);
    });
}

let unitCounter = 1;
let totalMarks  = 0;
 var marks = <?php echo json_encode($marks); ?>;
    function addQuestionToPaper(question) {
    if(question.includes("(8M)")){
      totalMarks+=8;
}
    if(totalMarks>marks){
      swal("Oops!", "You are exceeding the limit question papaer is only for "+marks, "error");  

  }else{
      const questionDiv = document.createElement("div");
      questionDiv.classList.add("question");

      question = question.replace(/^(q\d+\.\s*)/, '');

      const questionNumber = Math.floor(addedQuestions.length / 2) + 1;
      const subQuestionLetter = addedQuestions.length % 2 === 0 ? 'a.' : 'b.';
         if (subQuestionLetter === 'a.') {
          // Create a separate box for the unit
          const separateBox = document.createElement("div");
          separateBox.classList.add("separate-box");
          const divv = document.createElement("div");
          divv.textContent = "Unit " + unitCounter;
          separateBox.appendChild(divv);
          questionDiv.appendChild(separateBox);

          // Increment the unit counter
          unitCounter++;
      }

      const questionLabel = questionNumber + subQuestionLetter + " ";
      const questionLabelElement = document.createElement("div");
      questionLabelElement.textContent = questionLabel;
      questionLabelElement.style.float = "left";
      questionDiv.appendChild(questionLabelElement);

      const questionTextElement = document.createElement("div");
      questionTextElement.textContent = question;
      questionDiv.appendChild(questionTextElement);

      questionPaper.appendChild(questionDiv);
      addedQuestions.push(questionDiv);
    }
    }

    function undoLastQuestion() {
    if (addedQuestions.length > 0) {
        const lastQuestion = addedQuestions.pop();
        questionPaper.removeChild(lastQuestion);

        // Check if the last removed question was from a separate unit
        const lastQuestionText = lastQuestion.textContent;
        if (lastQuestionText.includes("Unit")) {
            unitCounter--; // Decrement unit counter only if it's a separate unit
        }
    }
}
function filterQuestionsByCO(co) {
  //alert(co)
  
    
    const filteredQuestions = <?php echo json_encode($questions); ?>.filter(question => {
      
        return question.includes(co);
    });
    
    questionList.innerHTML = '';

    filteredQuestions.forEach(question => {
        const listItem = document.createElement('li');
        listItem.textContent = question;
        questionList.appendChild(listItem);
    });
}
function showAllQuestions() {
    const allQuestions = <?php echo json_encode($questions); ?>;
    
    questionList.innerHTML = '';

    allQuestions.forEach(question => {
        const listItem = document.createElement('li');
        listItem.textContent = question;
        questionList.appendChild(listItem);
    });
}


const coButtons = document.querySelectorAll('.coButton');
coButtons.forEach(button => {
    button.addEventListener('click', function() {
        filterQuestionsByCO(button.dataset.co);
    });
});


    undoButton.addEventListener("click", undoLastQuestion);

    questionList.addEventListener("click", (event) => {
      const clickedItem = event.target;
      if (clickedItem.tagName === "LI") {
        addQuestionToPaper(clickedItem.textContent);
      }
    });
function printQuestionPaper() {
 
    // Hide the sidebar
    const sidebar = document.getElementById("sidebar");
    sidebar.style.display = "none";

    // Request fullscreen
    if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) { /* Firefox */
        document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
        document.documentElement.webkitRequestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) { /* IE/Edge */
        document.documentElement.msRequestFullscreen();
    }
  
    // Hide undo and print buttons
    const undoButton = document.getElementById("undoButton");
    const printButton = document.getElementById("print");
    undoButton.style.display = "none";
    printButton.style.display = "none";

    // Adjust the size of the questionPaper div for two pages
    const questionPaper = document.getElementById("questionPaper");
    const pageHeight = 842; // A4 paper height in pixels (approximately)
    const totalContentHeight = questionPaper.scrollHeight;
    const maxContentHeightPerPage = pageHeight * 2; // Maximum content height for two pages
    
    // Check if content fits within two pages
    if (totalContentHeight <= maxContentHeightPerPage) {
        // If content fits within two pages, set height to auto
        questionPaper.style.height = "auto";
    } else {
        // If content exceeds two pages, split into two sections and set height for each
        const contentSection1Height = maxContentHeightPerPage;
        const contentSection2Height = totalContentHeight - maxContentHeightPerPage;
        
        // Set heights for each section
        questionPaper.style.height = contentSection1Height + "px";
        // Add CSS to force page break after the first section
        questionPaper.style.cssText += "page-break-after: always;";
        
        // Create a new div for the second section
        const secondSection = document.createElement("div");
        secondSection.id = "secondSection";
        secondSection.innerHTML = questionPaper.innerHTML;
        secondSection.style.height = contentSection2Height + "px";
        secondSection.style.pageBreakInside = "avoid"; // Prevent page break inside the second section
        
        // Replace the content of questionPaper with the two sections
        questionPaper.innerHTML = "";
        questionPaper.appendChild(secondSection);
    }

    // Scroll to the top
    window.scrollTo(0, 0);
     document.getElementById("questionPaper").style.weidth = "60%";


    // Print the document
 
    window.print();
}




      printButton.addEventListener("click", printQuestionPaper);
  </script>
</body>
</html>

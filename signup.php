<?php 
  // check if the data is valid
  // echo $_POST['txtSignupStudentName'] ?? "You did not post anything";

  if(isset($_POST['txtSignupStudentName'])){
    echo "form submitted";
    $sSignupStudentName = $_POST['txtSignupStudentName'];
    //validate the name
    if( strlen($sSignupStudentName) >=2 && strlen($sSignupStudentName) <= 10 ){
      // save name to file
      $sData = file_get_contents("database.txt");
      $jData = json_decode($sData);

      $sNewStudent = '{}';
      $jNewStudent = json_decode($sNewStudent);
      $jNewStudent->id = uniqid();
      $jNewStudent->name = $sSignupStudentName;

      array_push($jData->students, $jNewStudent);
      // encode jData to display it in file
      $sFinalData = json_encode($jData);

      // add jData to file
      file_put_contents("database.txt", $sFinalData);

      // take the user to the success page
      header("Location: signup-student-ok.php");
    } else {
      header("Location: signup-student-error.php");
    }
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign up Students</title>
  <style>
    input.invalid{
      border: 2px solid red;
    }
  </style>
</head>
<body>
  <h1>SIGN UP STUDENTS</h1>
  <form id="frmSignupStudent" action="signup.php" method="POST">
    <input name="txtSignupStudentName" type="text" maxLength="10">
    <button>sign me up</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script>
    // $("#frmSignupStudent").submit(function(){
    //   // validate the name min 2 max 10
    //   let sSignupStudentName = $("#txtSignupStudentName").val();
    //   if(sSignupStudentName.length >= 2 && sSignupStudentName.length <= 10){
    //     // submit form
    //     return true;
    //   } else {
    //     // something is not valid - e.g. number of characters
    //     $("#txtSignupStudentName").addClass("invalid");
    //     return false;
    //   }
    // })

    // initial database structure
    // json object but text
    // {
    //   "name": "Uni name here",
    //   "address": "address here",
    //   "students": []
    // }
  </script>
  
</body>
</html>
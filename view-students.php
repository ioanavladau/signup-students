<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>All Students</h1>
  <div><a href="signup.php">Sign up again</a></div><br>

  <?php
    $sData = file_get_contents("database.txt");
    $jData = json_decode($sData);
    // echo $sData;
    foreach($jData->students as $jStudent){
      echo "<div>
              <div>$jStudent->name</div>
              <div>$jStudent->id</div>  
            </div><br>";
    }
  ?>
</body>
</html>
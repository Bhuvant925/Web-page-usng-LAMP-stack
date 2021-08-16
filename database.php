<?php

  $servername = "localhost";
  $username = "root";
  $password = "" ; 

  $conn = new mysqli($servername, $username, $password,'studentdb');

  // select data from table
  $sql = 'SELECT studentname,email,birth,TIMESTAMPDIFF(YEAR,birth,CURDATE()) AS Age FROM studentdetails';

  $result = mysqli_query($conn,$sql);
  $studentdetails = array();
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    array_push($studentdetails,$row);
  }
  mysqli_free_result($result);
  mysqli_close($conn);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet1.css">
    <title>DATABASE</title>
</head>
<body>
  <?php include('index.html'); ?>
  <div class="top">
    <table id="t1">
        <caption id="capt">STUDENT DATABASE</caption>
        <tr class="row">
            <th scope="main_col" class="row-0">Name</th>
            <th scope="main_col" class="row-0">Email</th>
            <th scope="main_col" class="row-0">Birth</th>
            <th scope="main_col" class="row-0">Age</th>
        </tr>
        <?php foreach($studentdetails as $sd) { ?>
          <tr class="row">
            <td class="rows"><?php echo htmlspecialchars($sd['studentname']) ?> </td>
            <td class="rows"><?php echo htmlspecialchars($sd['email']) ?> </td>
            <td class="rows"><?php echo htmlspecialchars($sd['birth']) ?> </td>
            <td class="rows"><?php echo htmlspecialchars($sd['Age']) ?> </td>
          </tr>
          <?php } ?>
    </table>
  </div>
</body>
</html>
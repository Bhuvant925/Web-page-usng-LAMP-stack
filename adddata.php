<?php

    // creating connection with database to add data
    $servername = "localhost";
    $username = "root";
    $password = "" ;
    $conn = new mysqli($servername, $username, $password,'studentdb');
    if(!$conn)
    {
        echo 'connection error' .$conn->error;
    }
    if(isset($_POST['add']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $sql = "INSERT INTO studentdetails(studentname,email,birth)
        VALUES ('$name','$email','$birth')";
        if(mysqli_query($conn,$sql))
        {
           header('Location:database.php');
        }
        else
        {
            echo 'NOT SUCCESSFUL' .mysqli_error($conn);
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD DATA</title>
</head>
<body>
<?php include('index.html'); ?>
<div class="form-total">
    <form action="adddata.php" method="POST" autocomplete="on" >
        <div class="form-elements">
            <label>Name</label><br>
            <input required="true" placeholder ="Name" class="input" type="text" name="name">
        </div>
        <div class="form-elements">
            <label >Email</label><br>
            <input required="true" placeholder ="Email" class="input" type="email" name="email">
        </div>
        <div class="form-elements">
            <label>Date of Birth</label><br>
            <input required="true" class="input" type="date" name="birth">
        </div>
        <div>
            <input class="add" name ="add" type="submit" value="Add">
        </div>
    </form>
</div>
</body>
</html>
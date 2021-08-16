<?php
    $servername = "localhost";
    $username = "root";
    $password = "" ; 
  
    $conn = new mysqli($servername, $username, $password,'studentdb');

    if(!$conn)
    {
        echo 'Connection Failed' .mysqli_connect_error();
    }
    // select to delete a record from table
    if(isset($_POST['delete']))
    {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        echo $email;
        $sql = "DELETE  FROM studentdetails where email = '$email'";
        if(mysqli_query($conn,$sql))
        {
           header('Location:database.php');
        }
        else
        {
            echo 'Failure' .mysqli_error($conn);
        }
    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            align-content:center;
            text-align: center;
            background-color: rgb(222, 222, 222);
            font-family:'Segoe UI', Tahoma, Verdana, sans-serif;
            margin:0px 0px 5px 0px;
        }

        form{
            background-color: rgb(204, 204, 200);
            display:inline;
            margin:5px;
            border-radius:10px;
            padding:5px;
            width: max-content;
        }
        .form-total{
            display:inline-flex;
        }
        .form-elements{
            text-align:left;
            width:250px;
            margin:10px;
            padding:5px;
        }
        .input{
            padding:5px;
            border-radius:5px;
            width:100%;
            border-color: rgb(0, 0, 0);
            box-sizing: border-box;
            margin:10px 5px 0px 0px;
        }
        .delete{
            margin:5px 15px 15px 15px;
        }
        .delete:hover{
            background-color:red;
            color:whitesmoke;
        }
    </style>
    <title>DELETE DATA</title>
</head>
<body>
<?php include('index.html'); ?>
<div class="form-total">
    <form action="delete.php" method="POST" autocomplete="on" >
        <div class="form-elements">
            <label >Email of Student To Delete</label>
            <input required="true" placeholder ="Email" class="input" type="email" name="email">
        </div>
        <div>
            <input class="delete" name ="delete" type="submit" value="Delete">
        </div>
    </form>
</div>
</body>
</html>
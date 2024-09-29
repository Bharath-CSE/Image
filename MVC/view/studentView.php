<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>StudentView</title>
    <style>
        *
        {
            margin:0px;
            padding:0px;
        }
        body 
        {
            font-family:arial;
            background-color:grey;
            padding:50px;
        }
        .studentDetails
        {
            background-color:white;
            padding:20px;
            border-radius:10px;
            width:400px;
            margin:0px auto;
            text-align:center;
        }
        .studentDetails img 
        {
            margin-bottom:15px;
            height:130px;
            width:130px;
            border-radius:50%;
        }
        .studentDetails p 
        {
            margin:10px 0;
            line-height:1.6;
        }
    </style>
</head>
<body>
        <?php
            foreach($data as $row)
            {
                $name=$row['first_name'].$row['last_name'];
                $dob=$row['dob'];
                $email=$row['email'];
                $number=$row['number'];
                $image=$row['image'];
            }
        ?>  
        <div class='studentDetails'>
            <img src=<?php echo $image; ?>>
            <p><strong>Name: </strong><?php echo $name; ?></p>
            <p><strong>DOB: </strong><?php echo $dob; ?></p>
            <p><strong>Email: </strong><?php echo $email; ?></p>
            <p><strong>Number: </strong><?php echo $number; ?></p>
        </div>
</body>
</html>

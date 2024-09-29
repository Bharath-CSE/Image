<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>StudentList</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION["Name"] ?></h1><br>
    <form method="post" action="index.php?mod=student&view=studentList">
        <div class='form-group'>
                    <label><b>
                            Email :
                        </b>
                    </label><br>
                    <input type='email' name='filter' required>
        </div><br>
        <input type='submit' class='btn btn-primary' name='submit'><br>
    </form><br>
    <table cellspacing='0' cellpadding='20' border='1' width='800'>
        <tr>
            <td>Name</td>
            <td>DOB</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($rows as $row) 
        {
            echo "<tr>
                        <td>{$row['first_name']} {$row['last_name']}</td>
                        <td>{$row['dob']}</td>
                        <td><button><a href=index.php?mod=student&view=getStudentDetails&id={$row['student_id']}>Update</a></button> 
                        <button><a href=index.php?mod=student&view=deleteStudent&id={$row['student_id']}>Delete</a></button>
                        <button><a href=index.php?mod=student&view=viewStudent&id={$row['student_id']}>View</a></button>
                        </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
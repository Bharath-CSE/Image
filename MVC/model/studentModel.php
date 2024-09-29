<?php

    if(file_exists("common/database.php"))
    {
        include_once "common/database.php";
    }
    
    class StudentModel extends database_connection
    {
        //This function is for get the data from database and return the data
        function studentList($filter)
        {
            $db=$this->connect();
            $query="select student_id,first_name,last_name,dob from student_list where status=:status";
            if(isset($filter))
            {
                $data=$db->prepare($query." && email=:email");
                $data->bindParam(":email",$filter);
            }
            else
            {
                $data=$db->prepare($query);
            }
            $status="Yes";
            $data->bindParam(":status",$status);
            $data->execute();
            $rows = $data->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        //This function is for insert the data to the database
        function studentForm($arr)
        {
                $db=$this->connect();
                $data=$db->prepare("insert into student_list(first_name,last_name,dob,email,number,image) values(:first_name,:last_name,:dob,:email,:number,:image)");
                $data->bindParam(":first_name",$arr["firstname"]);
                $data->bindParam(":last_name",$arr['lastname']);
                $data->bindParam(":dob",$arr['dob']);
                $data->bindParam(":email",$arr['email']);
                $data->bindParam(":number",$arr['number']);
                $data->bindParam(":image",$arr['image']);
                $data->execute();
        }

        function getStudentDetails($id)
        {
            $db=$this->connect();
            $data=$db->prepare("select * from student_list where student_id=:id");
            $data->bindParam(":id",$id);
            $data->execute();
            $rows = $data->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        function updateForm($arr)
        {
            $db=$this->connect();
                $data=$db->prepare("update student_list set first_name=:first_name,last_name=:last_name,dob=:dob,email=:email,number=:number,image=:image where student_id=:id");
                $data->bindParam(":first_name",$arr["firstname"]);
                $data->bindParam(":last_name",$arr['lastname']);
                $data->bindParam(":dob",$arr['dob']);
                $data->bindParam(":email",$arr['email']);
                $data->bindParam(":number",$arr['number']);
                $data->bindParam(":image",$arr['image']);
                $data->bindParam(":id",$arr["id"]);
                $data->execute();
                $rows = $data->fetchAll(PDO::FETCH_ASSOC);
                return $rows;
        }

        function deleteStudent($id)
        {
            $status="No";
            $db=$this->connect();
                $data=$db->prepare("update student_list set status=:status where student_id=:id");
                $data->bindParam(":status",$status);
                $data->bindParam(":id",$id);
                $data->execute();
        }

        function login($username)
        {
            $db=$this->connect();
            $data=$db->prepare("select password from students where userName=:userName");
            $data->bindParam(":userName",$username);
            $data->execute();
            return $data;
        }

        // function filteredData($email)
        // {
        //     $db=$this->connect();
        //     $data=$db->prepare("select * from student_list where email=:email");
        //     $data->bindParam(":email",$email);
        //     $data->execute();
        //     $rows = $data->fetchAll(PDO::FETCH_ASSOC);
        //     return $rows;
        // }

    }
?>
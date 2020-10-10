<?php
$con = mysqli_connect('localhost','root','');
if($con)
{
echo "";
}
else
{
die("connection failed: ".mysqli_connect_error());
}
$con->set_charset("utf8");
$db_selected = mysqli_select_db($con,'newStudent');
if(!$db_selected)
{
    $sql = "create database newStudent";
    $result=mysqli_query($con,$sql);
    if($result==1)
    {

        mysqli_select_db($con,'newStudent');
        
        $sql1 = "create table personal_info (email varchar(50) primary key, 
        name varchar(40), father_name varchar(40), dob varchar(50), 
        course varchar(40), gender varchar(10), ph_no varchar(20),category varchar(40), address varchar(150), img varchar(200))";


        $result1 = mysqli_query($con, $sql1);

        if($result1==1)
        {
            
            $sql2 ="create table secondary_education (email varchar(50), school_name varchar(50),
            state varchar(30), year_of_passing varchar(10), aggregate varchar(20), board varchar(40),
            constraint cons1 foreign key(email) references personal_info(email) on delete cascade)";

            $result2 = mysqli_query($con, $sql2);

            if($result2==1)
            {
                $sql3 = "create table primary_education (email varchar(50), school_name varchar(50),
                state varchar(30), year_of_passing varchar(10), aggregate varchar(20), board varchar(40),
                constraint cons2 foreign key(email) references personal_info(email) on delete cascade)";

                $result3 = mysqli_query($con, $sql3);

                if($result3==1)
                {
                    $sql4 = "create table competitive_exams (email varchar(50), reg_no varchar(50), admission_no varchar(50),
                     date_of_issue varchar(50), rank varchar(20), constraint cons3 foreign key(email) references personal_info(email) on delete cascade)";

                     $result4 = mysqli_query($con, $sql4);

                    if($result4==1)
                    {
                        $sql5 = "create table other_info (email varchar(50), extra varchar(150), 
                        constraint cons4 foreign key(email) references personal_info(email) on delete cascade)";

                        $result5 = mysqli_query($con, $sql5);
                        if($result5==1)
                        {
                            $sql6 = "create table student_documents (email varchar(50), documents varchar(150), 
                             constraint cons5 foreign key(email) references personal_info(email) on delete cascade)";

                            $result6 = mysqli_query($con, $sql6);
                            if($result6==1)
                            {
                                echo "Tables created successfully";
                            }
                        
                        }
                    }


                }


            }
        }
        else
        {
            echo "Error : ".$con -> error;
        }

    }
    else
    {
        echo "Error : ".$con -> error;
    }
}
?>
<?php
require "./config.php"
?>
<?php

//Personal Info
$email = $_POST["email"];
$name = $_POST["studentName"];
$father_name = $_POST["fatherName"];
$dob = $_POST["BirthdayDay"]."-".$_POST["BirthdayMonth"]."-".$_POST["BirthdayYear"];echo $dob;
$course = $_POST["studentCourse"];
$gender = $_POST["gender"];
$ph_no = $_POST["studentPhone"];
$category = $_POST["category"];
$address = $_POST["address"];
$filename = $_FILES["studentImage"]["name"];
$tempname = $_FILES["studentImage"]["tmp_name"];
$folder = "../student_img/".$email.$filename;
move_uploaded_file($tempname,$folder);

//secondary education info
$secondary_school_name = $_POST["pucName"];
$secondary_state = $_POST["pucState"];
$secondary_year_of_passing = $_POST["pucPassingYear"];
$secondary_aggregate = $_POST["pucAvg"].$_POST["pucAvgType"];echo $secondary_aggregate;
$secondary_board = $_POST["pucBoardName"];

//primary education info

$primary_school_name = $_POST["schoolName"];
$primary_state = $_POST["schoolState"];
$primary_year_of_passing = $_POST["schoolPassingYear"];
$primary_aggregate = $_POST["schoolAvg"].$_POST["schoolAvgType"];
$primary_board = $_POST["schoolBoardName"];

//competitive exams

$reg_no = $_POST["registrationNo"];
$admission_no = $_POST["admissionOrderNo"];
$date_of_issue = $_POST["dayOfIssue"]."-".$_POST["monthOfIssue"]."-".$_POST["yearOfIssue"];
$rank = $_POST["rank"];

//others

$extra = $_POST["extra"];

//documents
$filename1 = $_FILES["studentDocument"]["name"];
$tempname1 = $_FILES["studentDocument"]["tmp_name"];
$folder1 = "../documents/".$email.$filename1;
move_uploaded_file($tempname1,$folder1);

//Inserting into database

$query = "insert into personal_info (email, name, father_name, dob, course, gender, ph_no, address, img, category) values 
('$email', '$name', '$father_name', '$dob', '$course', '$gender', '$ph_no', '$address', '$folder', '$category')";
$query_result = mysqli_query($con, $query);
if($query_result)
{
    $query1 = "insert into secondary_education values ('$email', '$secondary_school_name', '$secondary_state', 
    '$secondary_year_of_passing', '$secondary_aggregate', '$secondary_board')";
    $query_result1 = mysqli_query($con, $query1);
    if($query_result1)
    {
        $query2 = "insert into primary_education values ('$email', '$primary_school_name', '$primary_state', 
        '$primary_year_of_passing', '$primary_aggregate', '$primary_board')";
        $query_result2 = mysqli_query($con, $query2);
        if($query_result2)
        {
            $query3 = "insert into competitive_exams values ('$email', '$reg_no', '$admission_no', '$date_of_issue', '$rank')";
            $query_result3 = mysqli_query($con, $query3);
            if($query_result3)
            {
                $query4 = "insert into other_info values ('$email', '$extra');";
                $query_result4 = mysqli_query($con, $query4);
                if($query_result4)
                {
                   
                    $query5 = "insert into student_documents values ('$email', '$folder1')";
                    $query_result5 = mysqli_query($con, $query5);
                    if($query_result5)
                    {
                        echo "Successfull.";
                        ?>
                        <script>
                            window.alert("Application Recieved")
                            window.location.href="../student.html"
                        </script>
                        <?php
                    }
                }
            }
        }
    }
}
else{
    echo "Error :".$con ->error;
    ?>
    <script>
        window.alert("Email id already exist!")
        window.location.href="../student.html"
    </script>
    <?php
}

?>
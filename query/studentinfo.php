<?php require "./config.php"; ?>
<?php
$email = $_GET["email"];

$query = "select * from competitive_exams c,other_info o,personal_info p,primary_education pe
where p.email=c.email and p.email=o.email and p.email=pe.email and p.email='$email'";

$query_result = mysqli_query($con,$query);
$row = mysqli_fetch_array($query_result);
if($query_result)
{
  $query1 = "select * from secondary_education where email='$email'";
  $query_result1 = mysqli_query($con,$query1);
  $row1 = mysqli_fetch_array($query_result1);
}


//Personal Info
$email = $row["email"];
$name = $row["name"];
$father_name = $row["father_name"];
$dob = $row["dob"];
$course = $row["course"];
$gender = $row["gender"];
$ph_no = $row["ph_no"];
$address = $row["address"];
$img = $row["img"];
$category = $row["category"];

//secondary education info
$secondary_school_name = $row1["school_name"];
$secondary_state = $row1["state"];
$secondary_year_of_passing = $row1["year_of_passing"];
$secondary_aggregate = $row1["aggregate"];
$secondary_board = $row1["board"];

//primary education info

$primary_school_name = $row["school_name"];
$primary_state = $row["state"];
$primary_year_of_passing = $row["year_of_passing"];
$primary_aggregate = $row["aggregate"];
$primary_board =  $row["board"];

//competitive exams

$reg_no = $row["reg_no"];
$admission_no = $row["admission_no"];
$date_of_issue = $row["date_of_issue"];
$rank = $row["rank"];

//others

$extra = $row["extra"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
    <style>
        body{
            border: 2px solid black;
        }
        .container{
            width: auto;
            margin: auto;
            text-align: center;
            height: 380px;
        }
        div.image{
            content: url(<?php echo $img?>);
            width: 18%;
            margin-left: 5%;
            float: left;
            border: 1px solid black;
        }
        .info{
            width: 70%;
            float: right;
            text-align: left;
        }
        .education{
            width: 40%;
            margin:auto;
        }
        .education h2{
            text-align:center;
        }
        span{
            font-style:italic;
            font-weight:normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Application Form</h1>
        <div class="image"></div>
        <div class="info">
            <h4>Name Of Candidate : <span><?php echo $name?></span></h4>
            <h4>Father's/Guardian's Name : <span><?php echo $father_name?></span></h4>
            <h4>Email : <span><?php echo $email?></span></h4>
            <h4>Phone No : <span><?php echo $ph_no?></span></h4>
            <h4>Gender : <span><?php echo $gender?></span></h4>
            <h4>Category : <span><?php echo $category?></span></h4>
            <h4>Date Of Birth : <span><?php echo $dob?></span></h4>
            <h4>Address : <span><?php echo $address?></span></h4>
        </div>
    </div>
    <div class="education">
        <h2>Secondary Education</h2>
        <h4>School/College Name : <span><?php echo $secondary_school_name?></span></h4>
        <h4>Board/University : <span><?php echo $secondary_board?></span></h4>
        <h4>State : <span><?php echo $secondary_state?></span></h4>
        <h4>Year Of Passing : <span><?php echo $secondary_year_of_passing?></span></h4>
        <br><br>
    </div>
    <div class="education">
        <h2>Primary Education</h2>
        <h4>School/College Name : <span><?php echo $primary_school_name?></span></h4>
        <h4>Board/University : <span><?php echo $primary_board?></span></h4>
        <h4>State : <span><?php echo $primary_state?></span></h4>
        <h4>Year Of Passing : <span><?php echo $primary_year_of_passing?></span></h4>
        <br><br>
    </div>
    <div class="education">
        <h2>Entrance Exam </h2>
        <h4>Registration No : <span><?php echo $reg_no?></span></h4>
        <h4>Admission No : <span><?php echo $admission_no?></span></h4>
        <h4>Date Of Issue : <span><?php echo $date_of_issue?></span></h4>
        <h4>Rank : <span><?php echo $rank?></span></h4>
        <br><br>
    </div>
    <div class="education">
        <h2>Sports/NCC/NSS/Extra Curricular Activities</h2>
        <p><?php echo $extra?></p>
    </div>
</body>
</html>
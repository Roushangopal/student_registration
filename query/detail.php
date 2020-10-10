
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
<html>
<head>
<title>details</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">

<style>

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
</head>
<body style="background-color:powderblue">

<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <div class="w3-row-padding">
 
    <div class="w3-third">
    
      <div class=" w3-text-grey w3-card-4" style="background-color:powderblue">
        <div class="w3-display-container">
          <img src="<?php echo $img?>" style="width:100%;height:320px;" alt="<?php echo $img?>" >
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class=" w3-margin-right w3-large w3-text-teal"></i>Name : <?php echo $name ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i>Gender : <?php echo $gender ?></p>
          <p><i class=" w3-margin-right w3-large w3-text-teal"></i>S/O:-<?php echo $father_name ?></p>
          <p><i class=" w3-margin-right w3-large w3-text-teal"></i>Email : <?php echo $email ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i>Mob : <?php echo $ph_no ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i>DOB : <?php echo $dob ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i>Course : <?php echo $course ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i>Category : <?php echo $category ?></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i><a href='./pdf.php?email=<?php echo $email ?>'>download</a></p>
          <p><i class="w3-margin-right w3-large w3-text-teal"></i><a href='./studentinfo.php?email=<?php echo $email ?>'>view</a></p>
          <hr>
          <br>
        </div>
      </div><br>
    </div>

    <div class="w3-twothird">
    
      <div class="w3-container w3-card  w3-margin-bottom" style="background-color:pink;">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>VIVEKANANDA INSTITUTE OF TECHNOLOGY</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>ADDRESS</b></h5>
          <h6 class="w3-text-teal"></h6>
          <p><?php echo $address?></p><br>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>SECONDARY EDUCATION</b></h5>
          <h6 class="w3-text-teal"></h6>
          <p>School Name : <?php echo $secondary_school_name.", State : ".$secondary_state?></p> 
           <p>Year Of Passing : <?php echo $secondary_year_of_passing?>, Avg : <?php echo $secondary_aggregate?>, Board : <?php echo $secondary_board?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>PRIMARY EDUCATION</b></h5>
          <h6 class="w3-text-teal"></h6>
          <p>School Name : <?php echo $primary_school_name.", State : ".$primary_state ?></P>
           <p>Year Of Passing : <?php echo $primary_year_of_passing?>,Avg : <?php echo $primary_aggregate?>, Board : <?php echo $primary_board?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>ENTRANCE EXAMS</b></h5>
          <h6 class="w3-text-teal"></h6>
          <p>Registration no : <?php echo $reg_no?>, Admission no : <?php echo $admission_no?>,
           Date : <?php echo $date_of_issue?>, Rank : <?php echo $rank?></p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>OTHERS</b></h5>
          <h6 class="w3-text-teal"></h6>
          <p><?php echo $extra?></p><br>
        </div>
      </div>

    </div>
  
  </div>
  
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
 
  <p style="text-align:right;">&copy 2019 www.vitb.ac.in | All Rights Reserved |  Design & Developed by : <a href="https://www.instagram.com/roushan_gopal/" style="color: #fff" target="_blank">Roushan Raja</a></a></p>
</footer>

</body>
</html>

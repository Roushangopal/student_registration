<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

</style>
</head>
<body>
<?php require './config.php' ?>
<?php
$query = "SELECT * FROM personal_info p, student_documents s where p.email=s.email";


echo '<table id="customers"> 
      <tr> 
          <td> <font face="Arial">Email</font> </td> 
          <td> <font face="Arial">Name</font> </td> 
          <td> <font face="Arial">Father Name</font> </td> 
          <td> <font face="Arial">D.O.B</font> </td> 
          <td> <font face="Arial">Course</font> </td>
          <td> <font face="Arial">Gender</font> </td>
          <td> <font face="Arial">Category</font> </td>
          <td> <font face="Arial">Mob</font> </td>
          <td> <font face="Arial">Address</font> </td>
          <td> <font face="Arial">Details</font> </td>
          <td> <font face="Arial">Documents</font> </td>
          <td> <font face="Arial">Photo</font> </td>
      </tr>';

if ($result = mysqli_query($con,$query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["email"];
        $field2name = $row["name"];
        $field3name = $row["father_name"];
        $field4name = $row["dob"];
        $field5name = $row["course"]; 
        $field6name = $row["gender"]; 
        $field7name = $row["ph_no"]; 
        $field8name = $row["address"];
        $field9name = $row["category"];
        $field10name = $row["documents"];
        $field11name = $row["img"];
        


        
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td>
                  <td>'.$field9name.'</td>
                  <td>'.$field7name.'</td>
                  <td>'.$field8name.'</td>';?>
                  <td><a href='./detail.php?email=<?php echo $field1name ?>'>detail</a></td>
                  <td><a href='<?php echo $field10name?>'>documents</a></td>
                  <td><a href='<?php echo $field11name?>'>img</a></td>
                  
             <?php echo '</tr>';
    }
    $result->free();
} 
?>
</body>
</html>
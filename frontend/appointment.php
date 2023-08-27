<?php
require('../connection.inc.php');
$msg='';
if(isset($_POST['submit']))
{
    $aadhar = mysqli_real_escape_string($con, $_POST['aadhar_no']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $dept = mysqli_real_escape_string($con, $_POST['dept']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "select * from patient where aadhar_no = '$aadhar'";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);
    if($count > 0)
    {
      $row = mysqli_fetch_assoc($res);
      $id = $row['id'];
      $query1 = "insert into appointment(patient_id, date, dept, message) values('$id','$date','$dept','$message')";
      $res1 = mysqli_query($con, $query1);
      if($res1)
      {
        $msg = "Your appointment has been scheduled successfully.";
      }else{
        $msg = "Sorry, some error occured. Please try again later.";
      }
    }else{
      $query2 = "insert into patient(aadhar_no, name, email, age, gender) values('$aadhar','$name','$email','$age','$gender')";
      mysqli_query($con, $query2);
      $newId = mysqli_insert_id($con);
      $query3 = "insert into appointment(patient_id, date, dept, message) values('$newId','$date','$dept','$message')";
      $res2 = mysqli_query($con, $query3);
      if($res2)
      {
        $msg = "Your appointment has been scheduled successfully.";
      }else{
        $msg = "Sorry, some error occured. Please try again later.";
      }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Appointment Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .form-group{
        justify-items: center;
        align-items: center;
        /* width: 30%; */
        /* width: fit-content; */
        
    }
    .container {
        /* justify-content: center;0 */
        margin-top:25px;
        margin-bottom:25px;
        width: fit-content;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-control:focus {
      border-color: #17a2b8;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #17a2b8;
      border: none;
    }
    .btn-primary:hover {
      background-color: #138496;
    }
    /* .co */
    form{
        margin-top: 20px;
        /* display-flax: ; */
        justify-content: center;
        align-items: center;
    }
  </style>
</head>
<body>
  <div class="iconContainer">
    <div class="div-flex">
        <div class="subtitle"><h2>Recursive Challengers <h2></div>
        <img class="image-home" src="health.png" alt="health">
    </div>
     
     <div class="title">Health Management System</div>
</div>
<div class="navbar">
    <ul>
        <li id="item1" ><a href="index.php">Home</a></li>
        <li id="item2" class="active"><a href="appointment.php">Appointment</a></li>
        <li id="item2"><a href="about.html">About Us</a></li>
    </ul>
</div>
  <div class="container">

    <h2 class="mb-4">Hospital Appointment Form</h2>
    <?php echo($msg); ?>
    <form method="post">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
      </div>
      <div class="form-group">
        <label for="Aadhar">Aadhar</label>
        <input type="tel" class="form-control" id="Age" name="aadhar_no" placeholder="XXXX XXXX XXXX" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="Age">Age</label>
        <input type="number" class="form-control" id="Age" name="age" placeholder="Enter your Age" required>
      </div>
      
      <div class="form-group">
        <label for="Gender">Gender: </label>
        <label>
            <input type="radio" name="gender" value="0" margin="left 20%">
            male
        </label>
        <label>
            <input type="radio" name="gender" value="1">
            female
        </label>
      </div>
      <div class="form-group">
        <label for="date">Preferred Date</label>
        <input type="date" class="form-control" name="date" id="date" required>
      </div>
      <div class="form-group">
        <label for="department">Select Department</label>
        <select class="form-control" name="dept" id="department" required>
          <option value="" disabled selected>Select a department</option>
          <option value="Cardiology">Cardiology</option>
          <option value="Orthopedics">Orthopedics</option>
          <option value="Neurology">Neurology</option>
          <!-- Add more options as needed -->
        </select>
      </div>
      <div class="form-group">
        <label for="message">Additional Information</label>
        <textarea class="form-control" name="message" id="message" rows="4" placeholder="Enter any additional information"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    
  </div>
</body>
</html>

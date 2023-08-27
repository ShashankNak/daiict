<?php
    require('connection.inc.php');
    if(!isset($_SESSION['USER_ID']))
    {
      header('location:login.php');
    }
?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <?php {?>
                  <li class="menu-item-has-children dropdown">
                     <a href="patient_list.php" >Patient List</a>
                  </li>
                  <?php } ?>
                  <?php {?>
                  <li class="menu-item-has-children dropdown">
                     <a href="notifications.php" >Notifications
                        <?php 
                        $query = "select details.* from details where details.status = '0'";
                        $res = mysqli_query($con, $query);
                        $count = mysqli_num_rows($res);
                        if($count > 0)
                        {
                            ?>
                            <span style="color:#fff;border-radius:15px;" class="position-absolute mx-2 top-0 start-100 translate-middle badge rounded-pill bg-danger">
    New
  </span>
                            <?php
                        }
                       ?>
                     
                     </a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="appointment.php" >Appointments
                        <?php 
                        $query = "select appointment.* from appointment where appointment.date > CURDATE();";
                        $res = mysqli_query($con, $query);
                        $count = mysqli_num_rows($res);
                        if($count > 0)
                        {
                            ?>
                            <span style="color:#fff;border-radius:15px;" class="position-absolute mx-2 top-0 start-100 translate-middle badge rounded-pill bg-danger">
    New
  </span>
                            <?php
                        }
                       ?>
                     
                     </a>
                  </li>
                  <?php } ?>
                  <?php {?>
                  <li class="menu-item-has-children dropdown">
                     <a href="doctor_list.php" >Doctor List</a>
                  </li>
                  <?php } ?>
                  <li class="menu-item-has-children dropdown">
                     <a href="staff_list.php" >Staff List</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header" style="display:flex;">
                    <h3 style="font-size:20px;margin-top:10px;" class="text-center"><strong>Recursive Challengers</strong></h3>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php if($_SESSION['ROLE'] == 1){
                        echo('Doctor');
                      }else{
                        echo('Staff');
                      } ?></a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
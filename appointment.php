<?php
    require('navbar.php');
    require('functions.inc.php');
    $msg=''; 
    $query = "select appointment.* from appointment where appointment.date > CURDATE();";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);
    if($count < 1)
    {
        $msg = 'No results found.';
    }
?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Appointments</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Patient Id</th>
                                       <th>Department</th>
                                       <th>Date</th>
                                       <th>Message</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                                    <?php $i = 1;
                                     while($row = mysqli_fetch_assoc($res)){ 
                                       $pid=$row['patient_id'];
                                       $newq= "select * from patient where id='$pid'";
                                       $newr=mysqli_query($con,$newq);
                                       $newrr = mysqli_fetch_assoc($newr);
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo($i); ?></td>
                                       <td> <span class="product"><?php echo $newrr['name']; ?></span> </td>
                                       <td><span class="product"><?php echo $row['dept']; ?></span></td>
                                       <td><span class="product"><?php echo $row['date']; ?></span></td>
                                       <td><span class="product"><?php echo $row['message']; ?></span></td>
                                    </tr>
                                    <?php $i++; }?>
                                    <?php if($count < 0){ ?>
                                    <tr><td><p style="text-center"><?php echo($msg); ?></p></td></tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>

          <?php
    include('footer.php');
?>
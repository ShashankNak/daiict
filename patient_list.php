<?php
    require('navbar.php');
    include('functions.inc.php');
    $res = mysqli_query($con, "select * from patient");
?>

<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Patient's List</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Adhaar No</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Created On</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                                    <?php $i = 1;
                                     while($row = mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                       <td class="serial"><?php echo($i); ?></td>
                                       <td> <?php echo($row['aadhar_no']); ?> </td>
                                       <td> <span class="name"><?php echo($row['name']); ?></span> </td>
                                       <td> <span class="product"><?php echo($row['email']); ?></span> </td>
                                       <td><span class="count"><?php echo(getFormatDate($row['created_at'])); ?></span></td>
                                       <td>
                                          <span class="badge badge-success">Edit</span>
                                          <span class="badge badge-danger">Delete</span>
                                       </td>
                                    </tr>
                                    <?php $i++; }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
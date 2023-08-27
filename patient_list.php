<?php
    require('navbar.php');
    require('functions.inc.php');
    $msg='';
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=mysqli_real_escape_string($con,$_GET['type']);
        if($type=='delete'){
            $id=mysqli_real_escape_string($con,$_GET['id']);
            $delete_sql="delete from patient where id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }    
    $res = mysqli_query($con, "select * from patient");
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
                                       <th>Details</th>
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
                                       <td><?php echo "<span class='product'><a href='details.php?id=".$row['id']."'>Details</a></span>"; ?></td>
                                       <td><span class="product"><?php echo(getFormatDate($row['created_at'])); ?></span></td>
                                       <td>
                                          <?php echo "<span class='btn btn-danger'><a style='color:#fff;' href='?type=delete&id=".$row['id']."'>Delete</a></span>"; ?>
                                       </td>
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
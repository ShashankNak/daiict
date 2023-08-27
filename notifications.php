<?php
    require('navbar.php');
    require('functions.inc.php');
    $msg='';
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=mysqli_real_escape_string($con,$_GET['type']);
        if($type=='status'){
            $operation=mysqli_real_escape_string($con,$_GET['operation']);
            $id=mysqli_real_escape_string($con,$_GET['id']);
            if($operation=='active'){
                $status='1';
            }else{
                $status='0';
            }
            $update_status_sql="update details set status='$status' where id='$id'";
            mysqli_query($con,$update_status_sql);
        }
    }  
    $query = "select details.* from details where details.status = '0'";
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
                           <h4 class="box-title">Notifications</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Details</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                                    <?php $i = 1;
                                     while($row = mysqli_fetch_assoc($res)){ 
                                        $newId = $row['id'];
                                     $newQuery = "select patient.*, details.* from patient, details where details.id = '$newId' and patient.id = details.patient_id";
                                     $newRow = mysqli_fetch_assoc(mysqli_query($con, $newQuery));

                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo($i); ?></td>
                                       <td> <span class="product"><?php echo $newRow['name']; ?></span> </td>
                                       <td><span class="product"><?php echo $newRow['email']; ?></span></td>
                                       <td><?php echo "<span class='product'><a href='details.php?id=".$row['id']."'>Details</a></span>"; ?></td>
                                       <td>
                                       <?php
								if($row['status']==1){
									echo "<span  class='btn btn-danger'><a style='color:#fff;' href='?type=status&operation=deactive&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}else{
									echo "<span class='btn btn-success'><a style='color:#fff;'  href='?type=status&operation=active&id=".$row['id']."'>Active</a></span>&nbsp;";
								}
								?>
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
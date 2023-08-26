<?php
require('navbar.php');
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $query = "select details.*, patient.* from details, patient where details.patient_id = '$id' and patient.id = '$id' order by details.id desc limit 1";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
    }else{
        header('location:patient_list.php');
    }
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Patient ID > <?php echo $id; ?></h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
								<thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Age
                                        </th>
                                        <th>
                                            Gender
                                        </th>
                                    </tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td>
                                        <span class="name"><?php echo($row['name']); ?></span>
                                        </td>
                                        <td>
                                        <span class="name"><?php echo($row['email']); ?></span>
                                        </td>
                                        <td>
                                        <span class="name"><?php echo($row['age']); ?></span>
                                        </td>
                                        <td>
                                        <span class="name"><?php if($row['gender']==0){
                                            echo('Male');}else{
                                                echo('Female');
                                            } ?></span>
                                        </td>
                                    </tr>
								</tbody>
                </table><hr>
                <div id="address_details" style="display:flex;margin-left:20px;">
                    <div>
							<strong>Blood Group:</strong>
							<?php echo($row['blood_group']); ?><br/><br/>
							<strong>WBC:</strong>
							<?php echo($row['wbc']); ?><br/><br/>
							<strong>Heamoglobin:</strong>
							<?php echo($row['hemo']); ?><br/><br/>
							
</div><div style="margin-left:870px;">
							<strong>Blood Pressure:</strong>
							<?php echo($row['blood_pressure']); ?><br/><br/>
                            <strong>RBC:</strong>
                            <?php echo($row['rbc']); ?><br/><br/>
                            
                            <strong>Plateleates:</strong>
							<?php echo($row['plate']); ?><br/><br/>
</div>
						</div>
				   </div>
				</div>
                <div style="margin-bottom:20px;margin-left:20px;" id="address_details" style="display:flex;margin-left:20px;">
                    <div>
						<strong>Prescription:</strong>
						<p id="prescription"><?php echo($row['description']); ?></p><br/><br/>
                        <button class="btn btn-success" onclick="handleSpeech()">Read Prescription</button>
                    </div>
						</div>
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
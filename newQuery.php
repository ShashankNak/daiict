<?php
require('navbar.php');

    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $query = "select details.*, patient.* from details, patient where details.id = '$id' and details.patient_id = patient.id";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        if(isset($_POST['submit']))
        {
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $query1 = "update `details` set `description`='$description' where id='$id'";
            $res1 = mysqli_query($con, $query1);
            if($res1)
            {
                header('location:details.php?id='.$row['id']);
            }
        }
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
                <div id="address_details" style="display:flex;margin-left:20px;">
                    <div style="margin-bottom:20px;">
						<form method="post">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Enter Prescription:</strong></label>
  <textarea class="form-control" id="pres" placeholder="Enter the prescription." name="description" rows="3"></textarea></br>
                        <input class="btn btn-primary" type="submit" name="submit">           
</form></br>
<button class="btn btn-success" onclick="handleSpeak()">Speak Prescription</button>
                        <button class="btn btn-danger" id="clear-handle" onclick="handleClear()">Clear Prescription</button>
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
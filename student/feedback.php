<?php

//login.php

include('../master/Examination.php');
$exam = new Examination;

$exam->user_session_private();
include('../include/db.php');	
include('../include/user_header.php');
require_once '../include/db.php';

?>
<br><br><br>


<link href="../style/button.css" rel="stylesheet" type="text/css">

<div class="card border border-success">
    <div class="card-header">Feedback List
    <div style="float:right; font-size: 50%; position: relative;" ><a class="btn success" href="feedback_add.php">Add Feed</a></div></div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="exam_data_table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Feedback Type</th>                        
                        <th>Feedback</th>
                        <th>Feedback Status</th>
                        <th>Feedback Remark</th>
						<th>Feed applied Date and Time</th>				
						<th>Action</th>
					</tr>
				</thead>

<?php 
require_once '../include/db.php';

$id = $_SESSION['user_id'];
          
$sql= "SELECT * from feedback_table where user_id='$id' ;";
$result = mysqli_query($db, $sql);


if (mysqli_num_rows($result)> 0) {
while($row = mysqli_fetch_assoc($result)) {

?>
				<tbody>
            <tr>
                <td><?php echo $row['f_id'];?></td>
				<td><?php echo $row['feed_type'];?></td>
				<td><?php echo $row['feed'];?></td>
				<td><?php echo $row['feed_status'];?></td>
				<td><?php echo $row['feed_remark'];?></td>
				<td><?php echo $row['feed_timestamp'];?></td>
				<td><?php echo $row['feed_timestamp'];?></td>
			</tr>
				</tbody>
				<?php
	}}
	?>
			</table>
		</div>

	</div>
</div>
</div>
</body>
</html>

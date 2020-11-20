<?php

//login.php

include('../master/Examination.php');
$exam = new Examination;

$exam->user_session_private();

include('../include/user_header.php');


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
						<th>Feed applied Date</th>
						<th>Feed applied Time</th>						
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>
</body>
</html>

<head>
    
    <script src='https://meet.jit.si/external_api.js'></script>
    <div id="jitsi-container" style="padding-right:20px" align="right"></div>
    
    
    <!-- <script type="text/javascript"> 
function start(){
	$("html").on("contextmenu",function(e){
		<window class="alert">right click</window>
   return false;
});
	block = setInterval("window.clipboardData.setData('text','')",20); 	
}
function stop(){
	clearInterval(block);
}

</script>  -->
</head>


<body LANG="en-US" LINK="#0000ff" DIR="LTR" window.onload="start();">


<canvas id="plotting_canvas" width="600" height="600" style="cursor:crosshair;"></canvas>
    <script src="webgazer.js"></script>
    <script src="jquery.min.js"></script>
    <script src="sweetalert.min.js"></script>
    <script src="main.js"></script>
    <script src="calibration.js"></script>
    <script src="precision_calculation.js"></script>
    <script src="precision_store_points.js"></script>
    <script src="resize_canvas.js"></script>
    <script src="bootstrap.min.js"></script>

    <script>
        // var button = document.querySelector('#start');
        var container = document.querySelector('#jitsi-container');
        var api = null;

        
            var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var stringLength = 30;

            function pickRandom() {
                return possible[Math.floor(Math.random() * possible.length)];
            }

            var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join('');

            var domain = "meet.jit.si";
            var options = {
                "roomName": randomString,
                "parentNode": container,
                "width": 500,
                "height": 350,
                

            };
            api = new JitsiMeetExternalAPI(domain, options);



            api.executeCommand('toggleShareScreen',
                {
                    on: true, //whether screen sharing is on
                    details: {
                        sourceType: screen,

                    }

                    // From where the screen sharing is capturing, if known. Values which are
                    // passed include 'window', 'screen', 'proxy', 'device'. The value undefined
                    // will be passed if the source type is unknown or screen share is off.


                });

            api.executeCommand('toggleVideo');
            /*  window.addEventListener('beforeunload', function (e) {
                 e.preventDefault();
                 e.returnValue = ''; */

            /*  api.executeCommand('stopRecording',
                { mode: file } */
            //);
            //recording mode to stop, //`stream` or `file` 


            //}); */

        
    </script>
    
<?php

//view_exam.php 

include('../master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

include('../include/exam_header.php');

$exam_id = '';
$exam_status = '';
$remaining_minutes = '';
// $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_GET['code']))
{
	$exam_id = $exam->Get_exam_id($_GET["code"]);
	$exam->query = "
	SELECT online_exam_status, online_exam_datetime, online_exam_duration FROM online_exam_table 
	WHERE online_exam_id = '$exam_id'
	";

	$result = $exam->query_result();

	foreach($result as $row)
	{
		$exam_status = $row['online_exam_status'];
		$exam_star_time = $row['online_exam_datetime'];
		$duration = $row['online_exam_duration'] . ' minute';
		$exam_end_time = strtotime($exam_star_time . '+' . $duration);

		$exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
		$remaining_minutes = strtotime($exam_end_time) - time();
	}
}
else
{
	header('location:enroll_exam.php');
}


?>


<?php
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));

if($exam_status == 'Started')
{
	$exam->data = array(
		':user_id'		=>	$_SESSION['user_id'],
		':exam_id'		=>	$exam_id,
		':intime'		=>	$current_datetime,
		':attendance_status'	=>	'Present'
		
	);

	$exam->query = "
	UPDATE user_exam_enroll_table 
	SET attendance_status = :attendance_status,intime=:intime 
	WHERE user_id = :user_id 
	AND exam_id = :exam_id
	";

	$exam->execute_query();

?>
<div class="row">
	<div class="col-md-8" onmousedown="return false" onselectstart="return false">
		<div class="card border border-success">
			<div class="card-header">Online Exam </div>
			<div class="card-body">
			<!-- <img src="master/logo.jpg" alt="question image" width="450" height="450"> -->

				<div id="single_question_area"></div>
			</div>
		</div>
		<br><Br>
		<div id="question_navigation_area" class="border border-warning"></div>
	</div>
	<div class="col-md-4">
		<br />
		<div align="center">
			<div id="exam_timer" class="border border-Secondary" data-timer="<?php echo $remaining_minutes; ?>" style="max-width:400px; width: 100%; height: 200px;"></div>
		</div>
		<br />
		<div id="user_details_area"></div>		
	</div>
</div>
<br><br>
<?php
}
if($exam_status == 'Completed')
{
	$exam->query = "
	SELECT * FROM question_table 
	INNER JOIN user_exam_question_answer 
	ON user_exam_question_answer.question_id = question_table.question_id 
	WHERE question_table.online_exam_id = '$exam_id' 
	AND user_exam_question_answer.user_id = '".$_SESSION["user_id"]."'
	";

	//echo $exam->query;

	$result = $exam->query_result();
?>




	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-8">Online Exam Result</div>
				<div class="col-md-4" align="right">
					<a href="pdf_exam_result.php?code=<?php echo $_GET["code"]; ?>" class="btn btn-danger btn-sm" target="_blank">PDF</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<th>Question</th>
						<th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Your Answer</th>
						<th>Answer</th>
						<th>Result</th>
						<th>Marks</th>
					</tr>
					<?php
					$total_mark = 0;

					foreach($result as $row)
					{
						$exam->query = "
						SELECT * 
						FROM option_table 
						WHERE question_id = '".$row["question_id"]."'
						";

						$sub_result = $exam->query_result();
						$user_answer = '';
						$orignal_answer = '';
						$question_result = '';

						if($row['marks'] == '0')
						{
							$question_result = '<h4 class="badge badge-danger">Wrong</h4>';
						}

						if($row['marks'] > '0')
						{
							$question_result = '<h4 class="badge badge-success">Right</h4>';
						}

						if($row['marks'] < '0')
						{
							$question_result = '<h4 class="badge badge-danger">Wrong</h4>';
						}

						echo '
						<tr>
							<td>'.$row['question_title'].'</td>
						';

						foreach($sub_result as $sub_row)
						{
							echo '<td>'.$sub_row["option_title"].'</td>';

							if($sub_row["option_number"] == $row['user_answer_option'])
							{
								$user_answer = $sub_row['option_title'];
							}

							if($sub_row['option_number'] == $row['answer_option'])
							{
								$orignal_answer = $sub_row['option_title'];
							}
						}
						echo '
						<td>'.$user_answer.'</td>
						<td>'.$orignal_answer.'</td>
						<td>'.$question_result.'</td>
						<td>'.$row["marks"].'</td>
					</tr>
						';
					}

					$exam->query = "
					SELECT SUM(marks) as total_mark FROM user_exam_question_answer 
					WHERE user_id = '".$_SESSION['user_id']."' 
					AND exam_id = '".$exam_id."'
					";

					$marks_result = $exam->query_result();

					foreach($marks_result as $row)
					{
					?>
					<tr>
						<td colspan="8" align="right">Total Marks</td>
						<td align="right"><?php echo $row["total_mark"]; ?></td>
					</tr>
					<?php	
					}

					?>
				</table>
			</div>
		</div>
	</div>

<?php
}

?>

</div>
</body>
</html>


<script>

// tab switch


document.addEventListener("visibilitychange", event => {
  if (document.visibilityState == "visible") {
    console.log("tab is activate")
  } else {
	console.log("tab is inactive")
	var exam_id = "<?php echo $exam_id; ?>";
	// ["online_exam_status"] == 'Completed'
	window.close();
    //   console.log(camtest);
	window.location.assign("submit.php?id="+exam_id);
  }
})

$(document).ready(function(){
	var exam_id = "<?php echo $exam_id; ?>";

	load_question();
	question_navigation();

	function load_question(question_id = '')
	{
		$.ajax({
			url:"../user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, question_id:question_id, page:'view_exam', action:'load_question'},
			success:function(data)
			{
				$('#single_question_area').html(data);
			}
		})
	}

	$(document).on('click', '.next', function(){
		var question_id = $(this).attr('id');
		load_question(question_id);
	});

	$(document).on('click', '.previous', function(){
		var question_id = $(this).attr('id');
		load_question(question_id);
	});

	function question_navigation()
	{
		$.ajax({
			url:"../user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, page:'view_exam', action:'question_navigation'},
			success:function(data)
			{
				$('#question_navigation_area').html(data);
			}
		})
	}

	$(document).on('click', '.question_navigation', function(){
		var question_id = $(this).data('question_id');
		load_question(question_id);
	});

	function load_user_details()
	{
		$.ajax({
			url:"../user_ajax_action.php",
			method:"POST",
			data:{page:'view_exam', action:'user_detail'},
			success:function(data)
			{
				$('#user_details_area').html(data);
			}
		})
	}

	load_user_details();

	$("#exam_timer").TimeCircles({ 
		time:{
			Days:{
				show: false
			},
			Hours:{
				show: false
			}
		}
	});

	setInterval(function(){
		var remaining_second = $("#exam_timer").TimeCircles().getTime();
		if(remaining_second < 1)
		{
			window.location = 'enroll_exam.php';
		}
	}, 1000);

	$(document).on('click', '.answer_option', function(){
		var question_id = $(this).data('question_id');

		var answer_option = $(this).data('id');
        alert(answer_option);
        
		$.ajax({
			url:"../user_ajax_action.php",
			method:"POST",
			data:{question_id:question_id, answer_option:answer_option, exam_id:exam_id, page:'view_exam', action:'answer'},
			success:function(data)
			{

			}
		})
	});

});
</script>
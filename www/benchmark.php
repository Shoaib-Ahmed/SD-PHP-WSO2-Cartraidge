<!DOCTYPE HTML> 
<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<title>Software Design</title>
	</head>
<body>
	<?php
		$time_pre = microtime(true);
		$currTime= date('D, M d Y, H:i:s T');
		echo $currTime;
		echo "<br/>";
		$host=gethostname();
		echo $host;
		echo "<br/>";
		// Create connection
		$con=mysqli_connect("54.86.38.65","SD_Proj","PasswordSD","SD_Proj_DB");

		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		error_reporting(E_ALL);
		$num = 60085;
		for( $j = 2; $j <= $num; $j++ )
		{
		    for( $k = 2; $k < $j; $k++ )
		    {
			if( $j % $k == 0 )
			{
			break;
			}

		    }
		    if( $k == $j )
		    {
			//echo "Prime Number : ", $j, "<br>";
			if( $num % $j == 0 )
			{
			//echo "Prime number : ", $j, "<br>";
			}
		    }
		}
		$endTime= date('D, M d Y, H:i:s T');
		echo $endTime;
		echo "<br/>";
		$time_post = microtime(true);
		$exec_time = $time_post - $time_pre;
		echo "diff".$exec_time;
		echo "<br/>";
		mysqli_query($con,"INSERT INTO BENCHMARK_INFO (ip_address, start_time, end_time, process_time)
VALUES ('".$host."','".$currTime."','".$endTime."','".$exec_time."')");
		mysqli_close($con);
	?>
</body>
</html>

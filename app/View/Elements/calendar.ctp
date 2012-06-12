 <?php 
//$vars =  $this->requestAction('/bookings/calendar');
$timestamps = array();
foreach($dates as $key => $value){
	$timestamps[$key]['start_date'] = strtotime($dates[$key]['start_date']);
	$timestamps[$key]['end_date']= strtotime($dates[$key]['end_date']);
	$timestamps[$key]['status'] = $dates[$key]['status'];
	$timestamps[$key]['user_id'] = $dates[$key]['user_id'];
}


 if(isset($x))
 {
 $month=$x; 
 }
 else
 {
$month =  date('n'); 
}
if(isset($y))
{
 $year=$y;
}
else
{
$year = date('Y');
}
$prev=$month - 1; 
$next = $month + 1; 
$yprev=$year;
$ynext=$year;
if($prev==0) 
{
$prev=12; 
$yprev=$year - 1;
}
if($next==13) 
{
$next = 1; 
$ynext=$year +1;
}

$date = strtotime("$year/$month/1"); 
$day = date("D",$date); 
$m = date("F",$date); 
$totaldays = date("t",$date); //get the total day of specified date 

if($day=="Sun") $st=1; 
if($day=="Mon") $st=2; 
if($day=="Tue") $st=3; 
if($day=="Wed") $st=4; 
if($day=="Thu") $st=5; 
if($day=="Fri") $st=6; 
if($day=="Sat") $st=7; 

if ($st >= 6 && $totaldays == 31) { 
$tl=42; 
}elseif($st == 7 && $totaldays == 30){ 
$tl = 42; 
}else{ 
$tl = 35; 
} 

$ctr = 1; 
$d=1; 

$k = 0;//this will be key of timestamp
?>

<div class = "calendar">
	<div style = "float: left;"><a style='color:#6b7577; font-size: 22px;' onclick='updateCalendar(<?php echo $prev.",". $yprev.",".$pid; ?>)' href = 'javascript:void(0)'><b>Previous</a></b></div><div style = "float:right;"><b> <a style='color:#6b7577; font-size: 22px;' onclick='updateCalendar(<?php echo $next.",". $ynext.",".$pid; ?>);' href = 'javascript:void(0)'>Next</a></b> </div>
	<div class = "month"><h1 style = "font-size: 26pt; padding-bottom: 15px;"><?php echo $m ." ". $year; ?></h1></div>
	<div class = "clearfix days dates">
		<div>
			Sun.
		</div>
		<div>
			Mon.
		</div>
		<div>
			Tues.
		</div>
		<div>
			Wedn.
		</div>
		<div>
			Thur.
		</div>
		<div>
			Fri.
		</div>
		<div>
			Sat.
		</div>
	</div>
	<?php for($i=1;$i<=$tl;$i++){ 
			$currenttimestamp = strtotime("$year/$month/$d");
			if($ctr==1) echo "<div class ='clearfix dates'>"; 

			if($i >= $st && $d <= $totaldays){  
				
					$response = dayStatus($currenttimestamp,$timestamps);
				//	Debugger::log($currenttimestamp);
				//	Debugger::log( $timestamps );
					if($response['status'] === 1){
						
						echo "<div><div class = 'booked'><span class = 'date'>$d</span></div></div>";
						$d++;
							
					} else if($response['status'] === 0){
						echo "<div><div data-user-id = '".$response['user_id']."' class = 'pending'><span class = 'date'>$d</span></div></div>";
						$d++;
					}else{
						echo "<div><div><span class = 'date'>$d</span></div></div>";
						$d++;
					}
			}

			else{ 
			echo "<div><div class = 'inactive'>&nbsp</div></div>"; 
			} 

			$ctr++; 

			if($ctr > 7) { 
			$ctr=1; 
			echo "</div>"; 
			} 

			 
			}

			 function dayStatus($currentTime,$times){
				for($i =0;$i < count($times); $i++){
					if($currentTime >= $times[$i]['start_date'] && $currentTime <= $times[$i]['end_date'] && $times[$i]['status'] == 1 ){
						return array('status' => 1, 'user_id' => $times[$i]['user_id']);
					}
					else if($currentTime >= $times[$i]['start_date'] && $currentTime <= $times[$i]['end_date'] && $times[$i]['status'] == 0 ){
						return array('status' => 0, 'user_id' => $times[$i]['user_id']);
					}
				}
				return array('status' => 100, 'user_id' => 0);
			} 
			 ?>
</div>
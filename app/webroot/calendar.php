 <?php 
 if(isset($_GET['x']))
 {
 $month=$_GET['x']; 
 }
 else
 {
$month = date('n'); 
}
if(isset($_GET['y']))
{
 $year=$_GET['y'];
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
?>
<div style = "float: left;"><a style='color:#5A5AA3' onclick='updateCalendar(<?php echo $prev.",". $yprev ?>)' href = 'javascript:void(0)'><b>Previous</a></b></div><div style = "float:right;"><b> <a style='color:#5A5AA3' onclick='updateCalendar(<?php echo $next.",". $ynext ?>);' href = 'javascript:void(0)'>Next</a></b> </div>

<div style = "text-align: center;"><h1 style = "font-size: 26pt; padding-bottom: 15px;"><?php echo $m ." ". $year; ?></h1></div>
<?php 
echo "<table style='width: 100%;' border = '1' cellspacing = '3' bordercolor='white' cellpadding ='2'><tr> 
<td colspan='7'></td></tr> 
<tr> 
<td width='80'><font size = '3' face = 'tahoma'>Sunday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Monday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Tueday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Wednesday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Thursday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Friday</font></td> 
<td width='80'><font size = '3' face = 'tahoma'>Saturday</font></td> 
</tr> 
"; 

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

for($i=1;$i<=$tl;$i++){ 

if($ctr==1) echo "<tr>"; 

if($i >= $st && $d <= $totaldays){ 
echo "<td id = '$d' style = 'text-align: center; padding: 25px; height: 80px; width: 80px; background-color: #c5ff5f;'><font size = '4' face = 'tahoma'>$d</font></td>"; 
$d++;
} 
else{ 
echo "<td>&nbsp</td>"; 
} 

$ctr++; 

if($ctr > 7) { 
$ctr=1; 
echo "</tr>"; 
} 

} 

echo "</table>";  
 ?>
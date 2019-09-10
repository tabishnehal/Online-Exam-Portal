<?php
session_start();
$from_time=date('Y-m-d H:i:s');
$to_time=$_SESSION["end_time"];
$timefirst=strtotime($from_time);
$timesecond=strtotime($to_time);
$differenceinsecond=$timesecond-$timefirst;
echo gmdate("H:i:s",$differenceinsecond);
?>
<script type="text/javascript">
if($differenceinsecond<=0)
{
document.getElementById("form1").submit();
}

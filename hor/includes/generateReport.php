<?php

require 'dbh.inc.php';
require 'report.php';

$daily = daily_report();
echo $daily;
date_default_timezone_set('Asia/Manila');
$reportDate = date("Y-m-d");

$weekly = weekly_report();
$monthly = monthly_report();
$reportDate = date("Y-m-d");
$sql = "INSERT INTO report (daily, weekly, monthly, report_date) VALUES ('$daily','$weekly','$monthly','$reportDate')";
if($result = mysqli_query($conn, $sql)){
    header("location: ../reports.php?success=1");

}else{
    header("location: ../reports.php?error=0");
    exit();
}

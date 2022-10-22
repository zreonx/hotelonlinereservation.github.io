<?php

function daily_report(){
    require 'dbh.inc.php';
    $sql = "SELECT id, bill, transaction_date FROM book_transaction WHERE transaction_date = CURDATE() AND transaction_date <= CURDATE() AND transaction_status='Complete';";
    $result = mysqli_query($conn, $sql);
    $totalRevenue = 0;
    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)){
            $revenue = $rows['bill'];
            $totalRevenue += $revenue;
        }
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }else{
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }

}


function weekly_report(){
    require 'dbh.inc.php';
    $sql = "SELECT id, bill, transaction_date FROM book_transaction WHERE transaction_date > DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND transaction_date <= CURDATE() AND transaction_status='Complete';";
    $result = mysqli_query($conn, $sql);
    $totalRevenue = 0;
    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)){
            $revenue = $rows['bill'];
            $totalRevenue += $revenue;
        }
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }else{
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }
}


function monthly_report(){
    require 'dbh.inc.php';
    $sql = "SELECT id, bill, transaction_date FROM book_transaction WHERE transaction_date > DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND transaction_date <= CURDATE() AND transaction_status='Complete';";
    $result = mysqli_query($conn, $sql);
    $totalRevenue = 0;
    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)){
            $revenue = $rows['bill'];
            $totalRevenue += $revenue;
        }
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }

} 

function selectReports(){
    require 'dbh.inc.php';
    $sql = "SELECT * FROM report;";
    $result = mysqli_query($conn, $sql);
    $totalRevenue = 0;
    if(mysqli_num_rows($result) > 0) {
        while($rows = mysqli_fetch_assoc($result)){
            $id = $rows['id'];
            $daily = $rows['daily'];
            $weekly = $rows['weekly'];
            $monthly = $rows['monthly'];
            $reportDate = $rows['report_date'];

            echo "
            <tr>
                <td>
                    ". $id ."
                </td>
                <td>
                    ". $daily ."
                </td>
                <td>
                    ". $weekly ."
                </td>
                <td>
                    ". $monthly ."
                </td>
                <td>
                    ". $reportDate ."
                </td>
            </tr>
            
            ";
            
        }
        $formatNumber = number_format($totalRevenue, 2);
        return $formatNumber;
    }

}  




<?php 
include_once 'config.php';

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$availableRooms = availableRoom($conn);

$sql = "SELECT * FROM users where type='user';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $user_name = $rows['user_name'];
            $first_name = $rows['first_name'];
            $last_name = $rows['last_name'];
            $email = $rows['email'];
            $contact_number = $rows['contact_number'];

            echo "
                    <tr>
                        <td>". $user_name  ."</td>
                        <td>". $first_name ."</td>
                        <td>" .$last_name. "</td>
                        <td>". $email . "</td>
                        <td>". $contact_number. "</td>
                        <td><a href='#' class='btn btn-dark f-forms ' style='margin-right:10px;' class='btn btn-dark f-forms'>Edit</a><a class='btn btn-dark f-forms' href='#'>Delete</a></td>
                    </tr>
            ";
            
    }
}else {
    echo "<h4 class='title'>No User Data</h4>";
}
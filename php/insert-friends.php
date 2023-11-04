<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $img = mysqli_real_escape_string($conn, $_POST['img']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Hash the password
        
        if(!empty($fname) && !empty($lname) && !empty($img) && !empty($status)){
            $sql = "INSERT INTO friend_request (incoming_msg_id, outgoing_msg_id, fname, lname, img, status, unique_id, email, password) 
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$fname}', '{$lname}', '{$img}', '{$status}', '{$unique_id}', '{$email}', '{$password}')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "Friend request sent successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        header("location: ../login.php");
    }
?>

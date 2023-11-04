<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }

?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="RQ.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        
        <div class="details">
          
        </div>
      </header>
        <div class="profile">
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
              <p><?php echo $row['fname']. " " . $row['lname'] ?></p>
              <p><?php echo $row['status']; ?></p>
              <div class="actions">
               
             
              <form action="#" class="typing-area">
              <?php 
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                  $row = mysqli_fetch_assoc($sql); 
                }
              ?>
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="unique_id" class="input-field"  autocomplete="off" value="<?php echo $user_id; ?>" hidden ? > 
                <input type="text" name="fname" class="input-field"  autocomplete="off" value=<?php  echo $row['fname']; ?> hidden >
                <input type="text" name="lname" class="input-field"  autocomplete="off" value="<?php  echo $row['lname']; ?>" hidden >
                <input type="text" name="img" class="input-field"  autocomplete="off" value="<?php echo $row['img']; ?>" hidden>
                <input type="text" name="status" class="input-field"  autocomplete="off" value="<?php echo $row['status']; ?>" hidden>
                <input type="text" name="email" class="input-field"  autocomplete="off" value="<?php echo $row['email']; ?>" hidden>
                <input type="text" name="password" class="input-field"  autocomplete="off" value="<?php echo $row['password']; ?>" hidden>
               
              </form>
              <button><a href="friends.php">ยืนยัน</a></button>
              </div>
            </div>
        </div>

        <script src="javascript/more_req.js"></script>


</body>
</html>

<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<style>
    .col-lg-8{
        padding-top:100px !important;
        padding-left:250px !important;
    }
    .card{
        padding:20px 30px;
        height:auto !important;
        border-radius:10px;
        
    }
    input[type="text"]{
        margin-bottom:10px;
    }
    input[type="file"]{
        margin-bottom:10px;
    }
    .btn{
      margin-top:10px !important;
    }
    .select{
        float:left;
        margin-bottom:10px;
    }
    
</style>
<div class="col-lg-8">
   

    
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="p-5">
        <!-- Material form subscription -->
            <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Replay message</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            <?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $to = $_POST['to'];
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
   
    $to =$time->validation($to);
    $from =$time->validation($from);
    $subject =$time->validation($subject);
    $message =$time->validation($message);

    $to = mysqli_real_escape_string($db->link , $to);
    $from  = mysqli_real_escape_string($db->link , $from );      
    $subject = mysqli_real_escape_string($db->link , $subject);
    $message = mysqli_real_escape_string($db->link , $message);

    $emailSend = mail($to,$subject,$message,$from);
    if($emailSend){
        echo"Email send successfully";
    }else{
        echo"Email not send";
    }
}
    ?>
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post">

                <?php 
                if(isset($_REQUEST['reply_id'])){
                  $did = $_GET['reply_id'];
                  $query = "SELECT * FROM contact WHERE id = $did ";
                  $d_result = $db->select($query);
                  
                  while($row = $d_result->fetch_assoc()){

                ?>
                    <div class="md-form mt-3">
                        <input value="<?php echo $row['email'];?>" readonly type="text" name="to" id="materialSubscriptionFormPasswords"  placeholder="To" class="form-control">
                    </div>
                <?php 
                    }
                }
                ?>
                    <div class="md-form mt-3">
                        <input  type="text" name="from" id="materialSubscriptionFormPasswords"  placeholder="From" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                        <input  type="text" name="subject" id="materialSubscriptionFormPasswords"  placeholder="Subject" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                      <textarea name="message" id="" cols="30" rows="10" placeholder="Enter Message" class="form-control"></textarea>
                    </div>
                   
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Send</button>

                </form>
                <!-- Form -->
                <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="inbox.php" style="color:white;">back</a></button>
            </div>

            </div>

    </div>
        </div>
    </div>


</div>
</div>


<?php include "admin/footer.php";?>
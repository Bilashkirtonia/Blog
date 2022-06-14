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

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $slogan = $_POST['slogan'];
    
    $title = mysqli_real_escape_string($db->link , $title);
    $slogan  = mysqli_real_escape_string($db->link , $slogan);      
   
    
    $f_name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_exe = explode('.',$f_name);
    $file_ex = end($file_exe);
    $extension = array('jpg','png','jpeg');
    $new_name = time().'.'.basename($f_name);
    $target = '../image/'.$new_name;

    if($title == '' ||$slogan == '' ||$new_name == ''){
        echo"Can't add now";
    }else{
        if(in_array($file_ex,$extension)===false){
            echo 'Select thr right formate';
        }elseif($size > 5242880){
            echo 'Select thr right size';
        }else{
            move_uploaded_file($tmp_name,$target);
            $eid = $_GET['eid'];
            $query12 ="UPDATE logo SET title = '$title',logo = '$new_name', slogan = '$slogan' WHERE id = $eid";
            $insert = $db->insert($query12);
        
            if($insert){
                echo"Data update successfully";
                //header("Location:add_post.php");
            }else{
                echo"Data not update successfully";
                //header("Location:add_post.php");
            }
        }
       

        
        
    }
}


?>
    
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="p-5">
        <!-- Material form subscription -->
            <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Add Logo</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data">

            <?php 
            $e_query = "select * from logo";
            $e_ersult = $db->select($e_query);
            while($e_row = $e_ersult->fetch_assoc()){ 
             ?> 
                    <div class="md-form mt-3">
                        <input value="<?php echo $e_row['title'];?>" type="text" name="title" id="materialSubscriptionFormPasswords"  placeholder="Enter title" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="md-form mt-3 mb-2">
                                <img width="200" src="../image/<?php echo $e_row['logo'];?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">  
                            <div class="md-form mt-3 mb-2">
                             <input value="<?php echo $e_row['logo'];?>"  type="file" name="file" id="materialSubscriptionFormPasswords"      class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="md-form mt-3">
                        <input value="<?php echo $e_row['slogan'];?>"  type="text" name="slogan" id="materialSubscriptionFormPasswords"  placeholder="Enter slogan" class="form-control">
                    </div>
 
                    <!-- Sign in button -->
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Add post</button>
<?php 
  }
?> 
                </form>
                <!-- Form -->

            </div>

            </div>

    </div>
        </div>
    </div>


</div>
</div>


<?php include "admin/footer.php";?>
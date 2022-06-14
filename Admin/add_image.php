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

    $f_name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_exe = explode('.',$f_name);
    $file_ex = end($file_exe);
    $extension = array('jpg','png','jpeg');
    $new_name = time().'.'.basename($f_name);
    $target = '../image/'.$new_name;

    
        if(in_array($file_ex,$extension)===false){
            echo 'Select thr right formate';
        }elseif($size > 5242880){
            echo 'Select thr right size';
        }else{
            move_uploaded_file($tmp_name,$target);
            $query = "INSERT INTO  slider(image_name)
            VALUES('$new_name')";
            $insert = $db->insert($query);
        
            if($insert){
                echo"Data insert successfully";
                //header("Location:add_post.php");
            }else{
                echo"Data not insert successfully";
                //header("Location:add_post.php");
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
                <strong>Add Post</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data" >

                    
                    <div class="md-form mt-3">
                        <input  type="file" name="file" id="materialSubscriptionFormPasswords"  placeholder="Enter image" class="form-control">
                    </div>

                    <button class="btn mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Add image</button>

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
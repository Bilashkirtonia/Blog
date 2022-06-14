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
        $body = $_POST['body'];
        

        $title = mysqli_real_escape_string($db->link , $title);
        $body  = mysqli_real_escape_string($db->link , $body);      
        

        if($title == '' ||$body == ''){
            echo"Can't add now";
        }else{
            
                $query = "INSERT INTO  pages(title,body)
                VALUES('$title','$body')";
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
                <form class="text-center" style="color: #757575;" action="" method="post" >

                    
                    <div class="md-form mt-3">
                        <input  type="text" name="title" id="materialSubscriptionFormPasswords"  placeholder="Enter title Name" class="form-control">
                    </div>
                   
                    </div>
                    
                    <div class="md-form mt-3">
                      <textarea name="body" id="" cols="30" rows="10" placeholder="Enter Content" class="form-control"></textarea>
                        
                    </div>
                    <!-- Sign in button -->
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Add post</button>

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
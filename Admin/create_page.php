<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<style>
    <?php 
         
    ?>
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

        if(isset($_REQUEST['c_page'])){

            $did = $_GET['c_page'];

            
            $query = "SELECT * FROM pages WHERE id = $did ";
            $d_result = $db->select($query);
           
      
  
    
    
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
            
            <?php while ($e_row = $d_result->fetch_assoc()){?>
                <form class="text-center" style="color: #757575;" action="" method="post" >

                    
                    <div class="md-form mt-3">
                        <input value="<?php echo $e_row['title'];?>"  type="text" name="title" id="materialSubscriptionFormPasswords"  placeholder="Enter title Name" class="form-control">
                    </div>
                   
                    </div>
                    
                    <div class="md-form mt-3">
                      <textarea name="body" id="" cols="30" rows="10" placeholder="Enter Content" class="form-control">
                      <?php echo $e_row['body'];?>
                      </textarea>
                        
                    </div>
                    <!-- Sign in button -->
                    
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-primary z-depth-0 my-4 waves-effect" type="submit">Update page</button>
                    
                    
                    
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-success z-depth-0 my-4 waves-effect" type="submit">
                    <a href="update_page.php?d_page=<?php echo $e_row['id'];?>">Delete page</a>
                    </button>
                    
                    
                </form>
                <!-- Form -->
                <?php } }?>
            </div>

            </div>

    </div>
        </div>
    </div>


</div>
</div>


<?php include "admin/footer.php";?>




<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $title = mysqli_real_escape_string($db->link , $title);
        $body = mysqli_real_escape_string($db->link , $body);
            $eid = $_GET['c_page'];
            $query12 ="UPDATE pages SET title = '$title',body = '$body' WHERE id = $eid";
            $update = $db->update($query12);
            
            if($update){
                echo"Data insert successfully";
                //header("Location:show_category.php");
            }else{
                echo"Data not insert successfully";
                header("Location:add_category.php");
            }
            
        }
                
              
    ?>


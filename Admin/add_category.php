<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<style>
    .col-lg-8{
        padding-top:150px !important;
        padding-left:250px !important;
    }
    .card{
        padding:20px 30px;
        height:auto !important;
        
    }
    input[type="text"]{
        margin-bottom:10px;
    }
</style>
<div class="col-lg-8">
   
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['category'];
        $category = mysqli_real_escape_string($db->link , $name);
        if(empty($category)){
            echo"No category are added now";
        }else{
            $query = "INSERT INTO  category(name) VALUES('$category')";
            $insert = $db->insert($query);
            // $rows = $db->fetch_assoc($insert);
            // $row = $db->num_rows( $rows);
            if($insert){
                echo"Data insert successfully";
                header("Location:show_category.php");
            }else{
                echo"Data not insert successfully";
                header("Location:add_category.php");
            }
            // 
        }
    }
    
    
    ?>
    
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="p-5">
        <!-- Material form subscription -->
            <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Add Category</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="add_category.php" method="post">

                    <div class="md-form mt-3">
                        <input  type="text" name="category" id="materialSubscriptionFormPasswords"  placeholder="Enter category name" class="form-control">
                       
                    </div>

                   

                    <!-- Sign in button -->
                    <button class="btn mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Category in</button>

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
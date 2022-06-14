<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<?php if(!Session::get('userRole') == '0'){
   echo "<script>window.location = 'index.php';</script>";
 }?>
 
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
    #userRole{
        float:left;
        margin-bottom:10px;
    }
    select{
        width:100%;
        padding:5px;
    }
</style>
<div class="col-lg-8">
   
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $userRole = $_POST['userRole'];

        $userName =$time->validation($userName);
        $password =$time->validation(md5($password));
        $userRole =$time->validation($userRole);

        $userName = mysqli_real_escape_string($db->link , $userName);
        $password = mysqli_real_escape_string($db->link , $password);
        $userRole = mysqli_real_escape_string($db->link , $userRole);
        
            $query = "INSERT INTO  user(username,password,role) VALUES('$userName',' $password', $userRole)";
            $insert = $db->insert($query);
            
            if($insert){
                echo"User insert successfully";
                // header("Location:user_list.php");
            }else{
               echo"User not insert successfully";
                // header("Location:add_category.php");
            }
           
        }
  
    
    
    ?>
    
    <div class="row">
        <div class="d-flex justify-content-center">
        <div class="p-5">
        <!-- Material form subscription -->
            <div class="card">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Add user</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post">

                    <div class="md-form mt-3">
                        <input  type="text" name="userName" id="materialSubscriptionFormPasswords"  placeholder="Enter user name" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                        <input  type="text" name="password" id="materialSubscriptionFormPasswords"  placeholder="Enter password" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                        <select name="userRole" id="userRole">
                        <option >Enter your user role</option>
                            <option value="0">Admin</option>
                            <option value="1">Author</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    
                   

                    <!-- Sign in button -->
                    <button class="btn btn-success mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Add user</button>

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
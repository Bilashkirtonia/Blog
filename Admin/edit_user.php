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
    #userRole{
        float:left;
        margin-bottom:10px;
    }
    select{
        width:100%;
        padding:5px;
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
                <strong>Add user</strong>
            </h5>

<?php 
    
    
?>
            <div class="card-body px-lg-5">
            <?php 
            if(isset($_GET['eid'])){
                $Id = $_GET['eid'];
            
            $query = "SELECT * FROM user WHERE id = $Id";
            $result = $db->select($query);
            while ($value = $result->fetch_assoc()){
            ?>
           
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post">

                    <div class="md-form mt-3">
                        <input  value="<?php echo $value['username'];?>"  type="text" name="userName" id="materialSubscriptionFormPasswords"  class="form-control">
                    </div>
                    <div class="md-form mt-3">
                        <input value="<?php echo $value['email'];?>"  type="text" name="email" id="materialSubscriptionFormPasswords"  placeholder="Enter password" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                        <select name="role" id="">
                            <option value="<?php echo $value['role'];?>">
                            <?php 
                        if($value['role'] == 0){
                            echo"Adnin";
                        }elseif($value['role']==1){
                            echo"Author";
                        }else{
                            echo"User";
                        }
                       ?> 
                        <?php 
                        if($value['role'] == 0){?> 
                            <option value="1">Author</option>
                            <option value="2">User</option>
                        <?php }elseif($value['role']==1){ ?>
                            <option value="0">Admin</option>
                            <option value="2">User</option>
                        <?php }else{ ?>
                            <option value="0">Admin</option>
                            <option value="1">Author</option>

                        
                        <?php }?>
                        
                            </option>
                            
                            
                        </select>
                       
                    </div>
                    
                   

                    <!-- Sign in button -->
                    <button class="btn btn-success mt-4 btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Add user</button>

                </form>
                <!-- Form -->
                <?php 
                   } }
                ?>
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
        $name = $_POST['userName'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        
            $query12 ="UPDATE user SET username = '$name',email = '$email',role='$role' WHERE id = $Id";
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
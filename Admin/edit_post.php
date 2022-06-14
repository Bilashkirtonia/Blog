<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<?php 

if(!isset($_REQUEST['eid']) || $_REQUEST['eid'] == null){
    header('Location:show_category.php');
}else{
    $eid = $_GET['eid'];  
}



?>
<style>
    .col-lg-8{
        padding-top:30px !important;
        padding-left:250px !important;
    }
    .card{
        padding:20px 30px;
        height:auto !important;
        
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
    img{
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
            $eid = $_GET['eid'];
            $query12 ="UPDATE post SET name = '$name' WHERE id = $eid";
            $update = $db->update($query12);
            
            if($update){
                echo"Data insert successfully";
                //header("Location:show_category.php");
            }else{
                echo"Data not insert successfully";
                header("Location:add_category.php");
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
                <strong>Add Category</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5">
            
                <!-- Form -->
<form class="text-center" style="color: #757575;" action="" method="post">
    <?php 
            $e_query = "select * from post where id = $eid order by id desc";
            $e_ersult = $db->select($e_query);
            while($e_row = $e_ersult->fetch_assoc()){ 
    ?>             
    <div class="md-form mt-3">
    <input value="<?php echo $e_row['title'];?>"  type="text" name="title" id="materialSubscriptionFormPasswords"  placeholder="Enter title Name" class="form-control">
    </div>
    <div class="md-form mt-3">
    <input  value="<?php echo $e_row['tags'];?>" type="text" name="tags" id="materialSubscriptionFormPasswords"  placeholder="Enter Category Name" class="form-control">
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="md-form mt-3 mb-2">
                <img width="200" src="../image/<?php echo $e_row['image'];?>" alt="">
            </div>
        </div>
        <div class="col-lg-6">  
            <div class="md-form mt-3 mb-2">
            <input value="<?php echo $e_row['title'];?>"  type="file" name="file" id="materialSubscriptionFormPasswords"  placeholder="Enter Image" class="form-control">
            </div>
        </div>
*    </div>
       <div class="md-form mt-3">
    <textarea name="content" id="" cols="30" rows="10" placeholder="Enter Content" class="form-control">
   <?php echo $e_row['body'];?>
    </textarea>
    </div>
    <div class="md-form mt-3 mb-2">
    <input style="margin-top:10px"; value="<?php echo $e_row['tags'];?>"  type="text" name="tags" id="materialSubscriptionFormPasswords"  placeholder="Enter tags" class="form-control">
    </div>
    <div class="md-form mt-3 mb-2">
    <input value="<?php echo $e_row['author'];?>"  type="text" name="author" id="materialSubscriptionFormPasswords"  placeholder="Enter author" class="form-control">
    </div>
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
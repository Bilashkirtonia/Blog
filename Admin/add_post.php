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
        $category = $_POST['category'];
        //$file = $_POST['file'];
        $body = $_POST['body'];
        $tags = $_POST['tags'];
        $author = $_POST['author'];

        $title = mysqli_real_escape_string($db->link , $title);
        $category  = mysqli_real_escape_string($db->link , $category );      
        $body = mysqli_real_escape_string($db->link , $body);
        $tags = mysqli_real_escape_string($db->link , $tags);
        $author = mysqli_real_escape_string($db->link , $author);
        
        $f_name = $_FILES['file']['name'];
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $file_exe = explode('.',$f_name);
        $file_ex = end($file_exe);
        $extension = array('jpg','png','jpeg');
        $new_name = time().'.'.basename($f_name);
        $target = '../image/'.$new_name;

        if($title == '' ||$category == '' ||$body == '' || $tags == '' ||$author == ''){
            echo"Can't add now";
        }else{
            if(in_array($file_ex,$extension)===false){
                echo 'Select thr right formate';
            }elseif($size > 5242880){
                echo 'Select thr right size';
            }else{
                move_uploaded_file($tmp_name,$target);
                $query = "INSERT INTO  post(cat,title,body,image,author,tags)
                VALUES('$category','$title','$body','$new_name','$tags','$author')";
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
                <form class="text-center" style="color: #757575;" action="add_post.php" method="post" enctype="multipart/form-data">

                    
                    <div class="md-form mt-3">
                        <input  type="text" name="title" id="materialSubscriptionFormPasswords"  placeholder="Enter title Name" class="form-control">
                    </div>
                    <div class="md-form mt-3 select" >

                        <select class="mdb-select" name="category">
                        
                    <?php 
                            $e_query = "select * from category order by id desc";
                            $e_ersult = $db->select($e_query);
                            while($e_row = $e_ersult->fetch_assoc()){ 
                    ?>
                                <option value="<?php echo $e_row['name'];?>"><?php echo $e_row['name'];?></option>

                    <?php 
                    }
                    ?>                         

                    </select>
                    </div>
                    <div class="md-form mt-3 mb-2">
                        <input  type="file" name="file" id="materialSubscriptionFormPasswords"  placeholder="Enter Image" class="form-control">
                    </div>
                    <div class="md-form mt-3">
                      <textarea name="body" id="" cols="30" rows="10" placeholder="Enter Content" class="form-control"></textarea>
                        
                    </div>
                    <div class="md-form mt-3 mb-2">
                        <input  type="text" name="tags" id="materialSubscriptionFormPasswords"  placeholder="Enter tags" class="form-control">
                    </div>
                    <div class="md-form mt-3 mb-2">
                        <input  type="text" name="author" id="materialSubscriptionFormPasswords"  placeholder="Enter author" class="form-control">
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
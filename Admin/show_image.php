<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>


<div class="col-lg-11 mt-5">
 
    <div class="bg-light p-5">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Editable table
      </h3>
      <div class="card-body">
      
        <div id="table" class="table-editable">
          <span class="table-add float-right mb-5 mr-2"
            ><a href="#!" class="text-success"
              ><i class="" aria-hidden="true"></i></a
          ></span>

          <?php include"search_and_page.php"?>
          <?php 
                if(isset($_REQUEST['deleid'])){
                  $did = $_GET['deleid'];
                  $query = "SELECT * FROM slider WHERE id = $did ";
                  $d_result = $db->select($query);
                  $row = $d_result->fetch_assoc();
                  unlink('../image/'.$row['image_name']);
                  


                  $query = "DELETE FROM slider WHERE id = $did ";
                  $d_result = $db->delete($query);
                  if($d_result == true){
                    echo 'Delete successfully Done'."<br>";
                  }else{
                    echo 'Unable to Delete';
                  }
                }

 ?>
          <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead class="mb-2">
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">image</th>
                <th class="text-center">Action</th>
               
               
               
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM slider ORDER BY id DESC";
              $result = $db->select($query);
                if(mysqli_num_rows($result) > 0){
                  $v = 1;
                  while ($value = $result->fetch_assoc()){

              ?>
              <tr>
                <td class="pt-3-half" contenteditable="true"> <?php echo $v;?></td>
                <td class="pt-3-half" contenteditable="true"><img width="250" src="../image/<?php echo $value['image_name'];?>" alt=""></td>
                <td>
                  <span class="table-remove"
                    ><a onclick = "return confirm('Are you sure to delete?')" href="?deleid=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Delete
                    </button>
                    </a></span
                  >
                </td>
              </tr>
              <?php $v++; } }else{
                echo "Data is now empty";
              }?>

              <!-- This is our clonable table line -->
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
<!-- Editable table -->
</div>
</div>





































<?php include "admin/footer.php";?>
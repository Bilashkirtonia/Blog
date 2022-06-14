<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>
<style>
  .card{
    margin-top:50px !important;
    padding:30px 100px !important;
    height:auto !important; 
  }
  .text-center1{
    width:220px !important;
  }
  /* table{
    margin-top:50px !important;
    padding:50px !important;
  } */
</style>

<div class="col-lg-11 mt-5">
  <div class="card mt-5">
    <div class="bg-light p-5">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Unseen Message
      </h3>
      <div class="card-body">
      
        <div id="table" class="table-editable">
          <span class="table-add float-right mb-5 mr-2"
            ><a href="#!" class="text-success"
              ><i class="" aria-hidden="true"></i></a
          ></span>

          <?php include"search_and_page.php"?>
          <?php
    if(isset($_GET['seen'])){
            $eid = $_GET['seen'];
            $query12 ="UPDATE contact SET status = 0 WHERE id = $eid";
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
          <?php 
                if(isset($_REQUEST['deleid'])){
                  $did = $_GET['deleid'];
                  $query = "DELETE FROM contact WHERE id = $did ";
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
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Message</th>
                <th class="text-center">Date</th>
                <th class="text-center text-center1">Action</th>
               
               
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM contact WHERE status = 1 ORDER BY id DESC";
              $result = $db->select($query);
              
              $v = 1;
              while ($value = $result->fetch_assoc()){
              
              ?>
              <tr>
                <td class="pt-3-half" contenteditable="true"> <?php echo $v;?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $value['f_name'];?> <?php echo $value['l_name'];?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $value['email'];?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $time->read($value['message'],50);?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $time->Date($value['date']);?></td>
                <td>
                  <span class="table-remove"
                    ><a href="view.php?eid=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      View
                    </button>
                    </a></span
                  >
                ||
                  <span class="table-remove"
                    ><a href="replay.php?reply_id=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Reply
                    </button>
                    </a></span>
                  ||
                  <span class="table-remove"
                    ><a href="?seen=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Seen
                    </button>
                    </a></span>
                </td>
              </tr>
              <?php $v++; } ?>
              <!-- This is our clonable table line -->
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
</div>

<div class="col-lg-11 mt-5">
  <div class="card mt-5">
    <div class="bg-light p-5">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Seen Message
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
                  $query = "DELETE FROM contact WHERE id = $did ";
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
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Message</th>
                <th class="text-center">Date</th>
                <th class="text-center text-center1">Action</th>
               
               
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM contact WHERE status = 0 ORDER BY id DESC";
              $result = $db->select($query);
              
              $v = 1;
              while ($value = $result->fetch_assoc()){
              
              ?>
              <tr>
                <td class="pt-3-half" contenteditable="true"> <?php echo $v;?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $value['f_name'];?> <?php echo $value['l_name'];?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $value['email'];?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $time->read($value['message'],50);?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $time->Date($value['date']);?></td>
                <td>
                  <span class="table-remove"
                    ><a href="view.php?eid=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      View
                    </button>
                    </a></span
                  >
                ||
                  <span class="table-remove"
                    ><a href="replay.php?reply_id=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Reply
                    </button>
                    </a></span>
                  ||
                  <span class="table-remove"
                    ><a onclick = "return confirm('Are you sure to delete?')" href="?deleid=<?php echo $value['id'];?>">
                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Delete
                    </button>
                    </a></span>
                </td>
              </tr>
              <?php $v++; } ?>
              <!-- This is our clonable table line -->
              
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
</div>
<?php include "admin/footer.php";?>
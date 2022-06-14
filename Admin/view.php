<?php include "admin/header.php";?>
<?php include "admin/nav.php";?>
<?php include "admin/side.php";?>


<div class="col-lg-11 mt-5">
 
    <div class="bg-light p-5">
      <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
       Message
      </h3>
      <div class="card-body">
      
        <div id="table" class="table-editable">
          <span class="table-add float-right mb-5 mr-2"
            ><a href="#!" class="text-success"
              ><i class="" aria-hidden="true"></i></a
          >
        </span>

          
         
         
              <?php
              if(isset($_GET['eid'])){
                  $eid = $_GET['eid'];
              
              $query = "SELECT * FROM contact where id = $eid ORDER BY id DESC";
              $result = $db->select($query);
                
                  
                  while ($value = $result->fetch_assoc()){
              ?>
              
                <h2><?php echo $value['email'];?></h2>
                <hr>
                <p><?php echo $value['f_name'];?> <?php echo $value['l_name'];?></p>
                <p><?php echo $time->Date($value['date']);?></p>
                <h5><?php echo $value['message'];?></h5>




              <?php } }?>

 <button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="inbox.php" style="color:white;">OK</a></button>
              
           
        </div>
      </div>
    </div>
<!-- Editable table -->
</div>
</div>

<?php include "admin/footer.php";?>
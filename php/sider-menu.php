
<div class="col-lg-3">

            <div class="row">
              <div class="col">
                <div class="card">
                  <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-3">Categories</h3>
                  <div class="card-body">
                    <ul class="list-group">
                      <?php 
                      
                      $query = "select * from category order by id desc limit 6";
                      $category = $db->select($query);
                      while($c_result = $category->fetch_assoc()){
                      ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="posts.php?id=<?php echo$c_result['id']; ?>">
                     <?php echo $c_result['name']; ?>
                     </a>
                      </li>
                      <?php 
                        }
                      ?>
                    </ul>
                    
                  </div>
              </div>
              </div>
            </div>
            <div class="row py-3">
              <div class="col">
              <h3 class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-3">Latest articals</h3>
              <?php 
                $query = "select * from post limit 4";
                $result1 = $db->select($query);
                while($p_result = $result1->fetch_assoc()){
              ?>
                <div class="card testimonial-card mb-3">

                  <!-- Background color -->
                  <div class="card-up indigo"></div>

                  <!-- Avatar -->
                  <div class="avatar mx-auto white mt-3">
                   <a href="post.php?id=<?php echo $p_result['id']; ?>">
                   <img height="50" src="image/<?php echo $p_result['image']; ?>" class="rounded-circle"
                      alt="woman avatar">
                   </a>
                  </div>

                  <!-- Content -->
                  <div class="card-body">
                    <!-- Name -->
                    <h4 class="card-title"><?php echo $p_result['title']; ?></h4>
                    <hr>
                    <!-- Quotation -->
                    <a href="post.php?id=<?php echo $p_result['id']; ?>">
                    <p><?php echo $time->read($p_result['body'],50);?></p>
                    </a>
                  </div>

                </div>

                <?php }?>
                <!-- Card -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
   
</section>
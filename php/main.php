

<?php
$per_page = 3;
if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $Start = ($page-1)*$per_page;
    
?>

<section class="py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row ">
        <div class="col-lg-9">
          <!--Navbar-->
          <?php include"navbar.php"?>

         
          <!-- Section: Blog v.1 -->
<section class="my-5">

      <!-- Section heading -->
      <h2 class="h1-responsive font-weight-bold text-center my-5">Recent posts</h2>
      <!-- Section description -->
      <p class="text-center w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit
        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
        qui officia deserunt mollit anim id est laborum.
      </p>

     <?php 
     //$Start , $per_page
        $query = "SELECT * FROM post ORDER BY id DESC limit {$Start} ,{$per_page}";
       $post = $db->select($query);
       if($post){
         while($result = $post->fetch_assoc()){
     ?>
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-5">

          <!-- Featured image -->
          <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
           <img class="img-fluid" src="image/<?php echo $result['image'];?>" alt="Sample image">
            <a href="post.php?id=<?php echo $result['id']; ?>">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

        </div>
        <!-- Grid column -->
        <!-- image/ -->
        <!-- Grid column -->
        <div class="col-lg-7">

          <!-- Category -->
          <a href="post.php?id=<?php echo $result['id']; ?>" class="green-text">
            <h6 class="font-weight-bold mb-3"><i class="fas fa-utensils pr-2"><strong> <?php echo  $result['tags']; ?></strong></i></h6>
          </a>
          <!-- Post title -->
          <h3 class="font-weight-bold mb-3"><strong><?php echo $result['title']; ?></strong></h3>
          <!-- Excerpt -->
          <a href="post.php">
          <p><?php echo $time->read($result['body']);?>
          <p>by <br><?php echo $time->Date($result['date']); ?></p><p><?php echo $result['author']; ?></p>
          </a>
          <!-- Read more button -->
          <a href="post.php?id=<?php echo $result['id']; ?>" class="btn btn-success btn-md">Read more</a>

        </div>
        <!-- Grid column -->

      </div>
      <hr class="my-5">
       

     <?php }
     
      }else{
       header("Location:404.php");
     }   
     ?>

</section>
<?php
$query1 = "select * from post";
$result = $db->select($query1);
$total_data = mysqli_num_rows($result);
$total_page = ceil($total_data / $per_page);

?>
<nav aria-label="Page navigation example">
  <ul class="pagination pg-blue">
    <?php
    if ($page>1) {?>
      <li class="page-item">
      <a  href="index.php?page=<?php echo ($page - 1);?>" class="page-link" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php
    }
    ?>
    
    <?php  for ($i=1; $i <=$total_page; $i++) {  
      if ($i == $page) {
        $active = 'active';
      }else{
        $active = '';
      }
      ?>
      <li class="page-item <?php echo $active;?>"><a href="index.php?page=<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li>
    <?php } ?>

   
    
    <?php
    if ($total_page > $page) {?>

      <li class="page-item">
      <a  href="index.php?page=<?php echo ($page + 1);?>" class="page-link" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    
    <?php
    }
    ?>
  </ul>
</nav>

</div>

<?php include"database/databases.php"?> 
<?php include"database/dataconfig.php"?> 
<?php include"formate/formateFunction.php"?>

  <style>
    h5{
      display:block;
      color:#fff;
    }
    span{
      display:inline-block;
    }
  </style>  

<nav class=" navbar navbar-expand-lg navbar-dark orange ">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
      aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php 
       $db1 = new Database();
       $query = "select * from logo limit 1";
       $result = $db1->select($query);
       
      while ($row =$result->fetch_assoc()) {
    ?>  
    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    
    <ul class="navbar-nav nav-flex-icons mr-5">
      
        <li class="nav-item avatar">
          <a class="nav-link p-0" href="index.php">
            <img src="image/<?php echo $row['logo'] ?>" class="rounded-circle z-depth-0"
              alt="avatar image" height="100">
          </a>
        </li>
      </ul>
      <div class="navbar-nav mr-auto">
        <h5><?php echo $row['title'] ?></h5> 
        <!-- <span>i am joy</span> -->
      </div>
      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php">login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="sign.php">signUp</a>
        </li>


      </ul>
      
    </div>

    
    <?php } ?>
</nav>
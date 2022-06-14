            <nav class="navbar navbar-expand-lg navbar-dark primary-color">
              
              <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
  
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">
                <!-- Links -->
             

                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">home</a>
                </li>
            <?php 
            $db = new Database();
            $time = new Formate();
            $e_query = "select * from pages order by id desc";
            $e_ersult = $db->select($e_query);
            while($e_row = $e_ersult->fetch_assoc()){ 
            ?> 
                  <li class="nav-item ">
                    <a class="nav-link" href="about.php?page=<?php echo $e_row['id'];?>"><?php echo $e_row['title'];?></a>
                  </li>
            <?php 
             }
            ?> 
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  -->
                <li class="nav-item ">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                </ul>


                <!-- Links -->
  
                <form class="form-inline" action="search.php" method="GET">
                  <div class="md-form my-0">
                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
                  </div>
                </form>
              </div>
              <!-- Collapsible content -->
            </nav>
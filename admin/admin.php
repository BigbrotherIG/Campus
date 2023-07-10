<?php include_once('header.php');
  
  $limit = 10;
  
  if(isset($_GET['page'])) {
      $page = $_GET['page'];
  }else {
      $page = 1;
  }    
  
  $start = $limit * ($page - 1);
  $prev = $page - 1;
  $next = $page + 1;
  
  $queryPages = $conn->query("SELECT * FROM `admins` LIMIT $limit OFFSET $start");
  $queryCount = $conn->query("SELECT * FROM `admins`");
  $countAll = $queryCount->num_rows;

  $pages = ceil($countAll/$limit)
?>
    <!--  -->
  <div class="row">
    <div class="col-lg-12 stretch-card">
      
          <div class="card">
              <div class="card-body">
                <h4 class="card-title">Admins</h4>
                <h4 class="card-title"><?=$countAll?></h4>
                  <div class="table-responsive pt-3">
                    
                  <table class="table table-hover table-bordered rounded">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name of staff</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                          $count = 1;
                          $queryInsert = $conn->query("SELECT * FROM `admins`");
                          
                          while($admins = mysqli_fetch_array($queryInsert)){
                              
                  
                          
                      ?>
                      <tr>
                        <td><?= $count++;?></td>
                        <td><?=$admins['username']; ?></td>
                        <td><?=ucwords($admins['user_role']); ?></td>
                        <td><?=$admins['email']; ?></td>
                        <td><?=$admins['date']; ?></td>
    
                        <td><a href="admin-detail.php?account_id=<?=$admins['account_id']?>" class="btn btn-outline-danger" name="delete">View detail</a></td>
                      </tr>
            
                      <?php };?>
                    </tbody>
                    
                  </table>

                  <div class="container my-4 d-flex ">
                    <a href="news-posted.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled <?php }?>me-1">Prev</a>

                    <?php 
                        if($pages <= 10) {
                            for($counter = 1; $counter <= $pages; $counter++) {
                                if($counter === $page) {                                
                    ?>
                        <a href="news-posted.php" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } else { ?>
                        <a href="news-posted.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                    <?php } } }?>

                    <a href="news-posted.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled <?php } ?>">Next</a>
                  </div>

                  <div class="container my-2">
                      <a href="register.php" class="btn btn-primary">Add new staff</a>
                  </div>
                </div>
              </div>
          </div>
    </div>
  </div>

<?php include_once('footer.php');?>
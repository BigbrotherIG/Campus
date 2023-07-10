 <?php @include 'header.php';

      if(isset($_GET['delete'])){
        $postId = $_GET['post_id'];
        
        if(empty($queryDelete)) {

          $_SESSION['sweetalertText'] = array("title" => "Confirm! Do want to delete" , "text" => "", "icon" => "warning", "button" => "Confirm!");

          $id = $_SESSION['account_id'];
          $queryUpdate = $conn->query("INSERT INTO `admin_log` (`admin_id`, `activities`, `activity_time`)
           VALUES ('$id', 'Deleted a post', current_timestamp())");
            // $queryDelete = $conn->query("DELETE FROM `post_data` WHERE post_id = '$postId'");
            // echo "
            //   <script>alert('Delete Successful'); window.location.href='news-posted.php'</script>
            // ";
          }else {
            echo "Not deleted";
          }
          
      }
      
      $limit = 20;
      
      if(isset($_GET['page'])) {
          $page = $_GET['page'];
      }else {
          $page = 1;
      }    
      
      $start = $limit * ($page - 1);
      $prev = $page - 1;
      $next = $page + 1;
      
      $queryPages = $conn->query("SELECT * FROM `post_data` where trends = 'trends' LIMIT $limit OFFSET $start");
      $queryCount = $conn->query("SELECT * FROM `post_data`");
      $countAll = $queryCount->num_rows;

      $pages = ceil($countAll/$limit)
 ?>   
    
    <div class="row">
      <div class="col-lg-12 stretch-card">
        
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">News posted</h4>
                  <h4 class="card-title"><?=$countAll?></h4>
                    <div class="table-responsive pt-3">
                      
                    <table class="table table-hover table-bordered rounded">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Post Title</th>
                          <th>Author</th>
                          <th>Trends</th>
                          <th>Date</th>
                          <th>Remove</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                            $count = 1;
                            $queryInsert = $conn->query("SELECT * FROM `post_data`");
                            
                            while($postData = mysqli_fetch_array($queryInsert)){
                                
                    
                            
                        ?>
                        <tr>
                          <td><?= $count++;?></td>
                          <td><?= $postData['post_url']; ?></td>
                          <td><?= $postData['news_author']; ?></td>
                          <td><?= $postData['trends']; ?></td>
                          <td><?= $postData['news_date']; ?></td>
      
                          <td><a href="news-posted.php?post_id=<?=$postData['post_id']?>&delete" class="btn btn-outline-danger" name="delete">Delete</a></td>
                        </tr>
              
                        <?php };?>
                      </tbody>
                      
                    </table>
                    <div class="container my-4 d-flex ">
                      <a href="news-posted.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled <?php }?>me-1">Prev</a>

                      <?php 
                          if($pages <= 20) {
                              for($counter = 1; $counter <= $pages; $counter++) {
                                  if($counter === $pages) {                                
                      ?>
                          <a href="news-posted.php" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                      <?php } else { ?>
                          <a href="news-posted.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                      <?php } } }?>

                      <a href="news-posted.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled <?php } ?>">Next</a>
                    </div>

                  </div>
                </div>
            </div>


              

      </div>
    </div>

<?php include_once('footer.php')?>
<?php include_once('header.php');

    if(isset($_GET['delete'])){
    $postId = $_GET['faq_id '];
    
    if(empty($queryDelete)) {

      $_SESSION['sweetalertText'] = array("title" => "Confirm! Do want to delete" , "text" => "", "icon" => "warning", "button" => "Confirm!");


        // $queryDelete = $conn->query("DELETE FROM `post_data` WHERE faq_id  = '$postId'");
        // echo "
        //   <script>alert('Delete Successful'); window.location.href='delete-faq.php'</script>
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
    
    $queryPages = $conn->query("SELECT * FROM `campus_guide_faq` LIMIT $limit OFFSET $start");
    $queryCount = $conn->query("SELECT * FROM `campus_guide_faq`");
    $countAll = $queryCount->num_rows;

    $pages = ceil($countAll/$limit)
?>


    <div class="row">
      <div class="col-lg-12 stretch-card">
        
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FAQ posted</h4>
                  <h4 class="card-title"><?=$countAll?></h4>
                    <div class="table-responsive pt-3">
                      
                    <table class="table table-hover table-bordered rounded">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Faq Title</th>
                          <th>Faq answer</th>
                          <th>Date</th>
                          <th>Remove</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                            $count = 1;
                            $queryInsert = $conn->query("SELECT * FROM `campus_guide_faq`");
                            
                            while($faqData = mysqli_fetch_array($queryInsert)){ 
                        ?>
                        <tr>
                          <td><?= $count++;?></td>
                          <td><?= $faqData['faq_title']; ?></td>
                          <td><?= $faqData['faq_ans']; ?></td>
                          <td><?= $faqData['date']; ?></td>
      
                          <td><a href="delete-faq.php?faq_id=<?=$faqData['faq_id']?>&delete" class="btn btn-outline-danger" name="delete">Delete</a></td>
                        </tr>
              
                        <?php };?>
                      </tbody>
                      
                    </table>
                    <div class="container my-4 d-flex ">
                      <a href="delete-faq.php?page=<?=$prev?>" class="btn btn-outline-danger <?php if($page <= 1){?>disabled <?php }?>me-1">Prev</a>

                      <?php 
                          if($pages <= 20) {
                              for($counter = 1; $counter <= $pages; $counter++) {
                                  if($counter === $pages) {                                
                      ?>
                          <a href="delete-faq.php" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                      <?php } else { ?>
                          <a href="delete-faq.php?page=<?=$counter?>" class="btn btn-outline-secondary me-1"><?=$counter?></a>
                      <?php } } }?>

                      <a href="delete-faq.php?page=<?=$next?>" class="btn btn-outline-primary <?php if($page >= $pages){?>disabled <?php } ?>">Next</a>
                    </div>

                  </div>
                </div>
            </div>


              

      </div>
    </div>

<?php include_once('footer.php')?>
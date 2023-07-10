<?php include_once('header.php');

    $error_message = "";
    if(isset($_POST['post-faq'])) {

        $faqTitle = $_POST['faq_title'];
        if(empty($faqTitle)) {
            $error_message = "FAQ Title must be fill";
        }

        $faqAns = $_POST['faq_ans'];
        if(empty($faqAns)) {
            $error_message = "FAQ Answer must be fill";   
        }

        if(empty($error_message)) {
            
            $queryInserted = $conn->query("INSERT INTO `campus_guide_faq` (`faq_title`, `faq_ans`)
             VALUES ('$faqTitle', '$faqAns')");

             if($queryInserted) {
                echo "
                    <script>alert('FAQ has be added')</script>
                ";
             }else {
                echo "
                    <script>alert('FAQ was not added')</script>
                ";
             }
        }
    }
?>

<div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Post News</h4>
                <p class="card-description"><?=$error_message?></p>

                <form action="" class="forms-sample" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="InputEmail3">Faq Title</label>
                        <input type="text" name="faq_title" class="form-control" id="InputEmail3" placeholder="Faq Title">
                    </div>

                    <div class="form-group">
                        <label for="Textarea1">Faq Answer</label>
                        <textarea class="form-control" name="faq_ans" id="editor" rows="6"></textarea>
                    </div>
                    
                    <button type="submit" name="post-faq" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once('footer.php')?>
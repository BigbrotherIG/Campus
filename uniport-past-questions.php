<?php include "header.php"; 

    $error_message = "";
    if(isset($_POST['submit'])) {

        $faculties_select = $_POST['faculties_select'];
        $department_id = $_POST['department_id'];
        $email = $_POST['username'];
       

        $queryInsert = $conn->query("SELECT * FROM `faculties` WHERE faculty_id = $faculties_select");
        foreach($queryInsert as $faculties){
            $faculty_name = $faculties['faculty_name'];
        }

        $querydepartment = $conn->query("SELECT * FROM `departments` WHERE department_id = $department_id");
        foreach($querydepartment as $departm){
            $department_name = $departm['department_name'];
        }

        $_SESSION['sweetalertText'] = array("title" => "Confirm! This cost ₦1000" , "text" => "$email", "icon" => "warning", "button" => "Confirm!");
    
    }

?>
    <title>Campus guide - Past Questions</title>

    <div class="container" style="margin-top: 100px;"></div>
    <!--  -->
    <section class="my-4">
        <div class="container">
            <h2 class="my-4">Get Uniport Past Questions</h2>
            <div class="container row g-4">
                <div class="col-md-8 col-xs-6 border border-dark border-start p-2 me-5 py-4">
                    <p class=" container lead fs-6 fw-normal">Get your uniport past questions as PDF for &#8358;1500.</p>
                    <p></p>

                    <!-- Uniport past questions -->
                    <div class="container">
                        <form action="" method="Post">
                            <div class="form-floating mb-3">
                                    <select name="faculties_select" class="form-select" id="faculty_id">
                                        <option selected value=""></option>
                                        <?php 
                                            $queryInsert = $conn->query("SELECT * FROM `faculties`");

                                            foreach($queryInsert as $faculties){
                                                
                                            
                                        ?>
                                        <option value="<?=$faculties['faculty_id']?>"><?=$faculties['faculty_name']?></option>
                                     <?php }?>
                                    </select>
                                    <label for="floatingSelect">Select Faculty</label>
                            </div>

                            <div class="form-floating mb-3">
                                    <select name="department_id" class="form-select" id="department_id">
                                        <option selected value=""></option>  
                                    </select>
                                    <label for="floatingSelect">Select department</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="username">
                                <label for="floatingInput">Email</label>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Next</button>
                        </form> 
                     
                        <dl class="row mb-0">
                            <dt class="col-12">Client Name</dt>
                           <?php
                            if(!empty($faculty_name) && !empty($department_name) && !empty($email)) {
                           ?>
                            <dd class="col-12"><?=$faculty_name?></dd>
                            <dd class="col-12"><?=$department_name?></dd>
                            <dd class="col-12"><?=$email?></dd>
                            <?php } else { ?>
                                <dd class="col-12">Your faculty Name</dd>
                                <dd class="col-12">Your department Name</dd>
                                <dd class="col-12">Your email</dd>
                            <?php }?>
                        </dl>
                                         
                    </div>
                    
                </div>

                <!--  -->
                <div class="col-md-3 col-xs-3 border h-100">
                    <p class="fs-6">Book your Advert</p>
                </div>

                
            </div>
        </div>
    </section>

    <script>
   
        // $(document).ready(function(){
        //     $("#faculty_id").change(function(){

        //         var facultyId = $(this).val();

        //         $.ajax({
        //             url: 'select-department.php',
        //             type: 'post',
        //             data: {facultyId:facultyId},
        //             dataType: 'json',
        //            success: function(response){
        //                 var len = response.length;

        //                 $('#department_id').empty();
        //                 for( var i = 0; i < len; i++ ){
        //                     var department_id = response[i]['department_id'];
        //                     var department_name = response[i]['department_name'];

        //                     $('#department_id').append("<option value='"+department_id+"'> "+department_name+"</option>")
                            
        //                 }
        //            } 
        //         }).done(function(departments){
        //             console.log(departments)
        //         });
        //     });

        // });
        
        $(document).ready(function() {
            $("#faculty_id").change(function(){
                var facultyId = $(this).val();

                $.ajax({
                    url: 'select-department.php',
                    method: 'post',
                    data: {facultyData: facultyId},
                    success:function(data){
                        $("#department_id").html(data);
                    
                    }
                })
            })
        });

    </script>

<?php include "footer.php"; ?>
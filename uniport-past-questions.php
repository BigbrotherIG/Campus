<?php include "header.php"; ?>
    <div class="container" style="margin-top: 100px;"></div>
    <!--  -->
    <section class="my-4">
        <div class="container">
            <h2 class="my-4">Get Uniport Past Questions</h2>
            <div class="container row g-4">
                <div class="col-md-8 col-xs-6 border border-dark border-start p-2 me-5 py-4">
                    <p class=" container lead fs-6 fw-normal">Get your uniport past questions as PDF at as low as #1000.</p>
                    <p></p>

                    <!-- Uniport past questions -->
                    <div class="container" >
                        <form action="" method="Post">
                            <div class="form-floating mb-3">
                                    <select name="faculties_select" class="form-select" id="faculty_id">
                                        <option selected value="0"></option>
                                        <?php 
                                            $queryInsert = $conn->query("SELECT * FROM `faculties`");

                                            foreach($queryInsert as $faculties){
                                                
                                            
                                        ?>
                                        <option value="<?= $faculties['faculty_id']?>"><?= $faculties['faculty_name']?></option>
                                     <?php }?>
                                    </select>
                                    <label for="floatingSelect">Select Faculties</label>
                            </div>

                            <div class="form-floating mb-3">
                                    <select name="departments_select" class="form-select" id="department_id">
                                        <option selected value=""></option>
                                       
                                    </select>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="username" placeholder="username">
                                <label for="floatingInput">Email</label>
                            </div>
                            

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" name="login_submit" class="btn btn-primary py-3 w-100 mb-4">Next</button>
                        </form>                    
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
   

        $(document).ready(function(){
            $("#faculty_id").change(function(){

                var facultyId = $(this).val();

                $.ajax({
                    url: 'select_department.php',
                    type: 'post',
                    data: {facultyId:facultyId},
                    dataType: 'json',
                   success: function(response){
                        var len = response.length;

                        $('#department_id').empty();
                        for( var i = 0; i < len; i++ ){
                            var department_id = response[i]['department_id'];
                            var department_name = response[i]['department_name'];

                            $('#department_id').append("<option value='"+department_id+"'> "+department_name+"</option>")
                            
                        }
                   } 
                });
            });

        });
        
    </script>
<?php include "footer.php"; ?>
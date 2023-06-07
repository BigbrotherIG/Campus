<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <p>Select your past questions</p>
    <form action="" method="post">
        <div>
            <label for="faculty_id">
                <select name="faculties" id="faculty_id">
                    <option value=""></option>
                    <option value="">Agriculture</option>
                    <option value="">Business</option>
                </select>
            </label>
        </div><br>
        <div>
            <label for="department_id">
                <select name="departments" id="department_id" width="100">
                    <option value=""></option>
                    <option value="">Agriculture</option>
                    <option value="">Business</option>
                </select>
            </label>         
        </div>
    </form>

    <footer>
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
    </footer>
</body>

</html>
<?php include('includes/dbconnect.php');

    if(isset($_POST[''])) {}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <style>

        p {
          text-align: center;  
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #ccc;
            max-width: 500px;
            margin: auto;
        }
        
        .form div {
            margin: 15px 0;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
     
        div select {
            margin: 5px 0;
            width: 400px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <p>Select your past questions</p>
    <div class="container">

        <form action="" method="post" class="form">
            <div>
                <label for="faculty_id">Faculties</label>

                    <select name="faculties" id="faculty_id">
                        <option value=""></option>
                        <option value="">Agriculture</option>
                        <option value="">Business</option>
                    </select>
            </div>
            <div>
                <label for="department_id">books</label>
                    <select name="departments" id="department_id" width="100">
                        <option value=""></option>
                        <option value="">Agriculture</option>
                        <option value="">Business</option>
                    </select>
            </div>
        </form>
    </div>

    <footer>
    </footer>
    <script>
        $(document).ready(function(){
            $("#faculty_id").change(function(){
                var faculty = $("#faculty_id").val();
                $.ajax({
                    url: 'data.php',
                    method: 'post',
                    data: ''
                })
            })
        })
    </script>
</body>

</html>
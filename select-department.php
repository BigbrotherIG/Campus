<?php include('includes/dbconnect.php');

    if(isset($_POST['facultyId'])){
        $facultyId = $_POST['facultyId'];

        $arr = array();
        
        if($facultyId > 0){

            $my_news = "SELECT * FROM `departments` WHERE `faculty` = $facultyId";
            $eachnews = mysqli_query($conn, $my_news);
            $get_news = mysqli_fetch_all($eachnews, MYSQLI_ASSOC);

            foreach($get_news as $newsId):

                $department_id = $newsId['department_id'];
                $department_name = $newsId['department_name'];

                $arr[] = array("department_id" => $department_id , "department_name" => $department_name);
            endforeach;

            echo json_encode($arr);

        }
    }

?>
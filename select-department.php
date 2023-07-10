<?php include('includes/dbconnect.php');

    // if(isset($_POST['facultyId'])){
    //     $facultyId = $_POST['facultyId'];

        
    //     $arr = array();
    //     if($facultyId > 0){

    //         $my_news = "SELECT * FROM `departments` WHERE `faculty` = $facultyId order by department_name";
    //         $eachnews = mysqli_query($conn, $my_news);
    //         $get_news = mysqli_fetch_all($eachnews, MYSQLI_ASSOC);

    //         foreach($get_news as $newsId):

    //             $department_id = $newsId['department_id'];
    //             $department_name = $newsId['department_name'];

    //             $arr[] = array("department_id" => $department_id , "department_name" => $department_name);
    //         endforeach;

    //         echo json_encode($arr);

    //         // $queryUpdate = $conn->query("SELECT * FROM `departments` WHERE `faculty` = $facultyId");

    //         // while($queryUpdated = mysqli_fetch_array($queryUpdate)){
    //         //     $department_id = $queryUpdated['department_id'];
    //         //     $department_name = $queryUpdated['department_name'];
                
    //         // }
    //         // $arr[] = array("department_id" => $department_id , "department_name" => $department_name);
    //         // echo json_encode($arr);

    //     }
    // }

    if(isset($_POST['facultyData'])){
        $facultyId = $_POST['facultyData'];

        // $output = "";
        $queryUpdate = $conn->query("SELECT * FROM `departments` WHERE `faculty` = $facultyId Order by faculty");
        $output .='<option value="0" disabled selected></option>';
        while($row = mysqli_fetch_array($queryUpdate)){
            $output .= '<option value=" '.$row["department_id"].'"> '.$row["department_name"].' </option>';
        }
    
        echo $output;
    }

?>
<?php
    require('../config/db.php');


    
    $output = "";
    $for = "";
    $finalOutput = "";
    $numOfCols = 4;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    $space = " ";

    if(isset($_POST['employee_search_test'])) {
        $search = mysqli_real_escape_string($conn, $_POST['employee_search_test']);
        $employee_search_query = "
            SELECT user_type, tblemployee.first_name, tblemployee.last_name, tblemployee.phone, tblusers.user_id
            FROM tblusers
            INNER JOIN tblemployee
            ON tblusers.user_id = tblemployee.user_id
            WHERE first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'
            ORDER BY last_name
        ";
    } else {
        $employee_search_query = "
            SELECT user_type, tblemployee.first_name, tblemployee.last_name, tblemployee.phone, tblusers.user_id
            FROM tblusers
            INNER JOIN tblemployee
            ON tblusers.user_id = tblemployee.user_id
            ORDER BY last_name
        ";
    }


    $employee_search_result = mysqli_query($conn, $employee_search_query);
    if(mysqli_num_rows($employee_search_result) > 0){
        while($row = mysqli_fetch_array($employee_search_result)){
        $output .=
        '
        <div class="col-md-'.$bootstrapColWidth.'">
        <div class="card bg-light border-dark mb-3 text-center" style="width:8rem;">
        <div class="card-body" style="height: 10vw;">
          <h6 class="card-title"><b>'.$row['first_name'].$space.$row['last_name'].'</b></h6>
          <p>'.$row['user_type'].'</br> '.$row['phone'].' </p>
          <a href="employee.php?user_id='.$row['user_id'].'" class="btn btn-outline-dark btn-sm d-block">Profile</a>
        </div>
        </div>
        </div>
        ';
        $rowCount++;
        if($rowCount % $numOfCols == 0){ 
            echo '</div><div class="row">';}
        }
        echo $output;
        }
    else {
        echo 'Data Not Found';
    }

?>
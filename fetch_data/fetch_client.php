<?php
    require('../config/db.php');


    
    $output = "";
    $for = "";
    $finalOutput = "";
    $numOfCols = 6;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    $space = " ";

    if(isset($_POST['client_search_test'])) {
        $search = mysqli_real_escape_string($conn, $_POST['client_search_test']);
        $client_search_query = "
            SELECT first_name, last_name, client_id, active_status
            FROM tblclient
            WHERE first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'
            ORDER BY last_name
        ";
    } else {
        $client_search_query = "
            SELECT first_name, last_name, client_id, active_status
            FROM tblclient
            ORDER BY last_name
        ";
    }


    $client_search_result = mysqli_query($conn, $client_search_query);
    if(mysqli_num_rows($client_search_result) > 0){
        while($row = mysqli_fetch_array($client_search_result)){
        $output .=
        '
        <div class="col-md-'.$bootstrapColWidth.'">
        <div class="card bg-light border-dark mb-3 text-center" style="width:8rem;">
        <div class="card-body" style="height: 10vw;">
          <h6 class="card-title"><b>'.$row['first_name'].$space.$row['last_name'].'</b></h6>
          <p><b>Status:</b> </br>'.$row['active_status'].' </p>
          <a href="client.php?last_name='.$row['last_name'].'&client_id='.$row['client_id'].'" class="btn btn-outline-dark btn-sm d-block">Profile</a>
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
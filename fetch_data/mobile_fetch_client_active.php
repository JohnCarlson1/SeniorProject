<?php
    require('../config/db.php');


    
    $output = "";
    $for = "";
    $finalOutput = "";
    $space = " ";

    if(isset($_POST['client_search_test'])) {
        $search = mysqli_real_escape_string($conn, $_POST['client_search_test']);
        $client_search_query = "
            SELECT first_name, last_name, client_id, active_status
            FROM tblclient
            WHERE active_status = 'Active' AND first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'
            ORDER BY last_name
        ";
    } else {
        $client_search_query = "
            SELECT first_name, last_name, client_id, active_status
            FROM tblclient
            WHERE active_status='Active'
            ORDER BY last_name
        ";
    }

    $client_search_result = mysqli_query($conn, $client_search_query);
    
    if(mysqli_num_rows($client_search_result) > 0){
        while($row = mysqli_fetch_array($client_search_result)){
        $output .=
        '
        <div class="col-xs-1">
        <div class="card bg-light border-dark mb-3 align-middle text-center" style="width: 50vw; position: relative; left: 81.25px;">
        <div class="card-body">
          <h6 class="card-title"><b>'.$row['first_name'].$space.$row['last_name'].'</b></h6>
          <p><b>Status:</b> </br>'.$row['active_status'].' </p>
          <a href="client.php?last_name='.$row['last_name'].'&client_id='.$row['client_id'].'" class="btn btn-outline-dark btn-sm d-block">Profile</a>
        </div>
        </div>
        </div>
        ';
        }
        echo $output;
        }
    else {
        echo 'Data Not Found';
    }

?>
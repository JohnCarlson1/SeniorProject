<?php
    require('../config/db.php');


    
    $output = "";
    $for = "";
    $finalOutput = "";
    $space = " ";
    
    if(isset($_POST['dog_search_test'])) {
        $search = mysqli_real_escape_string($conn, $_POST['dog_search_test']);
        $dog_search_query = "
            SELECT first_name, last_name, tblpet.name, tblpet.pet_id, tblpet.img_path
            FROM tblclient
            INNER JOIN tblpet
            ON tblclient.client_id = tblpet.client_id
            WHERE fix_status = 'No' AND name LIKE '%".$search."%'
            ORDER BY tblpet.name
        ";
    } else {
        $dog_search_query = "
            SELECT first_name, last_name, tblpet.name, tblpet.pet_id, tblpet.img_path 
            FROM tblclient 
            INNER JOIN tblpet 
            ON tblclient.client_id = tblpet.client_id
            WHERE fix_status = 'No'
            ORDER BY tblpet.name
        ";
    }

    $dog_search_result = mysqli_query($conn, $dog_search_query);
    
    if(mysqli_num_rows($dog_search_result) > 0){
        while($row = mysqli_fetch_array($dog_search_result)){
        $output .=
        '
        <div class="col-xs-1">
        <div class="card bg-light border-dark mb-3 align-middle text-center" style="width: 50vw; position: relative; left: 81.25px;">
        <img src="'.$row['img_path'].'"onerror="this.style.display= \'none\'" class="card-img-top img-fluid" style="height: 50vw; object-fit: scale-down;">
        <div class="card-body">
          <h6 class="card-title"><b>'.$row['name'].'</b></h6>
          <p><b>Owner:</b> '.$row['first_name'].$space.$row['last_name'].' </p>
          <a href="dog.php?name='.$row['name'].'&pet_id='.$row['pet_id'].'" class="btn btn-outline-dark btn-sm d-block">Profile</a>
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
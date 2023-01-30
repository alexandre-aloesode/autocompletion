<?php

    if(isset($_GET['search'])) {

        require '../Classes/Research.php';

        $request = new Research();

        $request->json_search($_GET['search']);
    }


?>
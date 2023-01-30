<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script defer src="../Scripts/script.js"></script>
    <title>Display search suggestions</title>
</head>
<body>

    <header>

        <ul>
            <a href="index.php"><li>Accueil</li></a>
        </ul>
        <div id="auto_completion">

            <form action="search_results.php" method="GET" id="search_form">

                <input type="text" name="full_name" id="search_input">
                
                <buton type="submit"><i class="fa-solid fa-magnifying-glass" id="search_icon"></i></buton>

            </form>

            <div id="suggestions">
                
            </div>
        </div>

    </header>

    <div id="display_results">

        <?php 

            require '../Classes/Research.php';

            $display_results = new Research();

            $display_results->classic_search($_GET['full_name']);
        ?>

    </div>

   
</body>
</html>
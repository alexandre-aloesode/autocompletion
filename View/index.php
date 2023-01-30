<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style-index.css">
    <title>Autocompletion</title>
</head>
<body>

    <div id="auto_completion">

        <img id="search_img" src="https://upload.wikimedia.org/wikipedia/fr/thumb/f/f2/Premier_League_Logo.svg/2560px-Premier_League_Logo.svg.png">

        <form action="search_results.php" method="GET" id="search_form">

            <input type="text" name="full_name" id="search_input">
            
            <button type="submit" id="submit_button"><i class="fa-solid fa-magnifying-glass" id="search_icon"></i></button>

        </form>

        <div id="suggestions">

        </div>
        
    </div>
    
    
</body>
</html>

<script defer src="../Scripts/script.js"></script>
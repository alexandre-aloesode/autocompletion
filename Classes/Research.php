<?php

    class Research {

        private $SQL;

        public function __construct() {

            try {

                $this->SQL = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root','');
        
                //$SQL = new PDO('mysql:host=localhost;dbname=alexandre-aloesode_memory;charset=utf8', 'Namrod','azertyAZERTY123!');
        
                $this->SQL->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
                }
        
            catch (PDOException $e) {
        
                echo 'Echec de la connexion : ' . $e->getMessage();
                
                exit;
            }
         
        }

        public function json_search($user_input) {

            $request_exact_player= "SELECT full_name FROM Joueurs_PremierLeague WHERE full_name LIKE '$user_input%' OR position LIKE '$user_input%' LIMIT 10";
        
            $query_exact_player = $this->SQL->prepare($request_exact_player);

            $query_exact_player->execute();

            $result_exact_player = $query_exact_player->fetchAll();


            if(count($result_exact_player) < 10) {

                $limit = 10 - count($result_exact_player);
            
                $request_contain_player = "SELECT full_name FROM Joueurs_PremierLeague WHERE full_name LIKE '%$user_input%' LIMIT $limit";
                
                $query_contain_player = $this->SQL->prepare($request_contain_player);

                $query_contain_player->execute();

                $result_contain_player = $query_contain_player->fetchAll();

                
                $all_result = array_merge($result_exact_player, $result_contain_player);

                echo json_encode($all_result);
            }

            else {

                echo json_encode($result_exact_player);
            }

        }



        public function classic_search($user_input) {

            $request_exact_player= "SELECT full_name FROM Joueurs_PremierLeague WHERE full_name LIKE '$user_input%' LIMIT 10";
        
            $query_exact_player = $this->SQL->prepare($request_exact_player);

            $query_exact_player->execute();

            $result_exact_player = $query_exact_player->fetchAll();


            if(count($result_exact_player) < 10) {

            $limit = 10 - sizeof($result_exact_player);
        
                $request_contain_player = "SELECT full_name FROM Joueurs_PremierLeague WHERE full_name LIKE '%$user_input%' LIMIT $limit";
                
                $query_contain_player = $this->SQL->prepare($request_contain_player);

                $query_contain_player->execute();

                $result_contain_player = $query_contain_player->fetchAll();

                
                
                $all_result = array_merge($result_exact_player, $result_contain_player);

                for($x = 0; isset($all_result[$x]); $x++) {

                    echo '<a href="search.php?full_name=' . $all_result[$x][0] .'">' . $all_result[$x][0] . '</a><br>';
                }
            }
            
            else {

                for($x = 0; isset($result_exact_player[$x]); $x++) {

                    echo '<a href="search.php?full_name=' . $result_exact_player[$x][0] .'">' . $result_exact_player[$x][0] . '</a><br>';
                }

            }

        }


        public function display_search_result($request) {
            

            $request_player= "SELECT `full_name` AS 'Nom complet', `nationality` as Nationalité, `birthday` AS Naissance, `age` AS Age, `league`, `position` AS Poste, 
            `Current Club` AS Club, `appearances_overall` AS Apparitions, `minutes_played_overall` AS 'Temps de jeu total(min)', `goals_overall` AS Buts, 
            `assists_overall` AS 'Passes décisives', `penalty_goals` AS 'Penalties marqués', `penalty_misses` AS 'Penalties manqués', `clean_sheets_overall` AS 'Clean sheets', 
            `yellow_cards_overall` AS 'Cartons jaunes', `red_cards_overall` AS 'Cartons rouges'
            FROM `Joueurs_PremierLeague` WHERE full_name= :full_name";
            
            $query_player = $this->SQL->prepare($request_player);

            $query_player->execute(array(':full_name' => $request));

            $result_player = $query_player->fetchAll(PDO::FETCH_ASSOC);

            echo '
                <thead>
                    <tr>';
                        foreach($result_player[0] as $key => $value) {
                            echo '<th>' . $key . '</th>';
                        }
            echo '  </tr>

                </thead>

                <tbody>
                    <tr>';
                        foreach($result_player[0] as $key => $value) {
                            echo '<td>' . $value . '</td>';
                        }
            echo '  </tr>
                </tbody>';
        }

    }

?>
    <?php 

    class HomeController {
        
        public function index() {
            $users = UserModel::getAllUsers(); 

            foreach($users as $user){
                echo $user['nome'];
                echo "<br>";
                echo "<br>";
            }


            include "../app/views/home.php";

            

        }
        
        public function about() {
            echo "Esta é a página Sobre nós";
        }

    }
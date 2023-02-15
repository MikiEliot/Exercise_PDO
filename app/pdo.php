<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>PDO-MySQL</title>
    </head>

    <body style="text-align: center" >  
        <div>
        <form action="" method="post" >
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mot de passe:</label>
            <input style="margin-left:27px" type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Se connecter">
        </form> 
    </div>   
    <?php
            // include_once('Form.php');

            // $loginCredentials = new Form(null,'post');
            // $loginCredentials->setName('text','username','username');
            // $loginCredentials->setPassword('password','password','password');
            // $loginCredentials->setSubmit("Se connecter");
            // echo $loginCredentials->name;
            // echo $loginCredentials->password;
            // echo $loginCredentials->submitButton;
           
            include_once('insertForm.php');
            


            $username = isset($_POST["username"]) ? $_POST["username"] : '';
            $password = isset($_POST["password"]) ? $_POST["password"] : '';
            $servername = 'localhost';
            $dbusername = 'adminMM';
            $dbpassword = 'adminMM';
            if ($dbusername === $username  && $dbpassword === $password){
            try {
                $conn = new PDO("mysql:host=$servername; dbname=abc", $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "<p style='color:green; margin-bottom:40px' >Connexion réussie</p>";
                    echo "<h1>MENU</h1>";
                    // echo '<style type="text/css"> form { display: none; } </style>'; 
                    $nouveauProduit = "INSERT INTO produit(refProduit, description, prixUnitaire) VALUES ('22','HamburgerSpecial3','35')";
                
                    $sth = $conn->prepare("SELECT * FROM produit WHERE prixUnitaire >= :prix"); 
                    $sth->execute(['prix'=>8]);
                    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultat as $produit) {
                        echo "<p>";
                        foreach ($produit as $value) {
                            echo "$value ";
                        }
                        echo "</p>";
                    }
                } 
            
    
             catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        }
        else {
            echo "<p style='color:red' >Nom d'utilisateur ou mot de passe incorrect</p>";
        }   
            $_POST = array();
            $conn = null;
    ?>
   
        
    </body>

    </html>
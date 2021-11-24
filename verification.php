 <?php require "config/bdds.php"; 

$email = $_POST["login"];
$pass = $_POST["mdp"];
// echo $email;
// echo $pass;
$recherchemail = $mysqlConnection->prepare("SELECT * FROM 'utilisateur' WHERE 'email'=$email");
$recherchemail ->execute(); 

if ($recherchemail){
    echo "concordance trouvé";
}else{
    echo "pas de concordance";
}
// $checkmail = $recherchemail->fetch();

// $recherchemail = $mysqlConnection->prepare("SELECT * FROM Utilisateur WHERE email='$email'");
// $sql2->execute();

// $result = $sql2->fetch( PDO::FETCH_ASSOC );

// $passcheck = password_verify($pass, $result['pass']);

// if ($checkemail==false) {
//     echo "Le mail n'existe pas";
//     } elseif ($passcheck==false) {
//        echo "Ce n'est pas le bon mdp";
//     } else {
//         echo "Bien. Vous êtes connecté";
//         session_start();
//         $_SESSION['email'] = $email;
// }
?>
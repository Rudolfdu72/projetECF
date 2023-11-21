<?php 
require_once "../../path.php";
require_once ROOT_PATH. "/php/functions.php";
startSession();
if(isset($_POST['Connexion'])){
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        
        $email_saisi = htmlspecialchars($_POST['email']);
        $password_saisi = htmlspecialchars($_POST['password']);
        //On verifie d'abord si l'employé existe
        $pdo = getPdo();
        $user = userExist($email_saisi,$pdo);
        
        if ($user != null) {
            //Verification du mot passe 
            if(password_verify($password_saisi, $user["mot_de_passe"])){
                $_SESSION["user"]["id_utilisateur"] = $user["ID_utilisateur"];
                $_SESSION["user"]["nom_utilisateur"] = $user['nom_utilisateur'];
                $_SESSION["user"]["prenom_utilisateur"] = $user['prenom_utilisateur'];
                $_SESSION["user"]["role"] = $user['role'];
                $_SESSION["user"]["email_utilisateur"] = $user['adresse_email'];
                if (isAdmin($user)) {
                    header('location: '.BASE_URL.'/pages/account/admin.php');
                    exit; // Arrête le script après la redirection
                } else {
                    header('Location: '.BASE_URL.'/pages/account/admin.php');
                }
                
            }else{
                 $_SESSION['error'] = 'Veuillez saisir un mot de passe et un email correct'; 
            }
        }else{
            $_SESSION['error'] = "Cet utilisateur n'existe pas"; 
        }
    }
}
?>
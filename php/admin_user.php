<?php 
require_once "../../php/functions.php";
startSession();
if(isset($_POST['Connexion'])){
    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        
        $pseudo_saisi = htmlspecialchars($_POST['username']);
        $password_saisi = htmlspecialchars($_POST['password']);
        //On verifie d'abord si l'employé existe
        $pdo = getPdo();
        $user = userExist($pseudo_saisi,$pdo);
        
        if ($user != null) {
            //Verification du mot passe 
            if(password_verify($password_saisi, $user["mot_de_passe"])){
                $_SESSION["user"]["id_utilisateur"] = $user["ID_utilisateur"];
                $_SESSION["user"]["nom_utilsateur"] = $user['nom_utilisateur'];
                $_SESSION["user"]["prenom_utilisateur"] = $user['prenom_utilisateur'];
                $_SESSION["user"]["role"] = $user['role'];
                $_SESSION["user"]["email_utilisateur"] = $user['adresse_email'];
                if (isAdmin($user)) {
                    header('location: /ecf/pages/account/admin.php');
                    exit; // Arrête le script après la redirection
                } else {
                    header('Location: /ecf/pages/account/users/profile.php');
                }
                
            }else{
                 echo 'Veuillez saisir un mot de passe et un pseudo correct';
            }
        }else{
            echo "Cet utilisateur n'existe pas";
        }
    }
}
?>
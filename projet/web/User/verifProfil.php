<?php
session_start();
$login =$_SESSION['pseudo'];
//page qui vérifie les données entrées dans le formulaire de modification des données de l'utilisateur.
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;


/**
 * page de vérifiaction du formulaire de création d'utilisateur
 */


$messageChamps="";
$messageError = false;




/**
 * on verifie que le $_POST n'est pas vide.
 */
if(!empty($_POST)){

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $verifnewpass = $_POST['verifnewpass'];
    $userManager = new UserManager();
    $verifSession = $userManager->login($login);
    $_SESSION['id'] = $verifSession["ID_user"];
    $pass = password_verify($oldpass, $verifSession["Password_user"]);
    
    
    
    /**
     * on recupere les informations des champs du formulaire dans une boucle et on verifie qu'ils ne soient pas vide
     */
    foreach ($_POST as $name => $value) {
        if(empty($_POST[$name])){

            $messageChamps .= "le champ ".$name." est vide. <br>";
            

            $messageError= true;           

        }
    }

    /**
     * si le message d'erreur est true alors on redirige vers le formulaire de création.
     */
    if($messageError){
        header('location: profilUser.php?error2='.$messageChamps.'&oldpass='.$oldpass.'&newpass='.$newpass.'&verifnewpass='.$verifnewpass);
    }else{

    

    /**
      * on fait appel au UserManager pour faire les vérification du mail et du pseudo
     */
    
    
    
    if(!$pass){
        $messageOldPass .= "Le mot de passe ".$oldpass." n'existe pas'";
        header('location: profilUser.php?error2='.$messageOldPass.'&oldpass='.$oldpass);
    }else{
        /**
         * on vérifie que les mots de passe correspondent.
         */
        if($newpass===$verifnewpass){

            $verifPass = true;
        }else{

            $messagePass .= "les mots de passe ne correspondent pas. Vérifiez vos champs";
            header('location: form.php?error='.$messagePass);
        }
    }

    }
    if($verifPass){
        $userManager = new UserManager();
        $user = $userManager->read($verifSession["ID_user"]);

        $user->setPassword(password_hash(htmlentities($newpass), PASSWORD_DEFAULT));
        


//mise à jour de l'objet contact

$saveIsOk = $userManager->save($user);

if($saveIsOk){
    $message = 'le mot de passe a  été modifié';
    header('location: profilUser.php?valide='.$message);
}
else{
    $message = 'le mot de passe n\'a pas été modifié';
    header('location: profilUser.php?error3='.$message);

}
    }
}
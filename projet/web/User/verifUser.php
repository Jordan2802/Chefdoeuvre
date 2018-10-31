<?php
//page qui vérifie les données entrées dans le formulaire d'inscription d'utilisateur.
//on appelle les classes qui vont nous servir

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
$messagePass = "";
$messageMail = "";


/**
 * on verifie que le $_POST n'est pas vide.
 */
if(!empty($_POST)){

    $pseudo = htmlentities($_POST["pseudo"]);
    $mail = $_POST['mail'];
    $pass = $_POST['motDePasse'];
    $passbis = $_POST['verifMotDePasse'];
    $messageError = false;
    $verifMail = false;
    $verifPass = false;
    $verifPseudo = false;
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
        header('location: form.php?error='.$messageChamps.'&pseudo='.$pseudo.'&mdp='.$pass.'&verifpass='.$passbis.'&mail='.$mail);
    }else{

    

    /**
      * on fait appel au UserManager pour faire les vérification du mail et du pseudo
     */
    $userManager = new UserManager();

    $emailOk = $userManager->verifMail($mail);
    $pseudoOk = $userManager->verifPseudo($pseudo);


    /**
     * on verifie si le pseudo existe déja dans la base de donnée
     */
    if($pseudoOk == true){
        $verifPseudo = true;
    }else{
        $messagePseudo .= "Le pseudo ".$pseudo." est déja utilisé";
        header('location: form.php?error='.$messagePseudo.'&mail='.$mail.'&mdp='.$pass.'&verifpass='.$passbis);
    }
    
    /**
     * on vérifie si l'email est correcte et qu'il n'existe pas dans la bdd
     */
    if(preg_match('#^[\w.-]+@[\w.-]+.[a-z]{2,6}$#i', $mail)){

        if($emailOk == true){
            $verifMail = true;
        }else{
            $messageMail .= "L'email est déja pris";
            header('location: form.php?error='.$messageMail.'&pseudo='.$pseudo.'&mdp='.$pass.'&verifpass='.$passbis);
        }
        

        /**
         * on vérifie que les mots de passe correspondent.
         */
        if($pass===$passbis){

            $verifPass = true;
        }else{

            $messagePass .= "les mots de passe ne correspondent pas. Vérifiez vos champs";
            header('location: form.php?error='.$messagePass);
        }

       

    }else{
        $messageMail .= "L'email n'est pas correct";
            header('location: form.php?error='.$messageMail);

    }

    }


    /**
     * si le mail et le mot de passe sont correcte on traite les données
     */
    if($verifPseudo && $verifMail && $verifPass){
        //création d'un nouveau contact à partir des données du formulaire

        $user = new User();

        $pass = password_hash(htmlentities($_POST['motDePasse']), PASSWORD_DEFAULT);
        $mail = htmlentities($_POST['mail']);
        $pseudo = htmlentities($_POST['pseudo']);



        $user -> setPseudo($pseudo)
        -> setPassword($pass)
        -> setMail($mail);

        //insertion en bdd via le manager

        $userManager = new UserManager();

        $saveIsOk = $userManager-> save($user);

        if($saveIsOk){
            header('location: createUser.php');

        }
         else{
            $message = 'l\'utilisateur n\'a pas été ajouté';
            echo($message);
            }
        }  

}
   
?>
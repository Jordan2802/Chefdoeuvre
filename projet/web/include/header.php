<?php 

include('../Language/readAllLanguage.php');

 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border border-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <p class="navbar-brand">Simplon Help'Code <br> <span>Bienvenue <?= $login ?></span> </p> 
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active ">
        <a class="nav-link text-body" href="../User/accueil.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link text-body" href="../Code/formCode.php">Ajouter un code</a>
      </li>
      <li class="nav-item dropdown active ">
        <a class="nav-link dropdown-toggle text-body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Langage
        </a>
        <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdownMenuLink">
        
          <?php foreach($languages as $language => $value):
            $idlanguage = $value['ID_language'];
            $namelanguage = $value['Name_language']; ?>  
            <form methode='post' action="../Language/codeLanguage.php" class="dropdown-item" >
             <label class="lablang"  for="<?= $idlanguage;?>" type="text"> <?= $namelanguage; ?> </label><br>
             <input type="hidden" name="languageId" value="<?= $idlanguage;?>">
             <button type="submit"  id="<?= $idlanguage;?>" class="hidden-button" ></button>
            </form>
          <?php endforeach; ?> 
          
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link disabled active text-body" href="../User/profilUser.php">Profil</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link disabled active text-body" href="../User/logout.php">Se deconnecter.</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" methode='post' action="../Language/codeLanguage.php">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0 " type="submit">Rechercher</button>
    </form>
  </div>
</nav>


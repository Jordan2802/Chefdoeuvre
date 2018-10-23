
<nav class="navbar navbar-expand-lg navbar-light bg-light border border-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <p class="navbar-brand">Simplon Help'Code <br> <span>Bienvenue <?= $login ?></span> </p> 
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active ">
        <a class="nav-link text-body" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link text-body" href="Code/formCode.php">Ajouter un code</a>
      </li>
      <li class="nav-item dropdown active ">
        <a class="nav-link dropdown-toggle text-body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Langage
        </a>
        <div class="dropdown-menu bg-light " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">PHP</a>
          <a class="dropdown-item" href="#">HTML</a>
          <a class="dropdown-item" href="#">CSS</a>
          <a class="dropdown-item" href="#">JAVASCRIPT</a>
          <a class="dropdown-item" href="#">RUBY</a>
          <a class="dropdown-item" href="#">JAVA</a>
          <a class="dropdown-item" href="#">React</a>
          <a class="dropdown-item" href="#">Symfony</a>
          <a class="dropdown-item" href="#">JQUERY</a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link disabled active text-body" href="#">Profil</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link disabled active text-body" href="logout.php">Se deconnecter.</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-info my-2 my-sm-0 " type="submit">Rechercher</button>
    </form>
  </div>
</nav>
<!--
<div>logo</div>

<div><h1>Bonjour User!</h1></div>

<div id="menu">
    <div>
        <p><a href="User/form.php">Ajouter un utilisateur</a></p>
    </div>
    <div>
        <p><a href="User/readAllUser.php">Lister tous les utilisateurs</a></p>
    </div>
    <div>
        <p><a href="Code/formCode.php">Ajouter un code</a></p>
    </div>
    <div>
        <p><a href="Code/readAllCode.php">Lister tous les codes</a></p>
    </div>
    <div>
        <p><a href="logout.php">se deconnecter.</a></p>
    </div>


</div>
-->


<?php

//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/LanguageManager.php';
require_once '../../src/App/Entity/Language.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\Language;
use App\Manager\LanguageManager;

//recuperer les utilisateurs

$languageManager = new LanguageManager();
$languages = $languageManager->readAll();

        
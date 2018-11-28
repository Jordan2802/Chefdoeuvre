<?php
// function qui permet de définir le langage utilisé pour le rendu en Prism
function setLanguageName($id){
    $cssL="css";
    $htmlL="markup";
    $javaL="java";
    $jsL="javascript";
    $jqueryL="javascript";
    $nodeL="javascript";
    $phpL="php";
    $reactL="jsx";
    $rubyL="ruby";
    $symfL="php";

switch ($id) {
    case 1:
        $name = $cssL;
        break;
    case 2:
        $name = $htmlL;
        break;
    case 3:
        $name = $javaL;
        break;
    case 4:
        $name = $jsL;
        break;
    case 5:
        $name = $jqueryL;
        break;
    case 6:
        $name = $nodeL;
        break;
    case 7:
        $name = $phpL;
        break;
    case 8:
        $name = $reactL;
        break;
    case 9:
        $name = $rubyL;
        break;
    case 10:
        $name = $symfL;
        break;
    default:
        $name = $phpL;
        break;
}

return $name;
}


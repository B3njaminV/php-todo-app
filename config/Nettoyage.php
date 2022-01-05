<?php

class Nettoyage {

    static function securite($texte) {

        if ($texte != filter_var($texte, FILTER_SANITIZE_STRING))
        {
            return 1; // tentative d'injection
        }
    }
}
?>
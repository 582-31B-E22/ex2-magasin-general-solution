<?php
class Controleur 
{
    // Modèle correspondant et Gabarit générique seront injectés dans le contrôleur
    protected $modele;
    protected $gabarit;

    function __construct($modele, $module, $action)
    {
        // On injecte une instance du modèle correspondant à ce contrôleur
        if(class_exists($modele)) {
            $this->modele = new $modele();
        }
        // On injecte une instance du Gbarit adéquat
        $this->gabarit = new HtmlGabarit($module, $action);
        // On ajoute une variable contenant le nom de la page dans le gabarit
        $this->gabarit->affecter('page', $module);
    }

    /**
     * Génère la "vue" avant la fin du script.
     */
    function __destruct()
    {
       $this->gabarit->genererVue(); 
    }

    /**
     * Méthode par défaut lorsqu'aucune route ne pointe vers une méthode valide
     * Cette méthode peut être réécrite dans les classes dérivées.
     */
    public function index($params) 
    {

    }
}
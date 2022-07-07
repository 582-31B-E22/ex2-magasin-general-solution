<?php
class HtmlGabarit 
{
    // Les variables utiles pour générer la vue dynamiquement
    protected $variables = array();
    protected $module;
    protected $action;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;  
    }

    /**
     * Assigne une variable dans la "vue"
     * 
     * @param string $nom : nom de la variable à assigner
     * @param mixed $valeur : valeur de la variable
     * 
     */
    public function affecter($nom, $valeur)
    {
        $this->variables[$nom] = $valeur;
    }

    /**
     * Défini une action comme étant celle remplaçant l'action par défaut ('index')
     */
    public function affecterActionParDefaut($nomAction) {
        $this->action = $nomAction;
    }
 
    /**
     * Assemble la page correspondant à la "vue" demandée
     */
    public function genererVue() 
    {
        // Déballer les variables dans la page
        extract($this->variables);  
        // Inclure l'entête
        include("vues/entete.inc.php");
        // Inclure la partie de la page correspondant aux module et action requis
        include("vues/$this->module.$this->action.php");
        // Inclure le pied de page
        include("vues/pied2page.inc.php");
    }
}
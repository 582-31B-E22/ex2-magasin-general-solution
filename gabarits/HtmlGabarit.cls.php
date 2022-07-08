<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\String\StringExtension;

class HtmlGabarit 
{
    // Les variables utiles pour générer la vue dynamiquement
    protected $variables = array();
    protected $module;
    protected $action;
    private $twig;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;
        // Configurer Twig
        $chargeur = new FilesystemLoader('vues/');
        $this->twig = new Environment($chargeur, ['cache'=>TWIG_CACHE]);
        $this->twig->addExtension(new StringExtension());
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
        $vue = $this->twig->load("$this->module.$this->action.twig");
        $vue->display($this->variables);
        // Ou d'un seul coup : 
        //$this->twig->display("$this->module.$this->action.twig", $this->variables);
    }
}
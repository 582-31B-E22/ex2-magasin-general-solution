<?php
// Inclure les fichiers de config
include('config/bd.cfg.php');

$route = "";
if(isset($_GET["route"])) {
  $route = $_GET["route"];
}

$routeur = new Routeur($route);
$routeur->invoquerRoute();

class Routeur
{
  private $route = '';

  function __construct($r)
  {
    // La propriété route correspond au paramètre 'route' de l'URL
    $this->route = $r;
    //  On définie la fonction de rappel pour l'autochargement des fichiers de classes.
    spl_autoload_register(function($nomClasse) {
      $nomFichier = "$nomClasse.cls.php";
      if(file_exists("modeles/$nomFichier")) {
        include("modeles/$nomFichier");
      }
      else if(file_exists("controleurs/$nomFichier")) {
        include("controleurs/$nomFichier");
      }
      else if(file_exists("gabarits/$nomFichier")) {
        include("gabarits/$nomFichier");
      }
      // Ajouter autres dossiers ici s'il y a lieu
    });
  }
  
  /**
   * Instancie le contrôleur correspondant à la route invoquée et appelle la 
   * méthode requise
   * 
   */
  public function invoquerRoute() {
    // Valeurs par défaut
    $module = "accueil"; 
    $action = "index";
    $params = "";

    // La 'route' vient du paramètre d'URL nommé 'route'
    $routeTableau = explode('/', $this->route);
    
    // On décortique les parties de cette 'route'
    if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
      // La première composante correspond au "module"
      $module = array_shift($routeTableau);

      if(count($routeTableau) > 0 && trim($routeTableau[0]) != '') {
        // La deuxième composante correspond à l'"action"
        $action = array_shift($routeTableau);
        
        // Les composantes restantes correspondent à d'autres paramètres (éventuels)
        $params = $routeTableau;
      }
    }

    // Nom de la classe contrôleur correspondant à ce module
    $nomControleur = ucfirst($module).'Controleur';
    // Nom de la classe modèle correspondant à ce module
    $nomModele = ucfirst($module).'Modele';

    // Si la classe contôleur existe ...
    if(class_exists($nomControleur)) {
      // ... et si la méthode correspondant à la composante 'action' de la route 
      // n'existe pas dans cette classe ...
      if(!method_exists($nomControleur, $action)) {
        // ... alors on revient vers l'action par défaut
        $action='index';
      }
      // ... on instantie le classe contrôleur correspondant au module ...
      $controleur = new $nomControleur($nomModele, $module, $action);
      // ... et on invoque la méthode correspondant à l'action.
      $controleur->$action($params);
    }
    // ... et sinon, on instancie le contrôleur de base.
    else {
      $controleur = new Controleur('', 'accueil', 'index');
    }
  }
}
<?php
class ProduitControleur extends Controleur 
{
    /**
     * Action par défaut si aucune action VALIDE n'est spécifiée dans l'URL
     * 
     * @param string[] $params : tableau des paramètres passés dans l'URL 
     */
    public function index($params)
    {
        // Cette action va utiliser la vue associée à l'action 'tout'
        $this->gabarit->affecterActionParDefaut('tout');
        // On appelle l'action tout()
        $this->tout($params);
    }

    /**
     * Chercher tous les produits
     * 
     * @param string[] $params : tableau des paramètres passés dans l'URL 
     */
    public function tout($params)
    {
        $this->gabarit->affecter('categories', $this->modele->categories());
        $this->gabarit->affecter('produits', $this->modele->tout());
    }
    
    /**
     * Chercher le détail d'un seul produit
     * 
     * @param string[] $params : tableau des paramètres passés dans l'URL 
     */
    public function un($params)
    {
        // On récupère l'identifiant du produit demandé dans le premier 
        // paramètre envoyé dans l'URL (module/action/param1/param2/.../paramN)
        $idProduit = $params[0];
        $this->gabarit->affecter('produit', $this->modele->un($idProduit));
    }
    
    /**
     * Chercher tous les produits dans une catégorie donnée
     * 
     * @param string[] $params : tableau des paramètres passés dans l'URL 
     */
    public function parCategorie($params)
    {
        // On récupère l'identifiant de la catégorie demandée dans le premier 
        // paramètre envoyé dans l'URL (module/action/param1/param2/.../paramN)
        $idCategorie = $params[0];
        $this->gabarit->affecter('categories', $this->modele->categories());
        $this->gabarit->affecter('produits', $this->modele->parCategorie($idCategorie));
        // On a besoin de l'identifiant de la catégorie demandée dans la 'vue',
        // donc, on l'injecte à l'aide de la méthode affecter()
        $this->gabarit->affecter('idCatActive', $idCategorie);
    }
}
?>

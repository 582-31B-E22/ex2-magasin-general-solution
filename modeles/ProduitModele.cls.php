<?php
class ProduitModele extends AccesBd
{
    /**
     * Obtenir tous les produits.
     * 
     * @return object[] : Tableau d'objets représentant les produits.
     */
    public function tout()
    {
        return $this->lireTout("SELECT pimg.fichier, p.* 
                FROM produit AS p
                JOIN produit_image AS pimg 
                ON p.id=pimg.produit_id");
    }
    
    /**
     * Obtenir le produit identifié.
     * 
     * @param string $idProduit : Identifiant du produit requis.
     * 
     * @return object : Objet représentant le produit.
     */
    public function un($idProduit)
    {
        return $this->lireUn("SELECT pimg.fichier, p.* 
                FROM produit AS p
                JOIN produit_image AS pimg 
                ON p.id=pimg.produit_id
                WHERE p.id=:pid"
                , ['pid' => $idProduit]);
    }
    
    /**
     * Obtenir les produits dans la catégorie identifiée.
     * 
     * @param string $idCategorie : Identifiant de la catégorie requise.
     * 
     * @return object[] : Tableau d'objets représentant les produits.
     */
    public function parCategorie($idCategorie)
    {
        return $this->lireTout("SELECT pimg.fichier, p.* 
                FROM produit AS p
                JOIN produit_image AS pimg 
                ON p.id=pimg.produit_id
                WHERE categorie_id=:catid"
                , ['catid' => $idCategorie]);
    }
    
    /**
     * Obtenir toutes les catégories.
     * 
     * @return object[] : Tableau d'objets représentant les catégories.
     */
    public function categories()
    {
        return $this->lireTout("SELECT id, nom FROM categorie");
    }
}
?>

<!-- Affichage dynamique du détail d'un produit -->
<div id="conteneur-principal" class="page-produit">
    <section class="detail">
        <img src="ressources/images/produits/<?=$produit->fichier;?>" alt="<?=$produit->nom;?>">
        <div class="info">
            <p class="nom"><?=$produit->nom;?></p>
            <p class="sku"><?=$produit->sku;?></p>
            <p class="desc"><?=$produit->desc_courte;?></p>
            <p class="couleur"><?=$produit->couleur;?></p>
            <p class="prix"><?=$produit->prix;?> $</p>
        </div>
    </section>
</div>
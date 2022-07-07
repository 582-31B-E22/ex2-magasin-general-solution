<div id="conteneur-principal" class="page-produit">
	<aside>
		<nav>
			<ul>
				<!-- Affichage dynamique des catégories -->
				<?php 
					$menuActif = "";
					$nomCategorie = "";
					foreach ($categories as $cat): 
						// On profite de cette itération pour déterminer si on 
						// doit ajouter la classe CSS 'actif' ou pas pour la
						// catégorie qu'on affiche, et on récupère aussi du même 
						// coup le nom de la actégorie active (peut être fait de 
						// bien d'autres façons évidement)

						// Si cette catégorie correspond à celle demandée dans l'URL...
						if($cat->id == $idCatActive) {
							// On lui ajoute la classe CSS 'actif'
							$menuActif = "actif";
							// Et on récupère le nom de la catégorie
							$nomCategorie = $cat->nom;
						}
						// Sinon ...
						else {
							// ... pas de classe CSS 'actif' <-- IMPORTANT
							$menuActif = "";
						}
				?>
					<!-- Remarquez l'URL associée à chaque catégorie -->
					<li><a class="<?= $menuActif; ?>" href="produit/parCategorie/<?= $cat->id ?>"><?= $cat->nom ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</aside>
	<section class="contenu">
		<h2>Produits disponibles par catégorie : &laquo; <?= $nomCategorie ?> &raquo;</h2>
		<ul>
			<!-- Affichage dynamique des produits -->
			<?php foreach ($produits as $prd): ?>
				<li>
					<!-- Remarquez l'URL associée à chaque produit -->
					<a href="produit/un/<?= $prd->id ?>">
						<img src="ressources/images/produits/<?= $prd->fichier ?>" alt="<?= $prd->nom ?>">
						<div class="info">
							<p class="nom"><?= $prd->nom ?></p>
							<p class="desc"><?= $prd->desc_courte ?></p>
							<p class="prix"><?= $prd->prix ?> $</p>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
</div>
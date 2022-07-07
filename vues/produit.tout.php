<div id="conteneur-principal" class="page-produit">
	<aside>
		<nav>
			<ul>
				<!-- Affichage dynamique des catégories -->
				<?php foreach ($categories as $cat): ?>
					<!-- Remarquez l'URL associée à chaque catégorie -->
					<li><a href="produit/parCategorie/<?= $cat->id ?>"><?= $cat->nom ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</aside>
	<section class="contenu">
		<h2>Produits disponibles</h2>
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
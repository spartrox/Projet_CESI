<div class="container espaceEnHaut">
    <div class="row">
        <div class="pt-2 pb-2"><h1>Catalogue</h1></div>
    </div>
    <div class="row pb-2">
        <div class="alert alert-light" role="alert">
            Filtre :
        </div>
    </div>
    <div class="row">
        <?php
            foreach ($ressources as $ressource) {
                if ($ressource->image == null) { $ressource->image = 'logo.png'; $opacite = 50; }
                else { $opacite = 100; }
                ?>
                <div class="col-lg-4 pb-4">
                    <div class="card bg-light">
                        <img class="card-img-top border-bottom imgressource" src="<?= BASE_SITE . DS . "/images/" . $ressource->image ?>" style="opacity:<?= $opacite ?>%">
                        <div class="container">    
                            <div class="row">
                            <?php
                                foreach ($categories[$ressource->id] as $categorie) {
                                    echo "<span class='badge badge-secondary col'>$categorie->title</span>";                              
                                }
                                if (empty($categories[$ressource->id]))
                                {
                                    echo '<span class="badge badge-secondary col">Sans catégorie</span>';
                                }
                            ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (in_array($ressource->id, $exploitees)) { ?>
                                <i class="float-right fas fa-check fa-lg m-1" style="color:green" title="Exploitée"></i>
                            <?php } ?>
                            <?php if (in_array($ressource->id, $misdecotes)) { ?>
                                <i class="float-right fas fa-bookmark fa-lg m-1" style="color:red" title="Mis de côté"></i>
                            <?php }?>
                            <?php if (in_array($ressource->id, $favoris)) { ?>
                                <i class="float-right fas fa-star fa-lg m-1" style="color:goldenrod" title="Favori"></i>
                            <?php } ?>
                            <h5 class="card-title"><?= $ressource->title ?></h5>
                            <p class="card-text text-justify text-truncate"><em><?= $ressource->content ?></em></p>
                            <p class="card-text">
                                <small class="text-muted">Créé le <?= $ressource->register_date ?> par <?= $ressource->creator ?></small>
                            </p>
                        </div>
                        <div class="card-footer bg-light container">
                            <div class="row">
                                <a href=<?= "Ressource/?idRessource=$ressource->id&action=voir" ?> class="btn btn-outline-success btn-sm col" title="Voir"><i class="fas fa-eye"></i></a>
                                <a href=<?= "Ressource/?idRessource=$ressource->id&action=modifier" ?> class="btn btn-outline-primary btn-sm col" title="Modifier"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-outline-warning btn-sm col" title="Suspendre"><i class="fas fa-eye-slash"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm col" title="Supprimer"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            if (is_null($ressources))
            { ?>
                <div><p>Aucune ressource disponible</p></div>
            <?php }
        ?>
    </div>
</div>
<div class="container espaceEnHaut">
    <div class="row">
        <div class="pt-2 pb-2"><h1>Catalogue</h1></div>
    </div>
    <div class="row">
        <?php
            foreach ($ressources as $ressource) {
                if ($ressource->image == null) { $ressource->image = 'logo.png'; $opacite = 50; }
                else { $opacite = 100; }
                ?>
                <div class="col-lg-4 pb-4">
                    <div class="card bg-light">
                        <img class="card-img-top border-bottom" src="<?= BASE_SITE . DS . "/images/" . $ressource->image ?>" style="opacity:<?= $opacite ?>%">
                        <div class="card-body">
                            <?php if (in_array($ressource->id, $misdecotes)) { ?>
                                <i class="float-right fas fa-bookmark fa-lg m-1" style="color:red" title="Mis de côté"></i>
                            <?php }?>
                            <?php if (in_array($ressource->id, $favoris)) { ?>
                                <i class="float-right fas fa-star fa-lg m-1" style="color:goldenrod" title="Favori"></i>
                            <?php } ?>
                            <h5 class="card-title"><?= $ressource->title ?></h5>
                            <p class="card-text text-justify text-truncate"><em><?= $ressource->content ?></em></p>
                            <p class="card-text">
                                <small class="text-muted">Créé le <?= $ressource->register_date ?></small>
                                <a href="#" class="btn btn-outline-danger btn-sm float-right"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-outline-warning btn-sm float-right"><i class="far fa-eye-slash"></i></a>
                                <a href="#" class="btn btn-outline-primary btn-sm float-right"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-outline-success btn-sm float-right"><i class="far fa-eye"></i></a>
                                
                                
                                
                            <p>
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
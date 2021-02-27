<div class="container espaceEnHaut">
    <div class="row">
        <div class="pt-2 pb-2"><h1>Catalogue</h1></div>
    </div>
    <div class="row pb-2">
        <div class="alert alert-light" role="alert">
        <?php if (isset($_SESSION['id'])):?> 
        <select name="state" <?php if ($action) {echo 'disabled';} ?> class="col-8 <?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> form-control-lg" id="EtatSelect">
                    <?php 
                        foreach ($states as $state) { ?>
                            <option <?= ($ressource->state == $state)? 'selected' : '' ?>><?= $state ?></option>
                        <?php }
                    ?>
        </select>
        <?php endif; ?> 
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
                                <?php if ($exploitees != null && $misdecotes != null && $favoris != null) { ?>    
                                    <?php if (in_array($ressource->id, $exploitees)) { ?>
                                        <span class="cliquable"><i id="Exploitee<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'exploited', 'Exploitee<?= $ressource->id ?>', 'retirer')" title="Retirer des ressources exploitées" class="float-right fas fa-check-circle fa-lg m-1" style="color:green"></i></span>
                                    <?php } else { ?>
                                        <span class="cliquable"><i id="Exploitee<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'exploited', 'Exploitee<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux ressources exploitées" class="float-right far fa-check-circle fa-lg m-1 state" style="color:green"></i></span>
                                    <?php } ?>
                                    <?php if (in_array($ressource->id, $misdecotes)) { ?>
                                        <span class="cliquable"><i id="Misdecote<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'aside', 'Misdecote<?= $ressource->id ?>', 'retirer')" title="Retirer des mis de côté" class="float-right fas fa-bookmark fa-lg m-1" style="color:red"></i></span>
                                    <?php } else { ?>
                                        <span class="cliquable"><i id="Misdecote<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'aside', 'Misdecote<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux mis de côté" class="float-right far fa-bookmark fa-lg m-1 state" style="color:red"></i></span>
                                    <?php } ?>
                                    <?php if (in_array($ressource->id, $favoris)) { ?>
                                        <span class="cliquable"><i id="favoris<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'favory', 'favoris<?= $ressource->id ?>', 'retirer')" title="Retirer des favoris" class="float-right fas fa-star fa-lg m-1" style="color:goldenrod"></i></span>
                                    <?php } else { ?>
                                        <span class="cliquable"><i id="favoris<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploitee(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'favory', 'favoris<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux favoris" class="float-right far fa-star fa-lg m-1 state" style="color:goldenrod"></i></span>
                                    <?php } ?>
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
                                <?php if (isset($_SESSION['id'])):?>    
                                        <a href=<?= "Ressource/?idRessource=$ressource->id&action=modifier" ?> class="btn btn-outline-primary btn-sm col" title="Modifier"><i class="fas fa-pencil-alt"></i></a>
                                    
                                    <?php if (in_array($_SESSION['type_account'], ['admin', 'super_admin'])): 
                                    if ($suspendu){ ?>
                                        <a href="#" class="btn btn-outline-warning btn-sm col" title="Suspendre"><i class="fas fa-eye-slash"></i></a>
                                    <?php } else { ?>                                
                                        <a href="#" class="btn btn-outline-danger btn-sm col" title="Supprimer"><i class="fas fa-trash"></i></a>
                                    <?php } ?>
                                    <?php endif; ?> 
                                <?php endif; ?> 
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
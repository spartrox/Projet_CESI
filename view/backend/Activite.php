<div class="container espaceEnHaut">
    <br>
    <form method="post">
        <!-- Ligne des états -->
        <div class="form-group row">
            <div class="col-12 mt-1 mb-1">
                <?php if($nouveau){ ?><span class='badge badge-secondary'>New</span><?php };
                    if ($exploited || $aside || $favory) {
                    if ($exploited) { ?>
                        <span class="cliquable"><i id="Exploitee<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'exploited', 'Exploitee<?= $ressource->id ?>', 'retirer')" title="Retirer des ressources exploitées" class="float-right fas fa-check-circle fa-lg m-1" style="color:green"></i></span>
                    <?php } else { ?>
                        <span class="cliquable"><i id="Exploitee<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'exploited', 'Exploitee<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux ressources exploitées" class="float-right far fa-check-circle fa-lg m-1 state" style="color:green"></i></span>
                    <?php } ?>
                    <?php if ($aside) { ?>
                        <span class="cliquable"><i id="Misdecote<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'aside', 'Misdecote<?= $ressource->id ?>', 'retirer')" title="Retirer des mis de côté" class="float-right fas fa-bookmark fa-lg m-1" style="color:red"></i></span>
                    <?php } else { ?>
                        <span class="cliquable"><i id="Misdecote<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'aside', 'Misdecote<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux mis de côté" class="float-right far fa-bookmark fa-lg m-1 state" style="color:red"></i></span>
                    <?php } ?>
                    <?php if ($favory) { ?>
                        <span class="cliquable"><i id="favoris<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'favory', 'favoris<?= $ressource->id ?>', 'retirer')" title="Retirer des favoris" class="float-right fas fa-star fa-lg m-1" style="color:goldenrod"></i></span>
                    <?php } else { ?>
                        <span class="cliquable"><i id="favoris<?= $ressource->id ?>" onclick="FavorisMisDeCoteExploiteeRessource(<?= $ressource->id ?>, <?= $_SESSION['id'] ?>, 'favory', 'favoris<?= $ressource->id ?>', 'ajouter')" title="Ajouter aux favoris" class="float-right far fa-star fa-lg m-1 state" style="color:goldenrod"></i></span>
                    <?php } 
                }?>
            </div>
            <!-- Titre de la ressource -->
            <div class="col-6 row">
                <i class="fas fa-calendar-day fa-3x col-2"></i>
                <input name="title" type="text" <?php if ($action) {echo 'readonly';} ?> class="<?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> form-control-lg col-10" id="title" value="<?= $ressource->title?>" placeholder="Titre de l'activité"></h2>
            </div>
            <div class="col-3 form-group row">
                <select name="state" <?php if ($action) {echo 'disabled';} ?> class="col-8 <?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> form-control-lg" id="EtatSelect">
                    <?php 
                        foreach ($states as $state) { ?>
                            <option <?= ($ressource->state == $state)? 'selected' : '' ?>><?= $state ?></option>
                        <?php }
                    ?>
                </select>
            </div>
            <div class="col-3">
                <p class="float-right"><small>Modifié le <?= $ressource->register_date ?> par <?= $ressource->creator ?></small></p>
            </div>
            <div id="idRessource" class="invisible"><?= $ressource->id?></div>
        </div>
        <?php if (!$action) { ?>
            <div class="form-group row">
                <!-- Image de la ressource -->
                <div class="col-12">
                <?php if ($ressource->image == null) { $ressource->image = 'logo.png'; $opacite = 50; } else { $opacite = 100; } ?>
                    <img src="<?= BASE_SITE . DS . "images/" . $ressource->image ?>" alt="" class="rounded float-left border" style="width:30%; opacity: <?= $opacite ?>%;" for="imageRessource">
                </div>
                <div class="col-6 mb-3">
                    <?php if (!$action) { ?>
                    <input class="invisible" name='imageold' type="text" value="<?= $ressource->image ?>">
                        <div class="custom-file">
                            <input name="image" type="file" class="form-control-file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                            <label class="custom-file-label" for="inputGroupFile01"><?php if ($ressource->image == 'logo.png') {echo 'Sélectionnez une image'; } else { echo "$ressource->image"; }?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="row border border-secondary shadow-lg" style="height:500px">
                <!-- Zone de l'activité -->
                <div class="col-8 border border-secondary">
                    <br>
                    <h2>Progression en cours <i class="fas fa-spinner fa-pulse"></i></h2>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                    </div>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                </div>
                <!-- Chat -->
                <div class="col-4 border border-secondary">
                    <h5 class="border-bottom text-center">Chat</h5>
                    <div class="d-flex flex-column-reverse" style="height: 450px">
                        <div class="input-group mb-1">
                            <textarea style="height:40px" id="MsgChat" type="text" class="form-control" placeholder="Chatter avec les autres invités" aria-describedby="btn-msg"></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="btn-msg" onclick="AjouterMsgChat('<?= $_SESSION['id'] ?>')"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                        <br>
                        <div class="overflow-auto" style="max-height: 350px">
                            <div id="listeChat">
                                <?php include_once('Tchat.php') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <br>
        <div class="form-group row">
                <!-- Description de la ressource -->
                <div class="col-12">
                    <label class="h4" for="content">Description</label>
                    <textarea name="content" <?php if ($action) {echo 'readonly';} ?> class="<?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> text-justify" id="content" rows="3" placeholder="Description de la ressource"><?= $ressource->content ?></textarea>
                </div>
        </div>
        <div>
            <h4>Participants</h4>
            <ul>
                <?php 
                    foreach ($participants as $participant) {
                        echo "<li><span class='text-capitalize'>$participant->pseudo</span></li>";
                    }
                ?>
            </ul>
        </div>
        <br>
        <div class="form-group row">
            <!-- Catégorie(s) de la ressource -->
            <div class="col-3">    
                <label class="h4" for="categories">Catégories : </label>
                <?php
                //Si action est vrai, on fait un affichage en forme de badges
                if ($action) {
                    foreach ($categoriesRessource as $categorie) {
                        echo '<br>';
                        echo "<span class='badge badge-secondary'>$categorie->title</span> ";                              
                    }
                    if (empty($categoriesRessource))
                    {
                        echo '<span class="badge badge-secondary">Sans</span>';
                    }
                }
                //Si action est faux, on fait un affichage en checkbox
                if (!$action) { ?>
                <div name="categories" class="form-group form-check overflow-auto h-25 border" id="categories">
                <?php 
                    foreach($categories as $categorie)
                    {
                        $checked = (in_array($categorie->id, $idCategoriesRessource)) ? 'checked' : '';
                        echo "<input name='categories[$categorie->title]' type='checkbox' class='form-check-input' id='$categorie->title' value='$categorie->id' $checked>";
                        echo "<label class='form-check-label' for='$categorie->title'>$categorie->title</label><br>";
                    }
                ?>
                </div>
                <br>
                <!-- Bouton d'envoie du formulaire -->
                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i></button>
                <?php } ?>
            </div>
        </div>
    </form>
    <div class="row pt-5 pb-5">
        <a class="btn btn-primary" href="<?= BASE_URL . DS . "backend/Catalogue" ?>">Retour au Catalogue</a>
    </div>
    <br>
    <!-- Zone des commentaires -->
    <?php 
    if(isset($_SESSION['id'])) {
        include_once("Commentaire.php");
     } ?>
</div>
<script>
    $(document).ready(function() 
    {
        setInterval(MAJTchat,1000);
    })
</script>
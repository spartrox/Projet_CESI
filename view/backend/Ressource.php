<div class="container espaceEnHaut">
    <form method="post">
        <!-- Ligne des états -->
        <div class="form-group row">
            <div class="col-12">
                <?php if($nouveau){ ?><span class='badge badge-secondary'>New</span><?php } ?>
                <?php if($favory){ ?><i class="float-right fas fa-check fa-lg m-1" style="color:green" title="Exploitée"></i><?php } ?>
            </div>
            <!-- Titre de la ressource -->
            <div class="col-6">
                <input name="title" type="text" <?php if ($action) {echo 'readonly';} ?> class="<?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> form-control-lg" id="title" value="<?= $ressource->title?>">
            </div>
            <div class="col-6">
                <p class="float-right"><small>Modifié le <?= $ressource->register_date ?> par <?= $ressource->creator ?></small></p>
            </div>
        </div>
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
        <div class="form-group row">
            <!-- Description de la ressource -->
            <div class="col-12">
                <label for="content"><u>Description :</u></label>
                <textarea name="content" <?php if ($action) {echo 'readonly';} ?> class="<?php if ($action) {echo 'form-control-plaintext';} else {echo 'form-control';} ?> text-justify" id="content" rows="3"><?= $ressource->content ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <!-- Catégorie(s) de la ressource -->
            <div class="col-3">    
                <label for="categories"><u>Catégories :</u> </label>
                <br>
                <?php
                //Si action est vrai, on fait un affichage en forme de badges
                if ($action) {
                    foreach ($categoriesRessource as $categorie) {
                        echo "<span class='badge badge-secondary'>$categorie->title</span> ";                              
                    }
                }
                //Si action est faux, on fait un affichage en checkbox
                if (!$action) { ?>
                <div name="categories" class="form-group form-check" id="categories">
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
    <!-- Zone des commentaires affichée lors de la visualisation de la ressource -->
    <?php if ($action) { ?>
        <div class="row">
            <h4>Commentaires</h4>
        </div>
        <br>
        <div class="row">
            <textarea class="form-control w-75" placeholder="Laissez un commentaire"></textarea>
        </div>
        <br>
        <div class="row">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
        <br>
        <div class="row listecommentaires overflow-auto">
            <table class="table table-responsive-lg w-75">
            <?php 
                foreach ($commentaires as $commentaire) {
                    $membre = $membres[$commentaire->id_commentary];
                    echo "<tr><td class='col-5'><em>" .$membre->first_name . ' ' . $membre->last_name . ' le ' . $commentaire->date_message ."</em></td><td>$commentaire->text</td></tr>";
                }
                if (empty($commentaires)) { echo '<tr><td>Soyez la première ou le premier à commenter !</td></tr>'; }
            ?>
            </table>
        </div>
    <?php } ?>
</div>
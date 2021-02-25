<!-- Zone des commentaires affichée lors de la visualisation de la ressource -->
<?php if ($action || empty($_SESSION)) { ?>
        <div class="row">
            <h4>Commentaires <i class="fas fa-comments"></i></h4>
        </div>
        <br>
        <div class="row">
            <textarea id="textCommentaire" class="form-control w-75" placeholder="Laissez un commentaire"></textarea>
        </div>
        <br>
        <div class="row">
            <button onclick="AjoutCommentaire('<?= (isset($_SESSION['first_name'])) ? $_SESSION['first_name']:'Gaby' ?>' , '<?= (isset($_SESSION['last_name'])) ? $_SESSION['last_name']:'Walko' ?>', <?= $_SESSION['id'] ?>, <?= $ressource->id ?>)" class="btn btn-primary">Envoyer</button>
        </div>
        <br>
        <div class="row listecommentaires overflow-auto">
            <table id="tabCommentaires" class="table table-responsive-lg w-100">
            <?php 
                foreach ($commentaires as $commentaire) {
                    $membre = $membres[$commentaire->id_commentary]; 
                    if ($commentaire->restraint == 0) { ?>
                    <tr id ='Com<?=$commentaire->id_commentary ?>'>
                        <td class='col-5'><em><?=$membre->first_name?> <?=$membre->last_name?> le <?=$commentaire->date_message?></em></td>
                        <td><?=$commentaire->text?></td>
                        <td class='col-1'>
                            <button id="btnCom<?=$commentaire->id_commentary ?>" title="Restraindre le commentaire" class='btn btn-warning' onclick='RestraindreCommentaire(<?= $ressource->id ?>, <?= $commentaire->id_commentary ?>, "Com<?= $commentaire->id_commentary ?>", "btnCom<?=$commentaire->id_commentary ?>")'>
                                <i class="fas fa-flag fa-2x"></i>
                            </button>
                        </td>
                    </tr>
                <?php }
                else { ?>
                    <tr id ='Com<?=$commentaire->id_commentary ?>'>
                        <td colspan=2>Ce commentaire est en cours de modération</td>
                        <td class='col-1'>
                            <button id="btnCom<?=$commentaire->id_commentary ?>" class='btn btn-success' title="Valider le commentaire" onclick='ReintegrerCommentaire(<?= $ressource->id ?>, <?= $commentaire->id_commentary ?>, "Com<?= $commentaire->id_commentary ?>", "btnCom<?=$commentaire->id_commentary ?>")'>
                                <span class="fa-stack" style="vertical-align: top;">
                                    <i class="far fa-comment fa-stack-2x"></i>
                                    <i class="fas fa-check fa-stack-1x"></i>
                                </span>
                            </button>
                        </td>
                    </tr>
                 <?php }
                }
                if (empty($commentaires)) { echo '<tr><td>Soyez la première ou le premier à commenter !</td></tr>'; }
            ?>
            </table>
        </div>
    <?php } ?>
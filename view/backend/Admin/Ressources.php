<div class="container espaceEnHaut">
    <h1  class="titrePage"><i class="fas fa-file"></i> Gestions des ressources</h1>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Fonctionnalités</th>
        </thead>
        <?php 
        foreach ($ressources as $ressource) { ?>
            <tr>
                <th><input id="title<?= $ressource->id?>" class='form-control-plaintext' value='<?= $ressource->title?>' readonly></th>
                <th><textarea  id="content<?= $ressource->id?>" class='form-control-plaintext' readonly><?= $ressource->content ?></textarea></th>               
                <th>   
                    <a href=<?= "Ressource/?idRessource=$ressource->id&action=voir" ?> class="btn btn-outline-success btn-sm col-auto" title="Voir"><i class="fas fa-eye"></i></a>
                    <a href=<?= "Ressource/?idRessource=$ressource->id&action=modifier" ?> class="btn btn-outline-primary btn-sm col-auto" title="Modifier"><i class="fas fa-pencil-alt"></i></a>    
                    <!--<a href="#" class="btn btn-outline-success btn-sm col-auto" title="Valider"><i class="fas fa-check"></i></a> -->
                    <?php if($ressource->state=="suspended"){?>   
                    <a id="btn<?= $ressource->id?>" href="#" class="btn btn-outline-success btn-sm col-auto" title="Réactivation" onclick="ReintegrerRessource(<?= $ressource->id ?>, 'btn<?= $ressource->id ?>')"><i class="fas fa-user-check"></i></a>  
                <?php } else { ?>
                    <a id="btn<?= $ressource->id?>" href="#" class="btn btn-outline-danger btn-sm col-auto" title="Désactivation" onclick="RestreindreRessource(<?= $ressource->id ?>, 'btn<?= $ressource->id ?>')"><i class="fas fa-user-slash"></i></a>
                <?php } ?>
                    <a href="#" id="btnSupp<?= $ressource->id?>" class="btn btn-outline-danger btn-sm col-auto" title="Supprimer" onclick="SupprimerRessource(<?= $ressource->id?>, 'Ressource<?= $ressource->id?>')"><i class="fas fa-trash"></i></a> 
                </th>
                
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
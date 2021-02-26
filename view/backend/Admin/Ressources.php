<div class="container espaceEnHaut">
    <h1>Ressources</h1>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Titre</th>
            <th scope="col" colspan=2>Description</th>
            <th scope="col" colspan=3>Fonctionnalités</th>
        </thead>
        <?php 
        foreach ($ressources as $ressource) { ?>
            <tr>
                <th><input id="title<?= $ressource->id?>" class='form-control-plaintext' value='<?= $ressource->title?>' readonly></th>
                <th><textarea  id="content<?= $ressource->id?>" class='form-control-plaintext' readonly><?= $ressource->content ?></textarea></th>   
                
                <th> 
                    <td>             
                        <a href=<?= "Ressource/?idRessource=$ressource->id&action=voir" ?> class="btn btn-outline-success btn-sm col-auto" title="Voir"><i class="fas fa-eye"></i></a>
                        <a href=<?= "Ressource/?idRessource=$ressource->id&action=modifier" ?> class="btn btn-outline-primary btn-sm col-auto" title="Modifier"><i class="fas fa-pencil-alt"></i></a>    
                        <a href="#" class="btn btn-outline-success btn-sm col-auto" title="Valider"><i class="fas fa-check"></i></a>
                        <a href="#" class="btn btn-outline-warning btn-sm col-auto" title="Suspendre"><i class="fas fa-eye-slash"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm col-auto" title="Supprimer"><i class="fas fa-trash"></i></a>
                    </td>  
                </th>
                
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
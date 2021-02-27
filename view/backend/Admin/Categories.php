<div class="container espaceEnHaut">
    <div class="row">
        <div class="col-3">
            <h1><i class="fas fa-grip-vertical"></i> Catégories</h1>
        </div>
        <div class="col-9">
            <i id="btnAjout" class="text-primary cliquable float-right fas fa-plus-circle fa-2x fa-lg m-1" title="Ajouter une nouvelle catégorie" onclick="AjouterCategorie('tabCategories', 'btnAjout')"></i>
        </div>
        
    </div>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Titre</th>
            <th scope="col" colspan=2>Description</th>
        </thead>
        <tbody id="tabCategories">
        <?php 
        foreach ($categories as $categorie) { ?>
            <tr id="Categorie<?= $categorie->id?>">
            <th scope='row'><input id="title<?= $categorie->id?>" class='form-control-plaintext' value='<?= $categorie->title?>' readonly></th>
            <td><textarea  id="descritption<?= $categorie->id?>" class='form-control-plaintext' readonly><?= $categorie->descritption ?></textarea></td>
            <td>
                <a href="#" id="btn<?= $categorie->id?>" class="btn btn-outline-primary btn-sm" title="Modifier" onclick='ActiverModificationCategories(<?= $categorie->id?>, "title<?= $categorie->id?>", "descritption<?= $categorie->id?>", "btn<?= $categorie->id?>")'><i class="fas fa-pencil-alt"></i></a>
                <a href="#" id="btnSupp<?= $categorie->id?>" class="btn btn-outline-danger btn-sm col-auto" title="Supprimer" onclick="SupprimerCategorie(<?= $categorie->id?>, 'Categorie<?= $categorie->id?>')"><i class="fas fa-trash"></i></a>    
            </td>
            </tr>
        <?php }
        ?>
        </tbody>
        </table>
    </div>
</div>
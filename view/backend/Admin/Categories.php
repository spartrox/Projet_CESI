<div class="container espaceEnHaut">
    <h1>Catégories</h1>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Titre</th>
            <th scope="col" colspan=2>Description</th>
        </thead>
        <?php 
        foreach ($categories as $categorie) { ?>
            <tr>
            <th scope='row' class='col-2'><input id="title<?= $categorie->id?>" class='form-control-plaintext' value='<?= $categorie->title?>' readonly></th>
            <td class='col-9'><textarea  id="descritption<?= $categorie->id?>" class='form-control-plaintext' readonly><?= $categorie->descritption ?></textarea></td>
            <td class='col-1'><a id="btn<?= $categorie->id?>" class="btn btn-outline-primary btn-sm" title="Modifier" onclick='ActiverModificationCategories(<?= $categorie->id?>, "title<?= $categorie->id?>", "descritption<?= $categorie->id?>", "btn<?= $categorie->id?>")'><i class="fas fa-pencil-alt"></i></a></td>
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
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
            <th scope='row'><input id="title<?= $categorie->id?>" class='form-control-plaintext' value='<?= $categorie->title?>' readonly></th>
            <td><textarea  id="descritption<?= $categorie->id?>" class='form-control-plaintext' readonly><?= $categorie->descritption ?></textarea></td>
            <td><a id="btn<?= $categorie->id?>" class="btn btn-outline-primary btn-sm" title="Modifier" onclick='ActiverModificationCategories(<?= $categorie->id?>, "title<?= $categorie->id?>", "descritption<?= $categorie->id?>", "btn<?= $categorie->id?>")'><i class="fas fa-pencil-alt"></i></a></td>
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
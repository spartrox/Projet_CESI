<div class="container espaceEnHaut">
    <h1>Comptes</h1>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Pseudo</th>
            <th scope="col">Email</th>
            <th scope="col">Type de compte</th>
        </thead>
        <?php 
        foreach ($members as $member) { ?>
            <tr>
                <th><input id="pseudo<?= $member->id?>" class='form-control-plaintext' value='<?= $member->pseudo?>' readonly></th>
                <th><textarea  id="email<?= $member->id?>" class='form-control-plaintext' readonly><?= $member->email ?></textarea></th>  
                <th><textarea  id="type_account<?= $member->id?>" class='form-control-plaintext' readonly><?= $member->type_account ?></textarea></th>              
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
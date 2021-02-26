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
                <th>
                    <select name="type_account"  class="col-8 form-control-lg" id="EtatSelect">
                        <?php 
                            foreach ($comptes as $compte) { ?>
                                <option <?= ($member->type_account == $compte)? 'selected' : '' ?>><?= $compte ?></option>
                            <?php }
                        ?>
                    </select>
                </th>              
            </tr>
        <?php }
        ?>
        </table>
    </div>
</div>
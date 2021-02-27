<div class="container espaceEnHaut">
    <h1  class="titrePage">Gestion des comptes :</h1>
    <br>
    <div class="overflow-auto h-75">
        <table class="table table-striped table-bordered">
        <thead>
            <th scope="col">Pseudo</th>
            <th scope="col">Email</th>
            <th scope="col">Type de compte</th>
            <th scope="col">Fonctionnalités</th>
        </thead>
        <?php 
        foreach ($members as $member) { ?>
            <tr>
                <th><input id="pseudo<?= $member->id?>" class='form-control-plaintext' value='<?= $member->pseudo?>' readonly></th>
                <th><textarea  id="email<?= $member->id?>" class='form-control-plaintext' readonly><?= $member->email ?></textarea></th>  
                <th>
                    <select name="type_account"  class="box" id="EtatSelect">
                        <?php 
                            foreach ($comptes as $compte) { ?>
                                <option <?= ($member->type_account == $compte)? 'selected' : '' ?>><?= $compte ?></option>
                            <?php }
                        ?>
                    </select>
                </th> 
                <th>   
                    <a href="#" class="btn btn-outline-danger btn-sm col-auto" title="Désactivation"><i class="fas fa-eye-slash"></i></a> 
                    <a href="#" class="btn btn-outline-success btn-sm col-auto" title="Réactivation"><i class="fas fa-eye"></i></a>   
                </th>            
            </tr>
        <?php }
        ?>
        </table><br>
        <h2 class="titrePage">Ajout d'un compte</h2>
    </div>
</div>
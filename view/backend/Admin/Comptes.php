<div class="container espaceEnHaut">
<div class="row">
        <div class="col-0">
            <h1 class="titrePage"><i class="fas fa-users-cog"></i> Gestion des comptes</h1>
        </div>
        <div class="col-12">
            <a href="NouveauCompte"><i class="text-primary cliquable float-right fas fa-plus-circle fa-2x fa-lg m-1" title="Ajouter un nouveau compte" ></i></a>
        </div>
    </div><br>
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
                    <select onchange="alert('ok')" name="type_account"  class="box" id="EtatSelect">
                        <?php 
                            foreach ($comptes as $compte) { ?>
                                <option <?= ($member->type_account == $compte)? 'selected' : '' ?>><?= $compte ?></option>
                            <?php }
                        ?>
                    </select>
                </th> 
                <th>
                <?php if($member->state=="activated"){?>    
                    <a id="btn<?= $member->id?>" href="#" class="btn btn-outline-danger btn-sm col-auto" title="Désactivation" onclick="RestreindreCompte(<?= $member->id ?>, 'btn<?= $member->id ?>')"><i class="fas fa-user-slash"></i></a> 
                <?php } else { ?>
                    <a id="btn<?= $member->id?>" href="#" class="btn btn-outline-success btn-sm col-auto" title="Réactivation" onclick="ReintegrerCompte(<?= $member->id ?>, 'btn<?= $member->id ?>')"><i class="fas fa-user-check"></i></a>   
                <?php } ?>
                </th>            
            </tr>
        <?php }
        ?>
        </table><br>
    </div>
</div>
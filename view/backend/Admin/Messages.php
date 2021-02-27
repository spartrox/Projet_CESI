<div class="container espaceEnHaut">
    <h1  class="titrePage"><i class="fas fa-envelope"></i> Messagerie</h1>
    <br>
    <div class="overflow-auto h-100">
        <table class="table table-striped table-responsive">
            <thead>
                <th scope="col">Pseudo</th>
                <th scope="col">Email</th>
                <th scope="col" colspan=2>Message</th>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) { ?>
                    <tr>
                        <th class="col-2" scope='row'><?= $contact->pseudo ?></th>
                        <td class="col-2"><?= $contact->email ?></td>
                        <td class="col-8"><?= $contact->message ?></td>
                        <td class="col-2"><a href="#" title="Répondre" class="btn btn-outline-primary btn-sm"><i class="fas fa-reply"></i></a></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
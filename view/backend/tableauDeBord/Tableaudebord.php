<div class="container espaceEnHaut">
    <div class="row">
        <div class="col-12 col-lg-6" style="padding-top: 5%">
            <h2 style="padding-bottom: 1%"><i class="far fa-file"></i> Mes Fichiers</h2>
            <table class="table-bordered table-active table-striped" style="width:100%">
            <?php 
            /*foreach ($misdecotes as $misdecote) {
                echo '<tr><td>'.$misdecote->title.'</td></tr>';
            }*/
            //if (empty($misdecotes)) { echo '<tr><td>Aucune fichier récent</td></tr>'; }
            ?>
            </table>
        </div>
        <div class="col-12 col-lg-6" style="padding-top: 5%">
            <h2 style="padding-bottom: 1%"><i class="fas fa-plus"></i> Création</h2>
            <table class="table-bordered table-active table-striped" style="width:100%">
            <?php 
            /*foreach ($misdecotes as $misdecote) {
                echo '<tr><td>'.$misdecote->title.'</td></tr>';
            }*/
            //if (empty($misdecotes)) { echo '<tr><td>Aucune création récente</td></tr>'; }
            ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6" style="padding-top: 5%">
            <h2 style="padding-bottom: 1%"><i class="far fa-star"></i> Favoris</h2>
            <table class="table-bordered table-active table-striped" style="width:100%">
            <?php 
            foreach ($favoris as $favori) {
                echo '<tr><td>'.$favori->title.'</td></tr>';
            }
            if (empty($favoris)) { echo '<tr><td>Aucune ressource favorite</td></tr>'; }
            ?>
            </table>
        </div>
        <div class="col-12 col-lg-6" style="padding-top: 5%">
            <h2 style="padding-bottom: 1%"><i class="far fa-bookmark"></i> Mis de côté</h2>
            <table class="table-bordered table-active table-striped" style="width:100%">
            <?php 
            foreach ($misdecotes as $misdecote) {
                echo '<tr><td>'.$misdecote->title.'</td></tr>';
            }
            if (empty($misdecotes)) { echo '<tr><td>Aucune ressource mise de côté</td></tr>'; }
            ?>
            </table>
        </div>
    </div>
</div>
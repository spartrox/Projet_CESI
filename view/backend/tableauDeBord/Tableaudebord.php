<div class="container espaceEnHaut">
    <h1 class="titrePage">Tableau de bord :</h1>
    <div class="row">
        <div class="col-12 col-lg-6 pt-5">
            <h2 style="padding-bottom: 1%"><i class="far fa-file"></i> Mes Fichiers</h2>
            <table class="table-bordered table-active table-striped w-100" style="height : 250px">
            <?php 
            foreach ($misdecotes as $misdecote) {
                echo '<tr><td>'.$misdecote->title.'</td>';
                echo "<td><a href='Ressource/?idRessource=$misdecote->id&action=voir' class='btn btn-outline-success btn-sm col' title='Voir'><i class='fas fa-eye'></i></a></td>";
                echo "<td><a href='Ressource/?idRessource=$misdecote->id&action=modifier' class='btn btn-outline-primary btn-sm col' title='Modifier'><i class='fas fa-pencil-alt'></i></a></td>";
                echo "</tr>";
            }
            if (empty($misdecotes)) { echo '<tr><td>Aucune fichier récent</td></tr>'; }
            ?>
            </table>
        </div>
        <div class="col-12 col-lg-6 pt-5">
            <h2 style="padding-bottom: 1%"><i class="fas fa-plus"></i> Création</h2>
            <table class="table-bordered table-active table-striped w-100" style="height : 250px">
            <?php 
            foreach ($creations as $creation) {
                echo '<tr><td>'.$creation->title.'</td>';
                echo "<td><a href='Ressource/?idRessource=$creation->id&action=voir' class='btn btn-outline-success btn-sm col' title='Voir'><i class='fas fa-eye'></i></a></td>";
                echo "<td><a href='Ressource/?idRessource=$creation->id&action=modifier' class='btn btn-outline-primary btn-sm col' title='Modifier'><i class='fas fa-pencil-alt'></i></a></td>";
                echo "</tr>";
            }
            if (empty($creations)) { echo '<tr><td>Aucune création récente</td></tr>'; }
            ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 pt-5">
            <h2 style="padding-bottom: 1%"><i class="far fa-star"></i> Favoris</h2>
            <table class="table-bordered table-active table-striped w-100" style="height : 250px">
            <?php 
            foreach ($favoris as $favori) {
                echo '<tr><td>'.$favori->title.'</td>';
                echo "<td><a href='Ressource/?idRessource=$favori->id&action=voir' class='btn btn-outline-success btn-sm col' title='Voir'><i class='fas fa-eye'></i></a></td>";
                echo "<td><a href='Ressource/?idRessource=$favori->id&action=modifier' class='btn btn-outline-primary btn-sm col' title='Modifier'><i class='fas fa-pencil-alt'></i></a></td>";
                echo "</tr>";
            }
            if (empty($favoris)) { echo '<tr><td>Aucune ressource favorite</td></tr>'; }
            ?>
            </table>
        </div>
        <div class="col-12 col-lg-6 pt-5">
            <h2 style="padding-bottom: 1%"><i class="far fa-bookmark"></i> Mis de côté</h2>
            <table class="table-bordered table-active table-striped w-100" style="height : 250px">
            <?php 
            foreach ($misdecotes as $misdecote) {
                echo '<tr><td>'.$misdecote->title.'</td>';
                echo "<td><a href='Ressource/?idRessource=$misdecote->id&action=voir' class='btn btn-outline-success btn-sm col' title='Voir'><i class='fas fa-eye'></i></a></td>";
                echo "<td><a href='Ressource/?idRessource=$misdecote->id&action=modifier' class='btn btn-outline-primary btn-sm col' title='Modifier'><i class='fas fa-pencil-alt'></i></a></td>";
                echo "</tr>";
            }
            if (empty($misdecotes)) { echo '<tr><td>Aucune ressource mise de côté</td></tr>'; }
            ?>
            </table>
        </div>
    </div>
</div>
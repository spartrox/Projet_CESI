<div class="container espaceEnHaut">
    <h1 class="titrePage">Ressources mise de côté :</h1><br>
    <div class="row">
        <ul>
        <?php 
            foreach ($misdecotes as $misdecote) {
                echo '<li>'.$misdecote->title.'</li>';
            }
            if (empty($misdecotes)) { echo '<li>Aucune ressource mise de côté</li>'; }
            ?>
        </ul>
    </div>
</div>
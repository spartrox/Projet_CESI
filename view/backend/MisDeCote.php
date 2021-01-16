<div class="container espaceEnHaut">
    <div class="row">
        <div><h1>Mis de côté</h1></div>
    </div>
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
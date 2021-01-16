<div class="container espaceEnHaut">
    <div class="row">
        <div><h1>Favoris</h1></div>
    </div>
    <div class="row">
        <ul>
        <?php 
            foreach ($favoris as $favori) {
                echo '<li>'.$favori->title.'</li>';
            }
            if (empty($favoris)) { echo '<li>Aucune ressource favorite<li>'; }
            ?>
        </ul>
    </div>
</div>
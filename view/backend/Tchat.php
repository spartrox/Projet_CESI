<?php 
    foreach ($tchats as $tchat) { ?>
    <p class='text-break'><span class='text-capitalize'><?= $tchat->pseudo ?></span> : <?= $tchat->text ?></p>
    <?php  } ?>
<!-- Fin -->

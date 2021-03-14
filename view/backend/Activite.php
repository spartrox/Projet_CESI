<div class="container espaceEnHaut">
    <br>
    <!-- Titre de la ressource -->
    <div class="col-6">
        <h2><i class="fas fa-calendar-day"></i> <?= $ressource->title?></h2>
    </div>
    <div id="idRessource" class="invisible"><?= $ressource->id?></div>
    <br>
    <div class="row border border-secondary shadow-lg" style="height:500px">
        <!-- Zone de l'activité -->
        <div class="col-8 border border-secondary">
            
        </div>
        <!-- Chat -->
        <div class="col-4 border border-secondary">
            <h5 class="border-bottom text-center">Chat</h5>
            <div class="d-flex flex-column-reverse" style="height: 450px">
                <div class="input-group mb-1">
                    <textarea style="height:40px" id="MsgChat" type="text" class="form-control" placeholder="Chatter avec les autres invités" aria-describedby="btn-msg"></textarea>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="btn-msg" onclick="AjouterMsgChat('<?= $_SESSION['id'] ?>')"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
                <br>
                <div class="overflow-auto" style="max-height: 350px">
                    <div id="listeChat">
                        <?php include_once('Tchat.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <h4>Description</h4>
        <p><?= $ressource->content ?></p>
    </div>
    <div>
        <h4>Participants</h4>
        <ul>
            <?php 
                foreach ($participants as $participant) {
                    echo "<li><span class='text-capitalize'>$participant->pseudo</span></li>";
                }
            ?>
        </ul>
    </div>
    <br>
    <!-- Zone des commentaires -->
    <?php 
    if(isset($_SESSION['id'])) {
        include_once("Commentaire.php");
     } ?>
</div>
<script>
    $(document).ready(function() 
    {
        setInterval(MAJTchat,1000);
    })
</script>
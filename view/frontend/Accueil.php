<div class="accueil">
    <div id="carouselActualites" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block logo" src="<?= BASE_SITE . DS . "/images/logo.png" ?>" alt="Logo (Re)Sources/Lationelles">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bienvenue !</h5>
                <p>Ici vous pouvez échanger et partager vos ressources !</p>
            </div>
            </div>
            <div class="carousel-item">
            <img class="d-block logo" src="<?= BASE_SITE . DS . "/images/Cesi_Logo.png" ?>" alt="Logo Cesi">
            <div class="carousel-caption d-none d-md-block">
                <h5>Cesi de La Rochelle</h5>
                <p></p>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselActualites" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselActualites" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
</div>
<div>
    <div class="row aligneCenter">
        <div class="col-6 col-lg-6 d-flex justify-content-center">
            <a id="connexion" class="btn" href="Connexion"><?= $l['signin'] ?></a>
        </div>
        <div class="col-6 col-lg-6 d-flex justify-content-center">
            <a id="inscription" class="btn" href="Inscription"><?= $l['signup'] ?></a>
        </div>
    </div>
</div>
<div class="contour">
    <div class="aligneCenter">
        <h3><i class="fas fa-folder-open"></i> <?= $l['deposityourresources'] ?></h3>
    </div>
</div>
<div class="contour">
    <div class="aligneCenter">
        <h3><?= $l['orcreateyourownsources'] ?> <i class="far fa-file"></i></h3>
    </div>
</div>
<div class="contour">    
    <div class="aligneCenter">
        <h3><i class="far fa-user-circle"></i> <?= $l['commentandshare'] ?></h3>
    </div>
</div>
<div class="partenaire">
    <div class="container">
        <div class="row">
            <div><h2><?= $l['partners'] ?></h2></div>
        </div>
        <div class="row">
            <div class="col-3"><img src="<?= BASE_SITE . DS . "/images/Cesi_Logo.png" ?>" width="100%" class="logoPartenaire"></div>
            <div class="col-3"><img src="<?= BASE_SITE . DS . "/images/ministere_solidarite_sante.png" ?>" width="100%" class="logoPartenaire"></div>
            <div class="col-3"><img src="<?= BASE_SITE . DS . "/images/dessin.svg.png" ?>" width="100%" class="logoPartenaire"></div>
            <div class="col-3"><img src="<?= BASE_SITE . DS . "/images/La_Rochelle_logo.svg.png" ?>" width="100%" class="logoPartenaire"></div>
        </div>
        <div class="row" class="nomPartenaire">
            <div class="col-3 text-center"><?= $l['cesi'] ?></div>
            <div class="col-3 text-center"><?= $l['ministryofsolidarityandhealth'] ?></div>
            <div class="col-3 text-center"><?= $l['thebrotherhood404'] ?></div>
            <div class="col-3 text-center"><?= $l['larochelle'] ?></div>
        </div>
    </div>
</div>

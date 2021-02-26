<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">
  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4"><?= $l['whoweare'] ?></h5>
        <p><?= $l['whowearedescribed'] ?></p>

      </div>
      
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">
 
      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4"><?= $l['address'] ?></h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3"></i><?= $l['addressdescribed'] ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i> <?= $l['mail'] ?></p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i><?= $l['landlinenumber'] ?></p>
          </li>
          <!--
          <li>
            <p>
              <i class="fas fa-print mr-3"></i><?= $l['mobilephonenumber'] ?></p>
          </li> -->
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

        <!-- Social buttons -->
        <h5 class="font-weight-bold text-uppercase mb-4"><?= $l['followus&contactus'] ?></h5>

        <!-- Facebook -->
        <a type="button" class="btn-floating btn-fb" 
        href="https://www.facebook.com" target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
        <!-- Twitter -->
        <a type="button" class="btn-floating btn-tw" 
        href="https://twitter.com" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
        <!--linkedin -->
        <a type="button" class="btn-floating btn-tw" 
        href="https://fr.linkedin.com" target="_blank">
          <i class="fab fa-linkedin"></i>
        </a>
        <!--PornHub -->
        <a type="button" class="btn-floating btn-tw" 
        href="https://fr.pornhub.com" target="_blank">
          <i class="fab fa-youtube"></i>
        </a>
        <!-- Bouton forlumaire de contact +-->
        <a type="button" class="btn-floatting btn-fb" href="<?= BASE_URL . DS . "frontend" . DS . "Contact" ?>">
          <i class="fas fa-envelope mr-3"></i>
        </a>

        <!--
        <div class="col-15 col-lg-8 d-flex justify-content-center" style="">
            <a class="btn btn-primary" href="Contact">Nous contacter</a>
        </div>
        +-->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
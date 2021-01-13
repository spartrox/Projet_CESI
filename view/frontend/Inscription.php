<h2 class="titrePage">INSCRIPTION</h2>
        <br/><br />
            <div class="container">
                <form class="col-md-5 container"  action="addMembre" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" type="text" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                        </div>
                        <input class="form-control" name="mail" placeholder="Mail" id="mailI" type="email" value="<?php if(isset($email)) { echo $email; } ?>" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input class="form-control" placeholder="mot de passe" id="mdp1" name="mdp1" type="password" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                            <input class="form-control" placeholder="confirmer votre mot de passe" id="mdp2" name="mdp2" type="password" required>
                      </div>
                          <div class="form-group">
                             <br/>
                             <input type="submit" class="btn btn-primary" name="forminscription" value="Je m'inscris" id="inscription"/>
                          </div>
                 </form> <br>

              <p class="messageConnexion">Déja un compte ? <a href="Connexion">Connectez-vous!</a></p>
           </div>  


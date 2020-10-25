<h2 style="text-align: center;  color:green; padding-top:5%">INSCRIPTION</h2>
        <br/><br />
            <div class="container">
                <form class="col-md-5 container"  action="" method="post">
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
                        <input class="form-control" name="mail" placeholder="Mail" id="mailI" type="email" value="<?php if(isset($mail)) { echo $mail; } ?>" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input class="form-control" placeholder="mot de passe" id="mdpI" name="mdp" type="password" required>
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

              <p>Déja un compte ? <a href="Connexion">Connectez-vous!</a></p>
           </div>  


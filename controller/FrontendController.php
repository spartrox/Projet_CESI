<?php
class FrontendController extends Controller
{
    private $modChamp = null;

    function Accueil()
    {
        $this->render("Accueil");
    }

    function Inscription()
    {
        $this->render("Inscription");
    }
    
    function Connexion()
    {
        $this->render("Connexion");
    }

    function  Contact()
    {
        $this->render("Contact");
    }

    function addMember($pseudo, $mail, $mdp){
        $memberManager = new MemberManager();
           
          $pseudoExist = $memberManager->checkPseudo($pseudo);
         $mailExist = $memberManager->checkMail($mail);  

             if ($pseudoExist):
                 throw new \Exception('Pseudo déja utilisé, veuillez en trouver un autre !');     
             endif;

             if ($mailExist):
                 throw new \Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
             endif; 
                 
                 if (!($pseudoExist) && !($mailExist)):

                     $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                     $newMember = $memberManager->createMember($pseudo, $mail, $mdp);

                     header('Location: Connexion');
                 else:
                         throw new \Exception('Erreurs lors de l\'inscription veuillez recommencer !');
                    endif;

           return $addMember;
     }


}
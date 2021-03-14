<?php
class BackendController extends Controller
{
    private $modFavoris = null;
    private $modRessources = null;
    private $modCategories = null;
    private $modCategoriesRessources = null;
    private $modCommentaires = null;
    private $modMember = null;
    private $modActivite = null;
    private $modTchat = null;
    private $modContact = null;

    private $enumStateRessource = ['private', 'shared', 'public', 'to_validate', 'validate', 'suspended'];
    private $enumStateCompte = ['citoyen', 'moderateur', 'admin', 'to_validate', 'super_admin'];
    private $enumStateRessourceMember = ['favory', 'aside', 'exploited'];

    ////////////////////////////////
    ////*Fonctions d'affichage*/////
    ////////////////////////////////

    function Tableaudebord()
    {
        //Favoris
        $d['favoris'] = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'favory');
        //Mis de Côté
        $d['misdecotes'] = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'aside');
        //Exploités
        $d['exploites'] = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'exploited');
        //Créations
        $d['creations'] = $this->DeterminerCréationRessources('Gabriel');
        //Préparation de l'affichage
        $this->set($d);
        $this->render("Tableaudebord");
    }

    function Catalogue()
    {
        //Récupération des ressources
        //Préparation des modèles
        $this->modRessources = $this->loadModel("Ressources");
        $this->modCategoriesRessources = $this->loadModel("CategoriesRessources");
        $this->modFavoris = $this->loadModel("Favoris");
        //Filtres
        //Etats des ressources globales
        if(!empty($_SESSION))
        {
            $params = ['projections' => 'ressources.*', 'conditions' => $this->modRessources->table.'.state in("shared", "public")'];
        } else 
        {
            $params = ['projections' => 'ressources.*', 'conditions' => $this->modRessources->table.'.state in("shared", "public")'];
        }
        //Catégories
        $tableRessource = $this->modRessources->table;
        if (isset($_POST['categoryRessource']))
        {
            if ($_POST['categoryRessource'] != "all") {
                $params['conditions'] .= ' and id_category = '.$_POST['categoryRessource'];
                $this->modRessources->table.=' inner join '.$this->modCategoriesRessources->table.' on '.$tableRessource.'.id = '.$this->modCategoriesRessources->table.'.id_ressources ';
            } 
            $d['FiltrecategoryRessource'] = $_POST['categoryRessource'];
        } else {
            $d['FiltrecategoryRessource'] = "all";
        }
        //Etats des ressources pour le membre
        if (isset($_POST['stateRessourceMembers']))
        {
            if ($_POST['stateRessourceMembers'] != "all") {
                $params['conditions'] .= ' and '.$this->modFavoris->table.'.state = "'.$_POST['stateRessourceMembers'].'"';
                $this->modRessources->table.=' inner join '.$this->modFavoris->table.' on '.$tableRessource.'.id = '.$this->modFavoris->table.'.id_ressources ';
            }
            $d['FiltrestateRessourceMembers'] = $_POST['stateRessourceMembers'];
        } else {
            $d['FiltrestateRessourceMembers'] = "all";
        }
        $ressources =  $this->modRessources->find($params);
        $d['ressources'] = $ressources;
        if(isset($_SESSION['id']))
        {
            //Récupération des id des favoris
            $favoris = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'favory');
            $idFavoris = [];
            foreach ($favoris as $favori) {array_push($idFavoris, $favori->id);}
            $d['favoris'] = $idFavoris;
            //Récupération des id des mis de côté
            $misdecotes = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'aside');
            $idMisDeCotes = [];
            foreach ($misdecotes as $misdecote) {array_push($idMisDeCotes, $misdecote->id);}
            $d['misdecotes'] = $idMisDeCotes;
            //Récupération des id des ressources exploitées
            $exploitees = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'exploited');
            $idExploitees = [];
            foreach ($exploitees as $exploitee) {array_push($idExploitees, $exploitee->id);}
            $d['exploitees'] = $idExploitees;
        } else 
        {
            $d['favoris'] = null;
            $d['misdecotes'] = null;
            $d['exploitees'] = null;
        }
        
        //Récupération des catégories des ressources
        $categoriesDesRessources = [];
        foreach ($ressources as $ressource) { $categoriesDesRessources[$ressource->id] = $this->DeterminerCategoriesRessource($ressource->id); }
        $d['categories'] = $categoriesDesRessources;
        //Récupération des états des ressources
        $d['states'] = $this->enumStateRessource;
        //Récupération des catégories
        $d['categorys'] = $this->RecupererToutesCategories();
        //Récupération états des ressources en fonction des membres
        $d['stateRessourceMembers'] = $this->enumStateRessourceMember;
        //Préparation de l'affichage
        $this->set($d);
        $this->render("Catalogue");
    }

    function Ressource()
    {
        if (!isset($_GET['idRessource'], $_GET['action']) or ($_GET['idRessource'] == '' or $_GET['action'] == ''))
        {
            $this->e404("Paramètres manquants ou incorrects !");
        } else {
            $this->modRessources = $this->loadModel("Ressources");
            //Récupération de l'id de la ressource et de l'action
            $idRessource = $_GET['idRessource'];
            $action = $_GET['action'];

            //Détermination si le formulaire de modification est envoyé
            if (!empty($_POST))
            {
                //Update de la ressource
                $image = ($_POST['image'] == '') ? $_POST['imageold'] : $_POST['image'] ;
                $params = ['donnees' => ['title' => $_POST['title'], 'content' => $_POST['content'], 'image' => $image, 'state' => $_POST['state']], 'conditions' => ['id' => $idRessource]];
                $this->modRessources->update($params);
                if (isset($_POST['categories'])){
                    $this->ModifierCategoriesRessource($idRessource, $_POST['categories']);
                }
            }

            //Récupération de la ressoure
            $params = ['projections' => 'ressources.*', 'conditions' => 'id = ' . $idRessource];
            $ressource = $this->modRessources->findFirst($params);
            if (!empty($ressource))
            {
                //Détermination de l'action en cours (voir ou modifier)
                if ($action == 'modifier')
                { 
                    $d['action'] = false; 
                } elseif ($action == 'voir') 
                {
                    $d['action'] = true;
                } else
                {
                    $this->e404("Désolé mais l'action '$action' n'existe pas !");
                }

                //Récupération de toutes les catégories
                $d['categories'] = $this->RecupererToutesCategories();

                //Récupération des id des catégories de la ressource
                $idCategoriesRessource = [];
                $categoriesRessource = $this->DeterminerCategoriesRessource($ressource->id);
                $d['categoriesRessource'] = $categoriesRessource;
                foreach ($categoriesRessource as $categorie) {
                    array_push($idCategoriesRessource, $categorie->id);
                }
                $d['idCategoriesRessource'] = $idCategoriesRessource;

                //chargement de la ressource
                $d['ressource'] = $ressource;
                $d['nouveau'] = $this->DeterminerRessourceNouvelle($ressource->register_date);

                //Détermination de l'état de la ressource en fonction de l'utilisateur
                if(isset($_SESSION['id'])) {
                    $d['favory'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'favory');
                    $d['aside'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'aside');
                    $d['exploited'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'exploited');
                } else {
                    $d['favory'] = null;
                    $d['aside'] = null;
                    $d['exploited'] = null;
                }
                

                //Récupération des commentaires
                $commentaires = $this->RecupererCommentairesRessource($ressource->id);
                $d['commentaires'] = $commentaires;

                //Récupération des membre liès aux commentaires
                $membresCommentaires = [];
                foreach ($commentaires as $commentaire) { $membresCommentaires[$commentaire->id_commentary] = $this->RecupererMembre($commentaire->id_member); }
                $d['membres'] = $membresCommentaires;

                //Ajout des états de la ressource
                $d['states'] = $this->enumStateRessource;

                //Détermine si la ressource est une activite
                if (!empty($this->DeterminerSiRessourceEstActivite($ressource->id)))
                {
                    //Récupération du tchat de l'activite
                    $d['tchats'] = $this->RecupererTchatActivite($ressource->id);
                    $d['participants'] = $this->RecupererParticipantsActivite($ressource->id);
                    //Chargement de l'affichage
                    $this->set($d);
                    $this->render("Activite");
                } else {
                    //Chargement de l'affichage
                    $this->set($d);
                    $this->render("Ressource");
                }

            } else{
                $this->e404("Cette ressource n'existe pas.");
            }
            
        }
        
        
    }
        //A MODIFIER 
    function Creation()
    {
        
        if (!isset($_GET['idRessource'], $_GET['action']) or ($_GET['idRessource'] == '' or $_GET['action'] == ''))
        {
            $this->e404("Paramètres manquants ou incorrects !");
        } else {
            $this->modRessources = $this->loadModel("Ressources");
            //Récupération de l'id de la ressource et de l'action
            $idRessource = $_GET['idRessource'];
            $action = $_GET['action'];

            //Détermination si le formulaire de modification est envoyé
            if (!empty($_POST))
            {
                //Update de la ressource
                $image = ($_POST['image'] == '') ? $_POST['imageold'] : $_POST['image'] ;
                $params = ['donnees' => ['title' => $_POST['title'], 'content' => $_POST['content'], 'image' => $image, 'state' => $_POST['state']], 'conditions' => ['id' => $idRessource]];
                $this->modRessources->update($params);

                $this->ModifierCategoriesRessource($idRessource, $_POST['categories']);

            }

            //Récupération de la ressoure
            $params = ['projections' => 'ressources.*', 'conditions' => 'id = ' . $idRessource];
            $ressource = $this->modRessources->findFirst($params);
            if (!empty($ressource))
            {
                //Détermination de l'action en cours (voir ou modifier)
                if ($action == 'modifier')
                { 
                    $d['action'] = false; 
                } elseif ($action == 'voir') 
                {
                    $d['action'] = true;
                } else
                {
                    $this->e404("Désolé mais l'action '$action' n'existe pas !");
                }

                //Récupération de toutes les catégories
                $d['categories'] = $this->RecupererToutesCategories();

                //Récupération des id des catégories de la ressource
                $idCategoriesRessource = [];
                $categoriesRessource = $this->DeterminerCategoriesRessource($ressource->id);
                $d['categoriesRessource'] = $categoriesRessource;
                foreach ($categoriesRessource as $categorie) {
                    array_push($idCategoriesRessource, $categorie->id);
                }
                $d['idCategoriesRessource'] = $idCategoriesRessource;

                //chargement de la ressource
                $d['ressource'] = $ressource;
                $d['nouveau'] = $this->DeterminerRessourceNouvelle($ressource->register_date);

                //Détermination de l'état de la ressource en fonction de l'utilisateur
                if(isset($_SESSION['id'])) {
                    $d['favory'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'favory');
                    $d['aside'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'aside');
                    $d['exploited'] = $this->DeterminerRessourceFavorisMisDeCoteExploite($_SESSION['id'], $ressource->id, 'exploited');
                } else {
                    $d['favory'] = null;
                    $d['aside'] = null;
                    $d['exploited'] = null;
                }
                

                //Récupération des commentaires
                $commentaires = $this->RecupererCommentairesRessource($ressource->id);
                $d['commentaires'] = $commentaires;

                //Récupération des membre liès aux commentaires
                $membresCommentaires = [];
                foreach ($commentaires as $commentaire) { $membresCommentaires[$commentaire->id_commentary] = $this->RecupererMembre($commentaire->id_member); }
                $d['membres'] = $membresCommentaires;

                //Ajout des états de la ressource
                $d['states'] = $this->enumStateRessource;

                //Chargement de l'affichage
                $this->set($d);
                $this->render("Creation");
            } else{
                $this->e404("Impossible de créer une ressource, veuillez recommencer !");
            }       
        }
    }

    function Favoris()
    {
        $d['favoris'] = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'favory');
        $this->set($d);
        $this->render("Favoris");
    }

    function MisDeCote()
    {
        $d['misdecotes'] = $this->DeterminerFavorisMisDeCoteExploite($_SESSION['id'], 'aside');
        $this->set($d);
        $this->render("MisDeCote");
    }

    function Categories()
    {
        $d['categories'] = $this->RecupererToutesCategories();
        $this->set($d);
        $this->render("\Admin\Categories");
    }

    function Ressources()
    {
        $d['ressources'] = $this->RecupererToutesRessources();
        $d['comptes'] = $this->enumStateRessource;
        
        $this->set($d);
        $this->render("\Admin\Ressources");
    }

    function Messages()
    {
        $modContact = $this->loadModel("Contact");
        $d['contacts'] = $modContact->find(['projections' => 'contact.*', "orderby" => "id DESC"]);
        $this->set($d);
        $this->render("\Admin\Messages");
    }

    function Comptes()
    {
        $d['members'] = $this->RecupererToutLesComptes();
        $d['comptes'] = $this->enumStateCompte;
        
        $this->set($d);
        $this->render("\Admin\Comptes");
        
    }

    function NouveauCompte()
    {
            // Permet d'appeler l'erreur et le message erreur, par défaut il est faux
            $d["erreur"] = false;
            $d["msgErreur"] = false;
            
            // Permet de savoir si on a reçus un formulaire
            if (!empty($_POST)){ 
    
                // Appelle la fonction CheckFormulaire
                $d = $this->CheckFormulaire();
                
                //  si il n'y a pas d'erreurs, on passe à l'étape suivante 
                if($d["erreur"] == false){
                    
                    // Sert à charger le model
                    $modmembre = $this->loadModel("membre");
    
                    // Colonnes à utiliser de la BDD
                    $colonnes = ["pseudo", "email", "password"];
    
                    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                    
                    // Déterminer les données récupérées depuis le formulaire, qui seront utilisées
                    $donnees = [ $_POST["pseudo"], $_POST["email"], $mdp];
    
                    // Insertion en autoIncrément dans la table 
                    $modmembre->InsertAI($colonnes,$donnees);
    
                    // Redirection sur la page Connexion
                    $this->redirect("/backend/Comptes");
                }
            }
            // Injection des variables dans la vue
            $d['members'] = $this->RecupererToutLesComptes();
            $d['comptes'] = $this->enumStateCompte;
    
            $this -> set($d);
            $this->render("Admin/NouveauCompte");

    }
    function CheckFormulaire(){

        $pseudo = $_POST["pseudo"];
        
        // Sert à charger le model
        $modmembre = $this->loadModel("membre");
        
        // Select table membre et vérification si le pseudo existe ou pas 
        $params = ["projection" => "member.pseudo","conditions" => "pseudo = '$pseudo'"];

        // Lance la requête
        $pseudoExiste = $modmembre->findFirst($params); 

        // Par défaut c'est a false
        $d["erreur"] = false;

        //différent de null
        if($pseudoExiste != null){

            // Si y il a un problème sa passe à true
            $d["erreur"] = true;
            $d["msgErreur"] = "Pseudo déja utilisé";
        } 
        return $d;
    }

    function Profil()
    {
        $this->render("Profil");
    }

    function Deconnexion()
    {
        session_destroy();

        // Redirect permet de rediriger une page 
        $this->redirect("/frontend/Accueil");
    }

    ////////////////////////////////////////////
    //////////*Fonctions utilitaires*///////////
    ////////////////////////////////////////////

    function DeterminerFavorisMisDeCoteExploite($id_member, $etat)
    {
        //Détemination des favoris ou Mis de Côté ou Exploité
        $this->modFavoris = $this->loadModel("Favoris");
        $params = ['projection' => 'state_ressources.*', 'conditions' => 'id_member = '.$id_member.' and state = "'.$etat.'"'];
        $liensFavoris = $this->modFavoris->find($params);
        $id = " (";
        foreach ($liensFavoris as $liens) 
        {
            if ($id == " (") 
            {
                $id .= $liens->id_ressources;
            } else 
            {
                $id .= "," . $liens->id_ressources;
            }
            
        }
        $id .= ")";
        //Détermination des ressources associés aux favoris
        $this->modRessources = $this->loadModel("Ressources");
        $params = ['projections' => 'ressources.*', 'conditions' => 'id in' . $id]; 
        return $this->modRessources->find($params);
    }

    function DeterminerRessourceFavorisMisDeCoteExploite($id_member, $id_ressources, $etat)
    {
        $this->modFavoris = $this->loadModel("Favoris");
        $params = ['projection' => 'state_ressources.*', 'conditions' => 'id_ressources = ' .$id_ressources. ' and id_member = '.$id_member.' and state = "'.$etat.'"'];
        $etat = $this->modFavoris->find($params);
        return (!empty($etat)) ? true : false;
    }

    function DeterminerCategoriesRessource($id_ressources)
    {
        //Détermination des catégories de la ressources
        $this->modCategoriesRessources = $this->loadModel("CategoriesRessources");
        $params = ['projection' => 'category_ressources.*', 'conditions' => 'id_ressources = '.$id_ressources];
        $idCategories = $this->modCategoriesRessources->find($params);
        $id = " (";
        foreach ($idCategories as $categorie) 
        {
            if ($id == " (") 
            {
                $id .= $categorie->id_category;
            } else 
            {
                $id .= "," . $categorie->id_category;
            }
        }
        $id .= ")";
        //Détermination des catégories
        $this->modCategories = $this->loadModel("Categories");
        $params = ['projections' => 'category.*', 'conditions' => 'id in' . $id]; 
        return $this->modCategories->find($params);
    }

    function DeterminerCréationRessources($creator)
    {
        //Détermination les ressources dont vous êtes le créateur
        $this->modRessources = $this->loadModel("Ressources");
        $params = ['projections' => 'ressources.*', 'conditions' => 'creator = "' . $creator .'"'];
        return $this->modRessources->find($params);
    }

    function RecupererToutesCategories()
    {
        //Récupération de toutes les catégories existantes
        $this->modCategories = $this->loadModel("Categories");
        $params = ['projections' => 'category.*', 'orderby' => 'title ASC']; 
        return $this->modCategories->find($params);
    }

    function RecupererToutesRessources()
    {
        //Récupération de toutes les ressources existantes
        $this->modRessources = $this->loadModel("Ressources");
        $params = ['projections' => 'ressources.*']; 
        return $this->modRessources->find($params);
    }

    function RecupererToutLesComptes()
    {
        //Récupération de toutes les ressources existantes
        $this->modRessources = $this->loadModel("membre");
        $params = ['projections' => 'member.*']; 
        return $this->modRessources->find($params);
    }

    function DeterminerRessourceNouvelle($dateRessource)
    {
        //Détermine si la ressource est récente, soit moins de 3 jours, si oui elle obtient le grade de 'Nouveau'
        $intervale = date_diff(date_create($dateRessource), date_create("now"));
        if ($intervale->d < 3)
        {
            return true;
        } else
        {
            return false;
        }
    }

    function RecupererCommentairesRessource($idRessource)
    {
        //Récupération des commentaires liés à la ressource
        $this->modCommentaires = $this->loadModel("Commentaires");
        $params = ['projections' => 'commentary_ressources.*', "conditions" => "id_ressources = $idRessource", "orderby" => "date_message DESC"];
        return $this->modCommentaires->find($params);
    }

    function RecupererMembre($idMember)
    {
        //Récupération d'un membre par son id
        $this->modMember = $this->loadModel("membre");
        $params = ['projections' => 'member.*', 'conditions' => "id = $idMember"];
        return $this->modMember->findFirst($params);
    }

    function ModifierCategoriesRessource($id_ressource, $categoriesFormulaire)
    {
        $this->modCategoriesRessources = $this->loadModel("CategoriesRessources");
        
        $ancienneCategories = $this->DeterminerCategoriesRessource($id_ressource);

        $dedans = true;
        foreach ($ancienneCategories as $ancienne) {
            $dedans = in_array($ancienne, $categoriesFormulaire);
            if (!$dedans) $this->modCategoriesRessources->delete(["conditions" => ["id_ressources" => $id_ressource, "id_category" => $ancienne->id]]);
        }
        
        $dedans = true;
        foreach ($categoriesFormulaire as $categorie) {
            $dedans = in_array($categorie, $ancienneCategories);
            if (!$dedans) $this->modCategoriesRessources->insert(["id_ressources","id_category"], [$id_ressource, $categorie]);
        }

        
    }

    function DeterminerSiRessourceEstActivite($id_ressource)
    {
        $this->modActivite = $this->loadModel("Activites");
        return $this->modActivite->find(['projections' => 'Activites.*', "conditions" => "id_activity = $id_ressource"]);
    }

    function RecupererTchatActivite($id_ressource)
    {
        $this->modTchat = $this->loadModel("Tchat");
        return $this->modTchat->find(['projections' => 'tchat_activity.*', "conditions" => "id_activity = $id_ressource", "orderby"=>"id_msg ASC"]);
    }

    function RecupererParticipantsActivite($id_ressource)
    {
        $this->modParticipant = $this->loadModel("Participants");
        return $this->modParticipant->find(['projections' => 'member_activity.*', "conditions" => "id_activity = $id_ressource"]);
    }

    //////////////////////////////////////////
    /*Fonctions appelées par le système Ajax*/
    //////////////////////////////////////////
    ////*Ne pas utiliser directement ici*/////
    //////////////////////////////////////////

    function RetirerFavorisMisDeCoteExploitee()
    {
        //Suppression d'un état Favoris/Mis de côté/Exploitée
        $modFavoris = $this->loadModel("Favoris");
        $modFavoris->delete(['conditions' => ["id_ressources" => $_POST['id_ressource'], "id_member" => $_POST['id_member'], "state" => $_POST['state']]]);
    }

    function AjouterFavorisMisDeCoteExploitee()
    {
        //Ajout d'un état Favoris/Mis de côté/Exploitée
        $modFavoris = $this->loadModel("Favoris");
        $modFavoris->insert(['id_ressources', 'id_member', 'state'], [$_POST['id_ressource'], $_POST['id_member'], $_POST['state']]);
    }

    function AjouterCommentaire()
    {
        $modCommentaires = $this->loadModel("Commentaires");
        $modCommentaires->insertAI(['id_ressources', 'text', 'id_member'], [$_POST['id_ressource'],$_POST['text'],$_POST['id_member']]);
    }

    function RestreindreCommentaire()
    {
        $modCommentaires = $this->loadModel("Commentaires");
        $modCommentaires->update(["donnees" => ["restraint " => 1],"conditions" => ["id_commentary" => $_POST['id_commentary'], "id_ressources" => $_POST['id_ressource']]]);
    }

    function ReintegrerCommentaire()
    {
        $modCommentaires = $this->loadModel("Commentaires");
        $modCommentaires->update(["donnees" => ["restraint " => 0],"conditions" => ["id_commentary" => $_POST['id_commentary'], "id_ressources" => $_POST['id_ressource']]]);
    }

    function ModifierCategorie()
    {
        $modCategories = $this->loadModel("Categories");
        $modCategories->update(["donnees" => ["title" => $_POST['title'], "descritption" => $_POST['description']],"conditions" => ["id" => $_POST['id']]]);
    }

    function RestreindreCompte()
    {
        $modComptes = $this->loadModel("membre");
        $modComptes->update(["donnees" => ["state" => "desactivated"], "conditions" => ["id" => $_POST["id"]]]);
    }

    function ReintegrerCompte()
    {
        $modComptes = $this->loadModel("membre");
        $modComptes->update(["donnees" => ["state" => "activated"], "conditions" => ["id" => $_POST["id"]]]);
    }

    function RestreindreRessource()
    {
        $modRessource = $this->loadModel("Ressources");
        $modRessource->update(["donnees" => ["state" => 'suspended'], "conditions" => ["id" => $_POST["id"]]]);
    }

    function ReintegrerRessource()
    {
        $modRessource = $this->loadModel("Ressources");
        $modRessource->update(["donnees" => ["state" => 'public'], "conditions" => ["id" => $_POST["id"]]]);
    }

    function AjouterNouvelleCategorie()
    {
        $modCategories = $this->loadModel("Categories");
        $modCategories->insertAI(['title', 'descritption',], [$_POST['title'],$_POST['description']]);
    }

    function SupprimerCategorie()
    {
        $modCategories = $this->loadModel("Categories");
        $modCategories->delete(['conditions' => ["id" => $_POST['id']]]);
    }

    function SupprimerRessource()
    {
        $modCategories = $this->loadModel("Ressources");
        $modCategories->delete(['conditions' => ["id" => $_POST['id']]]);
    }

    //Fonction particulière pour mettre à jour le tchat des activités
    function Tchat()
    {
        $d['tchats'] = $this->RecupererTchatActivite($_GET['id_ressource']);
        extract($d);
        require ROOT . DS . 'view' . DS . $this->request->controller . DS . 'Tchat.php';
    }

    function AjouterMsgTchat()
    {
        $modTchat = $this->loadModel("Tchat");
        $modTchat->insertAI(['id_activity', 'id_member', 'text'], [$_POST['id_ressource'],$_POST['id_member'],$_POST['text']]);
    }
}
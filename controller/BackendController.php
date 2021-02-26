<?php
class BackendController extends Controller
{
    private $modFavoris = null;
    private $modRessources = null;
    private $modCategories = null;
    private $modCategoriesRessources = null;
    private $modCommentaires = null;
    private $modMember = null;

    private $enumStateRessource = ['private', 'shared', 'public', 'to_validate', 'validate', 'suspended'];
    
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
        $this->render("tableauDeBord/Tableaudebord");
    }

    function Catalogue()
    {
        //Récupération des ressources
        $this->modRessources = $this->loadModel("Ressources");
        if(!empty($_SESSION))
        {
            $params = ['projections' => 'ressources.*', 'conditions' => 'state in("shared", "public")'];
        } else 
        {
            $params = ['projections' => 'ressources.*', 'conditions' => 'state in("shared", "public")'];
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
                    $d['favoris'] = null;
                    $d['misdecotes'] = null;
                    $d['exploitees'] = null;
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
                $this->render("Ressource");
            } else{
                $this->e404("Cette ressource n'existe pas.");
            }
            
        }
        
        
    }

    function CreationEdition()
    {
        $this->render("CreationEdition");
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
        $d['categories'] = $this->RecupererToutesCategories();
        $this->set($d);
        $this->render("\Admin\Ressources");
    }

    function Messages()
    {
        $this->render("\Admin\Messages");
    }

    function Comptes()
    {
        $this->render("\Admin\Comptes");
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
        $params = ['projections' => 'category.*']; 
        return $this->modCategories->find($params);
    }

    function RecupererToutesRessources()
    {
        //Récupération de toutes les ressources existantes
        $this->modRessources = $this->loadModel("Ressources");
        $params = ['projections' => 'ressources.*']; 
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

    function RestraindreCommentaire()
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

}
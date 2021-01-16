<?php
class BackendController extends Controller
{
    private $modFavoris = null;
    private $modRessources = null;

    function Tableaudebord()
    {
        //Favoris
        $d['favoris'] = $this->DeterminerFavorisMisDeCote('1', 'favory');
        //Mis de Côté
        $d['misdecotes'] = $this->DeterminerFavorisMisDeCote('1', 'aside');
        //Préparation de l'affichage
        $this->set($d);
        $this->render("tableauDeBord/Tableaudebord");
    }

    function Catalogue()
    {
        $this->render("Catalogue");
    }

    function CreationEdition()
    {
        $this->render("CreationEdition");
    }

    function Favoris()
    {
        $d['favoris'] = $this->DeterminerFavorisMisDeCote('1', 'favory');
        $this->set($d);
        $this->render("Favoris");
    }

    function MisDeCote()
    {
        $d['misdecotes'] = $this->DeterminerFavorisMisDeCote('1', 'aside');
        $this->set($d);
        $this->render("MisDeCote");
    }

    function Profil()
    {
        $this->render("Profil");
    }

    function Deconnexion()
    {
        $this->render("Deconnexion");
    }

    function DeterminerFavorisMisDeCote($id_member, $etat)
    {
        //Détemination des favoris ou Mis de Côté
        $this->modFavoris = $this->loadModel("Favoris");
        $params = ['projection' => 'state_ressources.*', 'conditions' => 'id_member = '.$id_member.' and state = "'.$etat.'"'];
        $liensFavoris = $this->modFavoris->find($params);
        $id = " (";
        foreach ($liensFavoris as $liens) {$id .= $liens->id_ressources;}
        $id .= ")";
        //Détermination des ressources associés aux favoris
        $this->modRessources = $this->loadModel("Ressources");
        $params = ['projections' => 'ressources.*', 'conditions' => 'id in' . $id]; 
        return $this->modRessources->find($params);
    }

}
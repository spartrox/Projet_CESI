<?php
class BackendController extends Controller
{
    private $modChamp = null;

    function Tableaudebord()
    {
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
        $this->render("Favoris");
    }

    function Profil()
    {
        $this->render("Profil");
    }

    function Deconnexion()
    {
        $this->render("Deconnexion");
    }

}
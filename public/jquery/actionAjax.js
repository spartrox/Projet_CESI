//Appelé depuis le catalogue
function FavorisMisDeCoteExploitee(id_ressource, id_member, state, idhtlm, action)
{
    //Suppression d'un Favoris ou Mis de côté ou Exploitée
    if (action == "retirer")
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "RetirerFavorisMisDeCoteExploitee", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id_ressource="+id_ressource+"&id_member="+id_member+"&state="+state);
        //Changement de l'icone
        if(state == "exploited")
        {
            //Etat Exploitée
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-check-circle fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources exploitées');
        } else if (state == "aside")
        {
            //Etat Mis de côté
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-bookmark fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources mises de côté');
        } else if (state == "favory")
        {
            //Etat Favoris
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-star fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources favorites');
        }
    }
    //Ajout d'un Favoris ou Mis de côté ou Exploitée
    else if (action == "ajouter") 
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "AjouterFavorisMisDeCoteExploitee", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id_ressource="+id_ressource+"&id_member="+id_member+"&state="+state);
        //Changement de l'icone
        if(state == "exploited")
        {
            //Etat Exploitée
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-check-circle fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources exploitées');
        } else if (state == "aside")
        {
            //Etat Mis de côté
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-bookmark fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources mises de côté');
        } else if (state == "favory")
        {
            //Etat Favoris
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-star fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources favorites');
        }
        
    }
}

//Appelé d'une ressource
function FavorisMisDeCoteExploiteeRessource(id_ressource, id_member, state, idhtlm, action)
{
    //Suppression d'un Favoris ou Mis de côté ou Exploitée
    if (action == "retirer")
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "../RetirerFavorisMisDeCoteExploitee", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id_ressource="+id_ressource+"&id_member="+id_member+"&state="+state);
        //Changement de l'icone
        if(state == "exploited")
        {
            //Etat Exploitée
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-check-circle fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources exploitées');
        } else if (state == "aside")
        {
            //Etat Mis de côté
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-bookmark fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources mises de côté');
        } else if (state == "favory")
        {
            //Etat Favoris
            document.getElementById(idhtlm).setAttribute("class", 'float-right far fa-star fa-lg m-1 state');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'ajouter')");
            document.getElementById(idhtlm).setAttribute("title", 'Ajouter aux ressources favorites');
        }
    } 
    //Ajout d'un Favoris ou Mis de côté ou Exploitée
    else if (action == "ajouter") 
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "../AjouterFavorisMisDeCoteExploitee", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id_ressource="+id_ressource+"&id_member="+id_member+"&state="+state);
        //Changement de l'icone
        if(state == "exploited")
        {
            //Etat Exploitée
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-check-circle fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources exploitées');
        } else if (state == "aside")
        {
            //Etat Mis de côté
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-bookmark fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources mises de côté');
        } else if (state == "favory")
        {
            //Etat Favoris
            document.getElementById(idhtlm).setAttribute("class", 'float-right fas fa-star fa-lg m-1');
            document.getElementById(idhtlm).setAttribute("onclick", "FavorisMisDeCoteExploitee("+id_ressource+", "+id_member+", '"+state+"', '"+idhtlm+"', 'retirer')");
            document.getElementById(idhtlm).setAttribute("title", 'Retirer des ressources favorites');
        }
        
    }
}

function prepareXMLHTTP()
{
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}
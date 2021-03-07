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

//Appelé depuis une ressource
function AjoutCommentaire(first_name, last_name, id_member, id_ressource)
{
    commentaire = document.getElementById('textCommentaire');
    if (commentaire.value != '')
    {
        var d = new Date();
        document.getElementById("tabCommentaires").innerHTML 
        = "<tr><td class='col-5'><em>" + first_name + ' ' + last_name 
        + ' le ' + d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate() 
        + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds() 
        + "</em></td><td>" + commentaire.value + "</td></tr>"
        + document.getElementById("tabCommentaires").innerHTML;
    
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "../AjouterCommentaire", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id_ressource="+id_ressource+"&id_member="+id_member+"&text="+commentaire.value);
        //
        commentaire.value = "";
    }
}

//Appelé depuis une ressource
function RestraindreCommentaire(id_ressource, id_commentaire, idhtlm, btn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "../RestraindreCommentaire", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id_ressource="+id_ressource+"&id_commentary="+id_commentaire);
    //
    document.getElementById(btn).innerHTML = "<span class='fa-stack' style='vertical-align: top;'><i class='far fa-comment fa-stack-2x'></i><i class='fas fa-check fa-stack-1x'></i></span>";
    document.getElementById(btn).setAttribute("class", "btn btn-success");
    document.getElementById(btn).setAttribute("onclick", "ReintegrerCommentaire("+id_ressource+", "+id_commentaire+", '"+idhtlm+"', 'btn"+idhtlm+"')");
    document.getElementById(btn).setAttribute("title", "Valider le commentaire");
}

//Appelé depuis une ressource
function ReintegrerCommentaire(id_ressource, id_commentaire, idhtlm, btn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "../ReintegrerCommentaire", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id_ressource="+id_ressource+"&id_commentary="+id_commentaire);
    //
    document.getElementById(btn).innerHTML = "<i class='fas fa-flag fa-2x'></i>";
    document.getElementById(btn).setAttribute("class", "btn btn-warning");
    document.getElementById(btn).setAttribute("onclick", "RestraindreCommentaire("+id_ressource+", "+id_commentaire+" , '"+idhtlm+"', 'btn"+idhtlm+"')");
    document.getElementById(btn).setAttribute("title", "Restraindre le commentaire");
}

function ActiverModificationCategories(id_category, idHtlmTitre, idHtlmDescription, idBtn)
{
    //Activation du titre
    document.getElementById(idHtlmTitre).removeAttribute('readonly');
    document.getElementById(idHtlmTitre).setAttribute("class", "form-control");
    //Activation de la description
    document.getElementById(idHtlmDescription).removeAttribute('readonly');
    document.getElementById(idHtlmDescription).setAttribute("class", "form-control");
    //Changement du bouton
    document.getElementById(idBtn).innerHTML = "<i class='fas fa-check'></i>";
    document.getElementById(idBtn).setAttribute("class", "btn btn-outline-success btn-sm");
    document.getElementById(idBtn).setAttribute("onclick", "ModifierCategories("+id_category+",'"+idHtlmTitre+"','"+ idHtlmDescription+"','"+ idBtn +"')");
    document.getElementById(idBtn).setAttribute("title", "Valider");
}

function ActiverModificationRessources(id_category, idHtlmTitre, idHtlmDescription, idBtn)
{
    //Activation du titre
    document.getElementById(idHtlmTitre).removeAttribute('readonly');
    document.getElementById(idHtlmTitre).setAttribute("class", "form-control");
    //Activation de la description
    document.getElementById(idHtlmDescription).removeAttribute('readonly');
    document.getElementById(idHtlmDescription).setAttribute("class", "form-control");
    //Changement du bouton
    document.getElementById(idBtn).innerHTML = "<i class='fas fa-check'></i>";
    document.getElementById(idBtn).setAttribute("class", "btn btn-outline-success btn-sm");
    document.getElementById(idBtn).setAttribute("onclick", "ModifierRessources("+id_category+",'"+idHtlmTitre+"','"+ idHtlmDescription+"','"+ idBtn +"')");
    document.getElementById(idBtn).setAttribute("title", "Valider");
}

function ModifierCategories(id_category, idHtlmTitre, idHtlmDescription, idBtn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "ModifierCategorie", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    titre = document.getElementById(idHtlmTitre).value;
    description = document.getElementById(idHtlmDescription).value;
    xmlhttp.send("id="+id_category+"&title="+titre+"&description="+description);
    //Activation du titre
    document.getElementById(idHtlmTitre).setAttribute('readonly', '');
    document.getElementById(idHtlmTitre).setAttribute("class", "form-control-plaintext");
    //Activation de la description
    document.getElementById(idHtlmDescription).setAttribute('readonly', '');
    document.getElementById(idHtlmDescription).setAttribute("class", "form-control-plaintext");
    //Changement du bouton
    document.getElementById(idBtn).innerHTML = "<i class='fas fa-pencil-alt'></i>";
    document.getElementById(idBtn).setAttribute("class", "btn btn-outline-primary btn-sm");
    document.getElementById(idBtn).setAttribute("onclick", "ActiverModificationCategories("+id_category+",'"+idHtlmTitre+"','"+ idHtlmDescription+"','"+ idBtn +"')");
    document.getElementById(idBtn).setAttribute("title", "Modifier");
}

function ModifierRessources(id_category, idHtlmTitre, idHtlmDescription, idBtn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "ModifierRessource", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    titre = document.getElementById(idHtlmTitre).value;
    description = document.getElementById(idHtlmDescription).value;
    xmlhttp.send("id="+id_category+"&title="+titre+"&description="+description);
    //Désactivation du titre
    document.getElementById(idHtlmTitre).setAttribute('readonly', '');
    document.getElementById(idHtlmTitre).setAttribute("class", "form-control-plaintext");
    //Désactivation de la description
    document.getElementById(idHtlmDescription).setAttribute('readonly', '');
    document.getElementById(idHtlmDescription).setAttribute("class", "form-control-plaintext");
    //Changement du bouton
    document.getElementById(idBtn).innerHTML = "<i class='fas fa-pencil-alt'></i>";
    document.getElementById(idBtn).setAttribute("class", "btn btn-outline-primary btn-sm");
    document.getElementById(idBtn).setAttribute("onclick", "ActiverModificationCategories("+id_category+",'"+idHtlmTitre+"','"+ idHtlmDescription+"','"+ idBtn +"')");
    document.getElementById(idBtn).setAttribute("title", "Modifier");
}

function AjouterCategorie(idTableauCategories, idbtnAjout)
{
    document.getElementById(idbtnAjout).setAttribute('onclick', '');
    document.getElementById(idbtnAjout).setAttribute('class', 'text-secondary float-right fas fa-plus-circle fa-2x fa-lg m-1');
    var onclick = 'EnregistrerNouvelleCategorie("titleNew", "descritptionNew", "btnValider", "'+idbtnAjout+'")';
    document.getElementById(idTableauCategories).innerHTML = "<tr id='CategorieNew'><th scope='row'><input id='titleNew' class='form-control' value='' placeholder='Titre de la catégorie'></th>"
    + "<td><textarea  id='descritptionNew' class='form-control' placeholder='Description de la catégorie'></textarea></td>"
    + "<td>"
    + "<a id='btnValider' href='#' class='btn btn-outline-success btn-sm' title='Valider' onclick='"+onclick+"'><i class='fas fa-check' aria-hidden='true'></i></a>"
    + " <a href='#' class='btn btn-outline-danger btn-sm' title='Annuler' onclick='AnnulerAjoutCategorie()'><i class='fas fa-times' aria-hidden='true'></i></a>"
    + "</td></tr>"
    + document.getElementById(idTableauCategories).innerHTML;
}

function AnnulerAjoutCategorie()
{
    if (confirm("Voulez vous annuler la création de cette nouvelle catégorie ?")){
        window.location.reload();
    }
}

function EnregistrerNouvelleCategorie(idHtlmTitre, idHtlmDescription, idBtn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "AjouterNouvelleRessource", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    titre = document.getElementById(idHtlmTitre).value;
    description = document.getElementById(idHtlmDescription).value;
    xmlhttp.send("title="+titre+"&description="+description);
    //Rechargement de la page
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.reload();
        }
    }
}

function SupprimerCategorie(id_category, idhtmlligne)
{
    if (confirm("Voulez vous vraiment supprimer cette catégorie ?\nCela affectera toutes les ressources liés à cette catégorie !"))
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "SupprimerRessource", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id_category);
        //Disparition de la ligne
        document.getElementById(idhtmlligne).style.display = "none"; 
    }
    
}

function SupprimerRessource(id, idhtmlligne)
{
    if (confirm("Voulez vous vraiment supprimer cette ressource ?\nCela affectera tout les commentaires liés à cette ressource !"))
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "SupprimerRessource", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
        //Disparition de la ligne
        document.getElementById(idhtmlligne).style.display = "none"; 
    }
    
}

function RestreindreRessource(id, idhtmlbtn)
{
    if (confirm("Voulez vous vraiment suspendre cette ressource ?"))
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "RestreindreRessource", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
        //Changement bouton
        document.getElementById(idhtmlbtn).innerHTML = "<i class='fas fa-user-check'></i>";
        document.getElementById(idhtmlbtn).setAttribute("class", "btn btn-outline-success btn-sm col-auto");
        document.getElementById(idhtmlbtn).setAttribute("onclick", "ReintegrerRessource("+id+", 'btn"+id+"')");
        document.getElementById(idhtmlbtn).setAttribute("title", "Réactivation");
    }
}

function ReintegrerRessource(id, idhtmlbtn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "ReintegrerRessource", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);
    //Changement bouton
    document.getElementById(idhtmlbtn).innerHTML = "<i class='fas fa-user-slash'></i>";
    document.getElementById(idhtmlbtn).setAttribute("class", "btn btn-outline-danger btn-sm col-auto");
    document.getElementById(idhtmlbtn).setAttribute("onclick", "RestreindreRessource("+id+", 'btn"+id+"')");
    document.getElementById(idhtmlbtn).setAttribute("title", "Désactivation");

}


function RestreindreCompte(id_member, idhtmlbtn)
{
    if (confirm("Voulez vous vraiment désactiver ce compte ?"))
    {
        //Préparation de la requète
        xmlhttp = prepareXMLHTTP();
        xmlhttp.open("POST", "RestreindreCompte", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id_member);
        //Changement bouton
        document.getElementById(idhtmlbtn).innerHTML = "<i class='fas fa-user-check'></i>";
        document.getElementById(idhtmlbtn).setAttribute("class", "btn btn-outline-success btn-sm col-auto");
        document.getElementById(idhtmlbtn).setAttribute("onclick", "ReintegrerCompte("+id_member+", 'btn"+id_member+"')");
        document.getElementById(idhtmlbtn).setAttribute("title", "Réactivation");
    }
}

function ReintegrerCompte(id_member, idhtmlbtn)
{
    //Préparation de la requète
    xmlhttp = prepareXMLHTTP();
    xmlhttp.open("POST", "ReintegrerCompte", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+id_member);
    //Changement bouton
    document.getElementById(idhtmlbtn).innerHTML = "<i class='fas fa-user-slash'></i>";
    document.getElementById(idhtmlbtn).setAttribute("class", "btn btn-outline-danger btn-sm col-auto");
    document.getElementById(idhtmlbtn).setAttribute("onclick", "RestreindreCompte("+id_member+", 'btn"+id_member+"')");
    document.getElementById(idhtmlbtn).setAttribute("title", "Désactivation");

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
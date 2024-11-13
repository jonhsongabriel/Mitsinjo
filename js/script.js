// Tableau pour stocker les contacts
var contacts = [];

// Fonction pour ajouter un contact au tableau
function ajouterContact(nom, prenom, adresse, telephone, email, commentaire) {
    // Créer un objet contact
    var contact = {
        nom: nom,
        prenom: prenom,
        adresse: adresse,
        telephone: telephone,
        email: email,
        commentaire: commentaire
    };

    // Ajouter le contact au tableau
    contacts.push(contact);

    // Mettre à jour l'affichage des contacts
    afficherContacts();
}

// Fonction pour afficher les contacts dans la page
function afficherContacts() {
    // Vérifier s'il existe un élément pour afficher les contacts
    var listeContactsDiv = document.getElementById("liste-contacts");
    if (!listeContactsDiv) {
        return;
    }

    var html = "<ul>";

    // Parcourir chaque contact dans le tableau
    for (var i = 0; i < contacts.length; i++) {
        html += "<li>" + contacts[i].nom + " " + contacts[i].prenom + " - " + contacts[i].adresse +" - " + telephone[i]+" - " + contacts[i].email +" - " + contacts[i].commentaire + "</li>";
    }

    html += "</ul>";

    // Ajouter le HTML au contenu de la page
    listeContactsDiv.innerHTML = html;
}

// Fonction pour récupérer les données du formulaire et les ajouter comme contact
function soumettreFormulaire() {
    // Récupérer les valeurs du formulaire
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var adresse = document.getElementById("adresse").value;
    var telephone = document.getElementById("telephone").value;
    var email = document.getElementById("email").value;
    var commentaire = document.getElementById("comment").value;

    // Ajouter le contact
    ajouterContact(nom, prenom, adresse, telephone, email, commentaire);

    // Réinitialiser le formulaire
    document.getElementById("formulaire").reset();
}

// Éviter le rechargement de la page lors de la soumission du formulaire
document.getElementById("formulaire").addEventListener("submit", function(event) {
    event.preventDefault();
    soumettreFormulaire();
});

// Appeler la fonction pour afficher les contacts lors du chargement de la page
window.onload = function() {
    afficherContacts();
};

consolea
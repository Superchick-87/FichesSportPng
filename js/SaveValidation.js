/**
     * * Fonctions pour gérer la sauvegarde et la génération des datas
     * via deux boutons 'Save' et 'Valider' selon l'état de remplissage
     * du formlaire avec un renvoi sur une page distinct
     * 'Save' -> 'creatDataSave.php'
     * 'Valider' -> 'verifPresentation.php' 
     */

/**
 * Fonction qui supprime l'attribut 'required'
 * pour 'Save', tous les champs ne peuvent pas être remplis
 */
function supprimerTousRequired() {
    // Récupérer tous les champs de saisie requis dans le formulaire
    var inputs = document.querySelectorAll('#Formulaire input[required]');
    var textarea = document.querySelectorAll('#Formulaire textarea[required]');
    // Parcourir tous les champs de saisie et supprimer l'attribut required
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute('required');
    }
    for (var i = 0; i < textarea.length; i++) {
        textarea[i].removeAttribute('required');
    }
};

/**
 * Fonction qui renvoie sur la page 'creatDataSave.php'
 * les datas sont générées en partie
 * par défaut 'verifPresentation.php' renseigné dans l'attribut 'action'
 * du tag 'form'
 */
function changerActionSave() {
    // Récupérer le formulaire par son ID
    var myFormc = document.querySelector("form");
    // Changer la valeur de l'attribut action
    myFormc.action = "creatDataSave.php";
};
/**
 * Fonction qui remet les menus choix des équipes sur 'Choix' en cas de retour 
 * via la flèche back du navigateur par l'utilisateur après avoir 'SAVE' ou 'VALIDER' 
 * S'inplémente dans la fonction 'verifierChamps()'
 */
function razMenuEquipes() {
    document.getElementById('choix1').value = 'Choix';
    document.getElementById('choix2').value = 'Choix';
}

/**
 * Fonction qui affiche ou masque les boutons
 * selon l'état de remplissage du formulaire
 */
function verifierChamps() {
    // Récupérer tous les champs de saisie requis dans le formulaire
    var inputs = document.querySelectorAll('#Formulaire input[required]');
    var textarea = document.querySelectorAll('#Formulaire textarea[required]');
    // Vérifier si tous les champs requis ont une valeur
    var tousNonVides = true;
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value === '') {
            tousNonVides = false;
            break; // S'il y en a au moins un vide, on peut arrêter la boucle
        }
    }
    for (var i = 0; i < textarea.length; i++) {
        if (textarea[i].value.trim() === '') {
            tousNonVides = false;
            break; // S'il y en a au moins un vide, on peut arrêter la boucle
        }
    }

    // Afficher ou masquer le bouton en fonction du résultat
    var boutonContainer = document.getElementById('boutonContainer');
    if (tousNonVides) {
        // Tous les champs requis sont non vides, afficher le bouton
        boutonContainer.innerHTML = '<input id="save" name="SAVE" type="submit" onclick="supprimerTousRequired(); razMenuEquipes();" value="SAVE"/>' +
            '<input id="validezback" name="VALIDEZ" type="submit" onclick="razMenuEquipes();" value="VALIDEZ"/>';
    } else {
        // Au moins un champ requis est vide, masquer le bouton
        boutonContainer.innerHTML = '<input id="save" name="SAVE" type="submit" onclick="supprimerTousRequired(); razMenuEquipes();" value="SAVE"/>';
    }
};





   // window.onload = function() {menuDeroulant()};
    // Menu déroulant : choix des équipes + afficher / masquer option tactique foot
    function menuDeroulantBis() {
        var discipline = document.getElementById('discipline').value;
        console.log(camelize(discipline))
        var tactiqueA = document.querySelector("#schemaTac1"); 
        console.log(tactiqueA)
        var tactiqueB = document.querySelector("#schemaTac2"); 
        console.log(tactiqueB)

        var MenuA = document.getElementById('choix1').value;
        console.log(camelize(MenuA))
        var MenuB = document.getElementById('choix2').value;
        console.log(camelize(MenuB))


            if (discipline == 'Foot') {
                tactiqueA.style.display = "block";
                tactiqueA.setAttribute("required", "");
                tactiqueB.style.display = "block";
                tactiqueB.setAttribute("required", "");
            }
            else{
                tactiqueA.style.display = "none";
                tactiqueB.style.display = "none";
            }

        }

function menuDeroulant() {
        var MenuA = document.getElementById('choix1').value;
        console.log(camelize(MenuA))
        var MenuB = document.getElementById('choix2').value;
        console.log(camelize(MenuB))
        var discipline = document.getElementById('discipline').value;

        var ResultatA = document.getElementById('M1ResultatRussie');
        var ResultatB = document.getElementById('M2ResultatRussie');
        
        var Formulaire = document.getElementById('Formulaire');
        
        var AlertSel = document.getElementById('AlertSel');
        var AlertSelA = "Sélectionner deux clubs différents";
        var AlertSelB = "Sélectionner un autre club";

        var InputEquipeA = document.getElementById('equipeA');
        var InputEquipeB = document.getElementById('equipeB');


        // if (MenuA == MenuA && MenuB !== 'Choix') {
            if (MenuA == MenuA) {
            ResultatA.style.display = "block";
            ResultatA.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuA)+".png");
            InputEquipeA.setAttribute("value", MenuA);

            // ResultatB.style.display = "block";
            // ResultatB.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuB)+".png");
            // InputEquipeB.setAttribute("value", MenuB);
        }
        if (MenuA === 'Choix'){
            ResultatA.style.display = "none";
        }
        if (MenuB == MenuB) {
            ResultatB.style.display = "block";
            ResultatB.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuB)+".png");
            InputEquipeB.setAttribute("value", MenuB);
        }
        if (MenuB !== MenuA){
            Formulaire.style.display = "block";
            AlertSel.style.display = "none";
        }
        if (MenuB === 'Choix'){
            ResultatB.style.display = "none";
            Formulaire.style.display = "none";
            AlertSel.style.display = "block";
            AlertSel.innerHTML = AlertSelB;
        }
        if (MenuA === 'Choix'){
            ResultatA.style.display = "none";
            Formulaire.style.display = "none";
            AlertSel.style.display = "block";
            AlertSel.innerHTML = AlertSelB;
        }
        if (MenuB === MenuA){
            Formulaire.style.display = "none";
            AlertSel.style.display = "block";
            AlertSel.innerHTML = AlertSelA;
        }
       
     }

     function menuDeroulant_M() {
        var MenuA = document.getElementById('choix1').value;
        console.log(camelize(MenuA))
        var MenuB = document.getElementById('choix2').value;
        console.log(camelize(MenuB))
        var discipline = document.getElementById('discipline').value;

        var ResultatA = document.getElementById('M1ResultatRussie');
        var ResultatB = document.getElementById('M2ResultatRussie');
        
        var Formulaire = document.getElementById('Formulaire');
        
        var AlertSel = document.getElementById('AlertSel');
        var AlertSelA = "Sélectionner deux clubs différents";
        var AlertSelB = "Sélectionner un autre club";

        var InputEquipeA = document.getElementById('equipeA');
        var InputEquipeB = document.getElementById('equipeB');


        // if (MenuA == MenuA && MenuB !== MenuA) {
            // if (MenuA == MenuA) {
            ResultatA.style.display = "block";
            ResultatA.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuA)+".png");
            InputEquipeA.setAttribute("value", MenuA);

            ResultatB.style.display = "block";
            ResultatB.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuB)+".png");
            InputEquipeB.setAttribute("value", MenuB);
        // }
        if (MenuA === 'Choix'){
            ResultatA.style.display = "block";
            ResultatA.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuA)+".png");
        }
        if (MenuB == MenuB) {
            ResultatB.style.display = "block";
            ResultatB.setAttribute("src", "css/images/clubs/"+discipline+"/"+camelize(MenuB)+".png");
            InputEquipeB.setAttribute("value", MenuB);
        }
        // if (MenuB !== MenuA){
        //     Formulaire.style.display = "block";
        //     AlertSel.style.display = "none";

        // }
        // if (MenuB === 'Choix'){
        //     ResultatB.style.display = "block";
        //     Formulaire.style.display = "none";
        //     AlertSel.style.display = "block";
        //     AlertSel.innerHTML = AlertSelB;
        // }
        // if (MenuA === 'Choix'){
        //     ResultatA.style.display = "block";
        //     Formulaire.style.display = "none";
        //     AlertSel.style.display = "block";
        //     AlertSel.innerHTML = AlertSelB;
        // }
        // if (MenuB === MenuA){
        //     Formulaire.style.display = "none";
        //     AlertSel.style.display = "block";
        //     AlertSel.innerHTML = AlertSelA;
        // }
       
     }
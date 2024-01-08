    function affichageSchemaFoot() {
        var Tactique1 = document.getElementById('schemaTacSel1').value;
        console.log(Tactique1)
        
        var Tactique2 = document.getElementById('schemaTacSel2').value;
        console.log(Tactique2)

        var Tactique1Visu = document.getElementById('schemaTacSel1Visu');
        console.log(Tactique1Visu)
        var Tactique2Visu = document.getElementById('schemaTacSel2Visu');
        console.log(Tactique2Visu)

        var InputschemaTactiqueA = document.getElementById('schemaTactiqueA');
        var InputschemaTactiqueB = document.getElementById('schemaTactiqueB');


        if (Tactique1 == Tactique1) {
            Tactique1Visu.style.display = "block";
            Tactique1Visu.setAttribute("src", "css/images/tactique/"+Tactique1+".svg");
            InputschemaTactiqueA.setAttribute("value", Tactique1);
        }
        if (Tactique2 == Tactique2) {
            Tactique2Visu.style.display = "block";
            Tactique2Visu.setAttribute("src", "css/images/tactique/"+Tactique2+"2.svg");
            InputschemaTactiqueB.setAttribute("value", Tactique2);
        }
        if (Tactique1 === ''){
            Tactique1Visu.style.display = "none";
            Tactique1Visu.setAttribute("src", "");
       }
        if (Tactique2 === ''){
            Tactique2Visu.style.display = "none";
            Tactique2Visu.setAttribute("src", "");
        }
     }
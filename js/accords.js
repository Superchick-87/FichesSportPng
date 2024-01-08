function accords (){
var sport = document.getElementById('sport').value;
    console.log(sport)
var entraineursG = document.getElementById('entraineursG')
var entraineursD = document.getElementById('entraineursD')
var entraineursGM = document.getElementById('entraineursGM')
var entraineursDM = document.getElementById('entraineursDM')

var butG = document.getElementById('butG')
var butD = document.getElementById('butD')
var butGM = document.getElementById('butGM')
var butDM = document.getElementById('butDM')

	console.log(entraineursG)        
       
        if (sport == 'Foot') {
        	entraineursG.innerHTML = 'Entraîneur';
        	entraineursD.innerHTML = 'Entraîneur';
            entraineursGM.innerHTML = 'Entraîneur';
            entraineursDM.innerHTML = 'Entraîneur';

            butG.innerHTML = 'Buteur(s)';
            butD.innerHTML = 'Buteur(s)';
            butGM.innerHTML = 'Buteur(s)';
            butDM.innerHTML = 'Buteur(s)';
        };
        if (sport == 'Rugby'){
        	entraineursG.innerHTML = 'Entraîneurs';
        	entraineursD.innerHTML = 'Entraîneurs';
            entraineursGM.innerHTML = 'Entraîneurs';
            entraineursDM.innerHTML = 'Entraîneurs';

            butG.innerHTML = 'Point(s)';
            butD.innerHTML = 'Point(s)';
            // butGM.innerHTML = 'Marqueurs / Buteur(s)';
            // butDM.innerHTML = 'Marqueurs / Buteur(s)';
        };
        if (sport == 'Basket'){
            entraineursG.innerHTML = 'Entraîneur';
            entraineursD.innerHTML = 'Entraîneur';
            entraineursGM.innerHTML = 'Entraîneur';
            entraineursDM.innerHTML = 'Entraîneur';

            butG.innerHTML = 'Point(s)';
            butD.innerHTML = 'Point(s)';
            // butGM.innerHTML = 'Marqueurs / Buteur(s)';
            // butDM.innerHTML = 'Marqueurs / Buteur(s)';
        };
}

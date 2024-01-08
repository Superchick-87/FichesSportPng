/**
    * Sert à effacer le champ N° quand le sport est "rugby"
    */	
        
	function displayChampNum(){
    	var discipline = document.getElementById('discipline').value;
		var importants = document.querySelectorAll('.champsNumeros');
		var champsNumerosInp = document.querySelectorAll('.champsNumerosInp');
		
		if ((discipline === 'Foot')|| (discipline === 'Basket')){
			for (var i = 0; i < importants.length; i++) {
	  			importants[i].style.display = 'block';
	  			champsNumerosInp[i].setAttribute("required", "");

			}
		}
		else{
                for (var i = 0; i < importants.length; i++) {
	  			importants[i].style.display = 'none';
				}
		}
	}
/*===============================================================
=       Si sport="Basket" -> Masque champ "météo"               =
=		| "état du terrain" | "score à la mi-temps"             =
================================================================*/
	function displayScoreBasket(){	
		var discipline = document.getElementById('discipline').value;
		var socreQt = document.querySelectorAll('.b');
		var socreMt = document.querySelectorAll('.rf');
		if (discipline === 'Basket'){
			document.getElementById('Meteo').value = "meteo";
			document.getElementById('Terrain').value = "terrain";
			document.getElementById('meteoTerrain').style.display = "none";
			document.getElementById('scoreMt').style.display = "none";
			
			for (var i = 0; i < socreMt.length; i++) {
	  			socreMt[i].setAttribute("disabled", "");
	  			}
		}
		if ((discipline === 'Foot')|| (discipline === 'Rugby')){
			document.getElementById('scoreMt').style.display = "block";
			document.getElementById('scoreQt').style.display = "none";
			for (var i = 0; i < socreQt.length; i++) {
	  			socreQt[i].setAttribute("disabled", "");
	  			}
		}
	}
// /*=====  End of Affichage si texte existe dans le front  ======*/	
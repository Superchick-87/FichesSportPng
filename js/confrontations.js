
	/*----------  Graph fonction - Sert à effacer la portion à 0% dans le graph  ----------*/
	/**
	 * on récupère le % du witdh 
	 * si 0% on display none la portion 
	 *
	 */
	function effacePortion(){
		var VDomMob = document.getElementById("VictoiresDomMob");
		var NMob = document.getElementById("NulMob");
		var VExtMob = document.getElementById("VictoiresExtMob");
		if (VDomMob.style.width == "0%") {
			VDomMob.style.display = "none";
		}
		if (NMob.style.width == "0%") {
			NMob.style.display = "none";
		}
		if (VExtMob.style.width == "0%") {
			VExtMob.style.display = "none";
		};
		
		var VDomDesk = document.getElementById("VictoiresDomDesk");
		var NDesk = document.getElementById("NulDesk");
		var VExtDesk = document.getElementById("VictoiresExtDesk");
		if (VDomDesk.style.width == "0%") {
			VDomDesk.style.display = "none";
		}
		if (NDesk.style.width == "0%") {
			NDesk.style.display = "none";
		}
		if (VExtDesk.style.width == "0%") {
			VExtDesk.style.display = "none";
		};
	}

	function messageConfontation(){
		var nbreConfrontations = document.getElementById("confrontations");
		var titreConfrontationsDesk = document.getElementById("titreConfrontationsDesk");
		
		var ecussonsCenter = document.getElementsByClassName('BlocConfrontations');
		var mask = document.getElementsByClassName('mask');

		console.log(ecussonsCenter);
		console.log(nbreConfrontations.value);
			
		if (nbreConfrontations.value == 0) {
			for (let i = 0; i < ecussonsCenter.length; i++) {
				ecussonsCenter[i].style.justifyContent = "center";
			}
			for (let i = 0; i < mask.length; i++) {
				mask[i].style.display = "none";
			}
		}	

	}

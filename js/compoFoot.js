function mobile(data){
	var dataCompo = document.getElementById("fichierCompo").value
	console.log (dataCompo)
	d3.csv(dataCompo)
		.then(data => parseData(data))
		
		function parseData(data){
		
		var equipeA = d3.select('#compoMobile')
				.selectAll('.temp2')
				.data(data)
				.enter()
				.append('g')
				// .style('cursor', 'pointer')
				// .on('mouseover', d => {
			 //      div
			 //        .transition()
			 //        .duration(200)
			 //        .style('opacity', 1);
			 //      div
			 //        .html('<table class="tableF">'
				// 			+'<tr>'
				// 				+'<th colspan="8" class="PlayernameToolTipFoot">'
				// 					+'<img id="pays" class="nationalite" src="css/images/drapeaux/'+d.PaysIso+'.svg"><span>'+d.Prenom+' '+d.Nom+'</span>'
				// 				+'</th>'
				// 			+'</tr>'
				// 			+'<tr>'
				// 				+'<td class="photo"><img id="image" class="photo" src=""></td>'
				// 				+'<td class="blanc top col1 espaceDroite">'
				// 					+'<div class="flex">'
				// 						+'<p class="libele gris">Poste :&nbsp;</p>'
				// 						+'<p id="poste" class="blanc">'+d.Poste+'</p>'
				// 					+'</div>'
				// 						+'<div class="flex decalageHaut3">'
				// 							// +'<img class="picto" src="css/images/maillot.svg">'
				// 							+'<p class="libele gris">Joué(s) :&nbsp;</p>'
				// 							+'<p id="titulaire" class="blanc">'+d.Titulaire+'</p>'
				// 						+'</div>'
				// 						+'<div class="flex decalageHaut3">'
				// 							// +'<img class="picto" src="css/images/time.svg">'
				// 							+'<p class="libele gris">Tps de jeu :&nbsp;</p>'
				// 							+'<p class="blanc">&nbsp;'+d.TempsJeu+' min</p>'
				// 						+'</div>'
				// 						+'<div class="flex decalageHaut3">'
				// 							// +'<img class="picto" src="css/images/sifflet.svg">'
				// 							+'<p class="libele gris">Faute(s) commise(s) :&nbsp;</p>'
				// 							+'<p class="blanc">'+d.FautesCommises+'</p>'
				// 						+'</div>'
				// 						+'<div class="flex decalageHaut3">'
				// 							+'<p class="libele gris ">Faute(s) subie(s) :&nbsp;</p>'
				// 							+'<p class="blanc">'+d.FautesSubies+'</p>'
				// 						+'</div>'
				// 				+'</td>'
				// 				+'<td class="gris top col2 traitVert espaceGauche">'
				// 					+'<div>'
				// 						+'<p style="text-align; text-align: center;" class="gris libele decalageHaut">Carton(s)</p>'
				// 						+'<div class="justifCartons">'
				// 							+'<span class="gris libele chiffreGros carton jaune">'+d.Jaune+'</span>'	
				// 							+'<span class="gris libele chiffreGros carton rouge">'+d.Rouge+'</span>'
				// 						+'</div>'
				// 					+'</div>'
				// 					+'<div style="text-align: center;" class="gris libele">'
				// 							+'<p id="but" class="gris libele"></p>'
				// 							+'<div class="chiffreGros but blanc">'+d.But+'</div>'
				// 					+'</div>'
				// 				+'</td>'
				// 			+'</tr>'
				// 		+'</table>')

			 //        .style('left', '0%')
			 //        .style('top', d3.event.pageY + 20 + 'px')
			 //        // .style('left', d3.event.pageX + 'px')
			       

			 //       	var str = document.getElementById("titulaire").innerHTML;
				//   	console.log(str.replace("dont", "/"))
				//   	document.getElementById("titulaire").innerHTML = str.replace("dont", "/");

				//   	var poste = document.getElementById("poste").innerHTML;
			 //     	console.log(poste)
			 //       	if ((poste == 'Gardien')) {
			 //       		document.getElementById("but").innerHTML = 'But(s) encaissé(s)';
			 //       	}
			 //       	else {
			 //       		document.getElementById("but").innerHTML='But(s) marqué(s)';
			 //       	}
					
				// 	/// CHANGEMENT IMAGE PAR DEFAUT ///
				// 	// on crée l'objet
				// 		var image = new Image();
				// 	// une fois le chargement terminé
				// 		image.onload = function()
				// 		{
				// 		   console.log("Chargement fini");
				// 		   document.getElementById("image").src = image.src;
				// 		}
				// 	// cas d'erreur
				// 		image.onerror =
				// 		image.onabort = function()
				// 		{
				// 		   console.log("Erreur lors du chargement");
				// 		   document.getElementById("image").src = "css/images/Vide.jpg"
				// 		} 
				// 		// on modifie l'adresse de l'objet "image", ce qui lance le chargement
				// 		image.src = "css/images/joueurs/foot/"+camelize(d.Prenom)+camelize(d.Nom)+".jpg";
				// 		console.log(image.src)

				// 	/// CHANGEMENT IMAGE PAR DEFAUT ///
				// 	// on crée l'objet
				// 		var pays = new Image();
				// 	// une fois le chargement terminé
				// 		pays.onload = function()
				// 		{
				// 		   console.log("Chargement fini");
				// 		   document.getElementById("pays").src = pays.src;
				// 		}
				// 	// cas d'erreur
				// 		pays.onerror =
				// 		pays.onabort = function()
				// 		{
				// 		   console.log("Erreur lors du chargement");
				// 		   document.getElementById("pays").src = "css/images/drapeaux/VideNation.svg"
				// 		} 
				// 		// on modifie l'adresse de l'objet "image", ce qui lance le chargement
				// 		pays.src = "css/images/drapeaux/"+d.PaysIso+".svg";
				// 		console.log(pays.src)
			 //    })

			 //    .on('mouseout', () => {
			 //      div
			 //        .transition()
			 //        .duration(500)
			 //        .style('opacity', 0);
			 //    });
				
		// CORDONNEES X Y DU GROUPE A
				equipeA.style('transform',(d,i) => ('translate('+(0+(5)+parseInt(d.xm)))+'px,0px)')
				
				equipeA.append('circle')
				.attr('r',d=>d.picto*8+'px')
				// .attr('cx',(d,i) => d.x)
				// .attr('cx',d=>d.xd)
				.attr('cy',d=>d.ym)
				.attr('class',d=>camelize(d.Club))

				equipeA.append('text')
				.text(d=>coupeText(d.Nom)+' '+d.Cap)
				.attr('y',d=>(22+parseInt(d.ym)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.Numero)
				.attr('y',d=>(0+parseInt(d.ym)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				// .attr('class','playernumber')
				.attr('class',d=>camelize(d.Club)+'Number PlayerNumber')


	// TOOL TIPS
	// 	const div = d3
	// 		.select('body')
	// 		.append('div')
	// 		.attr('class', 'tooltipMobile')
	// 		.style('opacity', 0);
			
	}
}



function desktop(){
	var dataCompo = document.getElementById("fichierCompo").value
	console.log (dataCompo)
	d3.csv(dataCompo)
		.then(data => parseData(data))
		
	function parseData(data){
		console.log(data)

		var equipeA = d3.select('#compoDesktop')
				.selectAll('.temp2')
				.data(data)
				.enter()
				.append('g')
				// .style('cursor', 'pointer')
				// .on('mouseover', d => {
			 //      div
			 //        .transition()
			 //        .duration(200)
			 //        .style('opacity', 1);
			 //      div
				//        .html('<table class="tableF">'
				// 		+'<tr>'
				// 			+'<th colspan="8" class="PlayernameToolTipFoot"><img id="pays" class="nationalite" src=""><span>'+d.Prenom+' '+d.Nom+'</span></th>'
				// 			+'<td class="separation"></td>'
				// 		+'</tr>'
				// 		+'<tr>'
				// 			+'<td rowspan="9" class="photo"><img id="image" class="photo" src=""></td>'
				// 			+'<td rowspan="8" class="blanc top col1 espaceDroite">'
				// 				+'<p class="decalageHaut">'+d.Age+'</p>'
				// 				+'<p class="chiffre maillotFoot"><span>'+d.Numero+'</span></p>'
				// 				+'<p id="poste">'+d.Poste+'</p>'
				// 			+'</td>'
				// 			+'<td rowspan="8" class="gris top col2 traitVert espaceGauche">'
				// 				+'<p class="decalageHaut">'
				// 					+'<span>'
				// 						+'<img class="picto decalageHaut2" src="css/images/maillot.svg">Joué(s) :'
				// 					+'</span>'
				// 					+'<span id="titulaire" class="blanc">&nbsp;'+d.Titulaire+'</span>'
				// 				+'</p>'
				// 				+'<p>'
				// 					+'<span>'
				// 						+'<img class="picto decalageHaut" src="css/images/time.svg">Tps de jeu :' 
				// 					+'</span>'
				// 					+'<span class="blanc">&nbsp;'+d.TempsJeu+' min'
				// 					+'</span>'
				// 				+'<p>'
				// 					+'<span>'
				// 						+'<img class="picto decalageHaut3" src="css/images/sifflet.svg">Faute(s) commise(s) :'
				// 					+'</span>'
				// 					+'<span class="blanc">'
				// 					+'</span>'
				// 				+'</p>'
				// 				+'<div class="espaceGauche2 flex">'
				// 					+'<p class="barre" style="width:'+d.FautesCommises+'%;">' 
				// 					+'</p>'
				// 					+'<p class="blanc">&nbsp;'+d.FautesCommises+''
				// 					+'</p>'
				// 				+'</div>'
				// 				+'<p>'
				// 					+'<span class="espaceGauche2">'
				// 						+'Faute(s) subie(s) :'
				// 					+'</span>'
				// 				+'</p>'
				// 				+'<div class="espaceGauche2 flex">'
				// 					+'<p class="barre" style="width:'+d.FautesSubies+'%;">' 
				// 					+'</p>'
				// 					+'<p class="blanc">&nbsp;'+d.FautesSubies+''
				// 					+'</p>'
				// 				+'</div>'
				// 			+'</td>'
				// 			+'<td class="gris libele"><p>Buts</p><p id="but"></p></td>'
				// 			+'<td rowspan="8" class="separation"></td>'
				// 			+'<td colspan="2" class="gris libele"><p>Carton(s)</p></td>'
							
				// 		+'</tr>'
				// 		+'<tr>'
				// 			+'<td style="display=block;" class="chiffreGros but blanc">'+d.But+'</td>'
				// 			+'<td class="chiffreGros carton jaune">'+d.Jaune+'</td>'
				// 			+'<td class="chiffreGros carton rouge">'+d.Rouge+'</td>'
				// 		+'</tr>'
				// 		+'<tr>'
				// 			+'<td class="espace"></td>'
				// 		+'</tr>'
				// 	+'</table>')
				   
			 //        .style('top', '50px')
			 //        .style('right', '12%')
			 //        .style('left', '12%')
			 //        // .style('top', d3.event.pageY - 28 + 'px')
			 //        // .style('left', d3.event.pageX +10 +'px');  

				//   var str = document.getElementById("titulaire").innerHTML;
				//   console.log(str.replace("dont", "/"))
				//   document.getElementById("titulaire").innerHTML = str.replace("dont", "/");


			 //        var poste = document.getElementById("poste").innerHTML;
			 //     	console.log(poste)
			 //       	if ((poste == 'Gardien')) {
			 //       		document.getElementById("but").innerHTML = 'encaissé(s)';
			 //       	}
			 //       	else {
			 //       		document.getElementById("but").innerHTML='marqué(s)';
			 //       	}
			  
				// 	/// CHANGEMENT IMAGE PAR DEFAUT ///
				// 	// on crée l'objet
				// 		var image = new Image();
				// 	// une fois le chargement terminé
				// 		image.onload = function()
				// 		{
				// 		   console.log("Chargement fini");
				// 		   document.getElementById("image").src = image.src;
				// 		}
				// 	// cas d'erreur
				// 		image.onerror =
				// 		image.onabort = function()
				// 		{
				// 		   console.log("Erreur lors du chargement");
				// 		   document.getElementById("image").src = "css/images/Vide.jpg"
				// 		} 
				// 		// on modifie l'adresse de l'objet "image", ce qui lance le chargement
				// 		image.src = "css/images/joueurs/foot/"+camelize(d.Prenom)+camelize(d.Nom)+".jpg";
				// 		console.log(image.src)

				// 	/// CHANGEMENT IMAGE PAR DEFAUT ///
				// 	// on crée l'objet
				// 		var pays = new Image();
				// 	// une fois le chargement terminé
				// 		pays.onload = function()
				// 		{
				// 		   console.log("Chargement fini");
				// 		   document.getElementById("pays").src = pays.src;
				// 		}
				// 	// cas d'erreur
				// 		pays.onerror =
				// 		pays.onabort = function()
				// 		{
				// 		   console.log("Erreur lors du chargement");
				// 		   document.getElementById("pays").src = "css/images/drapeaux/VideNation.svg"
				// 		} 
				// 		// on modifie l'adresse de l'objet "image", ce qui lance le chargement
				// 		pays.src = "css/images/drapeaux/"+d.PaysIso+".svg";
				// 		console.log(pays.src)
			 //    })



			 //    .on('mouseout', () => {
			 //      div
			 //        .transition()
			 //        .duration(500)
			 //        .style('opacity', 0);
			 //    });
				
		// CORDONNEES X Y DU GROUPE A
				
				equipeA.style('transform',(d,i) => ('translate('+(0+(10)+parseInt(d.xd)))+'px,5px)')
				
				equipeA.append('circle')
				.attr('r',d=>d.picto*8+'px')
				// .attr('cx',(d,i) => d.x)
				.attr('cy',d=>d.yd)
				.attr('class',d=>camelize(d.Club))

				equipeA.append('text')
				.text(d=>coupeText(d.Nom))
				.attr('y',d=>(22+parseInt(d.yd)+parseInt(d.picto*4)))
				.attr('id',d=>d.Nom)
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.Cap)
				.attr('y',d=>(22+parseInt(d.yd)+parseInt(d.picto*14)))
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.Numero)
				.attr('y',d=>(0+parseInt(d.yd)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				.attr('class',d=>camelize(d.Club)+'Number PlayerNumber')

				 

		// TOOL TIPS
	// 		const div = d3
	// 			.select('body')
	// 			.append('div')
	// 			.attr('class', 'tooltipDesktop')
	// 			.style('opacity', 0);

	}
}

function coupeText(chaine){
	if (chaine.length <= 14) {
		return chaine;
	}else{
		return chaine.substr(0, 13)+'.';
	}
}

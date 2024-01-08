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
			 //        .html('<div class="tooltipGenerique">'
				// 	        	+'<span><img id="image" class="image" src=""></span>'
				// 	        	+'<span><div class="PlayernameToolTip">'+d.Prenom+' '+d.Nom+'</div>'
				// 		        	// +'<div>'+d.Nationalite+'</div>'
				// 		        	+'<img id="pays" class="nationalite" src="">'
				// 		        	+'<div>'+d.Age+'</div>'
				// 		        	+'<div>'+d.Poste+'</div>'
				// 		        	+'<div>'+d.Taille+' / '+d.Poids+'</div>'
				// 	        	+'</span>'
				//         	+'</div>')
			 //        .style('left', '0%')
			 //        .style('top', d3.event.pageY + 20 + 'px')
			 //        // .style('left', d3.event.pageX + 'px')
			 //       /// CHANGEMENT IMAGE PAR DEFAUT ///
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
				// 		image.src = "css/images/joueurs/rugby/"+camelize(d.Prenom)+camelize(d.Nom)+".jpg";
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
				// 		pays.src = "css/images/drapeaux/"+d.Nationalite.toUpperCase()+".svg";
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
				.attr('cy',d=>d.ym)
				.attr('class',d=>camelize(d.Club))

				equipeA.append('text')
				.text(d=>coupeText(d.Nom)+' '+d.Cap)
				.attr('y',d=>(22+parseInt(d.ym)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.numero)
				.attr('y',d=>(0+parseInt(d.ym)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				// .attr('class','playernumber')
				.attr('class',d=>camelize(d.Club)+'Number PlayerNumber')


	// TOOL TIPS
		// const div = d3
		// 	.select('body')
		// 	.append('div')
		// 	.attr('class', 'tooltipMobile')
		// 	.style('opacity', 0);
			
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
			 //        .html('<div id="TooltipD" class="tooltipGenerique">'
				// 	        	+'<span><img id="image" class="image" src=""></span>'
				// 	        	+'<span><div class="PlayernameToolTip">'+d.Prenom+' '+d.Nom+'</div>'
				// 		        	// +'<div>'+d.Nationalite+'</div>'
				// 		        	+'<img id="pays" class="nationalite" src="">'
				// 		        	+'<div>'+d.Age+'</div>'
				// 		        	+'<div>'+d.Poste+'</div>'
				// 		        	+'<div>'+d.Taille+' / '+d.Poids+'</div>'
				// 	        	+'</span>'
				//         	+'</div>')
			 //        .style('top', '63px')
			 //        .style('right', '26%')
			 //        .style('left', '26%')
			 //        // .style('top', d3.event.pageY - 28 + 'px')
			 //        // .style('left', d3.event.pageX +10 +'px');       			       
			  
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
				// 		image.src = "css/images/joueurs/rugby/"+camelize(d.Prenom)+camelize(d.Nom)+".jpg";
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
				// 		pays.src = "css/images/drapeaux/"+d.Nationalite.toUpperCase()+".svg";
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
				.attr('y',d=>(20+parseInt(d.yd)+parseInt(d.picto*4)))
				.attr('id',d=>d.Nom)
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.Cap)
				.attr('y',d=>(18+parseInt(d.yd)+parseInt(d.picto*14)))
				.style('text-anchor','middle')
				.attr('class','playername')

				equipeA.append('text')
				.text(d=>d.numero)
				.attr('y',d=>(0+parseInt(d.yd)+parseInt(d.picto*4)))
				.style('text-anchor','middle')
				.attr('class',d=>camelize(d.Club)+'Number PlayerNumber')

				 

		// TOOL TIPS
			// const div = d3
			// 	.select('body')
			// 	.append('div')
			// 	.attr('class', 'tooltipDesktop')
			// 	.style('opacity', 0);


	}
}

function coupeText(chaine){
	if (chaine.length <= 14) {
		return chaine;
	}else{
		return chaine.substr(0, 13)+'.';
	}
}

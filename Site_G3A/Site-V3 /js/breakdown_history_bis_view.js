function afficher(reponse)
{
	console.log(reponse);
}

// Utilisation du format JSON :
// fonction JSON.parse : permet de transformer une chaîne de caractères conforme au format JSON en objet JS
// fonction JSON.stringify : inverse de JSON.parse

function testPhp(reponse)
{
	var breakdowns = JSON.parse(reponse);
	
	console.log(breakdowns);

	var breakdownElt = document.getElementById("breakdown");
	
	// Fonction permettant d'afficher les détails d'une panne
	function showBreakdownInfo(breakdown)
	{
		breakdownElt.innerHTML = "";
		
		var pElt = document.createElement("p");
			pElt.innerHTML = "Id : " + breakdown.id + "<br/>" 
							+ "Problème : " + breakdown.description + "<br/>"
							+ "Solution : " + breakdown.solution;
			pElt.style.backgroundColor = "#ADD8E6";
			pElt.style.padding = "20px";
			pElt.style.width = "393px";
			
		breakdownElt.appendChild(pElt);
	}
	
	function showErrorMessage(message)
	{
		breakdownElt.innerHTML = "";
		
		var pElt = document.createElement("p");
			pElt.innerHTML = message;
			pElt.style.backgroundColor = "#F08080";
			pElt.style.padding = "15px";
			pElt.style.width = "403px";
			
		breakdownElt.appendChild(pElt);
	}
	
	// Formation du tableau de pannes
	var table = document.querySelector("table");
	
	// Fonction permettant d'initialiser le tableau de pannes, à partir d'une liste de pannes donnée
	function initTable(breakdownsList)
	{
		table.innerHTML = "";
		
		// Création de la première ligne du tableau (avec events)
		var trElt = document.createElement("tr");
		
		var thIdElt = document.createElement("th");
			thIdElt.id = "id";
			thIdElt.textContent = "Id";
			thIdElt.style.paddingRight = "20px";
			thIdElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				breakdowns.sort(function(a, b)
				{
					if (Number(a.id) < Number(b.id))
					{
						return -1;
					}
					if (Number(a.id) > Number(b.id))
					{
						return 1;
					}
					return 0;		
				});
				
				initTable();
				
				console.log("Tri par id");
			});
		
		/*
		var thDescriptionElt = document.createElement("th");
			thDescriptionElt.id = "description";
			thDescriptionElt.textContent = "Problème";
			thDescriptionElt.style.paddingRight = "40px";
			thDescriptionElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				breakdowns.sort(function(a, b)
				{
					if (a.description < b.description)
					{
						return -1;
					}
					if (a.description > b.description)
					{
						return 1;
					}
					return 0;		
				});
				
				initTable();
				
				console.log("Tri par description");
			});
		*/
			
		var thCustomerIdElt = document.createElement("th");
			thCustomerIdElt.id = "customer_id";
			thCustomerIdElt.textContent = "Id client";
			thCustomerIdElt.style.paddingRight = "40px";
			thCustomerIdElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				breakdowns.sort(function(a, b)
				{
					if (Number(a.id_client) < Number(b.id_client))
					{
						return -1;
					}
					if (Number(a.id_client) > Number(b.id_client))
					{
						return 1;
					}
					return 0;		
				});
				
				initTable();
				
				console.log("Tri par id_client");
			});
		
		/*
		var thSolutionElt = document.createElement("th");
			thSolutionElt.id = "solution";
			thSolutionElt.textContent = "Solution";
			thSolutionElt.style.paddingRight = "40px";
		*/	
		
		var thBreakdownDateElt = document.createElement("th");
			thBreakdownDateElt.id = "breakdown_date";
			thBreakdownDateElt.textContent = "Date de la panne";
			thBreakdownDateElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				breakdowns.sort(function(a, b)
				{
					if (a.date_panne > b.date_panne)
					{
						return -1;
					}
					if (a.date_panne < b.date_panne)
					{
						return 1;
					}
					return 0;		
				});
				
				initTable();
				
				console.log("Tri par date de panne");
			});
			
		var thSolutionDateElt = document.createElement("th");
			thSolutionDateElt.id = "solution_date";
			thSolutionDateElt.textContent = "Date de la solution";
			thSolutionDateElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				breakdowns.sort(function(a, b)
				{
					if (a.date_solution > b.date_solution)
					{
						return -1;
					}
					if (a.date_solution < b.date_solution)
					{
						return 1;
					}
					return 0;		
				});
				
				initTable();
				
				console.log("Tri par date de solution");
			});
			
		trElt.appendChild(thIdElt);
		trElt.appendChild(thCustomerIdElt);
		//trElt.appendChild(thSolutionElt);
		trElt.appendChild(thBreakdownDateElt);
		trElt.appendChild(thSolutionDateElt);
		table.appendChild(trElt);
		
		// Remplissage du tableau
		breakdowns.forEach(function(breakdown)
		{		
			var trElt = document.createElement("tr");
				trElt.addEventListener("click", function(event)
				{
					function findId(breakdown)
					{
						return breakdown.id == trElt.childNodes[0].textContent;
					}
					showBreakdownInfo(breakdowns.find(findId));					
				});
				trElt.addEventListener("mouseover", function(event)
				{
					trElt.style.backgroundColor = "#ADD8E6";
				});
				trElt.addEventListener("mouseout", function(event)
				{
					trElt.style.backgroundColor = "";
				});
			
			var tdIdElt = document.createElement("td");
				tdIdElt.textContent = breakdown.id;
				tdIdElt.style.paddingRight = "20px";
			
			/*
			var tdDescriptionElt = document.createElement("td");
				tdDescriptionElt.textContent = breakdown.description;
				tdDescriptionElt.style.paddingRight = "40px";
			*/
			var tdCustomerIdElt = document.createElement("td");
				tdCustomerIdElt.textContent = breakdown.id_client;
				tdCustomerIdElt.style.paddingRight = "40px";
			
			/*
			var tdSolutionElt = document.createElement("td");
				tdSolutionElt.textContent = breakdown.solution;
				tdSolutionElt.style.paddingRight = "40px";
			*/
				
			var tdBreakdownDateElt = document.createElement("td");
				tdBreakdownDateElt.textContent = breakdown.date_panne;
				tdBreakdownDateElt.style.paddingRight = "40px";
				
			var tdSolutionDateElt = document.createElement("td");
				tdSolutionDateElt.textContent = breakdown.date_solution;
			
			trElt.appendChild(tdIdElt);
			trElt.appendChild(tdCustomerIdElt);
			//trElt.appendChild(tdSolutionElt);
			trElt.appendChild(tdBreakdownDateElt);
			trElt.appendChild(tdSolutionDateElt);
			table.appendChild(trElt);
		});		
	}
	
	initTable(breakdowns);	
	
	/*
	// Initialisation d'un formulaire (le formulaire sera défini dans les events des différents boutons)
	//var formElt = document.querySelector("form");
	var formElt = document.createElement("form");
	document.getElementsByClassName("sub_content")[0].insertBefore(formElt, breakdownElt);
	
	// Création de boutons pour sélectionner un critère de recherche
	// Bouton qui permet de restaurer la liste des pannes (seul bouton qui ne fait pas partie de <div id="buttons"></div>
	var restoreElt = document.getElementById("restore");
	
	var buttonRestoreElt = document.createElement("button");
		buttonRestoreElt.textContent = "Restaurer la liste complète des utilisateurs";
		buttonRestoreElt.addEventListener("click", function(event)
		{
			initTable(breakdowns);
			restoreElt.innerHTML = "";
		});
		
	// Tous les boutons suivant font partie de <div id="buttons"></div>
	var divButtonsElt = document.getElementById("buttons");
	
	// Bouton de recherche par id
	var buttonIdElt = document.createElement("button");
		buttonIdElt.textContent = "Id";
		buttonIdElt.style.margin = "5px";
		buttonIdElt.addEventListener("click", function(event)
		{
			console.log("Recherche par id");
			formElt.innerHTML = "";
			
			var inputElt = document.createElement("input");
				inputElt.type = "number";
				inputElt.placeholder = "Id de l'utilisateur";
				
			var submitElt = document.createElement("input");
				submitElt.type = "submit";
				submitElt.value = "Rechercher";
				submitElt.addEventListener("click", function(event)
				{
					// Fonction permettant de récupérer le profil complet de l'id donné
					function findId(breakdown)
					{
						return breakdown.id == formElt.elements[0].value;
					}
					
					if (breakdowns.find(findId))
					{
						var breakdown = breakdowns.find(findId);
						showBreakdownInfo(breakdown);
					}
					else
					{
						showErrorMessage("Aucun utilisateur n'a cet Id");
						console.log("N'existe pas");
					}	
					
					event.preventDefault();
				});
				
			formElt.appendChild(inputElt);
			formElt.appendChild(submitElt);
		});
	
	// Bouton de recherche par nom
	var buttonNameElt = document.createElement("button");
		buttonNameElt.textContent = "Nom";
		buttonNameElt.addEventListener("click", function(event)
		{
			console.log("Recherche par nom");
			formElt.innerHTML = "";
			
			var inputElt = document.createElement("input");
				inputElt.type = "text";
				inputElt.placeholder = "Nom de l'utilisateur";
				
			var submitElt = document.createElement("input");
				submitElt.type = "submit";
				submitElt.value = "Rechercher";
				submitElt.addEventListener("click", function(event)
				{
					var breakdownName = formElt.elements[0].value.toUpperCase();
					console.log("Nom recherché : " + breakdownName);
					
					var breakdownNameList = []; 	// Liste qui contiendra tous les utilisateurs qui ont le nom recherché
					
					breakdowns.forEach(function(breakdown)
					{
						if (breakdown.nom == breakdownName)
						{
							breakdownNameList.push(breakdown);
						}
					});
					
					console.log(breakdownNameList);
					if (breakdownNameList.length != 0)
					{
						restoreElt.appendChild(buttonRestoreElt);
						
						initTable(breakdownNameList);
					}
					else
					{
						initTable(breakdowns);
						showErrorMessage("Aucun utilisateur n'a ce nom");
					}
					
					event.preventDefault();
				});
				
			formElt.appendChild(inputElt);
			formElt.appendChild(submitElt);
		});
		
	divButtonsElt.appendChild(buttonIdElt);
	divButtonsElt.appendChild(buttonNameElt);*/
}

ajaxGet("http://localhost/site_app/Site/controler/admin/requete_2.php", testPhp);
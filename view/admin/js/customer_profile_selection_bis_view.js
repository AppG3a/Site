// Utilisation du format JSON :
// fonction JSON.parse : permet de transformer une chaîne de caractères conforme au format JSON en objet JS
// fonction JSON.stringify : inverse de JSON.parse

function dataProcessing(reponse)
{
	var customers = JSON.parse(reponse);

	var customerElt = document.getElementById("customer");
	
	// Fonction permettant d'afficher une fiche utilisateur
	function showCustomerProfile(customer)
	{
		customerElt.innerHTML = "";
		
		var pElt = document.createElement("p");
			pElt.innerHTML = "Id : " + customer.id + "<br/>" 
							+ customer.nom + " " + customer.prenom + "<br/>" 
							+ "Adresse : " + customer.adresse + "<br/>"
							+ "Email : " + customer.mail + "<br/>"
							+ "Date d'inscription : " + customer.date_inscription;
			pElt.style.backgroundColor = "#ADD8E6";
			pElt.style.padding = "20px";
			pElt.style.width = "393px";
			
		customerElt.appendChild(pElt);
	}
	
	function showErrorMessage(message)
	{
		customerElt.innerHTML = "";
		
		var pElt = document.createElement("p");
			pElt.innerHTML = message;
			pElt.style.backgroundColor = "#F08080";
			pElt.style.padding = "15px";
			pElt.style.width = "403px";
			
		customerElt.appendChild(pElt);
	}
	
	// Formation du tableau d'utilisateurs
	var table = document.querySelector("table");
	
	// Fonction permettant d'initialiser le tableau d'utilisateurs, à partir d'une liste d'utilisateurs donnée
	function initTable(customersList)
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
				
				customersList.sort(function(a, b)
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
				
				initTable(customersList);
				
			});
			
		var thNameElt = document.createElement("th");
			thNameElt.id = "name";
			thNameElt.textContent = "Nom";
			thNameElt.style.paddingRight = "40px";
			thNameElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				customersList.sort(function(a, b)
				{
					if (a.nom < b.nom)
					{
						return -1;
					}
					if (a.nom > b.nom)
					{
						return 1;
					}
					return 0;		
				});
				
				initTable(customersList);
				
			});
			
		var thFirstNameElt = document.createElement("th");
			thFirstNameElt.id = "first_name";
			thFirstNameElt.textContent = "Prenom";
			thFirstNameElt.style.paddingRight = "40px";
			
		var thInscriptionDateElt = document.createElement("th");
			thInscriptionDateElt.id = "inscription_date";
			thInscriptionDateElt.textContent = "Date d'inscription";
			thInscriptionDateElt.addEventListener("click", function(event)
			{
				table.innerHTML = "";
				
				customersList.sort(function(a, b)
				{
					if (a.date_inscription > b.date_inscription)
					{
						return -1;
					}
					if (a.date_inscription < b.date_inscription)
					{
						return 1;
					}
					return 0;		
				});
				
				initTable(customersList);
				
			});
			
		trElt.appendChild(thIdElt);
		trElt.appendChild(thNameElt);
		trElt.appendChild(thFirstNameElt);
		trElt.appendChild(thInscriptionDateElt);
		table.appendChild(trElt);
		
		// Remplissage du tableau
		customersList.forEach(function(customer)
		{		
			var trElt = document.createElement("tr");
				trElt.addEventListener("click", function(event)
				{
					function findId(customer)
					{
						return customer.id == trElt.childNodes[0].textContent;
					}
					showCustomerProfile(customers.find(findId));					
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
				tdIdElt.textContent = customer.id;
				tdIdElt.style.paddingRight = "20px";
				
			var tdNameElt = document.createElement("td");
				tdNameElt.textContent = customer.nom;
				tdNameElt.style.paddingRight = "40px";
				
			var tdFirstNameElt = document.createElement("td");
				tdFirstNameElt.textContent = customer.prenom;
				tdFirstNameElt.style.paddingRight = "40px";
				
			var tdInscriptionDateElt = document.createElement("td");
				tdInscriptionDateElt.textContent = customer.date_inscription;
				
			trElt.appendChild(tdIdElt);
			trElt.appendChild(tdNameElt);
			trElt.appendChild(tdFirstNameElt);
			trElt.appendChild(tdInscriptionDateElt);
			table.appendChild(trElt);
		});		
	}
	
	// Initialisation d'un formulaire (le formulaire sera défini dans les events des différents boutons)
	var formElt = document.createElement("form");
	document.getElementsByClassName("sub_content")[0].insertBefore(formElt, customerElt);
	
	// Création de boutons pour sélectionner un critère de recherche
	// Bouton qui permet de restaurer la liste des utilisateurs
	var restoreElt = document.getElementById("restore");
	
	var buttonRestoreElt = document.createElement("button");
		buttonRestoreElt.textContent = "Restaurer la liste complète des utilisateurs";
		buttonRestoreElt.addEventListener("click", function(event)
		{
			pagination(customers);
			initTable(customersSubList[0]);
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
					function findId(customer)
					{
						return customer.id == formElt.elements[0].value;
					}
					
					if (customers.find(findId))
					{
						var customer = customers.find(findId);
						showCustomerProfile(customer);
					}
					else
					{
						showErrorMessage("Aucun utilisateur n'a cet Id");
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
			formElt.innerHTML = "";
			
			var inputElt = document.createElement("input");
				inputElt.type = "text";
				inputElt.placeholder = "Nom de l'utilisateur";
				
			var submitElt = document.createElement("input");
				submitElt.type = "submit";
				submitElt.value = "Rechercher";
				submitElt.addEventListener("click", function(event)
				{
					var customerName = formElt.elements[0].value.toUpperCase();
					
					var customerNameList = []; 	// Liste qui contiendra tous les utilisateurs qui ont le nom recherché
					
					customers.forEach(function(customer)
					{
						if (customer.nom == customerName)
						{
							customerNameList.push(customer);
						}
					});
					
					if (customerNameList.length != 0)
					{
						restoreElt.appendChild(buttonRestoreElt);
						
						//initTable(customerNameList);
						pagination(customerNameList);
						initTable(customersSubList[0]);
					}
					else
					{
						initTable(customers);
						showErrorMessage("Aucun utilisateur n'a ce nom");
					}
					
					event.preventDefault();
				});
				
			formElt.appendChild(inputElt);
			formElt.appendChild(submitElt);
		});
		
	divButtonsElt.appendChild(buttonIdElt);
	divButtonsElt.appendChild(buttonNameElt);	
	
	// Affichage des utilisateurs 5 par 5
	
	var customersSubList = [];
	function pagination(customersList)
	{
		// Découpage de la liste des utilisateurs
		customersSubList = [];
		var customersSubSubList = [];
		var k = 0; // k est un compteur
		customersList.forEach(function(customer)
		{
			if (k < 7)
			{
				customersSubSubList.push(customer);
				k++;
			}
			else
			{
				k = 0;
				customersSubList.push(customersSubSubList);
				customersSubSubList = [];
				customersSubSubList.push(customer);
				k++;
			}
		});
		if (customersSubSubList.length != 0)
		{
			k = 0;
			customersSubList.push(customersSubSubList);
			customersSubSubList = [];		
		}
			
		// Bouton de recherche par page
		var buttonPageElt = document.createElement("button");
			buttonPageElt.textContent = "Page";
			buttonPageElt.addEventListener("click", function(event)
			{
				formPageElt.innerHTML = "";
				
				var inputElt = document.createElement("input");
					inputElt.type = "number";
					inputElt.min = 1;
					inputElt.max = customersSubList.length;
					inputElt.placeholder = inputElt.min + "-" + inputElt.max;
					
				var submitElt = document.createElement("input");
					submitElt.type = "submit";
					submitElt.value = "Afficher";
					submitElt.addEventListener("click", function(event)
					{
						var page = formPageElt.elements[0].value - 1;
						initTable(customersSubList[page]);
						event.preventDefault();
					});
					
				formPageElt.appendChild(inputElt);
				formPageElt.appendChild(submitElt);
				divPageElt.appendChild(formPageElt);
			});
			
		var divPageElt = document.getElementById("page");
		var formPageElt = document.createElement("form");
		
		divPageElt.innerHTML = "";
		divPageElt.appendChild(buttonPageElt);
		
		
	}

	pagination(customers);
	initTable(customersSubList[0]);
	
	
	
}

ajaxGet("http://localhost/site_app/Site/model/admin/query_for_ajax.php", dataProcessing);





















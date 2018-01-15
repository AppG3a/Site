// Utilisation du format JSON :
// fonction JSON.parse : permet de transformer une chaîne de caractères conforme au format JSON en objet JS
// fonction JSON.stringify : inverse de JSON.parse

function dataProcessing(reponse)
{
	var sensorTypes = JSON.parse(reponse);
	
	console.log(sensorTypes);
	
	function createOptionElt(value, selectElt)
	{
		var optionElt = document.createElement("option");
			optionElt.value = value;
			optionElt.textContent = value;
		
		selectElt.appendChild(optionElt);
	}
	
	function createRadioElt(name, value, formElt)
	{
		var radioElt = document.createElement("input");
			radioElt.type = "radio";
			radioElt.name = name;
			radioElt.value = value;
			radioElt.id = value;
			radioElt.addEventListener("change", function(event)
			{
				selectedRadio = event.target.value;
			});
		
		var labelElt = document.createElement("label");
			labelElt.setAttribute("for", value);
			labelElt.textContent = value;
		
		formElt.appendChild(radioElt);
		formElt.appendChild(labelElt);
	}
	
	var formElt = document.querySelector("form");
		formElt.addEventListener("submit", function(event)
		{
			if ((selectedRadio) && (formElt.elements.category.value != selectElt[0].value))
			{
				//event.preventDefault();
				//console.log(formElt.elements.category.value != selectElt[0].value);
				//console.log(selectElt[0].value);
				//console.log(selectedRoom);
				//event.preventDefault();
			}
			else
			{
				pElt.innerHTML = "";
				pElt.textContent = "Veuillez sélectionner une case";
				pElt.style.color = "red";
					
				formElt.appendChild(pElt);
				event.preventDefault();
			}
			
		});
		
	/*var selectedRoom = "";
	var roomSelectElt = document.getElementById("room")
		roomSelectElt.addEventListener("change", function(event)
		{
			selectedRoom = event.target.value;
		});*/
	
	var selectedRadio = "";
	var radioDivElt = document.createElement("div");	
	
	var selectElt = document.createElement("select");
		selectElt.name = "category";
		selectElt.style.marginTop = "10px";
		selectElt.style.marginBottom = "10px";
		selectElt.addEventListener("change", function(event)
		{
			radioDivElt.innerHTML = "";
			
			if (event.target.value != selectElt[0].value)
			{
				sensorTypes.forEach(function(sensorType)
				{
					if (sensorType.categorie == event.target.value)
					{
						createRadioElt("type", sensorType.type, radioDivElt);
						radioDivElt.appendChild(document.createElement("br"));
					}
				});
								
				submitElt.innerHTML = "";
				formElt.appendChild(submitElt);
			}
		});
		
	createOptionElt("-- Catégorie du capteur --", selectElt);
	createOptionElt("simple", selectElt);
	createOptionElt("objet", selectElt);
	
	var submitElt = document.createElement("input");
		submitElt.type = "submit";
		
	var pElt = document.createElement("p");
	
	formElt.appendChild(selectElt);
	formElt.appendChild(document.createElement("br"));
	formElt.appendChild(radioDivElt);
	formElt.appendChild(document.createElement("br"));
	
	
}

ajaxGet("http://localhost/site_app/Site/controler/customer/requete.php", dataProcessing);





















console.log("Je suis bien là");

var checkboxCount = 0;
var divItemsElt = document.getElementsByClassName("item");

for (var k = 0; k < divItemsElt.length; k++)
{
	var checkboxElt = divItemsElt[k].querySelector("input");
		checkboxElt.addEventListener("change", function(event)
		{
			if(event.target.checked)
			{
				checkboxCount++;
			}
			else
			{
				checkboxCount -= 1;
			}
			
			console.log(checkboxCount);
		});
}


// Gestion du submit :
// Fonction permettant d'afficher un message d'erreur
var errorElt = document.getElementById("error");

function showErrorMessage(message)
{
	errorElt.innerHTML = "";
	
	var pElt = document.createElement("p");
		pElt.innerHTML = message;
		pElt.style.backgroundColor = "#F08080";
		pElt.style.padding = "15px";
		//pElt.style.width = "403px";
		
	errorElt.appendChild(pElt);
}

// Event d'envoi du formulaire
document.querySelector("form").addEventListener("submit", function(event)
{
	if (checkboxCount != 0)
	{
		console.log("Tout est bon, on peut envoyer le formulaire");
	}
	else
	{
		showErrorMessage("Aucune image n'a été sélectionnée");
		event.preventDefault();
	}

});
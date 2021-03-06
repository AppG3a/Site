//Champ new_password_1
var newPassword1Elt = document.getElementById("new_password_1");
var infoNewPassword1Elt = document.getElementById("info_new_password_1");

var listeElt = document.createElement("ul");
var item1Elt = document.createElement("li");
item1Elt.textContent = "Le mot de passe doit contenir au moins 6 caractères";
var item2Elt = document.createElement("li");
item2Elt.textContent = "Le mot de passe doit contenir au moins 1 chiffre";

var couleurItem1 = "red";
var couleurItem2 = "red";
var newPassword1 = "";				// Ces trois variables de couleur sont définies ici pour être globales

// Champ new_password_2
var newPassword2Elt = document.getElementById("new_password_2");
var infoNewPassword2Elt = document.getElementById("info_new_password_2");
var newPassword2 = "";

// Gestion des events liés aux mots de passe (newPassword1 et newPassword2)
newPassword1Elt.addEventListener("focus", function(event)
{	
	// Contenu de l'info
	infoNewPassword1Elt.textContent = "";	// Permet de supprimer l'éventuel texte ajouté avec l'event "blur"	
	infoNewPassword1Elt.appendChild(listeElt);
	listeElt.appendChild(item1Elt);
	listeElt.appendChild(item2Elt);
	
	item1Elt.style.color = couleurItem1;
	item2Elt.style.color = couleurItem2;
	
	// Gestion des erreurs
	newPassword1Elt.addEventListener("input", function(event)
	{
		newPassword1 = event.target.value;		
		
		// Longueur du mot de passe
		if (newPassword1.length >= 6)
		{
			couleurItem1 = "green";
		}
		else
		{
			couleurItem1 = "red";
		}
		
		// Présence d'un chiffre
		var regex = /\d/; // Pareil que /[0-9]/
		
		if (regex.test(newPassword1))
		{
			couleurItem2 = "green";
		}
		else
		{
			couleurItem2 = "red";
		}
		
		// Application des couleurs aux items
		item1Elt.style.color = couleurItem1;
		item2Elt.style.color = couleurItem2;
		
		// Correspondance avec la confirmation du mot de passe (newPassword2)
		if (newPassword1 == newPassword2)
		{
			infoNewPassword2Elt.textContent = "Correct";
			infoNewPassword2Elt.style.color = "green";
		}
		else
		{
			infoNewPassword2Elt.textContent = "Incorrect";
			infoNewPassword2Elt.style.color = "red";
		}		
	});
	
	newPassword1Elt.addEventListener("blur", function(event)
	{		
		if ((couleurItem1 == "green") && (couleurItem2 == "green"))
		{
			infoNewPassword1Elt.textContent = "Correct";
			infoNewPassword1Elt.style.color = "green";
		}
		else
		{
			infoNewPassword1Elt.textContent = "Incorrect";
			infoNewPassword1Elt.style.color = "red";
		}
	});
});


newPassword2Elt.addEventListener("input", function(event)
{
	newPassword2 = event.target.value;
	
	if (newPassword2 == newPassword1)
	{
		infoNewPassword2Elt.textContent = "Correct";
		infoNewPassword2Elt.style.color = "green";
	}
	else
	{
		infoNewPassword2Elt.textContent = "Incorrect";
		infoNewPassword2Elt.style.color = "red";
	}
});


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
		
	errorElt.appendChild(pElt);
}

// Event d'envoi du formulaire
document.getElementById("password_form").addEventListener("submit", function(event)
{
	if ((infoNewPassword1Elt.textContent != "Correct") || (infoNewPassword2Elt.textContent != "Correct"))
	{
		showErrorMessage("Une des conditions n'est pas respectée");
		event.preventDefault();
	}
});


var divElt = document.getElementById("welcome_message");

var pElt = document.createElement("p");
	pElt.textContent = "Bienvenue " + userFirstName + " !";
	pElt.style.fontWeight = "bold";
	pElt.style.textAlign = "center";
	pElt.style.backgroundColor = "#90EE90";
	pElt.style.padding = "15px";
	pElt.style.width = "660px";

if (welcome == 1)
{
	divElt.appendChild(pElt);
	
	setTimeout(function()
	{
		divElt.removeChild(pElt);
	}, 5000);	 
}
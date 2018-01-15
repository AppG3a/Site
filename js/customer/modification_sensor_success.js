console.log("Je suis là");
console.log(sensorModification);

var divElt = document.getElementById("modification_message");

var pElt = document.createElement("p");
	pElt.textContent = "Les modifications ont été effectuées avec succès";
	pElt.style.fontWeight = "bold";
	pElt.style.textAlign = "center";
	pElt.style.backgroundColor = "#90EE90";
	pElt.style.padding = "15px";
	pElt.style.width = "660px";

if (sensorModification == 1)
{
	divElt.appendChild(pElt);
	
	setTimeout(function()
	{
		divElt.removeChild(pElt);
	}, 10000);	 
}
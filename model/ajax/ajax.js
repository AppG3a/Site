/**
 * Requête AJAX, les données sont récupérées dans le fichier indiqué par l'url puis utilisées dans la fonction "callback"
 * 
 * @param url
 * @param callback
 * @returns
 */
function ajaxGet(url, callback) 
{
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.addEventListener("load", function () 
	{
        if (req.status >= 200 && req.status < 400) 
        {
            // Appelle la fonction callback en lui passant la réponse de la requête
            callback(req.responseText);
        } 
        else 
        {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () 
	{
        console.error("Erreur réseau avec l'URL " + url);
    });
    
    req.send(null);
}

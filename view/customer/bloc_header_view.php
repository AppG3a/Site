<!--Header
	Ce bloc apparaîtra sur la majorité des pages du site
	Il comporte :
		- un titre de page
		- le logo d'Harvey
		- un bouton pour accéder à la messagerie (contact Domisep)
		- un bouton pour changer de langue (anglais/français)
		- un bouton déconnexion
--> 

<header>

	<h2><?= $title ?></h2>
	
	<div class="logo">
		<a href="roter.php"><img src="../../design/picture/logo_harvey_3.png" alt="Logo d'Harvey"/></a>
		
	</div>
    
    
    <div class="bouton">
    	<a href="roter.php?action=see_help" title="Aide"><img src="../../design/picture/aide_2.png" alt="Aide"></a>
        <a href="roter.php?action=see_contact" title="Contacter Domisep"><img src="../../design/picture/contact_2.png" alt="Contact"></a>		
        <a href="roter.php?action=deconnexion" title="Se déconnecter"><img src="../../design/picture/deco_2.png" alt="Déconnexion"></a>
    </div>

</header>

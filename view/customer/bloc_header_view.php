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
		<a href="index.php"><img src="design/customer/picture/logo_harvey_3.png" alt="Logo d'Harvey"/></a>
		
	</div>
    
    
    <div class="bouton">
    	<a href="index.php?action=see_help" title="Aide"><img src="design/customer/picture/aide_2.png" alt="Aide"></a>
        <a href="index.php?action=see_contact" title="Contacter Domisep"><img src="design/customer/picture/contact_2.png" alt="Contact"></a>		
        <a href="#" title="Traduire en français"><img src="design/customer/picture/francais_2.png" alt="Français"></a>
        <a href="#" title="Traduire en anglais"><img src="design/customer/picture/anglais_2.png" alt="Anglais"></a>
        <a href="#" title="Se déconnecter"><img src="design/customer/picture/deco_2.png" alt="Déconnexion"></a>
    </div>

</header>

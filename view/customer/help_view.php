<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Aide"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            
            <p>
            	Vous trouverez ci-dessous toutes les explications nécessaires concernant les fonctionnalités d'Harvey. <br/>
            	Pour plus de détails, référez-vous au manuel utilisateur.
            </p>
            
            <h3>Contacter le support</h3>
            <img src="../../design/picture/contact_2.png" alt="Contact">
            <p>      
                Vous pouvez contacter le support en cliquant sur l'icône ci-dessus (situé en haut à droite de la page). <br/>
                Vous pourrez envoyer un message au support (le support vous répondra par mail dès que possible). <br/>
                Un numéro vous est également fourni pour contacter Domisep.
            </p>
                        
            <h3>Se déconnecter</h3>
            <img src="../../design/picture/deco_2.png" alt="Déconnexion">
            <p>      
                Vous pouvez vous déconnecter en cliquant sur l'icône ci-dessus (situé en haut à droite de la page). <br/>
            </p>
            
            <h3>Menu de navigation</h3>
            <p>      
                Le menu de navigation se situe sur la gauche de votre écran. <br/>
                Il vous permet d'accéder à toutes les fonctionnalités que vous propose Domisep pour gérer vos objets connectés. <br/>
                Pour chaque fonctionnalité, un menu contextuel apparaît sur la droite de votre écran. <br/>
                Ce menu vous permettra d'effectuer des actions spécifiques à la fonctionnalité que vous êtes en train d'utiliser.
            </p>
            
            <h3>"Vue générale"</h3>
            <p>      
                L'onglet "Vue générale" vous permet de retourner sur l'écran d'accueil du site. <br/>
                Vous pouvez également retourner sur l'écran d'accueil en cliquant sur cet icône : <br/>
                <img src="../../design/picture/logo_harvey_3.png" alt="Logo d'Harvey"> <br/>
                (en haut à gauche de votre écran)
            </p>
            
            <h3>"Gestion des pièces"</h3>
            <p>      
                L'onglet "Gestion des pièces" vous permet de définir les pièces de votre maison. <br/>
                Une fois qu'une pièce est définie, vous pouvez y ajouter des capteurs via l'onglet "Gestion des capteurs". <br/>
            </p>
            
            <h3>"Gestion des capteurs"</h3>
            <p>      
                L'onglet "Gestion des capteurs" vous permet d'ajouter des capteurs à votre maison. <br/>
                Une fois un capteur installé, vous pourrez contrôler un objet de votre maison à distance. <br/>
            </p>
            
            <h3>"Rapport d'activité"</h3>
            <p>      
                L'onglet "Rapport d'activité" vous permet de visualiser l'évolution, dans le temps, des différents paramètres de votre maison. <br/>
            </p>
            
            <h3>"Profil utilisateur"</h3>
            <p>      
                L'onglet "Profil utilisateur" vous permet de voir votre profil. <br/>
                Vous pourrez y modifier vos données ainsi que votre mot de passe. <br/>
            </p>
            
            <h3>Conditions générales d'utilisation</h3>
            <p>      
                Vous pouvez lire les conditions générales d'utilisation en cliquant sur le lien disponible en bas de la page.<br/>
            </p>
        </div>
        
        
        <div class="right_nav">
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

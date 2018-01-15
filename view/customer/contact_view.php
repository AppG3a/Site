<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Support"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <h1>Contacter le support</h1>
            
            <form method="post" action="roter.php?action=send_message">
            	<fieldset>
            		<legend>Envoyer un message</legend>
            			<p>
            				Email : <?= $_SESSION["email"] ?><br/><br/>
            				<label for="subject">Sujet du message</label> :<br/><input type="text" name="subject" id="subject" required><br/>
                        	<label for="message">Message</label> :<br/><textarea name="message" id="message" required></textarea><br/>
            			</p>
            	</fieldset>
            	<p>
            		<input type="submit" value="Envoyer le message">
            	</p>
            </form>
            
            <!-- <h1>Messagerie</h1>
            <?php 
            while ($message = $messages -> fetch())
            {
            ?>
            	<strong><?= htmlspecialchars($message["subject"]) ?></strong>
            	<p>
            		<em>Envoyé le <?= htmlspecialchars($message["sending_date"]) ?></em><br/>
            		<?= htmlspecialchars($message["message"]) ?>
            	</p>
            	
            <?php 
            }
            $messages -> closeCursor();
            ?> -->
            
            <h1>Appeler le support</h1>
            
            <p><?= $phone_number ?></p>
            
            <br/>
        </div>
        
        <div class="right_nav">
        	<a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

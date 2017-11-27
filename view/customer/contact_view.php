<?php $title = "Support"; ?>

<?php ob_start(); ?>

<h1>Contacter le support</h1>

<form method="post" action="index.php?action=send_message">
	<fieldset>
		<legend>Envoyer un message</legend>
			<p>
				<label for="subject">Sujet du message</label> :<br/><input type="text" name="subject" id="subject"><br/>
            	<label for="message">Message</label> :<br/><textarea name="message" id="message"></textarea><br/>
			</p>
	</fieldset>
	<p>
		<input type="submit" value="Envoyer le message">
	</p>
</form>

<h1>Messagerie</h1>
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
?>

<?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>

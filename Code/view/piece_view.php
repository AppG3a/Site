<?php
while ($piece = $pieces -> fetch())
{
?>
	<option value="piece_4"> <?= $piece["nom"] ?> </option>
    
<?php 
}
$pieces -> closeCursor();
?>

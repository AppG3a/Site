# Site

 - L'éditeur de texte qui permet à l'administrateur de modifier les Conditions Générales d'Utilisation est issu d'un code open source
( Site -> view -> admin -> js -> editor.js )

 - Certaines actions des utilisateurs peuvent déclencher l'envoi d'un email (changement de mot de passe par exemple).
Pour envoyer un email nous avons utilisé la fonction PHP mail($destinataire, $subject, $message).
Cette fonction ne permet pas d'envoyer d'email lorsque l'on utilise un serveur local, le code est donc commenté pour les parties
d'envoi d'email.
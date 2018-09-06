<h1> Bonjour </h1>

	<p>
		Ceci est un paragraphe dans vue2.php.

		<p>

    Votre pseudo est <?php echo $pseudo; ?>.

</p>


<p>

    Votre email est <?php echo $email; ?>.

</p>


<p>

<?php if($en_ligne): ?>

    Vous êtes en ligne.

<?php else: ?>

    Vous n'êtes pas en ligne.

<?php endif; ?>

</p>
	</p>

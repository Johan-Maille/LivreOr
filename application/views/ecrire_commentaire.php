<!DOCTYPE html>

<html>

    <head>

        <title>Un livre d'or</title>

    </head>

    <body>

        <form method="post" action="">

            <div>

                <label>

                    Pseudo :

                    <input type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>" />

                </label>

                <?php echo form_error('pseudo'); ?>

            </div>

            <div>

                <label>

                    Message : <br />

                    <textarea name="contenu" rows="7" cols="60"><?php echo set_value('contenu'); ?></textarea>

                </label>

                <?php echo form_error('contenu'); ?>

            </div>

            <p>

                <input type="submit" value="Enregistrer votre commentaire" /> <input type="button" name="retour" value="">

            </p>

        </form>

    </body>

</html>

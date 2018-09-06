<!DOCTYPE html>

<html>


    <head>

        <title>Un livre d'or</title>

    </head>


    <body>

        <div id="messages">

          <a href="Forum/ecrire" > Ecrire un nouveau commentaire --> </a>

          <?php foreach($messages as $message): ?>

                <div id="num_<?php echo $message->id; ?>">

                    <p>

                        <a><?php echo $message->id; ?>">#</a>

                        Par <span><?php echo htmlentities($message->pseudo); ?></span>

                        le <span><?php echo $message->date; ?></span>

                    </p>

                    <div><?php echo nl2br(htmlentities($message->message)); ?></div>

                </div>

            <?php endforeach; ?>

        </div>

    </body>


</html>

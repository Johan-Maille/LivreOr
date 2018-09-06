<!DOCTYPE html>

<html>


    <head>

        <title>Livre d'or</title>

    </head>


    <body>
      <h1 style="background-color:blue">Livre d'Or</h1>
        <div id="messages">


          <input type="button" value="Ecrire un commentaire" onclick="javascript:location.href='Forum/ecrire'">

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

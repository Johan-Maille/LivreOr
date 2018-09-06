<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >



    <head>

        <title>Livre d'or</title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />

       <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('codeigniter/asset/css/style.css'); ?>" />

    </head>


    <body>
      <h1>Livre d'Or</h1>
        <div id="messages">

          <p>

                          Il y a actuellement <?php echo $nb_commentaires; ?> commentaires. <br />


                      </p>
                      <div class="pagination"><?php echo $pagination; ?></div>

          <input type="button" value="Ecrire un commentaire" onclick="javascript:location.href='<?php echo base_url() ?>Forum/ecrire'">

          <?php foreach($messages as $message): ?>

                <div id="num_<?php echo $message->id; ?>">

                    <p>

                        <a href="#num_><?php echo $message->id; ?>">#</a>

                        Par <span  class="pseudo_commentaire"><?php echo htmlentities($message->pseudo); ?></span>

                        le <span class="date_commentaire"><?php echo $message->date; ?></span>

                    </p>

                    <div class="contenu_commentaire"><?php echo nl2br(htmlentities($message->message)); ?></div>

                </div>

            <?php endforeach; ?>
            <div class="pagination"><?php echo $pagination; ?></div>

        </div >

    </body>


</html>

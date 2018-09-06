<?php

class Forum extends CI_Controller

{
	const NB_COMMENTAIRE_PAR_PAGE = 15;
	public function __construct()

    {
        parent :: __construct();



        //  Chargement des ressources pour tout le contrôleur

        $this->load->database();
        $this->load->model('Commentaires');
				$this->load->helper(array('url', 'assets'));

    }

		public function index($g_nb_commentaire = 1)

	 {

			 $this->accueil($g_nb_commentaire);

	 }

public function accueil($g_nb_commentaire = 1)
	{
		$this->load->library('pagination');
		 $data = array();

		    //  Récupération du nombre total de messages sauvegardés dans la base de données

		    $nb_commentaire_total = $this->Commentaires->count();



		    //  On vérifie la cohérence de la variable $_GET

		    if($g_nb_commentaire > 1)

		    {

		        //  La variable $_GET semblent être correcte. On doit maintenant

		        //  vérifier s'il y a bien assez de commentaires dans la base de données.

		        if($g_nb_commentaire <= $nb_commentaire_total)

		        {

		            //  Il y a assez de commentaires dans la base de données.

		            //  La variable $_GET est donc cohérente.



		            $nb_commentaire = intval($g_nb_commentaire);

		        }

		        else

		        {

		            //  Il n'y pas assez de messages dans la base de données.



		            $nb_commentaire = 1;

		        }

		    }

		    else

		    {

		        //  La variable $_GET "nb_commentaire" est erronée. On lui donne une

		        //  valeur par défaut.



		        $nb_commentaire = 1;

		    }



		    //  Mise en place de la pagination

		    $this->pagination->initialize(array('base_url' => base_url(),

		                        'total_rows' => $nb_commentaire_total,

		                        'per_page' => self::NB_COMMENTAIRE_PAR_PAGE));



		    $data['pagination'] = $this->pagination->create_links();

		    $data['nb_commentaires'] = $nb_commentaire_total;


	     //  la requête récupérant les commentaires dans la base de données.

	     $data['messages'] = $this->Commentaires->liste_commentaires(self::NB_COMMENTAIRE_PAR_PAGE, $nb_commentaire-1);



	     //  On charge la vue

			 $this->load->view('accueillivreor',$data);


	}


public function ecrire()

{
	$this->load->library('form_validation');


     //  Mise en place des règles de validation du formulaire

     //  Nombre de caractères : [3,25] pour le pseudo et [3,3000] pour le commentaire

     //  Uniquement des caractères alphanumériques, des tirets et des underscores pour le pseudo

     $this->form_validation->set_rules('pseudo','"pseudo"','trim|required|min_length[3]|max_length[25]|alpha_dash');

     $this->form_validation->set_rules('contenu','"contenu"','trim|required|min_length[3]|max_length[3000]');



     if($this->form_validation->run())

     {

         //  Nous disposons d'un pseudo et d'un commentaire sous une bonne forme



         //  Sauvegarde du commentaire dans la base de données

         $this->Commentaires->ajouter_commentaire($this->input->post('pseudo'),$this->input->post('contenu'));



         //  Affichage de la confirmation

         $this->load->view('Confirmation');

     }

     else

     {

         $this->load->view('ecrire_commentaire');

     }
}

}

?>

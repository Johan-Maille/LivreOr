<?php

class Forum extends CI_Controller

{
	public function __construct()

    {

        parent :: __construct();



        //  Chargement des ressources pour tout le contrôleur

        $this->load->database();
        $this->load->model('Commentaires');

    }

		public function index()

	 {

			 $this->accueil();

	 }

public function accueil()
	{

	     $data = array();

	     //  la requête récupérant les commentaires dans la base de données.

	     $data['messages'] = $this->Commentaires->liste_commentaires(	);



	     //  On charge la vue

	     // $this->load->view('livreor/afficher_commentaires', $data);
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

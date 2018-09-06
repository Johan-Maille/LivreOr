<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('vue');
	}
	public function accueil()
	{
		

		 $data = array();

       		 $data['pseudo'] = 'Johan';

        	$data['email'] = 'email@ndd.fr';

        	$data['en_ligne'] = true;

        

        	//  Maintenant, les variables sont disponibles dans la vue

        	$this->load->view('vue2', $data);
		$this->load->view('vue');
		$this->load->helper('assets');
		
	}


public function connexion()

{

    //  Chargement de la bibliothèque

    $this->load->library('form_validation');

    $this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');

    $this->form_validation->set_rules('mdp',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');



    if($this->form_validation->run())

    {

        //  Le formulaire est valide

        $this->load->view('connexion_reussi');

    }

    else

    {

        //  Le formulaire est invalide ou vide

        $this->load->view('formulaire');

    }

}
}
?>

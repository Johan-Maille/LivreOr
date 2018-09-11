<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Commentaires extends CI_Model
{

    protected $table = 'livredor';


    public function ajouter_commentaire($pseudo, $message)

    {

      return $this->db->set(array('pseudo' => $pseudo,

                         'message' => $message))

                 ->set('date', 'NOW()', false)

                 ->insert($this->table);

    }



    public function liste_commentaires($nb= 15, $debut = 0)

{

    // return $this->db->select('`id`, `pseudo`, `message`, DATE_FORMAT(`date`, %d/%m/%Y &agrave; %H:%i:%s ) AS date', false)
    return $this->db->select ('id, pseudo, message, date', false)

            ->from($this->table)

            ->order_by('id', 'desc')

            ->limit($nb, $debut)

            ->get()

            ->result();

}

public function count()

{

    return $this->db->count_all($this->table);

}

}

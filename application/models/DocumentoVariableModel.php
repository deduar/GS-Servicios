<?php
    class DocumentoVariableModel extends CI_Model{

      public function getAll(){
        $result = $this->db->get('documento_variables');
        return $result->result_object();
      }

      public function insert_documentoVariable($data)
      {   
        $this->db->insert('documento_variables', $data);
      }

      public function getID($id)
      {
      	$query = $this->db->get_where('documento_variables', array('documento_id' => $id));
		    return $query->result_object();
      }

    }
?>
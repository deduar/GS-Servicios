<?php
    class DocumentoVariableModel extends CI_Model{

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
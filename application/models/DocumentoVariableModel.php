<?php
    class DocumentoVariableModel extends CI_Model{

      public function insert_documentoVariable($data)
      {   
        $this->db->insert('documento_variables', $data);
      }

    }
?>
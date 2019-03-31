<?php
    class PlantillaVariableModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('plantilla_variables');
            return $result->result_object();
        }

        public function getPlantillaID($plantilla_id)
        {
          $query = $this->db->get_where('plantilla_variables', array('plantilla_id' => $plantilla_id));
          return $query->result_object();
        }

        public function insert_plantillaVariable($filename, $plantilla_id)
	      {   
	        $data = file_get_contents(FCPATH."upload/plantillas/".$filename);
	        preg_match_all('/\[(.*?)\]/', $data, $matches, PREG_UNMATCHED_AS_NULL);
	        $k=1;
	        foreach ($matches[1] as $var) {
              $var_name = explode(':', $var)[0];
              $variable_id = explode(':', $var)[1];
              $data = array(
              	'plantilla_id'=>$plantilla_id,
              	'variable_id'=>$variable_id,
              	'posicion'=>$k
              );
              $k++;
	          $this->db->insert('plantilla_variables', $data);
	    	  }
	      }



    }
?>
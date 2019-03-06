<?php
    class PlantillaModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('plantillas');
            $plantillas = $result->result_array();
            return $plantillas;
        }

        public function insert_plantilla()
	    {    
	        $data = array(
	            'name' => $this->input->post('name'),
	          	'data' => $this->input->post('textarea')
	        );
	        return $this->db->insert('plantillas', $data);
	    }

	    public function update_plantilla($id) 
	    {
	        $data=array(
	            'name'=> $this->input->post('name')
	        );
	        if($id==0){
	            return $this->db->insert('plantillas',$data);
	        }else{
	        	$data['modified'] = date('Y-m-d H:i:s');
	            $this->db->where('id',$id);
	            return $this->db->update('plantillas',$data);
	        }        
	    }

    }
?>
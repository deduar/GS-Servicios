<?php
    class PlantillaModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('plantillas');
            return $result->result_object();
        }

        public function getID($id)
	    {
	    	$query = $this->db->get_where('plantillas', array('id' => $id));
			return $query->result_object();
	    }

        public function insert_plantilla()
	    {   
	    	$filename = time();
	    	write_file(FCPATH."upload/plantillas/".$filename, $this->input->post('textarea')); 

	        $data = array(
	            'name' => $this->input->post('name'),
	          	'data' => $filename
	        );
	        $this->db->insert('plantillas', $data); //Inserting plantilla model
	        return array('filename'=>$filename, 'plantilla_id'=>$this->db->insert_id());
	    }

	    public function update_plantilla($id) 
	    {
	        $data=array(
	            'name'=> $this->input->post('name'),
	            'data' => $this->input->post('textarea')
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
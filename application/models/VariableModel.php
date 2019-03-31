<?php
    class VariableModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('variables');
            return $result->result_object();
        }

        public function getID($id)
	    {
	    	$query = $this->db->get_where('variables', array('id' => $id));
			return $query->result_object();
	    }

        public function insert_variable()
	    {    
	        $data = array(
	            'description' => $this->input->post('description'),
	            'slug' => $this->input->post('slug')
	        );
	        return $this->db->insert('variables', $data);
	    }

	    public function update_variable($id) 
	    {
	        $data=array(
	            'description'=> $this->input->post('description'),
	            'slug' => $this->input->post('slug')
	        );
	        if($id==0){
	            return $this->db->insert('variables',$data);
	        }else{
	        	$data['modified'] = date('Y-m-d H:i:s');
	            $this->db->where('id',$id);
	            return $this->db->update('variables',$data);
	        }        
	    }

    }
?>
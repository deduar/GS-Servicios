<?php
    class VariableModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('variables');
            $variables = $result->result_array();
            return $variables;
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
<?php
    class DocumentoModel extends CI_Model{
        
        /*
        public function getAll(){
        	$query = $this->db->select('d.name, d.id as documento_id, d.created, d.modified, p.id, p.name as plantilla_name')
                  ->from('documentos as d')
                  ->join('plantillas as p', 'p.id = d.plantilla_id')
                  ->get();
			return $query->result_object();
        }
        */

        public function getAll(){
            $result = $this->db->get('documentos');
            return $result->result_object();
        }

        public function getID($id)
	    {
	    	$query = $this->db->get_where('documentos', array('id' => $id));
			return $query->result_object();
	    }

        public function insert_documento()
	    {
	        $data = array(
	            'name' => $this->input->post('name')
	        );
	        return $this->db->insert('documentos', $data);

	    }

	    public function update_documento($id) 
	    {
	        $data=array(
	            'name'=> $this->input->post('name')
	        );
	        if($id==0){
	            return $this->db->insert('documentos',$data);
	        }else{
	        	$data['modified'] = date('Y-m-d H:i:s');
	            $this->db->where('id',$id);
	            return $this->db->update('documentos',$data);
	        }        
	    }

    }
?>
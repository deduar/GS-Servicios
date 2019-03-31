<?php
    class DocumentoModel extends CI_Model{
        
        public function getAll(){
        	$query = $this->db->select('d.name, d.id, d.created, d.modified, d.plantilla_id, p.id, p.name as plantilla_name')
                  ->from('documentos as d')
                  ->join('plantillas as p', 'p.id = d.plantilla_id')
                  ->get();
			return $query->result_object();
        }

        public function insert_documento()
	    {    
	        $data = array(
	            'name' => $this->input->post('name'),
	            'plantilla_id' => $this->input->post('plantilla_id')
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
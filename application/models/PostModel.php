<?php
    class PostModel extends CI_Model{
        
        public function getAll(){
            $result = $this->db->get('posts');
            $posts = $result->result_array();
            return $posts;
        }

    }
?>
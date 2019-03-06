<?php
  $this->load->view('templates/header');
?>
<section>
   <?php echo $the_view_content;?>
</section>
<?php
  $this->load->view('templates/sidebar');
  $this->load->view('content');
  $this->load->view('templates/footer');
?>
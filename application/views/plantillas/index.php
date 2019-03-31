
<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('plantilla/create') ?>"> Create New Plantilla</a>
</div>

<div class="container">
<table class="table">
  <thead>
      <tr>
        <th>Nombre</th>
        <th>Lista de Variables</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Aciones</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($plantillas as $plantilla) {
      $k=1;
      $data = file_get_contents(FCPATH."upload/plantillas/".$plantilla->data);
      preg_match_all('/\[(.*?)\]/', $data, $matches, PREG_UNMATCHED_AS_NULL);
    ?>
      <tr>
        <td><?php echo $plantilla->name; ?></td>
        <?php 
          if ($matches[1]) {
            echo "<td>";
            foreach ($matches[1] as $var) {
              $var_name = explode(':', $var)[0];
              $var_id = explode(':', $var)[1];
              foreach ($variables as $variable) {
                if ($variable->id == $var_id){
                  echo ($variable->description)."<br>";
                }
              }
            }
            echo "</td>";
          } else {
            echo "<td>Null - Empty</td>";
          }
        ?>
        <td><?php echo $plantilla->created; ?></td>
        <td><?php echo $plantilla->modified; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('plantilla/edit/'.$plantilla->id) ?>"> Edit</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('plantilla/delete/'.$plantilla->id) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>

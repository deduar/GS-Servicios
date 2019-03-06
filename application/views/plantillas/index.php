
<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('plantilla/create') ?>"> Create New Plantilla</a>
</div>

<div class="containes">
<table class="table">
  <thead>
      <tr>
        <th>Nombre</th>
        <th>Plantilla</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Aciones</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $d) { ?>      
      <tr>
        <td><?php echo $d["name"]; ?></td>
        <td><?php echo $d["data"]; ?></td>
        <td><?php echo $d["created"]; ?></td>
        <td><?php echo $d["modified"]; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('plantilla/edit/'.$d["id"]) ?>"> Edit</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('plantilla/delete/'.$d["id"]) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>

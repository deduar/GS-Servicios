
<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('variable/create') ?>"> Create New Variables</a>
</div>

<div class="containes">
<table class="table">
  <thead>
      <tr>
        <th>Descripcion</th>
        <th>Slug</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $d) { ?>      
      <tr>
        <td><?php echo $d["description"]; ?></td>
        <td><?php echo "[<u><b>".$d["slug"]."</b></u>]"; ?></td>
        <td><?php echo $d["created"]; ?></td>
        <td><?php echo $d["modified"]; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('variable/edit/'.$d["id"]) ?>"> Edit</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('variable/delete/'.$d["id"]) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>

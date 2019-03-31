
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
    <?php foreach ($variables as $variable) { ?>      
      <tr>
        <td><?php echo $variable->description; ?></td>
        <td><?php echo $variable->slug; ?></td>
        <td><?php echo $variable->created; ?></td>
        <td><?php echo $variable->modified; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('variable/edit/'.$variable->id) ?>"> Edit</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('variable/delete/'.$variable->id) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>

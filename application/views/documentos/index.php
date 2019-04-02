
<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('documento/create') ?>"> Create New Documento</a>
</div>

<div class="containes">
<table class="table">
  <thead>
      <tr>
        <th>Nombre</th>
        <th>Plantilla</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($documentos as $documento) { ?>
      <tr>
        <td><?php echo $documento->name; ?></td>
        <td><?php echo $documento->plantilla_name; ?></td>
        <td><?php echo $documento->created; ?></td>
        <td><?php echo $documento->modified; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('documento/edit/'.$documento->documento_id) ?>"> Edit</a>
          <a class="btn btn-info" style="width: 90px;" href="<?php echo base_url('documento/preview/'.$documento->documento_id) ?>"> Preview</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('documento/delete/'.$documento->documento_id) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>

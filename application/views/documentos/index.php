
<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('documento/create') ?>"> Create New Documento</a>
</div>
<div class="containes">
<table class="table">
  <thead>
      <tr>
        <th>Documento</th>
        <th>Platilla</th>
        <th>Variable</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($documentoVariables as $key => $documentoVariable) { $k=1; ?>
      <tr>
        <td><?php echo $documentos[array_search($documentoVariable->documento_id,array_column($documentos,'id'))]->name; ?></td>
        <td><?php echo $plantillas[array_search($documentoVariable->plantilla_id,array_column($plantillas,'id'))]->name; ?></td>
        <td><?php echo $variables[array_search($documentoVariable->variable_id,array_column($variables,'id'))]->slug; ?></td>
        <td><?php echo $documentoVariable->created; ?></td>
        <td><?php echo $documentoVariable->modified; ?></td>
        <td>
          <a class="btn btn-primary" style="width: 70px;" href="<?php echo base_url('documento/edit/'.$documentoVariable->documento_id) ?>"> Edit</a>
          <a class="btn btn-info" style="width: 90px;" href="<?php echo base_url('documento/preview/'.$documentoVariable->documento_id) ?>"> Preview</a>
          <a class="btn btn-danger disabled" style="width: 70px;" href="<?php echo base_url('documento/delete/'.$documentoVariable->documento_id) ?>"> Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

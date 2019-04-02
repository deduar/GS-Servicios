<div class="row">
  <div class="col-md-12">
    <div class="row" style="margin-bottom: 15px;">
      <div class="col-md-8"><h3><?php echo "Plantilla : ".($plantilla[0]->name); ?></h3></div>
     <div class="col-md-4"><h5><?php echo "Fecha Creacion : ".($documento[0]->created); ?></h5></div>
    </div>
  </div>
</div>

  <hr>
  <div class="col-md-12">
    <?php echo $doc_ready; ?>
  </div>

<div style="margin-bottom: 15px;">
  <a class="btn btn-primary" href="<?php echo base_url('documento') ?>"> Regresar</a>
  <a class="btn btn-info" href="<?php echo base_url('documento/imprimir/'.$documento[0]->id) ?>"> Imprimir</a>
</div>
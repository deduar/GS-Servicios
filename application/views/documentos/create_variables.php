<?php echo validation_errors(); ?>
<?php echo form_open('documento/store'); ?>
<h3>Nuevo Documento</h3>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Nombre</label>
            <div class="col-md-12">
                <input type="text" name="name" value="<?php echo $this->input->post('name');?>" class="form-control" disabled>
            </div>
            <input type="hidden" name="name" value="<?php echo $this->input->post('name');?>">
        </div>
    </div>

    <?php 
        foreach ($plantillas as $key => $plantilla) { ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-12"><h4>Plantilla : <?php echo $plantilla[0]->name."-".$plantilla[0]->id; ?></h4></label>
                    <div class="col-md-12">
                        <div class="row">
                        <?php $k=0;
                        foreach ($plantilla_variables[$key] as $vars) {
                            while ($variables[$k]->id != $vars->variable_id) {
                                $k++;
                            } ?>
                            <label class="col-md-2" style="text-align: right;"><h5><b><?php echo $variables[$k]->slug."-".$variables[$k]->id."-".$vars->posicion ?></h5></b></label>
                            <div class="col-md-4">
                                <input type="text" name="<?php echo$variables[$k]->id.".".$plantilla[0]->id.".".$vars->posicion; ?>" value="<?php $vars->posicion;?>" class="form-control" required>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <hr>
                </div>
                <hr>
            </div>
        <?php }
    ?>

    <div class="col-md-3 offset-6" style="margin-bottom: 15px;">
        <button type="submit" name="submit" value="submit" class="btn btn-success">Crear</button>
    </div>
    <div class="col-md-2" style="margin-bottom: 15px;">
        <button type="submit" name="cancel" value="cancel" class="btn btn-danger">Cancelar</button>
    </div>
</div>

</form>
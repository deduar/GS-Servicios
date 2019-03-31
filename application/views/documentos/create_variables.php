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
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Plantilla</label>
            <div class="col-md-12">
                <select name="plantilla_id" class="form-control" disabled>
                    <option name="plantilla_id" value="<?php $plantilla[0]->id ?>"><?php echo $plantilla[0]->name; ?></option>
                </select>
            </div>
            <input type="hidden" name="plantilla_id" value="<?php echo $this->input->post('plantilla_id');?>">
        </div>
    </div>

    <?php 
        foreach ($plantilla_variables as $variable) { ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12"><?php $k=0; while ($variables[$k]->id != $variable->variable_id) {
                        $k++;
                    } ?><?php echo $variables[$k]->slug; ?></label>
                    <div class="col-md-12">
                        <input type="text" name="var_<?php echo $variable->posicion; ?>" value="<?php echo $this->input->post('var_'.$variable->posicion);?>" class="form-control">
                    </div>
                </div>
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
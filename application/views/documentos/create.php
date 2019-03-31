<?php echo validation_errors(); ?>

<?php echo form_open('documento/create_variables'); ?>

<h3>Nuevo Documento</h3>
<hr>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-12">Nombre</label>
            <div class="col-md-12">
                <input type="text" name="name" value="<?php echo $this->input->post('name');?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-12">Plantilla</label>
            <div class="col-md-12">
                <select name="plantilla_id" class="form-control">
                    <option name="plantilla_id" value="">Seleccione una Plantilla</option>
                    <?php foreach ($plantillas as $plantilla) { ?>
                        <option name="plantilla_id" value="<?php echo $plantilla->id;?>" <?php if($plantilla->id == $this->input->post('plantilla_id')){ echo "selected=selected"; }?>"><?php echo $plantilla->name; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
    </div>
    <div class="col-md-3 offset-6" style="margin-bottom: 15px;">
        <button type="submit" name="submit" value="submit" class="btn btn-success">Crear</button>
    </div>
    <div class="col-md-2" style="margin-bottom: 15px;">
        <button type="submit" name="cancel" value="cancel" class="btn btn-danger">Cancelar</button>
    </div>
</div>

</form>
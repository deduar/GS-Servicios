<?php echo validation_errors(); ?>

<?php echo form_open('plantilla/update/'.$plantilla->id); ?>

<h3>Actualizar Plantilla</h3>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Descripcion</label>
            <div class="col-md-12">
                <input type="text" name="name" class="form-control" value="<?php echo $plantilla->name; ?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-3 offset-6" style="margin-bottom: 15px;">
        <button type="submit" name="submit" class="btn btn-success">Actualizar</button>
    </div>
    <div class="col-md-2" style="margin-bottom: 15px;">
        <button type="submit" name="cancel" class="btn btn-danger">Cancelar</button>
    </div>
</div>
    
</form>
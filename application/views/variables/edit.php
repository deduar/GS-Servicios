<?php echo validation_errors(); ?>

<?php echo form_open('variable/update/'.$variable->id); ?>

<h3>Actualizar Variable</h3>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Descripcion</label>
            <div class="col-md-12">
                <input type="text" name="description" class="form-control" value="<?php echo $variable->description; ?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Slug</label>
            <div class="col-md-12">
                <input type="text" name="slug" class="form-control" value="<?php echo $variable->slug; ?>">
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
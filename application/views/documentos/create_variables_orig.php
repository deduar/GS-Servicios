<?php echo validation_errors(); ?>

<?php echo form_open('documento/store'); ?>

<h3>Nuevo Documento</h3>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-12">Nombre</label>
            <div class="col-md-12">
                <input type="text" name="name" value="<?php echo $this->input->post('name');?>" class="form-control" disabled>
            </div>
            <input type="hidden" name="name" value="<?php echo $this->input->post('name');?>">
        </div>
    </div>
    <div class="col-md-6">
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
        $data = file_get_contents(FCPATH."upload/plantillas/".$plantilla[0]->data);
        preg_match_all('/\[(.*?)\]/', $data, $matches, PREG_UNMATCHED_AS_NULL);
    ?>

    
    <?php        
        foreach ($matches[1] as $match) {
            echo "<div class='col-md-6'>";
                echo "<div class='form-group'>";
                    $n=0;
                    while (explode(":", $match)[1] != $variables[$n]->id) {
                        $n++;
                    }
                    echo "<label class='col-md-12'>".$variables[$n]->description."</label>";
                    echo "<div class='col-md-12'>";
                        echo "<input type='text' name=var_".$variables[$n]->id." value='' class='form-control'>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }
    ?>
        

    <div class="col-md-3 offset-6" style="margin-bottom: 15px;">
        <button type="submit" name="submit" value="submit" class="btn btn-success">Crear</button>
    </div>
    <div class="col-md-2" style="margin-bottom: 15px;">
        <button type="submit" name="cancel" value="cancel" class="btn btn-danger">Cancelar</button>
    </div>
</div>

</form>
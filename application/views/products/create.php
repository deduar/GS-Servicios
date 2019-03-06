<?php echo validation_errors(); ?>

<?php echo form_open('product/store'); ?>
<a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{Increment}');return false;"
               class="collection-item">{Increment}</a>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <label class="col-md-3">Title</label>
            <div class="col-md-9">
                <input type="text" name="title" value="<?php echo $this->input->post('title');?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <label class="col-md-3">Description</label>
            <div class="col-md-9">
                <!--textarea name="description" id="description" class="form-control"><?php echo $this->input->post('description');?></textarea-->
                <textarea id="description" name="description">Hello, World!</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2 pull-right">
        <input type="submit" name="Save" class="btn">
    </div>
</div>

<!--script>
    CKEDITOR.replace( 'description' );
</script-->

</form>
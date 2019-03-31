<?php echo validation_errors(); ?>

<?php echo form_open('plantilla/store'); ?>

<h3>Nueva Plantilla</h3>
<hr>

<div class="row">
    <div class="col-md-2" style="border: 1px solid #cecece;">
        <div class="col-md-12">
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <h5 style="text-align: left; margin-top: 7px;"><b>Variables</b></h5>
                </div>
                <div class="col-md-5">
                    <a href="#"><div class="btn btn-success"><span class="fa fa-plus-circle"></span></div></a>
                </div>
            </div>
        </div>
        <hr style="border-bottom: 1px solid #cecece;">
        <div class="col-md-12" >
            <?php 
                foreach ($variables as $key => $variable) { ?>
                    <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'<?php echo '['.$variable->slug.":".$variable->id.']'; ?>');return false;" class="collection-item"><?php echo $variable->slug; ?></a><br>
                <?php }
            ?>
        </div>
    </div>
    <div class="col-md-10">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Nombre</label>
            <div class="col-md-12">
                <input type="text" name="name" value="<?php echo $this->input->post('name');?>" class="form-control">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-12">Plantilla</label>
            <div class="col-md-12">
                <textarea id="textarea" name="textarea"><?php echo $this->input->post('textarea');?></textarea>
            </div>
        </div>
    </div>  
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 offset-5">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Guardar</button>
            </div>
            <div class="col-md-3">
                <button type="submit" name="cancel" value="cancel" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
    </div>
</div>

</form>

<script src='<?php echo base_url(); ?>assets/_js/tinymce/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 400,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table directionality',
                'emoticons template paste textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
            toolbar2: '',
            // without images_upload_url set, Upload tab won't show up
            images_upload_url: '../upload/',

            // we override default upload handler to simulate successful upload
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', "../upload/upload.php");
                xhr.onload = function () {
                    var json;
                    if (xhr.status != 200) {
                        failure("HTTP Error: " + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != "string") {
                        failure("Invalid JSON: " + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });

        function importHTMLContents(){
            $.ajax({
                url: 'documents.php?menu=add_template',
                type: 'POST',
                data: new FormData($('#formupload')[0]),
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    $('#formupload')[0].reset();
                    tinyMCE.activeEditor.setContent(data);
                    Materialize.toast('The file has been imported', 3000, 'light-green darken-3')
                },
                error: function(code, data){
                    Materialize.toast(data, 3000, 'orange darken-2');
                }
            })
        }
    </script>
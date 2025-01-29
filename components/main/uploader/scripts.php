<script type="text/javascript" src="<?php echo $default_path ?>/plugins/file-uploader/fancy-file-uploader/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $default_path ?>/plugins/file-uploader/fancy-file-uploader/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $default_path ?>/plugins/file-uploader/fancy-file-uploader/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?php echo $default_path ?>/plugins/file-uploader/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="<?php echo $default_path ?>/plugins/file-uploader/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script type="text/javascript">
$(function() {
    $('#thefiles').FancyFileUpload({
        params : {
            action : 'fileuploader',
            fileuploader : '1'
        },
        edit : false,
        maxfilesize : 100000000, // 100mb
        added : function(e, data) {
            // It is okay to simulate clicking the start upload button.
            this.find('.ff_fileupload_actions button.ff_fileupload_start_upload').click();
        }
    });
});
</script>
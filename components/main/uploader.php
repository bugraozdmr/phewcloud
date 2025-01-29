<?php include $_SERVER['DOCUMENT_ROOT']."/phewcloud/components/main/uploader/links.php"; ?>
<form id="formData" action="<?php echo $default_path ?>/uploader.php" method="POST" enctype="multipart/form-data">
    <!-- removed =  accept=".jpg, .png, image/jpeg, image/png" -->
    <input id="thefiles" type="file" name="files" multiple>
</form>
<?php include $_SERVER['DOCUMENT_ROOT']."/phewcloud/components/main/uploader/scripts.php"; ?>
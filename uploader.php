<?php
// chmod the folder you want to upload first (write => w => 2)

require_once __DIR__."/plugins/file-uploader/server-side-helpers/fancy_file_uploader_helper.php";

// callback funtion after upload done
function ModifyUploadResult(&$result, $filename, $name, $ext, $fileinfo)
{
    // Sonuç üzerinde ek bilgi ekleyebilirsiniz. Örneğin:
    // $result['file_url'] = 'http://yourdomain.com/images/' . basename($filename);
}

try {
    $options = array(
        "allowed_exts" => array(
        "jpg", "jpeg", "png", "gif", "bmp", "svg",      // images
        "doc", "docx", "odt", "rtf", "txt",            // text
        "xls", "xlsx", "ods", "csv",                   // Excel
        "ppt", "pptx", "odp",                          // presentation
        "pdf",                                         // PDF
        "mp3", "wav", "ogg", "m4a",                    // audio
        "mp4", "avi", "mov", "wmv", "mkv", "flv",      // video
        "zip", "rar", "tar", "gz", "7z",               // archive
        "html", "htm", "css", "js", "json", "xml", "php", "c"      // Web dosyaları
    ),
    "filename" => __DIR__ . "/images_temp/" . uniqid() . ".{ext}", // dont forget to add name column in db
    "result_callback" => "ModifyUploadResult",
    "return_result" => true
    );

    # file upload
    $result = FancyFileUploaderHelper::HandleUpload("files", $options);

    if ($result['success']) {
        echo json_encode([
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'success' => false,
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Dosya yükleme hatası: ' . $e->getMessage()
    ]);
}
?>

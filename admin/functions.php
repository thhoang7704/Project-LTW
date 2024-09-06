<?php
function validateUploadFile($file, $uploadPath)
{
    // Add your specific validation rules here
    $allowedTypes = ['image/jpeg', 'image/png'];
    $maxSize = 2097152; // 2MB

    if (!in_array($file['type'], $allowedTypes)) {
        return "Invalid file type";
    }

    if ($file['size'] > $maxSize) {
        return "File is too large";
    }

    // ... other validation checks ...

    return true;
}

function uploadFiles($uploadedFiles)
{
    $files = array();
    $errors = array();

    // xử lý gom dữ liệu vào từng file đã upload
    foreach ($uploadedFiles as $key => $values) {
        foreach ($values as $index => $value) {
            $files[$index][$key] = $value;
        }
    }
    $uploadPath = "./uploads/";
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath);
    }

    foreach ($files as $file) {
        $uniqueFilename = time() . '_' . basename($file['name']);
        $filePath = $uploadPath . '/' . $uniqueFilename;

        $validationResult = validateUploadFile($file, $filePath);
        if ($validationResult === true) {
            move_uploaded_file($file["tmp_name"], $filePath);
        } else {
            $errors[] = "Error uploading " . basename($file["name"]) . ": " . $validationResult;
        }
    }

    return $errors;
}

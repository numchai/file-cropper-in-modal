<?php

//print_r($_POST);
print_r($_FILES);

$type = $_FILES['img']['type'];

//$content = base64_decode($_POST['img-profile']);

function base64_to_jpeg($base64_string, $output_file)
{

    // open the output file for writing
    $ifp = fopen($output_file, 'wb');

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode(',', $base64_string);

    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($data[1]));

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}

if ($type == 'image/png') {
    $type_file = '.png';
} else if ($type == 'image/jpeg') {
    $type_file = '.jpg';
} else {
    $type_file = '.gif';
}

$output_file = 'name' . $type_file;
base64_to_jpeg($_POST['img-profile'], $output_file);

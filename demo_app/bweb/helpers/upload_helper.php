<?php
function upload_files($path,$dir,$atypes, $files)
{
    $CI = &get_instance();
    if (!is_dir($path.'/'.$dir)) {
        mkdir($path.'/' . $dir, 0777, TRUE);
    }
    $config = array(
        'upload_path'   => $path.'/'.$dir,
        'allowed_types' => $atypes,
        'overwrite'     => 1,
    );
    $CI->load->library('upload', $config);
    $images = array();
    //print_a($files);
    foreach ($files['name'] as $key => $image) {
        $_FILES['files[]']['name']= $files['name'][$key];
        $_FILES['files[]']['type']= $files['type'][$key];
        $_FILES['files[]']['tmp_name']= $files['tmp_name'][$key];
        $_FILES['files[]']['error']= $files['error'][$key];
        $_FILES['files[]']['size']= $files['size'][$key];

        $fileName = $image;
        //$images[] = $fileName;
        $config['file_name'] = $fileName;
        $CI->upload->initialize($config);
        if ($CI->upload->do_upload('files[]')) {
            $image			= $CI->upload->data();
            $images[]	= $image['file_name'];
        } else {
            $images['error'].= $fileName.' - '.$CI->upload->display_errors().'<br>';
           // return false;
        }
    }
    //print_a($images);
//    exit;
    return $images;
}

<?php
function url_attr_get($uri = '')
{
    $CI =& get_instance();
    $get_sort = '';
    if ($CI->input->get()) {
        $get_sort = '?' . http_build_query($CI->input->get());
    }
    if ($uri == '') return $get_sort;
    else return $CI->config->site_url($uri . $get_sort);
}

function admin_url($uri = '')
{
    $CI =& get_instance();
    return $CI->config->site_url(config_item('admin_folder') . '/' . $uri);
}

function theme_url($uri = '')
{
    $CI =& get_instance();
    return $CI->config->base_url('theme_assets/' . $uri);
}

function full_url($id, $arr = array())
{
    $CI =& get_instance();
    $pg = $CI->db->select('id,parent_id,slug')->where('id', $id)->get('pages')->row();
    if (!empty($pg)) {
        array_push($arr, $pg->slug);
        if ($pg->parent_id > 0) {
            return full_url($pg->parent_id, $arr);
        }
    }
    $arr = array_reverse($arr);
    $url = implode('/', $arr);
    return $CI->config->site_url($url);

}

function breadcrumb($id,$i=1,$arr = array())
{
    $CI =& get_instance();
    $pg = $CI->db->select('id,title,parent_id,slug,template')->where('id',$id)->get('pages')->row();
    if(!empty($pg)){ 
        $slg='#';
        if($pg->template!=''){
            $slg = full_url($pg->id);
        }        
        array_push($arr,'<li class="active"<a href="'.$slg.'">'.$pg->title.'</a></li>');
        if($pg->parent_id>0){ $i++;
            return breadcrumb($pg->parent_id,$i,$arr);
        }
    }
    $arr = array_reverse($arr);
    $ret = '<li><a href="'.site_url().'">Home</a></li>';
    foreach($arr as $ar)
    {
        $ret .= $ar;
    }
    return $ret;
}

function is_url_exist($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, TRUE);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($code == 200) {
        $status = TRUE;
    } else {
        $status = FALSE;
    }
    curl_close($ch);
    return $status;
}

function upload_url($filename = '', $uri = '', $jquery = FALSE)
{
    $CI =& get_instance();
    if ($filename == '') {
        if ($jquery) {
            echo $CI->config->base_url('uploads/no_image.jpg');
        } else {
            return $CI->config->base_url('uploads/no_image.jpg');
        }
    } elseif (file_exists('uploads/' . $uri . $filename)) {
        if ($jquery) {
            echo $CI->config->base_url('uploads/' . $uri . $filename);
        } else {
            return $CI->config->base_url('uploads/' . $uri . $filename);
        }
    } else {
        if ($jquery) {
            echo $CI->config->base_url('uploads/no_image.jpg');
        } else {
            return $CI->config->base_url('uploads/no_image.jpg');
        }
    }
}

function image_unlink($file_path)
{
    if (is_array($file_path)) {
        foreach ($file_path as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    } else {
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
}

function pagination_get($total_rows, $per_page)
{
    if ($total_rows <= $per_page) {
        return FALSE;
    }
    $CI =& get_instance();
    $max_pages = ceil($total_rows / $per_page);
    $get = $CI->input->get();
    if (!isset($get['page'])) {
        $get['page'] = 1;
    }
    $current_page = $get['page'];
    if ($current_page == 0 || $max_pages < $current_page) {
        $current_page = 1;
    }
    $previous = '';
    if ($current_page > 1) {
        $get['page'] = $current_page - 1;
        $query_p = http_build_query($get);
        $previous = '<li class="page-item"><a class="page-link" href="' . $CI->config->site_url($CI->uri->uri_string() . '?' . $query_p) . '" aria-label="Previous"><span class="sr-only">Prev</span><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
    }
    $next = '';
    if ($current_page < $max_pages) {
        $get['page'] = $current_page + 1;
        $query_p = http_build_query($get);
        $next = '<li class="page-item"><a href="' . $CI->config->site_url($CI->uri->uri_string() . '?' . $query_p) . '" aria-label="Next"><span class="sr-only">Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
    }
    $current = '<li class="page-item"><a class="page-link active">' . $current_page . '</a></li>';
    $p_steps = '';
    $prv = $current_page - 3;
    for ($i = $prv; $i < $current_page; $i++) {
        if ($i > 0) {
            $get['page'] = $i;
            $query_p = http_build_query($get);
            $p_steps .= '<li class="page-item"><a class="page-link" href="' . $CI->config->site_url($CI->uri->uri_string() . '?' . $query_p) . '">' . $i . '</a></li>';
        }
    }
    $n_steps = '';
    $nxt = ($current_page + 3);
    if ($nxt > $max_pages) {
        $nxt = $max_pages;
    }
    for ($i = $current_page + 1; $i <= $nxt; $i++) {
        $get['page'] = $i;
        $query_p = http_build_query($get);
        $n_steps .= '<li class="page-item"><a class="page-link" href="' . $CI->config->site_url($CI->uri->uri_string() . '?' . $query_p) . '">' . $i . '</a></li>';
    }
    return '<ul class="pagination">' . $previous . $p_steps . $current . $n_steps . $next . '</ul>';
}

function pagination_ajax($total_rows, $per_page)
{
    if ($total_rows <= $per_page) {
        return FALSE;
    }
    $CI =& get_instance();
    $max_pages = ceil($total_rows / $per_page);
    $get = $CI->input->get();
    if (!isset($get['page'])) {
        $get['page'] = 1;
    }
    $current_page = $get['page'];
    if ($current_page == 0 || $max_pages < $current_page) {
        $current_page = 1;
    }
    $previous = '';
    if ($current_page > 1) {
        $get['page'] = $current_page - 1;
        $previous = '<li><a onclick="GetRecords(' . $get['page'] . ')" aria-label="Previous" style="cursor:pointer"><span aria-hidden="true"><i class="flaticon-direction196"></i></span></a></li>';
    }
    $next = '';
    if ($current_page < $max_pages) {
        $get['page'] = $current_page + 1;
        $next = '<li><a onclick="GetRecords(' . $get['page'] . ')" aria-label="Next" style="cursor:pointer"><span aria-hidden="true"><i class="flaticon-direction202"></i></span></a></li>';
    }
    $current = '<li><a style="border-color:#337ab7">' . $current_page . '</a></li>';
    $p_steps = '';
    $prv = $current_page - 3;
    for ($i = $prv; $i < $current_page; $i++) {
        if ($i > 0) {
            $get['page'] = $i;
            $p_steps .= '<li><a onclick="GetRecords(' . $get['page'] . ')" style="cursor:pointer">' . $i . '</a></li>';
        }
    }
    $n_steps = '';
    $nxt = ($current_page + 3);
    if ($nxt > $max_pages) {
        $nxt = $max_pages;
    }
    for ($i = $current_page + 1; $i <= $nxt; $i++) {
        $get['page'] = $i;
        $n_steps .= '<li><a onclick="GetRecords(' . $get['page'] . ')" style="cursor:pointer">' . $i . '</a></li>';
    }
    return '<div class="col-lg-12"><nav class="pagger_wrapper"><ul class="pagination">' . $previous . $p_steps . $current . $n_steps . $next . '</ul></nav></div>';
}

function current_url_with_get()
{
    $currentURL = current_url();

    $params = $_SERVER['QUERY_STRING'];

    $fullURL = $currentURL . '?' . $params;

    return $fullURL;

}
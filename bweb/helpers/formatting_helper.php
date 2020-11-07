<?php
function create_slug($slug)
{
    return url_title(convert_accented_characters($slug), 'dash', TRUE);
}
function get_email_config()
{
    $CI = &get_instance();
    $config =$mail=array();
    $email_settings = $CI->db->select('setting_key,setting')->where('code','email')->where('status',1)->get('settings')->result();
    foreach($email_settings as $es){
        $mail[$es->setting_key] = $es->setting;
    }
    if(isset($mail['email_protocol']) && $mail['email_protocol']=='smtp') {
        $config['protocol'] = $mail['email_protocol'];
        $config['smtp_host'] = $mail['email_host'];
        $config['smtp_port'] = $mail['email_port'];
        $config['smtp_user'] = $mail['email_username'];
        $config['smtp_pass'] = $mail['email_password'];
    }
    $config['smtp_timeout'] = '7';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'HTML'; // or text
    $config['validation'] = TRUE;
// print_a($mail,true);
    return $config;

}

function send_sms($send_to,$message)
{
    $CI = &get_instance();
    $sms_settings = $CI->db->select('setting_key,setting')->where('code','sms')->where('status',1)->get('settings')->result();
    foreach($sms_settings as $es){
        $sms[$es->setting_key] = $es->setting;
    }

    $request =""; //initialise the request variable
    $param['method']= "sendMessage";
    $param['send_to'] = $send_to;
    $param['msg'] = $message;
    $param['userid'] = $sms['sms_user_id'];
    $param['password'] = $sms['sms_password'];
    $param['v'] = "1.1";
    $param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
    $param['auth_scheme'] = "PLAIN";

    foreach($param as $key=>$val) {
        $request.= $key."=".urlencode($val);
        $request.= "&";
    }
    $request = substr($request, 0, strlen($request)-1);

    $url ="http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
//    echo $curl_scraped_page;
}

function format_currency($val)
{
    return 'Rs '.$val;
}

function pagination_fn()
{
    $config=array();
    $config['first_link']	= 'First';
    $config['first_tag_open']	= '<li>';
    $config['first_tag_close']	= '</li>';
    $config['last_link']	= 'Last';
    $config['last_tag_open']	= '<li>';
    $config['last_tag_close']	= '</li>';

    $config['full_tag_open']	= '<div class="text-right"><ul class="pagination pagination-split">';
    $config['full_tag_close']	= '</ul></div>';
    $config['cur_tag_open']	= '<li class="active"><a href="#">';
    $config['cur_tag_close']	= '</a></li>';

    $config['num_tag_open']	= '<li>';
    $config['num_tag_close']	= '</li>';

    $config['prev_link']	= '&laquo;';
    $config['prev_tag_open']	= '<li>';
    $config['prev_tag_close']	= '</li>';

    $config['next_link']	= '&raquo;';
    $config['next_tag_open']	= '<li>';
    $config['next_tag_close']	= '</li>';
    return $config;
}

function print_a($data,$exit=false)
{
    echo '<pre>'; print_r($data); echo '</pre>';
    if($exit) exit;
}

function user_details($details,$id_d=false,$table_d=false)
{
    $CI = &get_instance();
    $user = $CI->session->userdata('admin');
    $table = (!$table_d)? (($user['access']=='emp')?'employee':'admin'):$table_d;
    $id = ($id_d)?$id_d:$user['id'];
    return $CI->db->where('id',$id)->get($table)->row($details);
}

	function logConsole($name, $data = NULL, $jsEval = FALSE)
	{
		if (! $name) return false;

		$isevaled = false;
		$type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

		if ($jsEval && (is_array($data) || is_object($data)))
		{
			$data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
			$isevaled = true;
		}
		else
		{
			$data = json_encode($data);
		}

		# sanitalize
		$data = $data ? $data : '';
		$search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
		$replace_array = array('"', '', '', '\\n', '\\n');
		$data = preg_replace($search_array,  $replace_array, $data);
		$data = ltrim(rtrim($data, '"'), '"');
		$data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

		$js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script>
JSCODE;

		echo $js;
	}

	function array_group_by($arr, $key)
	{

		if (!is_array($arr)) {
			return array();
//            trigger_error('array_group_by(): The first argument should be an array', E_USER_ERROR);
		}
		if (!is_string($key) && !is_int($key) && !is_float($key)) {
			return array();
//            trigger_error('array_group_by(): The key should be a string or an integer', E_USER_ERROR);
		}
		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($arr as $value) {
//             print_a($value);
			$grouped[$value->$key][] = $value;
		}
//        print_a($grouped,true);
		// Recursively build a nested grouping if more parameters are supplied
		// Each grouped array value is grouped according to the next sequential key
		if (func_num_args() > 2) {
			$args = func_get_args();
			foreach ($grouped as $key => $value) {
				$parms = array_merge([$value], array_slice($args, 2, func_num_args()));
				$grouped[$key] = call_user_func_array('array_group_by', $parms);
			}
		}
		return $grouped;
	}
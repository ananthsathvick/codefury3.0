<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['is_live'] = ($_SERVER['SERVER_NAME'] == 'ghost' || $_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '192.168.0.101') ? FALSE : TRUE;
$config['theme'] = 'ver1';
$config['is_email'] = true;

/*Admin config*/
$config['page_template'] = array(''=>'Select Template','home'=>'Home Page','about_us'=>'About Us','page'=>'Page','contact_us'=>'Contact Us','faq'=>'FAQ','gallery'=>'Gallery','products'=>'Products','url_page'=>'External Link');
$config['enq_type'] = array('1'=>'Quick Enquiry','2'=>'Contact Us','3'=>'Recruitment Drive');
$config['display_in_arr'] = array('menu'=>'Menu','f1'=>'Footer 1','f2'=>'Footer 2','f3'=>'Footer 3');

$config['home_sec'] = array('1'=>'Section 1 - Banner','2'=>'Section 2','3'=>'Section 3','4'=>'Section 4');
$config['about_us_sec'] = array('1'=>'Section 1 - Banner','2'=>'Section 2','3'=>'Section 3 - Title','301'=>'Section 3 - Content','4'=>'Section 4 - Vision','5'=>'Section 5 - Mission');
$config['page_sec'] = array('1'=>'Section 1 - Banner','2'=>'Section 2');
$config['contact_us_sec'] = array('1'=>'Section 1 - Banner');
// $config['gallery_sec'] = array('1'=>'Section 1 - Banner','2'=>'Images');

/*Frontend config*/
$config['resume_clr'] = array('1'=>'#16627A','2'=>'#576d7b','3'=>'#bca97e','4'=>'#0187de','5'=>'#39c3b1','6'=>'#d0021b','7'=>'#fe7a66','8'=>'#e9a507','9'=>'#028090','10'=>'#02C39A','11'=>'#E71D36','12'=>'#FF9F1C','13'=>'#8D99AE','14'=>'#00A8E8','15'=>'#007EA7');
$config['location'] = array(''=>'All','Bangalore'=>'Bangalore','Chennai'=>'Chennai','Mysore'=>'Mysore');
// $config['edu_array'] = array('Diploma'=>'Diploma','BE'=>'BE','Btech'=>'B.Tech','Bsc'=>'Bsc','Bcom'=>'Bcom','ME'=>'ME','Mtech'=>'M.Tech','Msc'=>'Msc','Mcom'=>'Mcom','Phd'=>'Phd','Other'=>'Other');
$config['edu_array'] = array('Diploma'=>'Diploma',
'B.Arch'=>'B.Arch','BE'=>'BE','Btech'=>'B.Tech','Bsc'=>'Bsc',
'BA'=>'BA',
'BBA'=>'BBA',
'Bcom'=>'Bcom',
'BCA'=>'BCA',
'BDS'=>'BDS','BEd'=>'BEd','BFA'=>'BFA',
'LLB'=>'LLB','BMC'=>'BMC',
'ME'=>'ME','Mtech'=>'M.Tech','Msc'=>'Msc','Mcom'=>'Mcom',
'Phd'=>'Phd','Other'=>'Other');
$config['post_date'] = array('1'=>'Last Hour','2'=>'Last 24 Hours','3'=>'Last 7 Days','4'=>'Last 30 Days');
$config['experience'] = array('6m'=>'0 -6 months','1'=>'6 months - 1 year','2'=>'1 year - 2 years','3'=>'2 year - 3 years');


$config['googleplus_appsecret']		= '';
$config['googleplus_appid']		= '';
$config['fb_appid']		= '';
$config['fb_appsecret']		= '';

$config['otp_sms']='Code Headed OTP is ^{otp}^';
// $config['otp_sms']='Code Headed OTP is ^{otp}^';

/*$config['api_key'] = 'test_a5fdd887d774606e963a75b2313';
$config['auth_token'] = 'test_0864809c8940b721a8dc7a7e469';
$config['private_salt'] = '1790d267eb1b4b699adcb01a57063a5f';*/

$config['api_key'] = '757846dafcc0614d82cc5c9c0b357c4d';
$config['auth_token'] = '7b3fa36d18fb6f193ae9ee9a5e06268c';
$config['private_salt'] = '264e9fe367494b65b71df933a9312c03';
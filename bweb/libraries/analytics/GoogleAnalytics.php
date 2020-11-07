<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GoogleAnalytics
{
    var $ga;
    var $ga_profile_id;

    public function __construct()
    {
        require 'Gapi.php';
    }

    function get_ga($tid,$dimensions = null, $metrics = null,$sort_metric=null, $filter=null, $start_date=null, $end_date=null, $start_index=1, $max_results=10000)
    {
        $this->ga = new gapi("orangebox-ga@ultra-ridge-165906.iam.gserviceaccount.com", "Googleanalytic-3ec12418b467.p12");
        $this->ga->requestReportData($tid, $dimensions, $metrics,$sort_metric, $filter, $start_date, $end_date, $start_index, $max_results);
    }
}

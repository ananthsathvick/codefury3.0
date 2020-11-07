<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    require_once APPPATH . "/third_party/PHPExcel.php";

    class Excel extends PHPExcel
    {
        public function __construct()
        {
            parent::__construct();
        }

        function parse_file($file)
        {
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
//get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
//extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                //header will/should be in row 1 only. of course this can be modified to suit your need.
                $ret ='';
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
//				$ret[$column] =  $data_value;
//				print_a($ret);
                } else {
                    $arr_data[$row][$column] = $data_value;
                    $final_array[$row][$header[1][$column]] = $data_value;
//				unset($ret);
                }
            }
//send the data in an array format
            $data['header'] = $header;
            $data['values'] = $arr_data;
//		$data['final_array'] = array_combine($header,$arr_data);
            return $final_array;
//            print_a($final_array);
        }
    }

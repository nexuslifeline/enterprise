<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CORE_Controller
{
    function __construct()
    {
        parent::__construct('');
        $this->validate_session();

        $this->load->library('excel');

        $this->load->model(
            array
            (
                'Departments_model',
                'Refproduct_model',
                'Products_model'
            )
        );
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
        $data['title'] = 'Inventory Report';

        $data['departments']=$this->Departments_model->get_list(array('is_deleted'=>FALSE,'is_active'=>TRUE));
        $data['product_types']=$this->Refproduct_model->get_list(array('is_deleted'=>FALSE));

        $this->load->view('inventory_report_view',$data);

    }


    public function transaction($txn=null){

        switch($txn){
            case 'export':
                $m_products=$this->Products_model;

                $is_show_all=($this->input->get('show_all',TRUE)==1?TRUE:FALSE);
                $prod_type_id=$this->input->get('type_id',TRUE);
                $date=date('Y-m-d',strtotime($this->input->get('date',TRUE)));


                $excel=$this->excel;
                $excel->setActiveSheetIndex(0);

                //name the worksheet
                $excel->getActiveSheet()->setTitle('Inventory Report '.date('M d Y',strtotime($date)));

                //header
                //create headers
                $excel->getActiveSheet()->getStyle('A4:I4')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->setCellValue('A4', 'Product')
                    ->setCellValue('B4', 'Product type')
                    ->setCellValue('C4', 'Supplier')
                    ->setCellValue('D4', 'Category')
                    ->setCellValue('E4', 'Purchase')
                    ->setCellValue('F4', 'SRP')
                    ->setCellValue('G4', 'On Hand');

                $inventory=$m_products->get_inventory($date,$prod_type_id,$is_show_all);
                $rows=array();
                foreach($inventory as $x){
                    $rows[]=array(
                        $x->product_desc,
                        $x->product_type,
                        $x->supplier_name,
                        $x->category_name,
                        $x->purchase_cost,
                        $x->sale_price,
                        $x->on_hand
                    );
                }

                $max_rows=count($inventory)+4;

                for($i=5;$i<=$max_rows;$i++){
                    $excel->getActiveSheet()->getStyle('E'.$i.':F'.$i)->getNumberFormat()->setFormatCode('###,##0.00;(###,##0.00)');
                }

                //autofit column
                foreach(range('A','G') as $columnID)
                {
                    $excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(TRUE);
                }



                $excel->getActiveSheet()->fromArray($rows,NULL,'A5');

                // Redirect output to a client’s web browser (Excel2007)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename=Inventory Report '.$date.'.xlsx');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
                $objWriter->save('php://output');


                break;
        }


    }











}
?>
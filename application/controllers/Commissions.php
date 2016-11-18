<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Commissions extends CI_Controller {

        private $data;
        private $today;

        public function __construct()
        {
            parent::__construct();
            $this->lang->load('auth');

            if (!$this->ion_auth->logged_in()) {
                redirect('/', 'refresh');
            }
        }

        function index()
        {
            $this->session->set_flashdata('page', 'commissions/index');
            $this->load->view('layouts/admin');
        }

        function sellers()
        {
            $this->db->select('salesman');
            $this->db->from('orders');
            $this->db->distinct();
            $this->data = $this->db->get()->result_array();

            $response = [];

            foreach($this->data as $seller){
                $response[] = ['data' => $seller['salesman'], 'value' => $seller['salesman']];
            }

            return $this->output->set_content_type('application/json')
                                ->set_status_header(200)
                                ->set_output(json_encode(['suggestions' => $response]));
        }

        function calculate()
        {
            $this->data = new stdClass();
            $this->data->seller = $this->input->post('seller');
            $this->data->option = $this->input->post('option');

            $this->today = date("Y-m-d", strtotime('today'));

            switch ($this->input->post('option')) {
            case 'Last week':
                $last_thurdsay = date("Y-m-d", strtotime('last Thursday'));
                $diff = abs($this->today - $last_thurdsay);
                // echo date("m/d/Y", $today);

                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                // echo $days;

                $this->get_commission($last_thurdsay);
                break;
            case "Bimonthly":
                $last_2_months = date('Y-m-d',strtotime('-2 months'));
                $this->get_commission($last_2_months);
                break;
            case "Quarterly":
                $last_4_months = date('Y-m-d',strtotime('-4 months'));
                $this->get_commission($last_4_months);
                break;
            case "Biannual":
                $last_6_months = date('Y-m-d',strtotime('-6 months'));
                $this->get_commission($last_6_months);
                break;
            case "Custom":
                $i_date1 = $this->input->post('date1');
                $i_date2 = $this->input->post('date2');
                $date1 = date('Y-m-d', strtotime(str_replace('-', '/', $i_date1)));
                $date2 = date('Y-m-d', strtotime(str_replace('-', '/', $i_date2)));
                $this->data->option = "Date between ".$i_date1." and ".$i_date2;
                $this->get_commission($date1,$date2);
                break;
            }
        }

        private function get_commission($date1, $date2=NULL)
        {
            if(is_null($date2)) {
                $date2 = $this->today;
            }

            $this->db->select_sum('pay_total');
            $this->db->where(['salesman =' => $this->data->seller]);
            $this->db->where(['date >=' => $date1]);
            $this->db->where(['date <=' => $date2]);
            $this->db->from('orders');
            $query = $this->db->get();
            $sum = $query->row();
            $total = $sum->pay_total;
            $commission = $sum->pay_total * (10/100);

            $this->data->total = number_format($total,2,'.','');
            $this->data->commission = number_format($commission,2,'.','');

            echo json_encode($this->data);
        }
    }

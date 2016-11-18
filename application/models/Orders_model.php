<?php
 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

class Orders_model extends CI_Model
{
    public function get_orders()
    {
        if (!$this->ion_auth->is_admin()) {
            $this->db->where(['salesman =' => $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name]);
            // $this->db->where(array('id =' => $this->ion_auth->user()->row()->id));
            $query = $this->db->get('orders');
        } else {
            $query = $this->db->order_by('id', 'ASC')->get('orders');
        }

        $data = $query->result_array();

        // format dates to US format
        $i = 0;
        foreach ($data as $object) {
            $data[$i]['date'] = date('m/d/Y', strtotime($object['date']));

            if ($data[$i]['logo_delivery_date'] == '0000-00-00' || $data[$i]['logo_delivery_date'] == null) {
                $data[$i]['logo_delivery_date'] = '';
            } else {
                $data[$i]['logo_delivery_date'] = date('m/d/Y', strtotime($object['logo_delivery_date']));
            }

            if ($data[$i]['delivery_date'] == null || $data[$i]['delivery_date'] == '0000-00-00') {
                $data[$i]['delivery_date'] = '';
            } else {
                $data[$i]['delivery_date'] = date('m/d/Y', strtotime($object['delivery_date']));
            }

            ++$i;
        }

        return $data;
    }

    public function get_orders_test()
    {
        $query = $this->db->get('orders');
        $query = $this->db->order_by('id', 'ASC')->get('orders');

        return $query->result_array();
    }

    public function get_order_status($order_id)
    {
        $this->db->select('status');
        $this->db->where(['id =' => $order_id]);
        $query = $this->db->get('orders');

        return $query->row()->status;
    }
}

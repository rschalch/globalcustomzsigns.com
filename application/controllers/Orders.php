<?php

defined('BASEPATH') or exit('No direct script access allowed');

    class Orders extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->lang->load('auth');

            if (!$this->ion_auth->logged_in()) {
                redirect('/', 'refresh');
            }
        }

        public function index()
        {
            $this->session->set_flashdata('page', 'orders/list');
            $this->load->view('layouts/admin');
        }

        public function add()
        {
            $this->data['work_options'] = [
              '' => 'Please Select',
              'Sign' => 'Sign',
              'Graphic Design' => 'Graphic Design',
              'Auto Customization' => 'Auto Customization',
            ];
            $this->data['logo_types'] = [
              '' => 'Please Select',
              'Sent' => 'Sent',
              'Redesign' => 'Redesign',
              'Create' => 'Create',
              'None' => 'None',
            ];
            $this->data['pay_methods'] = [
              '' => 'Please Select',
              'Cash' => 'Cash',
              'Credit Card' => 'Credit Card',
              'Check' => 'Check',
            ];

            $this->session->set_flashdata('page', 'orders/add');
            $this->load->view('layouts/admin', $this->data);
        }

        public function create()
        {
            if ($this->input->post('logo_delivery_date') == "") {
                $logo_delivery_date = "";
            } else {
                $logo_delivery_date = date('Y-m-d', strtotime($this->input->post('logo_delivery_date')));
            }

            if ($this->input->post('delivery_date') == "") {
                $delivery_date = "";
            } else {
                $delivery_date = date('Y-m-d', strtotime($this->input->post('delivery_date')));
            }


            $data = [
              'salesman' => $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name,
              'date' => date('Y-m-d'),
              'client' => $this->input->post('client'),
              'client_address' => $this->input->post('client_address'),
              'client_email' => $this->input->post('client_email'),
              'client_phone' => $this->input->post('client_phone'),
              'work' => $this->input->post('work'),
              'work_description' => $this->input->post('work_description'),
              'logo' => $this->input->post('logo'),
              'logo_delivery_date' => $logo_delivery_date,
              'pay_method' => $this->input->post('pay_method'),
              'pay_total' => $this->input->post('pay_total'),
              'deposit' => $this->input->post('deposit'),
              'balance' => $this->input->post('balance'),
              'delivery_date' => $delivery_date,
            ];

            $salesman = $data['salesman'];
            $date = $data['date'];
            $client = $data['client'];
            $client_address = $data['client_address'];
            $client_email = $data['client_email'];
            $client_phone = $data['client_phone'];
            $work = $data['work'];
            $work_description = $data['work_description'];
            $logo = $data['logo'];
            $logo_delivery_date = $data['logo_delivery_date'];
            $pay_method = $data['pay_method'];
            $pay_total = $data['pay_total'];
            $deposit = $data['deposit'];
            $balance = $data['balance'];

            if ($this->db->insert('orders', $data)) {
                $this->session->set_tempdata('message', 'Order created!', 15);
                $this->session->set_tempdata('class', 'alert alert-success', 15);

                // create and send the email
                $this->load->library('email');

                $message = "
                <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                 <head>
                  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                  <title>Order created</title>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
                </head>
                <body style='margin: 0; padding: 0;'>
                 <table cellpadding='0' cellspacing='0' width='100%'>
                  <tr>
                   <td>
                     <table align='center' bgcolor='#eeeeee' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;'>
                       <tr>
                         <td align='center' style='padding: 40px 0 30px 0;'>
                          <img src='http://globalcustomzsigns.com/images/logo.png' alt='GlobalCustomzSigns' style='display: block;' />
                         </td>
                       </tr>
                       <tr>
                         <td bgcolor='#FFFFFF' style='padding: 40px 30px 40px 30px;'>
                           <table cellpadding='0' cellspacing='0' width='100%'>
                            <tr>
                             <td>
                              <h2>Order created from $salesman</h2>
                              <h4>Date: $date</h4>
                              <h4>Client: $client</h4>
                              <h4>Client Address: $client_address</h4>
                              <h4>Client Email: $client_email</h4>
                              <h4>Client Phone: $client_phone</h4>
                              <h4>Work: $work</h4>
                              <h4>Work Description: $work_description</h4>
                              <h4>Logo: $logo</h4>
                              <h4>Logo Delivery Date: $logo_delivery_date</h4>
                              <h4>Pay Method: $pay_method</h4>
                              <h4>Pay Total: $pay_total</h4>
                              <h4>Deposit: $deposit</h4>
                              <h4>Balance: $balance</h4>
                             </td>
                            </tr>
                            <tr>
                             <td style='padding: 20px 0 30px 0;'>
                              $text
                             </td>
                            </tr>
                           </table>
                         </td>
                       </tr>
                       <tr>
                         <td bgcolor='#b92a25' style='padding: 20px 20px 20px 20px;'>
                           <table cellpadding='0' cellspacing='0' width='100%'>
                             <td width='75%' style='color: #FFFFFF'>
                              <strong>&reg; Globalcustomzsigns.com 2015</strong>
                             </td>
                             <!--<td align='right'>-->
                              <!--<table border='0' cellpadding='0' cellspacing='0'>-->
                               <!--<tr>-->
                                <!--<td>-->
                                 <!--<a href='http://www.twitter.com/'>-->
                                  <!--&lt;!&ndash;<img src='images/tw.gif' alt='Twitter' width='38' height='38' style='display: block;' border='0' />&ndash;&gt;-->
                                 <!--</a>-->
                                <!--</td>-->
                                <!--<td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>-->
                                <!--<td>-->
                                 <!--<a href='http://www.twitter.com/'>-->
                                  <!--&lt;!&ndash;<img src='images/fb.gif' alt='Facebook' width='38' height='38' style='display: block;' border='0' />&ndash;&gt;-->
                                 <!--</a>-->
                                <!--</td>-->
                               <!--</tr>-->
                              <!--</table>-->
                             <!--</td>-->
                           </table>
                         </td>
                       </tr>
                     </table>
                   </td>
                  </tr>
                 </table>
                </body>
                </html>
                ";

                $this->email->from('contact@globalcustomzsigns.com', 'Contact');
                $this->email->to('contact@globalcustomzsigns.com');
                // $this->email->to('ricardo.schalch@gmail.com');
                //$this->email->cc('test2@gmail.com');
                $this->email->subject("New order by $salesman");
                $this->email->message($message);
                //$this->email->attach('/path/to/file2.pdf');
                $this->email->send();
            } else {
                $this->session->set_tempdata('message', 'There\'s a problem creating the order. Try again later.', 15);
                $this->session->set_tempdata('class', 'alert alert-danger', 15);
            }

            redirect('orders/add');
        }

        public function update_order($id)
        {
            if ($this->input->post('logo_delivery_date') == "") {
                $logo_delivery_date = "";
            } else {
                $logo_delivery_date = date('Y-m-d', strtotime($this->input->post('logo_delivery_date')));
            }

            if ($this->input->post('delivery_date') == "") {
                $delivery_date = "";
            } else {
                $delivery_date = date('Y-m-d', strtotime($this->input->post('delivery_date')));
            }

            $status = $this->input->post('status');
            $old_status = $this->orders_model->get_order_status($id);
            $new_status = $old_status."<br><span class='date'>".date('m/d/Y').': '.'</span>'.$status;

            if (!isset($status) || trim($status) == '') {
                $new_status = $old_status;
            }

            $data = [
                  'date' => date('Y-m-d', strtotime($this->input->post('date'))),
                  'client' => $this->input->post('client'),
                  'client_address' => $this->input->post('client_address'),
                  'client_email' => $this->input->post('client_email'),
                  'client_phone' => $this->input->post('client_phone'),
                  'work' => $this->input->post('work'),
                  'work_description' => $this->input->post('work_description'),
                  'logo' => $this->input->post('logo'),
                  'logo_delivery_date' => $logo_delivery_date,
                  'pay_method' => $this->input->post('pay_method'),
                  'pay_total' => $this->input->post('pay_total'),
                  'deposit' => $this->input->post('deposit'),
                  'balance' => $this->input->post('balance'),
                  'status' => $new_status,
                  'delivery_date' => $delivery_date,
                  'finalised' => $this->input->post('finalised'),
            ];

            $this->db->where('id', $id);

            if ($this->db->update('orders', $data)) {
                echo 'success';
            } else {
                echo 'fail';
            }
        }

        public function delete_order($id)
        {
            $this->db->where('id', $id);

            if ($this->db->delete('orders')) {
                echo 'success';
            } else {
                echo 'fail';
            }
        }

        public function reactivate($order_id)
        {
            if ($this->ion_auth->is_admin()) {
                $this->db->where('id', $order_id);
                if ($this->db->update('orders', ['finalised' => 0])) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            }
        }

        //////////////////////////////////////////////////////////////////
        // API
        //////////////////////////////////////////////////////////////////

        public function orders()
        {
            $data = $this->orders_model->get_orders();
            echo json_encode(['data' => $data]);
        }
    }

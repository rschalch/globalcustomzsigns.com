<?php defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('auth');
    }

    function index()
    {
        $this->load->view('home');
    }

    function globalpage()
    {
        $this->load->view('global');
    }

    function products()
    {
        $this->load->view('products');
    }

    function gallery()
    {
        $this->load->view('gallery');
    }

    function visual_communications()
    {
        $this->load->view('visual-comm');
    }

    function contact()
    {
        $this->load->view('contact');
    }

    function sendmail()
    {
        $this->load->library('email');

        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $text = $this->input->post('message');

        $message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>Contact by site</title>
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
              <h3>Contact by site: $name</h3>
              <h4>Phone: $phone</h4>
              <h4>E-mail: $email</h4>
              <h4>Subject: $subject</h4>
             </td>
            </tr>
            <tr>
             <td style='padding: 20px 0 30px 0;'>
              $text
             </td>
            </tr>
            <tr>
             <td>
               <table cellpadding='0' cellspacing='0' width='100%'>
                <tr>
                 <td width='260' valign='top'>
                  <table cellpadding='0' cellspacing='0' width='100%'>
                   <tr>
                    <td>
                     <!--<img src='images/left.gif' alt='' width='100%' height='140' style='display: block;' />-->
                    </td>
                   </tr>
                 </table>
                 </td>
                 <td style='font-size: 0; line-height: 0;' width='20'>
                  &nbsp;
                 </td>
                 <td width='260' valign='top'>
                  <table cellpadding='0' cellspacing='0' width='100%'>
                   <tr>
                    <td>
                     <!--<img src='images/right.gif' alt='' width='100%' height='140' style='display: block;' />-->
                    </td>
                   </tr>
                 </table>
                 </td>
                </tr>
               </table>
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

        $this->email->from($email, $name);
        $this->email->to('contato@globalcustomzsigns.com');
        //$this->email->cc('test2@gmail.com');
        $this->email->subject('Contact by site');
        $this->email->message($message);
        //$this->email->attach('/path/to/file1.png');
        //$this->email->attach('/path/to/file2.pdf');
        if ($this->email->send()) {
            $this->session->set_tempdata('class', 'alert-success', 15);
            $this->session->set_tempdata('result', 'Email successfully sent.', 15);
        } else {
            $this->session->set_tempdata('class', 'alert-danger', 15);
            $this->session->set_tempdata('result', 'Email could not be sent at this time. Please try again later.', 15);
        }

        redirect('contact', 'refresh');
    }
}

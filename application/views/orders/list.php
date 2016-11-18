<?php if ($this->session->tempdata()) : ?>
  <div id="warning" class="row">
    <div class="col-md-12">
      <div class="<?= $this->session->tempdata('class') ?>">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>
          <?= $this->session->tempdata('message') ?>
        </strong>
      </div>
    </div>
  </div>
  <?php endif; ?>

    <div class="row-fluid">
      <div id="cli-section" class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <h1 class="adm-title">Orders</h1>
            <div id="top" class="row">
              <!--<div class="col-md-4">
                <div class="dt-buttons btn-group">
                  <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="example"><span>Copy</span></a>
                  <a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="example"><span>Excel</span></a>
                  <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="example"><span>CSV</span></a>
                  <a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="example"><span>PDF</span></a>
                  <a class="btn btn-default buttons-print" tabindex="0" aria-controls="example"><span>Print</span></a>
                </div>
              </div>-->
              <div id="_length_wrapper" class="col-md-4"></div>
              <div id="_filter_wrapper" class="col-md-4"></div>
            </div> <!--end #top-->

            <div id="middle" class="row">
              <div class="col-md-12">
                <table id="orders" class="table table-condensed table-hover">
                  <thead>
                    <tr>
                      <th>Order Number</th>
                      <th>Salesman</th>
                      <th>Date</th>
                      <th>Client</th>
                      <th class="hideme">Client Address</th>
                      <th class="hideme">Client Email</th>
                      <th class="hideme">Client Phone</th>
                      <th>Work</th>
                      <th class="hideme">Work Description</th>
                      <th class="hideme">Logo</th>
                      <th>Pay Total</th>
                      <th>Deposit</th>
                      <th>Balance</th>
                      <th>Last Status</th>
                      <th class="hideme">Finalised</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                  <tfoot>
                    <tr>
                      <th>Order Number</th>
                      <th>Salesman</th>
                      <th>Date</th>
                      <th>Client</th>
                      <th>Client Address</th>
                      <th>Client Email</th>
                      <th>Client Phone</th>
                      <th>Work</th>
                      <th>Work Description</th>
                      <th>Logo</th>
                      <th>Pay Total</th>
                      <th>Deposit</th>
                      <th>Balance</th>
                      <th>Last Status</th>
                      <th>Finalised</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div> <!--end #middle-->

            <div id="bottom" class="row">
              <div class="col-md-5">
                <div id="_info_wrapper"></div>
              </div>
              <div class="col-md-7">
                <div id="_pagination_wrapper"></div>
              </div>
            </div> <!--end #bottom-->
          </div>
        </div>
      </div>
    </div>


    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- MODAL ALTER ORDER -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


    <?= form_open(null, ['id' => 'form_update_order', 'class' => 'form-horizontal t20']); ?>
      <div class="modal fade" id="_modal_update_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 class="adm-title-no-margin" id="change_order_title"></h2>
            </div>
            <div class="modal-body">
              <div class="row">

                <!-- first row, first column -->
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <?= form_label('Date:', 'date', ['class' => 'col-sm-4 control-label']); ?>
                    <div class="col-sm-8">
                      <div id='datetimepicker_date' class="input-group date">
                        <input onkeydown="return false" type='text' class="form-control" id="date" name="date" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Client:', 'client', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('client', '', ['id' => 'client', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Client Address:', 'client_address', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('client_address', '', ['id' => 'client_address', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Client Email:', 'client_email', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('client_email', '', ['id' => 'client_email', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Client Phone:', 'client_phone', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('client_phone', '', ['id' => 'client_phone', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Work:', 'work', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('work', '', ['id' => 'work', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <?php $wdoptions = [
                      'id' => 'work_description',
                      'name' => 'work_description',
                      'class' => 'form-control',
                      'value' => '',
                      'rows' => '4',
                    ]; ?>

                  <div class="form-group">
                    <?= form_label('Work Description:', 'work_description', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_textarea($wdoptions); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Logo:', 'logo', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('logo', '', ['id' => 'logo', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Logo Delivery Date:', 'logo_delivery_date', ['class' => 'col-sm-4 control-label']); ?>
                    <div class="col-sm-8">
                      <div id='datetimepicker_logo' class="input-group date">
                        <input onkeydown="return false" type='text' class="form-control" id="logo_delivery_date" name="logo_delivery_date" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- first row, second column -->
                <div class="col-md-4 col-sm-12">

                  <div class="form-group">
                    <?= form_label('Pay Method:', 'pay_method', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('pay_method', '', ['id' => 'pay_method', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Pay Total:', 'pay_total', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('pay_total', '', ['id' => 'pay_total', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Deposit:', 'deposit', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('deposit', '', ['id' => 'deposit', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Balance:', 'balance', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('balance', '', ['id' => 'balance', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <?= form_label('Due Date:', 'delivery_date', ['class' => 'col-sm-4 control-label']); ?>
                    <div class="col-sm-8">
                      <div id='datetimepicker_delivery' class="input-group date">
                        <input onkeydown="return false" type='text' class="form-control" id="delivery_date" name="delivery_date" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>

                  <?php if ($this->ion_auth->is_admin()):

                    $finalised_options = [
                      '0' => 'No',
                      '1' => 'Yes',
                    ];

                  ?>

                  <div class="form-group">
                    <?= form_label('Finalised:', 'finalised', ['class' => 'col-sm-4 control-label']); ?>
                    <div class="col-sm-8">
                      <?= form_dropdown('finalised', $finalised_options, '', ['id' => 'finalised', 'class' => 'form-control']); ?>
                    </div>
                  </div>

                  <?php endif; ?>

                </div>

                <!-- first row, third column -->
                <div class="col-md-4 col-sm-12">

                  <div class="form-group">
                    <?= form_label('Add Job Status:', 'status', ['class' => 'col-sm-4 control-label']); ?>
                      <div class="col-sm-8">
                        <?= form_input('status', '', ['id' => 'status', 'class' => 'form-control']); ?>
                      </div>
                  </div>

                  <div>
                    <?= form_label('Full Job Status:', null, ['class' => 'col-sm-4 control-label']); ?>
                    <div class="col-sm-8">
                      <div id="status_list" class="text-status"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button id="changeorder" type="submit" class="btn btn-primary">Change Order</button>
            </div>
          </div>
        </div>
      </div>
    <?= form_close() ?>


    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- MODAL LIST FINALISED ORDER -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


      <div class="modal fade" id="_modal_finalised_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 class="adm-title-no-margin" id="finalised_order_title"></h2>
            </div>
            <div class="modal-body">
              <table class="table table-condensed">
                <tr>
                  <td>Salesman:</td>
                  <td id="fin_salesman"></td>
                </tr>
                <tr>
                  <td>Date:</td>
                  <td id="fin_date"></td>
                </tr>
                <tr>
                  <td>Client:</td>
                  <td id="fin_client"></td>
                </tr>
                <tr>
                  <td>Client Address:</td>
                  <td id="fin_client_address"></td>
                </tr>
                <tr>
                  <td>Client Email:</td>
                  <td id="fin_client_email"></td>
                </tr>
                <tr>
                  <td>Client Phone:</td>
                  <td id="fin_client_phone"></td>
                </tr>
                <tr>
                  <td>Work:</td>
                  <td id="fin_work"></td>
                </tr>
                <tr>
                  <td>Work Description:</td>
                  <td id="fin_work_description"></td>
                </tr>
                <tr>
                  <td>Logo:</td>
                  <td id="fin_logo"></td>
                </tr>
                <tr>
                  <td>Logo Delivery Date:</td>
                  <td id="fin_logo_delivery_date"></td>
                </tr>
                <tr>
                  <td>Pay Method:</td>
                  <td id="fin_pay_method"></td>
                </tr>
                <tr>
                  <td>Pay Total:</td>
                  <td id="fin_pay_total"></td>
                </tr>
                <tr>
                  <td>Deposit:</td>
                  <td id="fin_deposit"></td>
                </tr>
                <tr>
                  <td>Balance:</td>
                  <td id="fin_balance"></td>
                </tr>
                <tr>
                  <td>Job Status:</td>
                  <td id="fin_status"></td>
                </tr>
                <tr>
                  <td>Due Date:</td>
                  <td id="fin_delivery_date"></td>
                </tr>
              </table>
            </div>

            <div class="modal-footer">
              <? if($this->ion_auth->is_admin()) : ?>
                <button id="reactivate" type="button" class="btn btn-primary">Reactivate</button>
              <? endif; ?>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- MODAL EXCLUDE ORDER -->
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


        <?= form_open(null, array('id' => 'form_del_order', 'class' => 'form-horizontal t20')); ?>
          <div class="modal fade" id="_modal_del_order" tabindex="-1" role="dialog" aria-labelledby="orderDelModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="adm-title-no-margin" id="_modal_del_order_label"></h2>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button id="delorder" type="submit" class="btn btn-danger">Exclude</button>
                </div>
              </div>
            </div>
          </div>
          <?= form_close() ?>

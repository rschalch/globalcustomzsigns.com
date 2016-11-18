(function() {

  $(document).ready(function() {

    if (window.location.href.match("/orders$")) {

      var torders = $('#orders');
      var trashButton;
      var btn_changeorder = $('#changeorder');
      var order_id;
      var request;
      var is_adm;

      // check if is admin
      var rq = $.ajax({
        url: window.location.origin + "/auth/admin",
        method: "GET"
      });

      rq.success(function(data) {
        if (data == "success") {
          is_adm = true;
          trashButton = '<span class="glyphicon glyphicon-trash"></span>';
        } else {
          is_adm = false;
          trashButton = '';
        }

        $('#datetimepicker_date').datetimepicker({
          format: 'MM/DD/YYYY'
        });

        $('#datetimepicker_logo').datetimepicker({
          format: 'MM/DD/YYYY'
        });

        $('#datetimepicker_delivery').datetimepicker({
          format: 'MM/DD/YYYY'
        });

        // RESET TABLE
        var clearAndReloadTable = function() {
          $.fn.dataTable.ext.search = []; // empty the search array
          orders.clear().draw();
          orders.ajax.url('orders/orders').load();
        };

        /*var dt_language = {
         sEmptyTable:     "",
         sInfo:           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
         sInfoEmpty:      "Mostrando 0 até 0 de 0 registros",
         sInfoFiltered:   "(Filtrados de _MAX_ registros)",
         sInfoPostFix:    "",
         sInfoThousands:  ".",
         sLengthMenu:     "_MENU_ resultados por página",
         sLoadingRecords: "Carregando...",
         sProcessing:     "Processando...",
         sZeroRecords:    "",
         sSearch:         "Pesquisar",
         oPaginate:       {
           sNext:     "Próximo",
           sPrevious: "Anterior",
           sFirst:    "Primeiro",
           sLast:     "Último"
         },
         oAria:           {
           sSortAscending:  ": Ordenar colunas de forma ascendente",
           sSortDescending: ": Ordenar colunas de forma descendente"
         }
        };*/

        // DATATABLES PLUGIN FOR SORTING DATES
        $.fn.dataTable.moment('YYYY-MM-DD');

        // RESET FIELDS
        var clearFields = function() {

          $('#salesman').val('');
          $('#date').val('');
          $('#client').val('');
          $('#client_address').val('');
          $('#client_email').val('');
          $('#client_phone').val('');
          $('#work').val('');
          $('#work_description').val('');
          $('#logo').val('');
          $('#logo_delivery_date').val('');
          $('#pay_method').val('');
          $('#pay_total').val('');
          $('#deposit').val('');
          $('#balance').val('');
          $('#status').val('');
        };

        // SETUP - CUSTOM BUTTONS
        $.fn.dataTable.ext.buttons.customprint = {
            extend: 'print',
            text: 'Print',
            customize: function ( win ) {
                $(win.document.body).css( 'font-size', '9pt' );
                $(win.document.body).find( 'table' )
                    /*.prepend(
                        '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                    )*/
                    .addClass( 'compact' )
                    .css( 'font-size', 'inherit' );
                $(win.document.body).find( 'thead' ).css( 'display', 'table-header-group' );
            },
            exportOptions: {
              columns: [0, 1, 2, 3, 6, 7, 8, 10, 11, 12, 13, 14]
            },
            key: {
                key: 'p',
                // altKey: true
            },
            // className: 'filter-button'
        };

        $.fn.dataTable.ext.buttons.finalised = {
            text: 'Finalised',
            action: function ( e, dt, node, config ) {
              $.fn.dataTable.ext.search = [];
              dt.draw();
              $.fn.dataTable.ext.search.push(
                  function( settings, data, dataIndex ) {
                    if (data[14] === '1') { // if the data of column 'finalised' (which is at index 14 on the table) > 0
                      return true;
                    }
                    return false;
                  }
              );
              dt.draw();
              dt.button( 2 ).active( true ); // finalised active
              dt.button( 3 ).active( false ); // no_finalised not active
              dt.button( 4 ).active( false ); // all not active
            },
            key: {
                key: 'f',
                // altKey: true
            },
            className: 'filter-button'
        };

        $.fn.dataTable.ext.buttons.no_finalised = {
            text: 'No Finalised',
            action: function ( e, dt, node, config ) {
              $.fn.dataTable.ext.search = [];
              dt.draw();
              $.fn.dataTable.ext.search.push(
                  function( settings, data, dataIndex ) {
                    if (data[14] === "0") { // if the data of column 'finalised' (which is at index 14 on the table) > 0
                      return true;
                    }
                    return false;
                  }
              );
              dt.draw();
              dt.button( 2 ).active( false ); // finalised not active
              dt.button( 3 ).active( true ); // no_finalised active
              dt.button( 4 ).active( false ); // all not active
            },
            key: {
                key: 'n',
                // altKey: true
            },
            className: 'filter-button'
        };

        $.fn.dataTable.ext.buttons.all = {
            text: 'All',
            action: function ( e, dt, node, config ) {
              $.fn.dataTable.ext.search = [];
              dt.draw();
              dt.button( 2 ).active( false );
              dt.button( 3 ).active( false );
              dt.button( 4 ).active( true );
            },
            key: {
                key: 'a',
            },
            className: 'filter-button'
        };

        // SETUP - ADD A TEXT INPUT TO EACH FOOTER CELL (Except the last, the trash icon)
        $('#orders tfoot th:not(:last)').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" class="form-control" />' );
        });

        // DATATABLE
        orders = torders.DataTable({
          // processing: true,
          // dom: 'lBfrtip',
          dom: "<'row'<'col-md-2'l><'col-md-4'B><'col-md-6'f>>" +
               "<'row'<'col-md-12'tr>>" +
               "<'row'<'col-md-5'i><'col-md-7'p>>",
          searching: true,
          paging: true,
          pagingType: "full_numbers",
          info: true,
          lengthChange: true,
          buttons: ['excel', 'customprint', 'finalised', 'no_finalised', 'all'],
          deferRender: true,
          scrollY: "45vh",
          ajax: {
            url: "orders/orders",
            type: "POST",
            data: {
              csrf_test_name: $.cookie('csrf_cookie_name')
            }
          },
          columns: [
            { data: "id"},
            { data: "salesman"},
            { data: "date"},
            { data: "client"},
            { data: "client_address"},
            { data: "client_email"},
            { data: "client_phone"},
            { data: "work"},
            { data: "work_description"},
            { data: "logo"},
            { data: "pay_total"},
            { data: "deposit"},
            { data: "balance"},
            { data: "status"},
            { data: "finalised"},
            { data: null,  defaultContent: trashButton }
          ],
          columnDefs: [
            {targets: 0, width: "10%"}, // id
            {targets: 1, width: "10%"}, // salesman
            {targets: 2, width: "10%", orderable: false}, // date
            {targets: 3, width: "15%", orderable: false}, // client
            {targets: 4, visible: false}, // client_address
            {targets: 5, visible: false}, // client_email
            {targets: 6, visible: false}, // client_phone
            {targets: 7, width: "10%", orderable: false}, // work
            {targets: 8, visible: false}, // work_description
            {targets: 9, visible: false}, // logo
            {targets: 10, width: "5%", orderable: false}, // pay_total
            {targets: 11, width: "5%", orderable: false}, // deposit
            {targets: 12, width: "5%", orderable: false}, // balance
            {render: function(data, type, row) { if(data !== null) {return data.split("<br><span class='date'>").pop();} else {return "";}}, targets: 13, width: "30%", orderable: false}, // status
            {targets: 14, visible: false}, // finalised
            {targets: 15, width: "0%", orderable: false} // trash icon
          ],
          drawCallback: function() {
            torders.find('tbody').find('.glyphicon-trash').on('click', function(e) {
              e.stopPropagation();
              var rowdata = orders.row($(this).parents('tr')).data();
              order_id = rowdata.id;
              $('#_modal_del_order_label').html("Exclude order?");
              $('#_modal_del_order').modal('show');
              $('#_modal_del_order').find('.modal-body').html('Exclude order of the client ' + rowdata.client + ' ?');
            });
          },
          rowCallback: function(row, data, index) {
            if (data.finalised == "1") {
              orders.row(row).nodes().to$().addClass('danger');
            }
          }
        });

        // APPLY THE SEARCH
        orders.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        // ABRE MODAL CLIENTES COM INFOS
        torders.find('tbody').on('click', 'tr', function() {

          var data = orders.row(this).data();
          order_id = orders.row(this).data().id;

          // if the order is NOT finalised
          if (orders.row(this).data().finalised == "0") {

            clearFields();

            $('#change_order_title').html("EDIT ORDER " + order_id + ":");

            $('#salesman').val(data.salesman);
            $('#date').val(data.date);
            $('#client').val(data.client);
            $('#client_address').val(data.client_address);
            $('#client_email').val(data.client_email);
            $('#client_phone').val(data.client_phone);
            $('#work').val(data.work);
            $('#work_description').val(data.work_description);
            $('#logo').val(data.logo);
            $('#logo_delivery_date').val(data.logo_delivery_date);
            $('#pay_method').val(data.pay_method);
            $('#pay_total').val(data.pay_total);
            $('#deposit').val(data.deposit);
            $('#balance').val(data.balance);
            $('#status').val('');
            $('#delivery_date').val(data.delivery_date);
            $('#finalised').val(data.finalised);
            $('#status_list').html(data.status);
            $('#_modal_update_order').modal('show');
          } else {
            // the order IS finalised
            $('#finalised_order_title').html("ORDER " + order_id + ": FINALISED");
            $('#fin_salesman').html(data.salesman);
            $('#fin_date').html(data.date);
            $('#fin_client').html(data.client);
            $('#fin_client_address').html(data.client_address);
            $('#fin_client_email').html(data.client_email);
            $('#fin_client_phone').html(data.client_phone);
            $('#fin_work').html(data.work);
            $('#fin_work_description').html(data.work_description);
            $('#fin_logo').html(data.logo);
            $('#fin_logo_delivery_date').html(data.logo_delivery_date);
            $('#fin_pay_method').html(data.pay_method);
            $('#fin_pay_total').html(data.pay_total);
            $('#fin_deposit').html(data.deposit);
            $('#fin_balance').html(data.balance);
            $('#fin_status').html(data.status);
            $('#fin_delivery_date').html(data.delivery_date);
            $('#_modal_finalised_order').modal('show');
          }
        });

        ///////////////////////////////////////////
        // UPDATE ORDER
        ///////////////////////////////////////////

        $("#form_update_order").submit(function(event) {

          // Prevent default posting of form
          event.preventDefault();

          btn_changeorder.html('Changing...');
          btn_changeorder.addClass('btn-success').removeClass('btn-primary');

          // Abort any pending request
          if (request) request.abort();

          // setup some local variables
          var $form = $(this);

          // Let's select and cache all the fields
          var $inputs = $form.find("input, textarea");

          // Serialize the data in the form
          var serializedData = $form.serialize();

          // Let's disable the inputs for the duration of the Ajax request.
          // Note: we disable elements AFTER the form data has been serialized.
          // Disabled form elements will not be serialized.
          $inputs.prop("disabled", true);

          // Fire off the request
          request = $.ajax({
            url: "orders/update_order/" + order_id,
            type: "post",
            data: serializedData
          });

          request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
              "The following error occurred: " + textStatus, errorThrown
            );

            $('#warning').removeClass('hideme');
          });

          request.done(function(response, textStatus, jqXHR) {
            if (response == 'success') {
              $('#_modal_update_order').modal('hide');
              clearAndReloadTable();
            }
          });

          request.always(function() {
            // Reenable the inputs
            $inputs.prop("disabled", false);

            btn_changeorder.html('Change');
            btn_changeorder.addClass('btn-primary').removeClass('btn-success');
          });
        });

        ///////////////////////////////////////////
        // EXCLUDE ORDER DEFINITELY
        ///////////////////////////////////////////

        $("#form_del_order").submit(function(event) {

          event.preventDefault();
          $('#delorder').html('Excluding...');
          $('#delorder').addClass('btn-success').removeClass('btn-danger');

          if (request) request.abort();

          var $form = $(this);
          var serializedData = $form.serialize();

          request = $.ajax({
            url: "orders/delete_order/" + order_id,
            type: "post",
            data: serializedData
          });

          request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
              "The following error occurred: " + textStatus, errorThrown
            );

            $('#warning').removeClass('hideme');
          });

          request.done(function(response, textStatus, jqXHR) {
            if (response == 'success') {
              $('#_modal_del_order').modal('hide');
              clearAndReloadTable();
            }
          });

          request.always(function() {
            $('#delorder').html('Exclude');
            $('#delorder').addClass('btn-danger').removeClass('btn-success');
          });
        });

        ///////////////////////////////////////////
        // REACTIVATE ORDER
        ///////////////////////////////////////////

        $('#reactivate').on('click', function(){
          var arq = $.ajax({
            url: "/orders/reactivate/" + order_id,
            method: "GET"
          });

          arq.success(function(data){
            if (data == "success") {
              $('#_modal_finalised_order').modal('hide');
              clearAndReloadTable();
            } else {
              console.log('something wrong');
            }
          });
        });
      });

      rq.fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
      });

    } // end match of the url
  }); // end dom ready function
})(); // end self invocked anonymous function

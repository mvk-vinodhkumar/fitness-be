<html>
    <head>
     <title>Liv Ezy | Payments Report</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <link rel="icon" type="image/png" href="/fitness/images/png2.png">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

     <style>
        .check {
            width:18px;
            height:18px;
            margin-top:10px;
            vertical-align:middle;
        }

        ul.pagination {
            margin-bottom: 24px !important;
        }

        div.dataTables_wrapper div.dataTables_filter {
            margin-bottom: 20px !important;
        }

        th, td {
            white-space: nowrap !important;
        }
     </style>

    </head>
    <body>

        <div class="container mt-4">
            <br/>
            <h2 align="center" class="mb-4 mt-2">Payments Report</h2>
            <br />
                <div class="row input-daterange">
                    <div class="col-md-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Select From Date" readonly />
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Select To Date" readonly />
                    </div>
                    <div class="col-md-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-secondary">Refresh</button>
                    </div>
                </div>

                <div>
                    <input class='check' type="checkbox" name="isGST" id="isGST"/>
                    <Label style="vertical-align:middle;margin-top:10px;">GST Applicable <span style="color:rgb(162, 0, 0); font-size:12px;">(Click on Filter if this checked)</span></Label>
                </div>
                <br />
            <div class="table-responsive mb-5">
                <table class="table table-bordered table-striped" id="payment_reports" style="width:100%">
                    <thead>
                    <tr>
                        <th>View</th>
                        <th>Invoice No.</th>
                        <th>Date of Invoice</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Pincode</th>
                        <th>Currency</th>
                        <th>Type</th>
                        <th>Taxable Amount</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>IGST</th>
                        <th>Invoice Amount</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Plan</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

        <script>
            $(document).ready(function(){
                $('.input-daterange').datepicker({
                    todayBtn:'linked',
                    format:'yyyy-mm-dd',
                    autoclose:true
                });

                load_data();

                function load_data(from_date = '', to_date = '', isGST, paging)
                {
                    $('#payment_reports').DataTable({
                        processing: true,
                        serverSide: true,
                        ordering: false,
                        paging: paging,
                        dom: 'Bfrtip',
                        ajax: {
                            url:'{{ route("payment_reports.index") }}',
                            data:{from_date:from_date, to_date:to_date, isGST:isGST}
                        },
                        columns: [
                            {
                                data: 'invoice',
                                name: 'invoice',
                                render: function (data, type, row) {
                                    if(data) {
                                        return '<a href="#" class="view-invoice" data-invoice-file="' + data + '"><img class="img-responsive action_icon" src="../fitness/images/questionnaire.png" style="display: inline-block;height: 20px;cursor: pointer;padding: 0px 15px;"></a>';
                                    } else {
                                        return '<span style="display: inline-block;height: 20px;cursor: pointer;padding: 0px 15px;">NA</span>';
                                    }
                                }
                            },
                            {
                                data: 'invoice_no',
                                name: 'invoice_no'
                            },
                            {
                                data: 'created_at',
                                name:'created_at'
                            },
                            {
                                data:'username',
                                name:'username'
                            },
                            {
                                data:'name',
                                name:'name'
                            },
                            {
                                data:'city',
                                name:'city'
                            },
                            {
                                data:'state',
                                name:'state'
                            },
                            {
                                data:'country',
                                name:'country'
                            },
                            {
                                data:'pincode',
                                name:'pincode'
                            },
                            {
                                data:'currency_type',
                                name:'currency_type'
                            },
                            {
                                data:'membership_status',
                                name:'membership_status',
                                render: function (data, type, row) {
                                    return data === 1 ? 'New' : (data === 2 ? 'Renewal' : (data === 4 ? 'Diff.' : 'Extra'));
                                }
                            },
                            {
                                data:'taxable_amount',
                                name:'taxable_amount'
                            },
                            {
                                data:'cgst',
                                name:'cgst'
                            },
                            {
                                data:'sgst',
                                name:'sgst'
                            },
                            {
                                data:'igst',
                                name:'igst'
                            },
                            {
                                data:'amount',
                                name:'amount'
                            },
                            {
                                data:'email',
                                name:'email'
                            },
                            {
                                data:'mobile',
                                name:'mobile'
                            },
                            {
                                data:'plan',
                                name:'plan'
                            }
                        ],
                        buttons: [
                            'pageLength',
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18 ]
                                }
                            },
                            'colvis'
                        ],
                        lengthMenu: [
                            [ 15, 30, 60, -1 ],
                            [ '15 rows', '30 rows', '60 rows', 'Show all' ]
                        ],
                    });
                }

                $('#payment_reports tbody').on('click', 'a.view-invoice', function (e) {
                    e.preventDefault();

                    var invoiceFileName = $(this).data('invoice-file');
                    var invoiceURL = '/invoices/' + invoiceFileName;

                    window.open(invoiceURL, '_blank');
                });


                $('#filter').click(function(){
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();
                    var isGST = $('#isGST').prop('checked') == true ? "true" : "false";
                    var paging = false;
                    if(from_date != '' &&  to_date != '' && isGST)
                    {
                        $('#payment_reports').DataTable().destroy();
                        load_data(from_date, to_date, isGST, paging);
                    }
                    else
                    {
                        alert('Please Select From & To Dates to Filter!');
                    }
                });

                $('#refresh').click(function(){
                    $('#from_date').val('');
                    $('#to_date').val('');
                    $('#isGST').prop('checked', false);
                    $('#payment_reports').DataTable().destroy();
                    load_data();
                });
            });
        </script>

    </body>
</html>



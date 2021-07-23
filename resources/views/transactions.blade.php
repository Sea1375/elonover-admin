@extends('adminlte::page')

@section('title', 'Transactions')

@section('content_header')
    <h1>Transactions</h1>
@stop

@section('css')
    <style>
        .user_info img{
            width: 40px;
            height: 40px;
            border-radius: 100%;
            margin-right: 10px
        }

        tbody td {
            line-height: 40px!important;
        }
        
    </style>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <table id="transaction-table" class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>User</td>
                        <td>Buy Amount</td>
                        <td>Cost</td>
                        <td>Wallet Address</td>
                        <td>Payment Code</td>
                        <td>Time</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>

@stop

@section('js')
    <script>
        $(function() {
            
            var appUrl = '{{ env('APP_URL') }}';
            
            var dt;
            var transactions = @json($transactions);
            console.log(transactions);

            initDt(transactions);

            function initDt(transactions) {
                if (!dt) {
                    dt = $('#transaction-table').DataTable({
                        'data': transactions,
                        'paging'      : true,
                        'lengthChange': false,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : false,
                        "columns": [ 
                            {
                                width: '20px',
                                render: function ( data, type, row, meta ) {
                                    return meta.row + 1;
                                },
                            },
                            {   
                                data: (data) => {
                                    var imageUrl = data.user.image ? appUrl + '/' + data.user.image : appUrl + '/img/others/profile.png';
                                    var html = `<div class="user_info">
                                                    <img src="${imageUrl}" />
                                                    <span>${data.user.full_name}</span>
                                                </div>`
                                    return html;
                                }
                            },
                            {   data: 'token_amount' },
                            {   data: 'buy_cost' },
                            {   data: 'wallet_address' },
                            {   data: 'payment_code' },
                            {   data: 'time' },
                            {   
                                data: (data) => {
                                    if (data.purchase_status == 'success') {
                                        var html = `<span class="text-success">Success</span>`    
                                    } else if (data.purchase_status == 'pending') {
                                        var html = `<span class="text-warning">Pending</span>`    
                                    } else {
                                        var html = `<span class="text-danger">Cancelled</span>`    
                                    }
                                    return html;
                                }
                            },
                            
                        ]
                    });
                }
            }

         
        })
    </script>
@stop
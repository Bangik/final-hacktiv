@extends('layouts.admin.app')
@section('titles', 'List Transaksi')
@section('maincontent')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Transaksi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Laporan</h6>
            <form action="{{route('admin.transactions.export')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Tanggal Awal</label>
                    <input type="text" class="form-control" id="min" name="min">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Akhir</label>
                    <input type="text" class="form-control" id="max" name="max">
                </div>
                <button class="btn btn-primary" id="btn-filter">Export PDF</button>
            </form>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->user->name}}</td>
                    <td>@currency($transaction->total)</td>
                    <td>
                        @if($transaction->status == 'success')
                        <p class="badge badge-success">{{$transaction->status}}</p>
                        @elseif ($transaction->status == 'pending')
                        <p class="badge badge-warning">{{$transaction->status}}</p>
                        @elseif ($transaction->status == 'failed')
                        <p class="badge badge-danger">{{$transaction->status}}</p>
                        @elseif ($transaction->status == 'send')
                        <p class="badge badge-info">{{$transaction->status}}</p>
                        @else
                        <p class="badge badge-secondary">{{$transaction->status}}</p>
                        @endif
                    </td>
                    <td>{{date('d M Y', strtotime($transaction->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var minDate, maxDate;

 // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[4] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    
    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'D MMMM YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'D MMMM YYYY'
        });
    
        // DataTables initialisation
        var table = $('#dataTables').DataTable();
    
        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection

<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@extends('layouts.apps')
@section('content')
<div class="container-fluid py-4">
    @role('admin')
    <a href="{{route('transaction.create')}}" type="button">Add</a>
    @endrole
    <a href="{{route('transaction-export')}}" type="button">Export</a>

    <table class='table table-bordered'>
        <th>No</th>
        <th>Manajer Name</th>
        <th>Car Name</th>
        <th>Driver Name</th>
        <th>Status</th>
        <th>Action</th>
        <tbody>
            <?php $no = 1; ?>
            @foreach($transaction as $transactions)
            <tr>
                <td><?= $no++ ?></td>
                <td>{{$transactions->manajer_names->name}}</td>
                <td>{{$transactions->cars->car_name}}</td>
                <td>{{$transactions->driver_names->name}}</td>
                <td>{{$transactions->status}}</td>
                <td>
                    @role('admin')
                    <a class="btn btn-warning" href="{{route('transaction.edit',$transactions->id)}}" type="button">Edit</a>
                    <form action="{{route('transaction.destroy',$transactions->id)}}" method="post">
                        @csrf @method('DELETE')
                        <!-- Modal body -->

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endrole
                    @role('driver')
                    @if($transactions->status == "menunggu driver")
                    <form action="{{route('transaction-driver',$transactions->id)}}" method="post">
                        @csrf @method('PUT')
                        <!-- Modal body -->
                        <input hidden type="text" name="status" value="Menunggu Manajer">
                        <button class="btn btn-warning" type="submit">ACC</button>
                    </form>
                    @endif
                    @endrole
                    @role('manajer')
                    @if($transactions->status == "Menunggu Manajer")
                    <form action="{{route('transaction-manajer',$transactions->id)}}" method="post">
                        @csrf @method('PUT')
                        <!-- Modal body -->
                        <input hidden type="text" name="status" value="Disetujui">
                        <button class="btn btn-warning" type="submit">ACC</button>
                    </form>
                    @endif
                    @endrole
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

@endsection
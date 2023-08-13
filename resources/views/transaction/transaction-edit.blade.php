@extends('layouts.apps')
@section('content')
<form action="{{route('transaction.update',$transaction->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row mb-3">

        <div class="col-md-6">
            <label for="manajer-option">Manajer</label>
           
            <select class="form-control" id="manajer-option" name="manajer_name">
                @foreach ($manajer_name as $manajer_names)
                <option value="{{ $manajer_names->id }}">{{ $manajer_names->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="driver-option">Driver</label>
            <select class="form-control" id="driver-option" name="driver_name">
                @foreach ($driver_name as $driver_names)
                <option value="{{ $driver_names->id }}">{{ $driver_names->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="car-option">car</label>
            <select class="form-control" id="car-option" name="car_name">
                @foreach ($car as $cars)
                <option value="{{ $cars->id }}">{{ $cars->car_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="status-option">status</label>
            <input class="form-control" readonly type="text" name="status" id="" value="menunggu driver">
        </div>
    </div>
    <input type="submit" value="submit" class="btn btn-sm btn-success" />
</form>
@endsection
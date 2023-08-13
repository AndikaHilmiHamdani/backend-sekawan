@extends('layouts.apps')
@section('content')
<form action="{{route('transaction.store')}}" method="post">
    @csrf
    <div class="row mb-3">
        
        <div class="col-md-6">
            <label for="manajer-option">Manajer</label>
            <select class="form-control" id="manajer-option" name="manajer_name">
                @foreach ($user as $users)
                <option value="{{ $users->id }}">{{ $users->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="driver-option">Driver</label>
            <select class="form-control" id="driver-option" name="driver_name">
                @foreach ($user as $users)
                <option value="{{ $users->id }}">{{ $users->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        
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
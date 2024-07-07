@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-3">
                <a href="{{route('drones.index')}}" class="btn btn-primary">All Drones</a>
            </div>
            <div class="card">
                <div class="card-header">{{ $drone->name }}</div>
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $drone->image) }}" width="200" height="200" style="object-fit: contain" alt="Drone Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $drone->name }}</h5>
                                    <h6 class="card-text">Controller: {{ $drone->controller->name }}</h6>
                                    <h6 class="card-text">Fleet Number: {{ $drone->fleet_no }}</h6>
                                    <h6 class="card-text">Battery Level: {{ $drone->battery_level }}%</h6>
                                    <h6 class="card-text">Status: {{ $drone->is_active ? 'Active' : 'Inactive' }}
                                    </h6>
                                    <form action="{{ route('drones.update-battery', ['id' => $drone->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <input type="number" name="battery_level" id="battery_level" value="100" required hidden>
                                        </div>
                                        <button class="charge-battery" type="submit">Charge</button>
                                    </form>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

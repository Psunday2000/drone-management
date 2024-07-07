@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Drone</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('drones.update', ['drone' => $drone->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $drone->name }}" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="controller_id">Controller</label>
                            <select class="form-control" id="controller_id" name="controller_id" required>
                                @foreach($controllers as $controller)
                                    <option value="{{ $controller->id }}" {{ $drone->controller_id == $controller->id ? 'selected' : '' }}>
                                        {{ $controller->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    
                        <div class="form-group">
                            <label for="battery_level">Battery Level</label>
                            <input type="number" class="form-control" id="battery_level" name="battery_level" min="0" max="100" value="{{ $drone->battery_level }}" required>
                        </div>
                    
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Drone</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="display: none;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{route('drones.record-mission')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <h3 class="card-header">New Mission</h3>
                </div>
                <div class="card-group">
                    <div class="card">
                        <h5 class="card-header">Drones</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <select class="form-control" id="drone_id" name="drone_id" size="{{$drones->count()}}" required>
                                    @foreach($drones as $drone)
                                        <option value="{{ $drone->id }}">{{ $drone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>Select a Drone</small>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Location</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <select class="form-control" id="location_id" name="location_id" size="{{$locations->count()}}" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>Select a Location</small>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <select class="form-control" id="category_id" name="category_id" size="{{$categories->count()}}" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>Select a Category</small>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Additional Information</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="description">Describe the Situation</label><br>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload Video Evidence</label><br>
                            <input type="file" class="form-control" name="upload" id="upload" accept="video/*" required>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Submit" class="btn btn-primary" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

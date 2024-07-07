@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-3">
                <a href="{{route('locations.create')}}" class="btn btn-primary">New Location</a>
            </div>
            <div class="card">
                <div class="card-header">Locations</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="display: none;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <ul class="list-group">
                        @foreach ($locations as $location)
                        <li class="list-group-item">
                            <div class="flex-row d-flex justify-content-between">
                                <div class="p-2 flex-row d-flex">
                                    <div class="p-2 flex-column d-flex justify-content-between">
                                        <h5><strong>{{$location->name}}</strong></h5>
                                        <h6>Latitude: {{$location->latitude}}</h6>
                                        <h6>Longitude: {{$location->longitude}}</h6>
                                    </div>
                                </div>
                            </div>
                        </li>    
                        @endforeach
                      </ul>
                      {{-- <div class="p-2">
                        <p>{{ $locations->links() }}</p>
                      </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

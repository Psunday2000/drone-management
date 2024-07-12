@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Auth::user()->role_id == 1)
                <div class="p-3">
                    <a href="{{route('drones.create')}}" class="btn btn-primary">New Drone</a>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Drones</div>
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
                        @foreach ($drones as $drone)
                        <li class="list-group-item">
                            <div class="flex-row d-flex justify-content-between">
                                <div class="drone-view p-2 flex-column d-flex justify-content-between align-items-center">
                                    <img class="drone-image" src="{{ asset('storage/' . $drone->image) }}" alt="Drone Image">
                                </div>
                                <div class="p-2 flex-row d-flex">
                                    <div class="drone-details p-2">
                                        <h5><strong>{{$drone->name}}</strong></h5>
                                        <a href="{{route('drones.show', [$drone])}}" class="btn btn-primary">Details</a>
                                    </div>
                                </div>
                            </div>
                        </li>    
                        @endforeach
                      </ul>
                      <div class="p-2">
                        <p>{{ $drones->links() }}</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

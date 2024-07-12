@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Drone Controllers</h4></div>
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
                        @foreach ($controllers as $controller)
                            <li class="list-group-item">
                                <div class="flex-row d-flex justify-content-between">
                                    <h3><strong>{{ $controller->name }}</strong></h3>
                                    <a href="{{route('controller', ['id' => $controller->id])}}"><h5>{{ $controller->drone_count}} drones</h5></a>
                                </div>
                            </li>    
                        @endforeach
                    </ul>                    
                      <div class="p-2">
                        <p>{{ $controllers->links() }}</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

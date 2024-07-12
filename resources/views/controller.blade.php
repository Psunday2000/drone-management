@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $controller->name }}</div>
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
                            <li class="list-group-item">
                                <div class="flex-row d-flex justify-content-between">
                                    <div class="p-2 flex-column d-flex justify-content-between">
                                        <h5><strong>Drones</strong></h5>
                                        <ul class="list-group" style="width:100%">
                                            @foreach($drones as $drone)
                                                <li class="list-group-item">{{ $drone->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                    </ul>                    
                      <div class="p-2">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

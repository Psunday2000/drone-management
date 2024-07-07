@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disaster</div>
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
                        @foreach ($disasters as $disaster)
                        <li class="list-group-item">
                            <div class="flex-row d-flex justify-content-between">
                                <div class="drone-view p-2 flex-column d-flex justify-content-between align-items-center">
                                    <video src="{{ asset('storage/' . $disaster->upload) }}" width="200px" controls></video>
                                </div>
                                <div class="p-2 flex-row d-flex">
                                    <div class="drone-details p-2 flex-column d-flex justify-content-between">
                                        <h5><strong>{{$disaster->category->name}}</strong></h5>
                                        <h6><strong>Location: </strong>{{$disaster->location->name}}</h6>
                                        <h6><strong>Status: </strong>{{$disaster->description}}</h6>
                                    </div>
                                </div>
                            </div>
                        </li>    
                        @endforeach
                      </ul>
                      <div class="p-2">
                        <p>{{ $disasters->links() }}</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

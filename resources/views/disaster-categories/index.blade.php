@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-3">
                <a href="{{route('disaster-categories.create')}}" class="btn btn-primary">New Disaster Category</a>
            </div>
            <div class="card">
                <div class="card-header">Disaster Categories</div>
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
                        @foreach ($disaster_categories as $disaster_category)
                        <li class="list-group-item">
                            <div class="flex-row d-flex justify-content-between">
                                <div class="p-2 flex-row d-flex">
                                    <div class="p-2 ">
                                        <h5><strong>{{$disaster_category->name}}</strong></h5>
                                        <p>{{$disaster_category->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </li>    
                        @endforeach
                      </ul>
                      <div class="p-2">
                        <p>{{ $disaster_categories->links() }}</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

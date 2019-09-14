@extends('layouts.app')

@section('content')
<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category </h4>
        </div>
        <div class="card-body">

            @include('includes.validate')

          <form action="{{ route ('cat.store') }}" method="POST" >
            @csrf
             
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Name . ." name="name" >
                </div>

                
                <button type="submit" class="btn btn-info btn-fill pull-right">Craete Product</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection


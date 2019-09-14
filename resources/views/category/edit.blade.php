@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Category </h4>
        </div>
        <div class="card-body">

            @include('includes.validate')

            <form action="{{ route ('cat.update' , $category -> id  ) }}" method="POST"
              >
                @csrf

                @if (isset($category))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Name . . ." name="name"
                        value="{{ $category -> name }}">
                </div>

               
                <button type="submit" class="btn btn-info btn-fill pull-right">Update Product</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

@endsection

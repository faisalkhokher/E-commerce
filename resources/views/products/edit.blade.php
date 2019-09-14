@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Update Product </h4>
        </div>
        <div class="card-body">

            @include('includes.validate')

            <form action="{{ route ('product.update' , $products -> id  ) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @if (isset($products))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label>Productname</label>
                    <input type="text" class="form-control" placeholder="Username" name="name"
                        value="{{ $products -> name }}">
                </div>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" class="form-control" placeholder="Enter Price..." name="price"
                        value="{{ $products -> price }}">
                </div>

                <div class="form-group">
                    <label>Update Category</label>
                    <select type="number" class="form-control"  name="category_id">

                        @foreach ($category as $cat)
                        <option value="{{ $cat  -> id}}">

                            {{ $cat -> name }}
                        </option>
                        @endforeach

                    </select>
                </div>



                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" cols="80" class="form-control"
                                name="description">{{ $products -> description }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Update Product</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

@endsection

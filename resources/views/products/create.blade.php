@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Products </h4>
        </div>
        <div class="card-body">

            @include('includes.validate')

            <form action="{{ route ('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label><B>Productname</label>
                    <input type="text" class="form-control" placeholder="Username" name="name">
                </div>

                <div class="form-group">
                    <label><B>Product Price</label>
                    <input type="number" class="form-control" placeholder="Enter Price..." name="price">
                </div>


                <div class="form-group">
                    <label for="category"><b> Select Category <b> </label>
                    <select name="category_id" id="category" class="form-control">

                        {{-- Redirect Category data --}}

                        @foreach ($categories as $Category)

                        <option value="{{ $Category -> id }}">

                            {{ $Category -> name }}

                        </option>

                        @endforeach

                    </select>
                </div>

                {{-- Uploads --}}


                <div class="large-4 columns">
                    <h5><B>Image Preview</h5>
                    <br />
                    <div class="preview hide">
                        <img src="https://docs.mapbox.com/studio-manual/img/manual/uploads.svg" class="image_to_upload" height="200px" width="200px"/>
                    </div>
                    <label for='dvd_image'>DVD Image:</label>
                    <input type="file" id="dvd_image" name="image"/>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label><B>Description</label>
                        <textarea rows="4" cols="80" class="form-control" name="description"></textarea>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-info btn-fill pull-right">Craete Product</button>
        <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>




@endsection

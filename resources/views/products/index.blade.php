@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
        <div class="card-header ">
            <h4 class="card-title">Index of Products Tabels</h4>
            <p class="card-category">E-commerce Database Design</p>
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>
                        <h5><b>ID
                    </th>
                    <th>
                        <h5><b>Image
                    </th>
                    <th>
                        <h5><b>Name
                    </th>
                    <th>
                        <h5><b>Price
                    </th>
                    <th>
                        <h5><b>Category
                    </th>
                    <th>
                        <h5><b>Edit
                    </th>
                    <th>
                        <h5><b>Delete
                    </th>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                    <tr>
                        <td >{{ $loop-> iteration }}</td>
                        <td>
                            <img src="{{ url ($products -> image)}}" alt="{{ $products -> name }}" height="50px"
                                width="50px">
                        </td>
                        <td> {{ $products -> name }}</td>
                        <td> {{ $products -> price }}</td>

                  
                        <td> {{  @$products -> Category -> name }}</td>
                
                       

                        <td>
                            <a href="{{ route ('product.edit' , $products -> id) }}" class="btn btn-success a-btn-slide-text">
                                <span class="glyphicon glyphicon-success" aria-hidden="true"></span>
                                <span><strong>Edit</strong></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route ('product.delete' , $products -> id) }}"
                                class="btn btn-danger a-btn-slide-text">
                                <span class="glyphicon glyphicon-danger" aria-hidden="true"></span>
                                <span><strong>Delete</strong></span>
                            </a>
                        </td>


                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

                    

                </div>
            </div>
        </div>
@endsection

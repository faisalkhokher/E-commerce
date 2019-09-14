@extends('layouts.app')

@section('content')

<div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
        <div class="card-header ">
            <h4 class="card-title">Index of Category Tabels</h4>
            <p class="card-category">E-commerce Database Design</p>
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>
                        <h5>ID
                    </th>
                    <th>
                        <h5>Name
                    </th>
                    <th>
                        <h5>Edit
                    </th>
                    <th>
                        <h5>Delete
                    </th>
                  
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                        <td>{{ $loop -> iteration}}</td>
                      
                        <td> {{ $category -> name }}</td>
                        

                        <td>
                            <a href="{{ route ('cat.edit' , $category -> id) }}" class="btn btn-success a-btn-slide-text">
                                <span class="glyphicon glyphicon-success" aria-hidden="true"></span>
                                <span><strong>Edit</strong></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route ('cat.delete' , $category -> id) }}"
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

@endsection

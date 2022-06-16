@extends('admin.layout.app')

@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="{{route('admin#create_category')}}">
                                        <button class="btn btn-sm btn-outline-dark">Add Category</button>
                                    </a>
                                </h3>

                                <div class="card-tools">
                                    <form action="{{ route('admin#search_category') }}" method="POST">
                                        @csrf
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="searchData" class="form-control float-right" placeholder="Search">
    
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @if(Session::has('categorySuccess'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{Session::get('categorySuccess')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                  @endif

                                  @if(Session::has('categoryDelete'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{Session::get('categoryDelete')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                
                                @endif

                                @if(Session::has('updateSuccess'))

                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{Session::get('updateSuccess')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                
                                @endif



                                
                                <table class="table table-hover text-nowrap text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Stock List</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $cut )
                                        <tr>
                                            <td>{{ $cut->category_id }}</td>
                                            <td>{{ $cut->category_name }}</td>
                                            <td>7</td>
                                            <td>
                                                
                                                    <a href="{{ route('admin#update_category',$cut->category_id) }}">
                                                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                                    <a href="{{ route('admin#delete_category',$cut->category_id) }}">
                                                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                                    </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                                {{ $category->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

@endsection

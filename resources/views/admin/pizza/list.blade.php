@extends('admin.layout.app')

@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (Session::has('create'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong>{{ Session::get('create') }}</strong> 
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                   
               @endif
               @if (Session::has('deletesucess'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>{{ Session::get('deletesucess') }}</strong> 
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                   
               @endif
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                                
                                <h3 class="card-title">Add Pizza
                                    <a href="{{ route('admin#create_pizza') }}"><button class="btn btn-sm bg-dark text-white float-end"><i class="fas fa-plus"></i></button></a>
                                </h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pizza Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Publish Status</th>
                                        <th>Buy 1 Get 1 Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if ($status == 0)

                                         <tr>
                                            <td colspan="7" ><h4>!! Empty Pizz List !!</h4></td>
                                         </tr>
                                     @else
                                         
                                     @endif   
                                    
                                    @foreach ($pizalist as $item)

                                    <tr>
                                        <td>{{ $item->pizza_id }}</td>
                                        <td>{{ $item->pizza_name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$item->image) }}" class="img-thumbnail" width="100px">
                                        </td>
                                        <td>{{ $item->price }} MMK</td>
                                        <td>
                                            @if ($item->public_status ==1)
                                            Publish
                                            
                                            @elseif($item->public_status ==0) 
                                            Unpublish
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if ($item->buy_get_one_status ==1)
                                            Yes
                                            
                                            @elseif($item->buy_get_one_status ==0) 
                                            No
                                            @endif
                                        </td>
                        

                                        <td>
                                                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                            <a href="{{ route('admin#delete_pizza',$item->pizza_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                                            </a>
                                                <button class="btn btn-sm bg-primary text-white"><i class="fas fa-eye"></i></button>

                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                   </tbody>
                                </table>
                                <div>
                                    {{ $pizalist->links() }}
                                </div>
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
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>



@endsection

@extends('admin.layout.app')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">

                            <div class="mb-3">
                                <a class="text-dark" href="{{ route('admin#category') }}">
                                <i class="fas fa-arrow-left dark"> back</i>
                            
                                </div>
                            </a>
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Add Category</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form action="{{ route('admin#create_store') }}" method="POST">
                                                @if ($errors->has('name'))
                                                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong> 
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                                    
                                                @endif
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-3 col-form-label" >Category Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <div class="float-start">
                                                        <button type="submit" class="btn bg-dark text-white">Submit</button>
                                                    </div>
                                                    
                                                </div>

    
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

@endsection

@extends('admin.layout.app')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-8 offset-3 mt-5">
                        <div class="col-md-9">

                            <div class="mb-3">
                                <a class="text-dark" href="{{ route('admin#pizza') }} ">
                                <i class="fas fa-arrow-left dark"> back</i>
                            
                                </div>
                            </a>
                            <div class="card">
                                <div class="card-header p-2">
                                    <legend class="text-center">Add Pizza</legend>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <form action="{{ route('admin#store_pizza') }} " method="POST" enctype="multipart/form-data">
                                               
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label" >Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="pzname" id="name" >
                                                        @if ($errors->has('pzname'))
                                                        <p class="text-danger">{{ $errors->first('pzname') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Image</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="pzimage" id="name">
                                                        @if ($errors->has('pzimage'))
                                                        <p class="text-danger">{{ $errors->first('pzimage') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Price</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="pzprice" id="name" >
                                                        @if ($errors->has('pzprice'))
                                                        <p class="text-danger">{{ $errors->first('pzprice') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Public Status</label>
                                                    <div class="col-sm-10">
                                                        <select name="publish" class="form-control">
                                                            <option value="1">Publish</option>
                                                            <option value="0">Unpublish</option>
                                                        </select>
                                                        @if ($errors->has('publish'))
                                                        <p class="text-danger">{{ $errors->first('publish') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Category List</label>
                                                    <div class="col-sm-10">
                                                        <select name="pzcategory" class="form-control">
                                                            <option value="1">test1</option>
                                                            <option value="0">test2</option>
                                                        </select>
                                                        @if ($errors->has('pzategory'))
                                                        <p class="text-danger">{{ $errors->first('pzcategory') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Discount</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="pzdiscount" id="name" >
                                                        @if ($errors->has('pzdiscount'))
                                                        <p class="text-danger">{{ $errors->first('pzdiscount') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Buy One Get One</label>
                                                    <div class="col-sm-10 mt-2" >
                                                        <input type="radio" name="pzbuyOneget" class="form-input-check" value="1">Yes
                                                        <input type="radio" name="pzbuyOneget" class="form-input-check" value="0">No
                                                        @if ($errors->has('pzbuyOneget'))
                                                        <p class="text-danger">{{ $errors->first('pzbuyOneget') }}</p>
                                                            
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Waiting Time</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="pzwtime" id="name" >
                                                        @if ($errors->has('pzwtime'))
                                                        <p class="text-danger">{{ $errors->first('pzwtime') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputCategory" class="col-sm-2 col-form-label" >Details</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="pzdescription"  cols="30" rows="3"></textarea>
                                                        @if ($errors->has('pzdescription'))
                                                        <p class="text-danger">{{ $errors->first('pzdesctiption') }}</p>
                                                            
                                                        @endif
                                                    </div>
                                                </div>
        

                                                <div class="form-group row ">
                                                    <div class="float-start">
                                                        <button type="submit" class="btn bg-dark text-white">Add</button>
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

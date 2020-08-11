@extends('backend.template.layout')


@section('create_new_button')
<a class="nav-link btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">
    <span>Add Child Category</span>
</a>

@endsection


@section('per_page_css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
@endsection


@section('per_page_js')
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>


    $("#zero_config").DataTable();
</script>
@endsection


@section('main_card_content')
<!-- Container fluid  -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">            
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Child Category</h5>
                <button type="button" class="close" onclick="document.getElementById('reset').click();" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('child_category_store')}}" method="POST" id="form">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Child Category Name</label>
                        <input required type="text"  class="form-control" id="category_name" name="name"  placeholder="Ex: Celling Fan">
                        <small class="form-text text-muted text-danger">Name field Required</small>
                    </div>

                    <div class="form-group">
                        <label for="parent_category">Select Parent Name</label>
                        <select name="parent_id" required class="form-control" id="parent_category">
                            @foreach($parentCategories as $parentCategory)
                                <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="reset" class="d-none" id="reset">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="document.getElementById('reset').click();" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" onclick="document.getElementById('form').submit();" class="btn btn-primary">Save</button>
            </div>
        </div>            
    </div>
</div>
<!-- end modal -->
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parent Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($childCategories as $key => $childCategory)
                                    <tr>
                                        <td>{{$childCategory->name}}</td>
                                        <td>{{$childCategory->parent->name}}</td>

                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href=""  class="btn btn-primary  btn-sm"><i class="mdi mdi-eye"></i> View</a> 
                                                <a href="" data-toggle="modal" data-target="#edit{{$childCategory->id}}" class="btn btn-warning btn-sm"><i class="mdi mdi-account-edit"></i> Edit</a> 
                                                <div class="btn-group">
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger dropdown-toggle btn-sm"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                    >
                                                        <i class="mdi mdi-delete-forever"></i> Delete
                                                    </button>
                                                    <div
                                                        class="dropdown-menu text-center position-absolute" 
                                                        x-placement="bottom-start"
                                                    
                                                    >

                                                    <form action="" method="POST">
                                                        <input type="hidden" name="_method" value="delete">                                                    <input type="hidden" name="_token" value="uvzWM02xAsBfvlkvhNEFjrRmm9quBG8EusW29Jb3">                                                    <button class="dropdown-item bg-danger" type="submit">Confirm Delete?</button>
                                                    </form>

                                                        <a
                                                            class="dropdown-item bg-secondary"
                                                            href="#"
                                                            >Cancel</a
                                                        >
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                                                               
                                        </td>
                                    </tr>

<!-- Modal -->
<div class="modal fade" id="edit{{$childCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">            
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Child Category</h5>
                <button type="button" class="close" onclick="document.getElementById('reset{{$childCategory->id}}').click();" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('child_category_update', $childCategory->id)}}" method="POST" id="form{{$childCategory->id}}">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input value="{{$childCategory->name}}" required type="text"  class="form-control" name="name"  placeholder="Ex: Celling Fan">
                        <small class="form-text text-muted text-danger">Name field Required</small>
                    </div>

                    <div class="form-group">
                        <label for="parent_category">Select Parent Name</label>
                        <select name="parent_id" required class="form-control" id="parent_category">
                            @foreach($parentCategories as $parentCategory)
                                <option @if($parentCategory->id == $childCategory->parent->id) selected @endif value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="reset" class="d-none" id="reset{{$childCategory->id}}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="document.getElementById('reset{{$childCategory->id}}').click();" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" onclick="document.getElementById('form{{$childCategory->id}}').submit();" class="btn btn-primary">Save</button>
            </div>
        </div>            
    </div>
</div>
<!-- end modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
</div>
@endsection
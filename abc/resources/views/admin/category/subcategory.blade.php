@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Sub Category</button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">Sub Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
           <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">                               
                                 
                               
                                <div class="table-responsive">
                                    <div id="basicScenario" class="product-physical"></div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
								             
								                <th>Name</th>
								                <th>Category</th>
								                <th>Status</th>
								                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($subcategories as $subcategory)
								            <tr>
								             
								                <td>{{$subcategory->sub_name}}</td>
								                 <td>{{$subcategory->cat_slug}}</td>
								               
								                
								                <td>
								                	<?php if($subcategory->status=='active'){?>
								                		<div class='badge badge-success'>active</div>
								                	<?php }else{?>
								                		<div class='badge badge-danger'>dnactive</div>
								                	<?php }?>
								                </td>
								                <td>
	<button type='button' class='btn btn-primary btn-xs updatesub' data-toggle="modal" data-target="#subcatupdate" id='updatebtn' data-id="{{$subcategory->id}}"  data-subname="{{$subcategory->sub_name}}"><i class='fa fa-edit'></i></button>
								                <a href="{{url('/admin/subcategory/delete/'.$subcategory->id)}}">	<button type='button' class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                    
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
            <!-- Container-fluid Ends-->
        </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">New Sub-Category</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="{{route('admin.subcategory.store')}}" method="post">
                                                    	@csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="sub_name" class="mb-1">Sub Category Name :</label>
                                                                <input class="form-control" name="sub_name"  type="text">
                                                            </div>
                                                             <div class="form-group">
						                                        <label class="col-form-label"><span>*</span> Category</label>
						                                        <select class="custom-select" required="" name="cat_slug">
						                                            <option value="">--Select--</option>
						                                            @foreach($categories as $category)
						                                            <option value="{{$category->slug}}">{{$category->category_name}}</option>
						                                            @endforeach
						                                        </select>
						                                    </div>
                                                       <!--      <div class="form-group mb-0">
                                                                <label for="sub_image" class="mb-1">Sub Category Image :</label>
                                                                <input class="form-control" name="sub_image" id="sub_image" type="file">
                                                            </div> -->
                                                        </div>
		                                                    <div class="modal-footer">
			                                                    
			                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
			                                                    <button type="submit" class="btn btn-primary" type="button">Save</button>
                                                			</div>
                                                    </form>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>


                                        <div class="modal fade" id="subcatupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Update Sub-Category</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="{{route('admin.subcategory.update')}}" method="post">
                                                        @csrf
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="sub_name" class="mb-1">Subcategory Name :</label>
                                                                <input class="form-control" name="update_sub_name" id="sub_name" type="text">
                                                                <input type="hidden" name="id" id="sub_id">
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-form-label"><span>*</span> Category</label>
                                                                <select class="custom-select" required="" name="update_cat_slug">
                                                                    <option value="">--Select--</option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{$category->slug}}" <?php if($subcategory->cat_slug=$category->slug){echo "selected";} ?>>{{$category->category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                             
                                                            </div>
                                                            <div class="form-group">
                                                            <label class="col-form-label"><span>*</span> Status</label>
                                                            <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                                <label class="d-block" for="edo-ani">
                                                                    <input class="radio_animated" <?php if($subcategory->status=='active'){ echo "checked";} ?> id="edo-ani" type="radio" name="status" value="active">
                                                                    Enable
                                                                </label>
                                                                <label class="d-block" for="edo-ani1">
                                                                    <input class="radio_animated" <?php if($subcategory->status=='deactive'){ echo "checked";} ?> id="edo-ani1" type="radio" name="status" value="deactive">
                                                                    Disable
                                                                </label>
                                                            </div>
                                                        </div>
                                                            <!-- <div class="form-group mb-0">
                                                                <label for="sub_image" class="mb-1">Sub Category Image :</label>
                                                                <input class="form-control" name="sub_image" id="sub_image" type="file">
                                                            </div> -->
                                                        </div>
                                                            <div class="modal-footer">
                                                            
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" type="button">Update</button>
                                                            </div>
                                                    </form>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        $('document').ready(function(){
                                            $('#product').addClass('open active');
                                             $('#subcategory').addClass('active');
                                        })
                                         $('#example').on('click','.updatesub',function(){
                                            var id=$(this).data('id');
                                             var name=$(this).data('subname');
                                             var discount=$(this).data('discount');
                                             console.log(name);
                                             $('#sub_id').val(id);
                                            $('#sub_name').val(name);
                                            $('#subdicount').val(discount);

                                        })
                                    </script>
@endsection
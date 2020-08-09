@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                      

                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">List Product</li>
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
                            <div class="modal-dialog  modal-lg" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center text-primary">Add Slide</h5>
                               
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('home_slider_update', $id->id)}}" method="post" id="addNewForm" enctype="multipart/form-data">
                                        @csrf

                                        <input type="file" name="image" class="d-none" id="imageUpload" accept="image/png, image/jpeg, image/jpg, image/svg">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-center">Upload Image</p>
                                                <p class="text-center"><img style='height:200px;' src="{{asset('public/images/slider_image/'.$id->image)}}" id="imageUploader" alt="" class="img-fluid m-auto"></p>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" id="name" value="{{$id->title}}" placeholder="Ex: SST Tech" name="name">
                                            <label for="red_text">Red Text</label>
                                            <input type="text" class="form-control" id="red_text" value="{{$id->red_text}}" placeholder="Ex: ABC" name="red_text">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="4" class="form-control" placeholder="Ex: something about review or something or something that client says">{{$id->description}}</textarea>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" @if($id->status) checked @endif>
                                                    <label class="form-check-label" for="active">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="status" type="radio" name="inlineRadioOptions" id="inactive" @if(!$id->status) checked @endif value="0">
                                                    <label class="form-check-label" for="inactive">Inactive</label>
                                                </div>

                                            </div>
                                        </div>







                                        </from>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submitButtonForAddNewForm" class="btn btn-success">Save</button>
                                </div>

                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
<script type="text/javascript">
    $('document').ready(function(){
        $('#product').addClass('open active');
            $('#productlist').addClass('active');
    })



    const imageUploadInput = document.getElementById('imageUpload');
    const imageUploadShow = document.getElementById('imageUploader');
    let imagePath = "{{asset('public/images/slider_image/'.$id->image)}}"

    imageUploadShow.onclick = ()=>{
        imageUploadInput.click();
    }


    imageUploadInput.onchange = (e) => {
        if(!e.target.files[0]){
            return imageUploadShow.src = imagePath;
        }else{
            let reader = new FileReader();
                reader.readAsDataURL(e.target.files[0]);
                reader.onload = e => {
                    return imageUploadShow.src =  e.target.result;
                };
        }

      
                
    }



    let submitButtonForAddNewForm = document.getElementById('submitButtonForAddNewForm')


    submitButtonForAddNewForm.onclick = ()=>{
        document.getElementById('addNewForm').submit();
    }






    
</script>
@endsection
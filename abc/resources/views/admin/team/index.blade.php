@extends('admin.admin_master')
@section('mainContent')
        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewGalleryModal">Add New Member</button>
                            </div>

                            <!-- Modal -->
                                <div class="modal fade" id="addNewGalleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center text-primary">Add New Team Member</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('add_new_team_member')}}" method="post" id="addNewForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="image" class="d-none" id="imageUpload" accept="image/png, image/jpeg, image/jpg, image/svg">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="text-center">Upload Image</p>
                                                                <p class="text-center"><img style='height:200px;' src="data:image/png;base64,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" id="imageUploader" alt="" class="img-fluid m-auto"></p>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">                                                          
                                                        
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" class="form-control" id="name" placeholder="Ex: Imran Hossain" name="name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="role">Position</label>
                                                                    <input type="text" class="form-control" id="role" placeholder="Ex: Web developer" name="role">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="desc">Description</label>
                                                                    <textarea name="description" id="desc" cols="30" rows="3" class="form-control" placeholder="ex: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis!"></textarea>
                                                                </div>

                                                             
                                                            </div>

                                                            <div class="col-md-6">
                                                                <h2 class="h6 border-bottom border-secondary">Social Links</h2>
                                                                <div class="form-group">
                                                                    <label for="facebook">Facebook</label>                                                                   
                                                                    <input type="text" name="facebook"  class="form-control" id="facebook" placeholder="Ex: www.facebook.com/username">

                                                                    <label for="twitter">Twitter</label>                                                                   
                                                                    <input type="text" name="twitter"  class="form-control" id="twitter" placeholder="Ex: www.twitter.com/username">

                                                                    <label for="linkedin">LinkedIn</label>                                                                   
                                                                    <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Ex: www.linkedin.com/username">

                                                                    <label for="mail">Mail Address</label>                                                                   
                                                                    <input type="text" name="mail"  class="form-control" id="mail" placeholder="Ex: example@example.com">

                                                                    <label for="tumblr">Tumblr</label>                                                                   
                                                                    <input type="text" name="tumblr"  class="form-control" id="tumblr" placeholder="Ex: www.tumblr.com/username">
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


                            <!-- Modal end -->
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
                                 
                               
                                <div class="table-responsive">
                                    <div id="basicScenario" class="product-physical"></div>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
								        <thead>
								            <tr>
                                                <th>Sl.</th>
								                <th>Image</th>
                                                <th>name</th>
								                <th>Position</th>
                                                <th>Description</th>
                                                <th>Facebook</th>
                                                <th>Twitter</th>
                                                <th>LinkedIn</th>
                                                <th>Mail</th>
                                                <th>Tumblr</th>
                                                <th>Action</th>
								                
								            </tr>
								        </thead>
								        <tbody>
								        	@foreach($allMembers as $key => $member)
								            <tr>
                                            
								                <td>{{$key+1}}</td>
								                <td><img src="{{asset('public/images/team_member/'.$member->image)}}" height="45px" alt=""></td>
                                                <td>{{$member->name}}</td>
                                                <td>{{$member->role}}</td>
                                                <td>{{$member->desctiption}}</td>
                                                <td>{{$member->social_fb_link}}</td>

                                                <td>{{$member->social_tw_link}}</td>
                                                <td>{{$member->social_in_link}}</td>
                                                <td>{{$member->social_mail_link}}</td>
                                                <td>{{$member->social_tm_link}}</td>
								             
								                <td>
                                             
                                                <a  style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-primary btn-xs updatebtn' href="{{ route('edit_team_member', $member->id) }}" >
                                                <i class='fa fa-edit'></i>
                                                    </a>
                                                
								               <a href="{{route('delete_team_member', $member->id)}}">	<button type='button' style="line-height: 0.5; border-radius: 1.25rem;" class='btn btn-danger btn-xs' onclick="return confirm('Are You sure')"><i class='fa fa-times'></i></buttpn></a>
                
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
<script type="text/javascript">
    $('document').ready(function(){
        $('#product').addClass('open active');
            $('#productlist').addClass('active');
    })



    const imageUploadInput = document.getElementById('imageUpload');
    const imageUploadShow = document.getElementById('imageUploader');
    let imagePath = `data:image/png;base64,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
`;

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




    const updateButtons = document.getElementsByClassName('updatebutton');
    for(let updatebtnIntex in updateButtons){
        updateButtons[updatebtnIntex].onclick = event=>{
            // document.getElementById(event.target.dataset.formId).submit();
            console.log(document.getElementById("'"+ event.target.dataset.formId+"'"));
        }
    }




    
</script>
@endsection
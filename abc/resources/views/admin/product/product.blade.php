@extends('admin.admin_master')
@section('mainContent')
 <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <div class="page-header-left">
                                <h3>Add Products
                                    <small>Multikart Admin panel</small>
                                </h3>
                            </div> -->
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <form action="{{url('/admin/product/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Title</label>
                                        <input class="form-control" name="title" id="validationCustom01" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> SKU</label>
                                        <input class="form-control" name="sku" id="validationCustomtitle" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Categories</label>
                                        <select class="custom-select" required="" name="cat_slug">
                                            <option value="">--Select--</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->slug}}">{{$category->category_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span>Sub-Categories</label>
                                        <select class="custom-select"  name="sub_cat_slug">
                                            <option value="">--Select--</option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="price" class="col-form-label"><span>*</span> Product Price</label>
                                        <input class="form-control"  name="price" type="text" id="price" required="">
                                    </div>
                                     <div class="form-group">
                                      <label>Have Discount?</label>
                                        <input type="checkbox" id="myCheck" onclick="myFunction()"/>
                                    </div>
                                    <div id="autoUpdate" class="autoUpdate" style="display:none">
                                   
                                       <div class="form-group">
                                        <label for="discount" class="col-form-label">Discount</label>
                                        <input class="form-control"  id="discount" name="discount" type="text">
                                    </div>
                                     <div class="form-group">
                                        <label for="discountPrice" class="col-form-label">Price</label>
                                        <input class="form-control" id="discountPrice" name="discountPrice" type="text"  readonly="">
                                    </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Qty</label>
                                        <input class="form-control" name="qty" id="validationCustomtitle" type="text" required="">
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Qty-type</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-an2">
                                                <input class="radio_animated" checked="" id="edo-an2" type="radio" name="status" value="pcs">
                                                Pcs
                                            </label>
                                            <label class="d-block" for="edo-ani3">
                                                <input class="radio_animated" id="edo-ani3" type="radio" name="status" value="box">
                                                Box
                                            </label>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Status</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" checked="" id="edo-ani" type="radio" name="status" value="active">
                                                Enable
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="status" value="deactive">
                                                Disable
                                            </label>
                                        </div>
                                    </div>
                                        <label class="col-form-label pt-0"> Product Upload <span>*</span></label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="file" type="file" required="" />
                                          </div>
                                 <!--    </form> -->
                                        <label class="col-form-label pt-0">Image(optional) </label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="file_one" type="file"  />
                                          </div>
                                           <label class="col-form-label pt-0"> Image(optional)</label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="files_two" type="file"  />
                                          </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Short Description</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <div class="description-sm">
                                            <textarea id="editor1" name="short_description" cols="10" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5> Description</h5>
                            </div>
                           <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <div class="description-sm">
                                            <textarea id="editor" name="long_description" cols="10" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
                </form>
            </div>
            <!-- Container-fluid Ends-->

        </div>


<!-- ckeditor js-->
<script src="{{asset('public/admin/dropzone/dist/dropzone.js')}}"></script>
<script>
  $('documnet').ready(function(){
    $('#product').addClass('open active');
    $('#product-add').addClass('active');
  })
</script>
<script type="text/javascript">
  $(document).ready(function ()
  {
          $('select[name="cat_slug"]').on('change',function(){
          var cat_slug = $(this).val();
      
          if(cat_slug)
          {
              jQuery.ajax({
                  url :"{{URL::to('/admin/subcat')}}"+"/"+cat_slug,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                  
                      $('select[name="sub_cat_slug"]').empty();
                      jQuery.each(data, function(key,value){
                      $('select[name="sub_cat_slug"]').append('<option value="'+ key +'">'+ value +'</option>');
                      });
                  }
              });
          }
          else
          {
              $('select[name="sub_cat_slug"]').empty();
          }
          });
  });
</script>
<script src="{{asset('public/admin/assets/ckeditor/ckeditor.js')}}"></script>
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("autoUpdate");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor')
    //bootstrap WYSIHTML5 - text editor
    
  })
</script>
<script>
        $(document).on("change keyup blur", "#discount", function() {
            var main = $('#price').val();
            var disc = $('#discount').val();
            var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discont = main - mult;
            console.log(discont);
            $('#discountPrice').val(discont);
        });
    </script>
@endsection
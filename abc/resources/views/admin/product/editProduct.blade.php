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
                <form action="{{url('/admin/product/update')}}" id="updateProduct" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Title</label>
                                        <input class="form-control" name="title" id="validationCustom01" type="text" value="{{$product->title}}" required="">
                                        <input class="form-control" name="product_id" id="validationCustom01" type="hidden" value="{{$product->id}}" required="">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Categories</label>
                                        <select class="custom-select" required="" id="cat_slug" name="cat_slug">
                                            <option value="">--Select--</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->slug}}" <?php if($category->slug==$product->cat_slug){ echo "selected";} ?>>{{$category->category_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Sub-Categories</label>
                                        <select class="custom-select" id="sub_cat_slug" name="sub_cat_slug">
                                           
                                            <option value="{{$product->sub_cat_slug}}"><?php if($product->sub_cat_slug != Null){ echo "$product->productsubcategories->sub_name";}?></option>
                                            
                                        </select>
                                    </div>
                                      <div class="form-group">
                                        <label for="price" class="col-form-label"><span></span> Product Price</label>
                                        <input class="form-control" id="price" name="price" type="number" required="" value="{{$product->price}}">
                                    </div>
                                      <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span></span> Discount(if want)</label>
                                        <input class="form-control" name="discount" id="discount" value="{{$product->discount}}" type="number" required="">
                                    </div>
                               
                                     <div class="form-group">
                                        <label for="sell_price" class="col-form-label"><span>*</span> Discount Price</label>
                                        <input class="form-control" value="{{$product->sell_Price}}" name="discountPrice" id="discountPrice" type="text" required="" readonly="">
                                    </div>
                                     <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Qty</label>
                                        <input class="form-control" value="{{$product->qty}}" name="qty" id="validationCustomtitle" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Status</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" <?php if($product->status=='active'){echo "checked";}?> id="edo-ani" type="radio" name="status" value="active">
                                                Enable
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" <?php if($product->status=='deactive'){echo "checked";}?>  id="edo-ani1" type="radio" name="status" value="deactive">
                                                Disable
                                            </label>
                                        </div>
                                    </div>
                              
                                    <img src="{{asset('public/images/'.$product->images)}}" height="40px" width="50px">
                                 
                                        <label class="col-form-label pt-0"> Product Upload</label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="files" type="file"  />
                                          </div>
                                          @if($product->image_one !=Null)
                                          <img src="{{asset('public/images/'.$product->image_one)}}" height="40px" width="50px">
                                        @endif
                                          <label class="col-form-label pt-0">Image(optional) </label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="file_one" type="file"  />
                                          </div>
                                          @if($product->image_two !=Null)
                                          <img src="{{asset('public/images/'.$product->image_two)}}" height="40px" width="50px">
                                        @endif
                                           <label class="col-form-label pt-0"> Image(optional)</label>
                                  <!--     <form action="/file-upload" class="dropzone"> -->
                                          <div class="fallback">
                                            <input name="files_two" type="file"  />
                                          </div>
                                 <!--    </form> -->
                                    
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
                                            <textarea id="editor1" name="short_description" cols="10" rows="4">{{$product->short_description}}</textarea>
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
                                            <textarea id="editor" name="long_description" cols="10" rows="4">{{$product->long_description}}</textarea>
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



<script>
  $('documnet').ready(function(){
    $('#product').addClass('open active');
   
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
            $('#discountPrice').val(discont);
        });
    </script>
@endsection
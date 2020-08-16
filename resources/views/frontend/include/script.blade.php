<!-- jquery lib file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jqeury ui js -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- the main bootstrap file -->
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}" ></script>

<!-- owl carousel js file -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script> 

<!-- zoom image -->
<script type="text/javascript" src="{{ asset('frontend/js/zoomsl.min.js') }}"></script>

<!-- fency box js -->
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"> </script>

<!-- step js start -->
<script type="text/javascript" src="{{ asset('frontend/js/step.js') }}"></script>

<!-- wow js file -->
  <script type="text/javascript" src="{{ asset('frontend/js/wow.min.js') }}"></script> 

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- the main js file -->
<script type="text/javascript" src="{{ asset('frontend/js/main.js') }}" ></script>

{{-- Ajax action for  cart --}}

<script>
  function addToCart(id){
    axios.post('/api/cart/add',{
      id
    }).then(res=>{
      console.log(res.data)
    })
  }




</script>
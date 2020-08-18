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
      document.getElementById('cartNumber').innerHTML = `<p>${res.data}</p>`
      swal(" ", "New item added to cart!", "success");

    })
  }





  const delete_button = document.getElementsByClassName('delete_button');
  const sub_total = document.getElementsByClassName('sub_total');
  const quantity_field = document.getElementsByClassName('quantity_field');
  const full_row = document.getElementsByClassName('full_row');
  const  update_button = document.getElementsByClassName('update_button');

  const totalPrice = document.getElementById('totalPrice');




  for(let i in delete_button){
    update_button[i].onclick = e => {
      let cartId = e.target.dataset.cartId
      let updateQuantity = quantity_field[i].value
      axios.post('/api/cart/update',{
        id: cartId,
        quantity : updateQuantity
      }).then(res => {
        try{
          sub_total[i].innerHTML = res.data.subTotal+ ' Taka'
          document.getElementById('totalPrice').innerHTML = `total : ${res.data.total+100}  taka`;
          document.getElementById('cartNumber').innerHTML = `<p>${res.data.quantity}</p>`;
        }catch{
          window.location.reload()
        }
        
      })
    }





    delete_button[i].onclick = (e) => {
      

      axios.post('/api/cart/delete',{
        id:e.target.dataset.id
        }).then(res=>{

          try{
            document.getElementById('cartNumber').innerHTML = `<p>${res.data.Quantity}</p>`;
            document.getElementById('totalPrice').innerHTML = `Total : ${res.data.total+100} Taka`;
            delete_button[i].closest('tr').remove();
          }catch{
            window.location.reload()
          }
          
      })
        
      
    }
  }


</script>
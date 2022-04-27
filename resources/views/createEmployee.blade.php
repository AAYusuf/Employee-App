<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Grocery Store</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
      Grocery App
      <div class="container">
         <div class="card" >
          <div class="card-body">
            <form id="myForm" method="post" action="/grocery/post">
            @csrf
               <div class="form-group">
               <label for="name"> First Name:</label>
               <input type="text" class="form-control" name='first_name' id="name">
               </div>
               <div class="form-group">
               <label for="last_name">Last Name:</label>
               <input type="text" class="form-control" name="last_name"id="last_name">
               </div>
               <div class="form-group">
                  <label for="birth_date">Birth Date:</label>
                  <input type="text" class="form-control"  name="birth_date"id="birth_date">
               </div>
               <div class="form-group">
                  <label for="gender">Gender:</label>
                  <select class="custom-select" id="gender" name='gender'>
                  <option selected>M</option>
                  <option value="1">F</option>
               </select>
               </div>
               <div class="form-group">
                  <label for="salary">Salary:</label>
                  <input type="text" class="form-control"  name="salary"id="salary">
               </div>
               <!-- <div class="form-group">
                  <label for="supervisor">Supervisor:</label>
                  <select class="custom-select" id="supervisor" name='supervisor'>
                  <option selected value=0>2</option>
                  </select>
               </div> -->
               <!-- <div class="form-group">
                  <label for="branch">Branch:</label>
                  <select class="custom-select" id="branch" name='branch'>
                  <option selected value=0>1</option>
                  </select>
               </div> -->
               <button class="btn btn-primary" id='submit'>Submit</button>
            </form>
         </div>
       </div>     
      </div>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
// <script>
    
//          jQuery(document).ready(function(){
//             jQuery('#submit').click(function(e){
//                e.preventDefault();
//                console.log('hello');
//                $.ajaxSetup({
//                   headers: {
//                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                   }
//               });
//                jQuery.ajax({
//                   url: "{{ url('/grocery/post') }}",
//                   method: 'post',
//                   data: {
//                      name: jQuery('#name').val(),
//                      type: jQuery('#type').val(),
//                      price: jQuery('#price').val()
//                   },
//                   success: function(result){
//                      console.log(result);
//                   }});
//                });
//             });
//       </script>
    </body>
</html>
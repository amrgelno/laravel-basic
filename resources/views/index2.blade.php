<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token"  content="{{csrf_token()}}"/>      {{--     ajax meta   --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--  <link rel="stylesheet" href="http://127.0.0.1:8000/Front/css/app.css">  --}}
 {{--     <link rel="stylesheet" href="http://127.0.0.1:8000/Front/Js/app.js">  --}}
 {{--  <link href="{{secure_asset('Front/css/app.css') }}" rel="stylesheet"  type="text/css"  >   safety link  --}}  
     <link href="{{asset('Front/css/app.css') }}" rel="stylesheet"  type="text/css"  >  
    <script src="{{asset('Front/Js/app.js') }}" defer></script>
     
    <title>getadmin</title>
</head>

<body>
    
    <h1>{{$username}}</h1>
    
    <h1 ><input type="email" value="{{$email}}" id="email" /></h1>

    <h1 ><input type="text"  value="{{$password}}" id="password" /></h1>

    <h1 ><input type="text"  value="{{$adminposts}}" id="adminposts" /></h1>

    <button type="button"  id='save' name="save" onclick="dta();" /> save  </button>
   

 <!--admin detail Ajax script-->	

 <script type="text/javascript">

        
    function dta() {	

       event.preventDefault();

        var email= $('#email').val();
        var password = $('#password').val();

        $.ajaxSetup({ 

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }  
    });

      $.ajax({

        
        
    type:'POST',	
    
    url:"{{route('AjaxAdmin')}}",	

    data:{

       // token:"{{csrf_token()}}",	
        
        email:email, 
    
        password:password, 
    
    },
     
    success:function(data) {

            $('#prod_dt').html("<p> succeded</p>")

        }, error:function(reject) {

            $('#prod_dt').html("<p>error</p>")

        }
        
          });		
         }
        


    </script>



{{--   
   <script>

function dta(){
	
	
    var email= document.getElementById('email').value;


    var password= document.getElementById('password').value;


    var token='{{csrf_token()}}';


    var save= document.getElementById('save').value;


$('#prod_dt').load('{{route('AjaxAdmin')}}',{token:token,email:email,password:password,submit:save});


}  

</script> --}}

<div id="prod_dt">  </div>
</body>
</html>
<script src="{{asset('Front/Js/jquery-3.6.0.min.js') }}"  type="text/javascript"  defer></script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
 <ul>  

  <h1>   Dashboard2.blade  <h1>

@if (!(auth()->guard('admin')->check()))


<script>   alert('you must login first');                </script>

{{--  <li>   you must login first  </li>     --}}

<meta http-equiv='refresh'  content='2,url={{route("Admin.Login")}}' />

{{--  <meta http-equiv='refresh'  content='0,url=404page' />  --}}

@else

     @if( $Admin->user()->User_Role   == 'Admin'  ) 


     <h1>   welcome to Dashboard    </h1>
  
         <li>   This Admin page  </li>   
    <li>   {{ $Admin->user()->username }} </li>   
    <li>   {{$Admin->user()->email }} </li>       
    <li>   {{$Admin->user()->Adminpost->AdminPosts }} </li>  // DB Relation  

    <li> <a href="{{route("aboutus")}}">   aboutus    </a></li>
    <li>   <a href="{{route("Admin.index")}} "> allAdmin  </li>  
    <li>  <a href="{{route("Admin.create")}} "> admins  </li>  
     <li class="nav-item">
    
         <form action="{{ route('Admin.LogOut') }}" method="post">
    
    @csrf
    @Method('Get')
        <input type="submit" value="logout">
    
        
      </form>   
      
      
     </li>
    
    </ul>
       
    @elseif( $Admin->user()->User_Role   == 'supervisor'  ) 

<h1>   welcome to Dashboard    </h1>
  
<li>   This supervisor  page  </li>   
    <li>   {{ $Admin->user()->username }} </li>   
    <li>   {{ $Admin->user()->email }} </li> 
    <li>   {{$Admin->user()->Adminpost->AdminPosts }} </li>  // DB Relation
    
<li> <a href="{{route("aboutus")}}">   aboutus    </a></li>
<li>   <a href="{{route("Admin.index")}} "> allAdmin  </li>  
<li>  <a href="{{route("Admin.create")}} "> admins  </li>  
 <li class="nav-item">

     <form action="{{ route('Admin.LogOut') }}" method="post">

@csrf
@Method('Get')
    <input type="submit" value="logout">

    
  </form>   
  
  
 </li>

</ul>
   
 @endif
 

 @endif
  


    
</body>
</html>



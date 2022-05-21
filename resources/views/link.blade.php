
  
 @foreach ($Admins as $profile )   
  

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body> 
   
    <ul>  

        @if(  $profile->User_Role   == 'Admin'  ) 

            <li>   This Admin page  </li>   
       <li>   {{ $profile->username }} </li>   
       <li>   {{ $profile->email }} </li>       

  
       @elseif(  $profile->User_Role   == 'supervisor'  ) 

 <li>   This supervisor  page  </li>   
       <li>   {{ $profile->username }} </li>   
       <li>   {{ $profile->email }} </li> 
           
    @endif


  





<li> <a href="{{route("aboutus")}}">   aboutus    </a></li>
<li>   <a href="{{route("Admin.index")}} "> allAdmin  </li>  
  <li>  <a href="{{route("Admin.create")}} "> admins  </li>  
    <li class="nav-item">


        <form action="{{ route('Admin.LogOut') }}" method="get">

@csrf
       <input type="submit" value="logout">


        </form>
   
    </li>

    </ul>
       

    @endforeach   


       
    
      
     


</body>
</html>
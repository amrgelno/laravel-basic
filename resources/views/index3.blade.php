<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getadmin</title>
</head>


<body> 
   
    <h1> select all  Admins  and update </h1>
     
    <Li> count={{$count_admins}}    </li>

     <li> Sum={{$sum_admins}}  </li>
     
     <li> Avg={{$avg_admins}}  </li>

     @php
         
$i=0;

     @endphp

    @foreach($admin as $admins )

    <table>


        <td> {{++$i}}     </td>
        {{--  <form  action="{{route('updateAdmin')}}"  method="get">    --}}
    <form  action="{{route('Admin.update',$admins->id)}}"  method="Post">

@csrf
@method('PUT')

<td>  

    {{--  <input type="text" value="{{$admins->id }}"   name="ID"   >     --}}
    
    </td>

    <td> 

    <input type="text" value=" {{$admins->username }}"   name="username" >   

  <td>
       
   

 <button type="submit" >  update  </button>  </td>  
 
</form>
 
<td>

    <form  action="{{route('Admin.destroy',$admins->id)}}"  method="Post">

        @csrf
        @method('DELETE')
        {{--  <form  action="{{route('DeleteAdmin')}}"  method="get">    --}}
         {{--  @csrf     --}}
         {{--  <td> <input type="hidden" value="{{$admins->id }}"   name="ID"   >    --}}
           
        
         <button type="submit" >  Delete  </button>  </td>  


        </form>


</td>


<td>

    {{--  <form  action="{{route('selectAdmin')}}"  method="get">  --}}
        
        <form  action="{{route('Admin.show',$admins->id)}}"  method="POST">
         
            @csrf  
            @method('GET')
            

       <input type="hidden" value="{{$admins->id}}"   name="ID"   >
           
        
         <button type="submit" >  selectAdmin  </button>  </td>  


        </form>
</td>



    </table>

    
    @endforeach


    
    @if($message=Session::get('success'))


    <div class="message">   {{$message}}                          </div>

    @endif



    <li>  <a href="{{route("Admin.create")}} "> create admins  </li> 
       
</html>
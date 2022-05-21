   {{--  <form action="{{route('newAdmin')}}"  method="POST" enctype="multipart/form-data" >  --}}
<form action="{{route('Admin.store')}}" method="POST" enctype="multipart/form-data" >  
   @csrf {{--    USING IN POST Method -> token --}}
    <input type="text"  name='username'   value=' '  >
    <input type="email"  name='email'   value=' '  >
    <input type="password"  name='password'   value=' '  >
    <input type="file" name="IMG" value="  ">
    <input type="submit" value="submit">

</form>

<li>  <a href="{{route("Admin.index")}} "> all admins  </li> 




 
<form action="{{route('Login')}}" method="POST" >  
    @csrf {{--    USING IN POST Method -> token --}}
     <input type="email"  name='email'   value=' '  >
     <input type="password"  name='password'   value=' '  >
     <input type="submit" value="submit">
 </form>
 
 
 @if ($errors->has('email'))
 <span class="text-danger">{{ $errors->first('email') }}</span>
 @endif
 
 @if ($errors->has('password'))
  <span class="text-danger">{{ $errors->first('password') }}</span>
  @endif
 
 
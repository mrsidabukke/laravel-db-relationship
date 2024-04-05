<div class="form-group">
    <label for="{{$field}}" class="form-label">{{$field}}</label>
<textarea class="form-control" id="{{$field}}" name="{{$field}}" rows="100">   
    @isset($value) {{old($field) ? old($field) : $value}} 
    @else {{old($field)}}  @endisset  
</textarea>


<div id="emailHelp" class="form-text">{{$placeholder}}</div>  

  @error($field)
   <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

 
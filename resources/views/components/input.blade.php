<div class="form-group">
    <label for="{{$field}}" class="form-label">{{$label}}</label>
    <input type="{{$type}}" class="form-control" id="{{$field}}"  name="{{$field}}" 
    {{-- ?? '' berfusungsi untuk menampilkan data yang sudah diinputkan sebelumnya dan jika tidak ada data yang diinputkan maka akan menampilkan string kosong --}}   
    @isset($value) value="{{old($field) ? old($field):$value}}"
    @else value=" {{old($field)}}" @endisset  
>


<div id="emailHelp" class="form-text">{{$placeholder ??''}}</div>
@error($field)
<div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div> 
    
 
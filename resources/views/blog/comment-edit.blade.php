@extends ('layouts.app')


@section('content')

<h1>ubah komentar</h1>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="/comment/{{$comment->id}}" method="post" >
    <!--kalau ada error pake expired token, tambahkan csrf di form-->
    <!--agar data yang diinputkan tidak hilang jika ada error kita menggunakan fungsi {{old('')}}-->
    @csrf
    @method('PUT')
    
  
    
    
    <x-textarea field="subject" label="subject" placeholder="isi artikel" value="{{$comment->subject}}"/>
      

        {{-- @if ($article->thumbnail)
        <img src="/image/{{$article->thumbnail}}" class="img-thumbnail" alt="thumbnail">
        @else
        <p>belum ada thumbnailmu bodo</p>
        @endif --}}

    {{-- <x-artikel.inputfile /> --}}



  <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection
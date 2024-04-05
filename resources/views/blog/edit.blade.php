@extends ('layouts.app')


@section('content')

<h1>ubah artikel</h1>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="/blog/{{$blog->id}}" method="post" >
    <!--kalau ada error pake expired token, tambahkan csrf di form-->
    <!--agar data yang diinputkan tidak hilang jika ada error kita menggunakan fungsi {{old('')}}-->
    @csrf
    @method('PUT')
    
  
    <x-input field="title" label="title" type="text" placeholder="judul artikel" value="{{$blog->title}}"/>
    
    <x-textarea field="subject" label="subject" placeholder="isi artikel" value="{{$blog->subject}}"/>
      

        {{-- @if ($article->thumbnail)
        <img src="/image/{{$article->thumbnail}}" class="img-thumbnail" alt="thumbnail">
        @else
        <p>belum ada thumbnailmu bodo</p>
        @endif --}}

    {{-- <x-artikel.inputfile /> --}}

    <x-input field="tags" label="Tag" type="text" placeholder="" />



  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    var inputTag = document.querySelector('#tags');
     var tagify = new Tagify(inputTag, {
         whitelist: ['html','css','js','py']
     })

     let tags=[]

        @foreach ($blog->tags as $tag)
            tags.push('{{$tag->title}}')
           @endforeach
           
           tagify.addTags(tags)
</script>




@endsection
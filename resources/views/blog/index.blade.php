@extends ('layouts.app')
@section('content')

@foreach ($blogs as $blog)
<br>


<div class="card">
  <div class="card-body">
    <h5 class="card-title"><a href="/blog/{{$blog->slug}}">{{ $blog->title }}</a></h5>
    <div class="card-text">{{ $blog->subject }}</div>
    <p>dibuat oleh: {{ $blog->user->name }}</p> 

    {{-- untuk menampilkan tag yang banyak --}}
  <p> tag: @foreach ($blog->tags as $tag) {{ $tag->title }} , @endforeach</p>
    
    {{-- <a href="/blog/{{ $blog->id }}" class="btn btn-primary">Read more</a> --}}
  </div>
</div>
@endforeach
@endsection



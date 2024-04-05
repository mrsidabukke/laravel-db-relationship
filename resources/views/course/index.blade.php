@extends ('layouts.app')
@section('content')
<h1>Course</h1>

@foreach ($courses as $course)
<br>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><a href="/course/{{$course->slug}}">{{ $course->title }}</a></h5>
    <div class="card-text">{{ $course->subject }}</div>

    {{-- -tag:{{ $course->tag->title }} --}}
    
    {{-- <a href="/blog/{{ $blog->id }}" class="btn btn-primary">Read more</a> --}}
    @if (Auth::check())
    {{-- //cek apakah user sudah join course atau belum jika sudah tombol unjoin muncul--}}
    @if (Auth::user()->courses->contains($course->id))
     {{-- //attach button to join course  --}}
     <a href="/course/join/{{$course->id}}" class="btn btn-danger btn-sml">Unjoin</a>
    {{-- <a href="/course/unjoin/{{$course->id}}" class="btn btn-danger btn-sml">Unjoin</a> --}}
    @else
     {{-- //detach button to unjoin course  --}}
     <a href="/course/join/{{$course->id}}" class="btn btn-info btn-sml">Join</a>
    @endif
    @endif
  </div>
</div>
@endforeach
@endsection



@extends('layouts.app')

@section('content')

<h1>{{ $blog->title }}</h1>
<p>{{ $blog->subject }}</p>


 {{-- untuk mengecek apakah user yang login adalah user yang membuat blog tersebut
 jika iya, maka akan muncul tombol edit --}}
@if (Auth::check())
@if (Auth::user()->id == $blog->user_id)
<a href="/blog/{{$blog->id}}/edit" class="btn btn-info btn-sm">Edit</a>
@endif
@endif


<hr>

<h3>Comments</h3>
<form action="/blog/{{$blog->id}}/comments" method="post" >
    @csrf
  

    <x-input field="subject" label="subject" type="text" placeholder="masukan komentar disini" />

    <button type="submit" class="btn btn-primary">Submit</button>

</form>

{{-- bisa digunakan untuk menampilkan komentar jika saya mengikuti penamaan yang benar --}}
{{-- <h3> daftar komentar</h3>
@foreach ($blog->comments as $comment)
<p>{{$comment->subject}}</p>
<span> - {{$comment->user->name}}</span>

@if (Auth::check())
@if (Auth::user()->id == $comment->user_id)
<a href="/comments"{{$comment->id}}/edit" class"btn btn_info">edit</a>

@endif
@endif
@endforeach --}}

@endsection
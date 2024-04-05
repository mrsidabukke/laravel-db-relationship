@extends('layouts.app')

@section('content')
<div class="container">
      
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       
                    {{ __("Halo"." ".$user->name." "."anda berhasil login!!!") }}
                    <br>
                  
                    {{-- menampilkan blog yang sudah diinputkan oleh user --}}
                    <div> Blog: </div>
                    @foreach ($user->blogs as $blog)

                    <li> <a href="blog/slug{{$blog->slug}}">  {{$blog->title}} </a></li>

                @endforeach

                {{-- menampilkan course yang sudah diinputkan oleh user --}}
                <div> Course: </div>
                @foreach ($user->courses as $course)

                <li> <a href="course/slug{{$course->slug}}">  {{$course->title}} </a></li>

            @endforeach

{{-- 
                menampilkan data sosial --}}
                    <div> Data Sosial </div>
                   @foreach ($user->socials as $social)

                       <li> {{ $social->provider.":".$social->username}} </li>

                   @endforeach
                </div>
            </div>
       
    
</div>
@endsection

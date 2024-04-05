@extends('layouts.app')

@section('content')
<h1>Create a New Article</h1>

<form action="/blog" method="post" >
    @csrf
  
  <x-input field="title" label="Title" type="text" placeholder="masukan judul disini" />
    <x-input field="subject" label="subject" type="text" placeholder="masukan isi disini" />


    <x-input field="tags" label="Tag" type="text" placeholder="" />

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
{{-- whitelist harus sesuai dengan data yang ada di database --}}
 {{-- jika ingin dinamis bisa menggunakan cara wuery selector ini
  <script>
       var inputTag = document.querySelector('#tags');
        new Tagify(inputTag, {
            whitelist: ['html','css','js','py']
        });
  </script> --}}
<script>
       var inputTag = document.querySelector('#tags');
          new Tagify(inputTag, {
            whitelist: ['html','css','js','py']
        })
      
  </script>
@endsection
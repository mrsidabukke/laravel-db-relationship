<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\tag;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\blog;
class Blogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        //eager loading 
        //eager loading adalah cara untuk mengambil data yang berelasi
        //menampilkan data blog yang sudah di inputkan
        //jika ingin multiple harus dibuat menjadi array
        $blogs = blog::with(['tags','user'])->orderBy('id', 'desc')->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
        ]);
           // menyimpan data ke dalam database yang ada relasi dengan user
      $blog =  Auth::user()->blogs()->create([
        'title' => $request->title,
        'slug' => Str::slug($request->title,'-'),
        'subject' => $request->subject,         
        ]);

       $blog->tags()->sync($this->getTags($request->tags));
        
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        {

            // cara mengoper data ke view
            //return view('contoh', ['slug' => $slug]);
            //setiap variable yang dikirim harus dibuat ke return
         
           // jika nama variable sama dengan nama variable di web.php
           
           // where('slug', $slug) berfungsi untuk mencari data berdasarkan slug
           //eager loading pada nested relationship
           //$blog = blog::with('comments'.'user')->where('slug', $slug)->first();
         $blog = blog::where('slug', $slug)->first();
           // jika link tidak ditemukan maka akan menampilkan error 404
           if($blog == null)
                 abort(404);
         
              return view('blog.single', compact('blog'));  
         
         }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = blog::find($id);
          
        //jika user yang login bukan pemilik blog maka akan menampilkan error 403 dan tidak bisa mengedit
        if($blog->user_id != Auth::user()->id)
            return abort(403);

        return view('blog.edit', compact('blog'));
    }

    private function getTags($tags)
    {

         //tag
        //mengambil data dari tags yang diinputkan berupa json dan diubah menjadi array 
        //array_column berfungsi untuk mengambil data dari array yang sudah diubah
        //tags_id berfungsi untuk mengambil id dari tags yang sudah diinputkan
        //tags()->attach berfungsi untuk menghubungkan data tags dengan blog
        $tagjson = json_decode($tags);
        $tagTitles = array_column($tagjson, 'value');

        $tags_id = [];
        foreach($tagTitles as $tagTitle){
            $tag = tag::where('title', $tagTitle)->first();
            $tags_id[] = $tag->id;
        }
       

        
           return $tags_id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
        ]);
             
      $blog=blog::find($id);

          //jika user yang login bukan pemilik blog maka akan menampilkan error 403 dan tidak bisa mengedit
          if($blog->user_id != Auth::user()->id)
          return abort(403);
       
        //tidak memakai auth agar data dari create tidak tergantikan
       $blog->update([
            'title' => $request->title,
            'subject' => $request->subject,
        ]);

        $blog->tags()->sync($this->getTags($request->tags));
        
        return redirect('/blog');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

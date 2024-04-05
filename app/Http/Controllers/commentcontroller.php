<?php

namespace App\Http\Controllers;
use App\Models\blog;
use Illuminate\Http\Request;
use Auth;
use App\models\blogcomment;
class commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        //
        $request->validate([
            'subject' => 'required'

        ]);

        $blog = blog::find($id);
        $blog->comments()->create([
            'subject' => $request->subject,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/blog',$blog->slug);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $comment = blogcomment::find($id);
        if($comment->user_id != Auth::user()->id)
        return abort(403, 'anda tidak punya akses');

        return view('blog.comment-edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'subject' => 'required'
        ]);
        $comment = blogcomment::find($id);
         if($comment->user_id != Auth::user()->id)
            return abort(403, 'anda tidak punya akses');


       
        $comment->update([
            'subject' => $request->subject
        ]);


        return redirect('/blog/'.$comment->blog->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

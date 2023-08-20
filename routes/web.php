<?php

use App\Http\Mail\ContactFormMailable;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
	@@ -14,5 +17,18 @@
*/

Route::get('/', function () {
    return view('examples', [
//        'users' => User::all(),
        'users' => User::paginate(10),
        'posts' => Post::all(),
    ]);
});

Route::post('/contact', function (Request $request) {
    $contact = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Mail::to('foo@example.com')->send(new ContactFormMailable($contact));

    return back()->with('success_message', 'We received your message successfully and will get back to you shortly!');
});

Route::get('/post/{post}', function (Post $post) {
    return view('post.show', [
        'post' => $post,
    ]);
})->name('post.show');

Route::post('/post/{post}/comment', function (Request $request, Post $post) {
    $request->validate([
        'comment' => 'required|min:4'
    ]);

    Comment::create([
        'post_id' => $post->id,
        'username' => 'Guest',
        'content' => $request->comment,
    ]);

    return back()->with('success_message', 'Comment was posted!');
})->name('comment.store');

Route::get('/post/{post}/edit', function (Post $post) {
    return view('post.edit', [
        'post' => $post,
    ]);
})->name('post.edit');

Route::patch('/post/{post}', function (Request $request, Post $post) {
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'photo' => 'nullable|sometimes|image|max:5000',
    ]);

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'photo' => $request->photo ? $request->file('photo')->store('photos', 'public') : $post->photo,
    ]);

    return back()->with('success_message', 'Post was updated successfully!');
})->name('post.update');

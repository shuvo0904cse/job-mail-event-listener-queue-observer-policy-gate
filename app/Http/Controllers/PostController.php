<?php

namespace App\Http\Controllers;

use App\Events\SomeOneCheckPostDetailsEvent;
use App\Events\SomeOneCommentOnPostEvent;
use App\Http\Requests\PostRequest;
use App\Jobs\SendNewPostToUsersJob;
use App\Models\Post;
use App\Models\User;
use App\Notifications\TopTenPostsNotifyToUsers;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    //using job, email, queue
    public function job(){
        $post = Post::create([
            "name" => "name",
            "description" => "description"
        ]);
    
        SendNewPostToUsersJob::dispatch($post);

        return response()->json([
            "created successfully"
        ]);
    }

    //using event, listener, job, email, queue
    public function event(){
        $post = Post::first();
        SomeOneCheckPostDetailsEvent::dispatch($post);

        return response()->json([
            "Already visited"
        ]);
    }

    //using event, listener, email, queue
    public function eventAnother(){
        $post = Post::first();
        SomeOneCommentOnPostEvent::dispatch($post);

        return response()->json([
            "Some One Commented"
        ]);
    }

    //using notification, email, queue, database
    public function notification(){
        $user = User::firstOrCreate([
            "name" => "name",
            "email" => "email".rand(100000,999999)."@gmail.com",
            "password" => Hash::make("123456")
        ]);
        $post = Post::first();
        $user->notify(new TopTenPostsNotifyToUsers($post));
    
        return response()->json([
            "notified to user"
        ]);
    }


}

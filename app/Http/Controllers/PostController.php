<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
    
class PostController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        $posts = Post::get();
    
        return view('posts', compact('posts'));
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request): JsonResponse
    {

        //var_dump($request);

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {
            $fileName =  "image-" . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('image', $fileName);

            /*$image = new Image;
            $image->image = $fileName;
            $image->save();*/

            return response()->json(["image" => $fileName]);
        }


        /*$request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
         
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);*/
    
        return response()->json(['success' => 'Post created successfully.']);
    }

}
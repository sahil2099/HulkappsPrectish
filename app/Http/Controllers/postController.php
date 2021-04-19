<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postsQry = Post::query()->with('user');
        $search = $request->input('search');
        if (!empty($search)){
            $postsQry->where('title', 'LIKE', '%'.$search.'%');
        }
        if($request->has(['sort','order'] ) && in_array($request->input('order'),['asc','desc']))
        {
            $postsQry->orderBy($request->input('sort'),$request->input('order'));
        }
        $postsQry->latest();

        $posts = $postsQry->paginate(3);
//        $posts=post::sortable()->orderBy('id','DESC')

        return view('post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules = [
//            'title' => 'required|string|max:255',
//            'uid' => 'required',
//        ];
//        $validator = Validator::make($request->all(),$rules);
//        if ($validator->fails()) {
//            return redirect('posts')
//                ->withInput()
//                ->withErrors($validator);
//        }
//        else{
            $data = $request->input();
//            try{
                $uid =Auth::id();
                $posts = new Post();
                $posts->title = $data['title'];
                $posts->uid = $uid;
                $posts->save();
                return redirect('posts')->with('status',"Insert successfully");
//            }
//            catch(Exception $e){
//                return redirect('insert')->with('failed',"operation failed");
//            }
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= Post::findOrFail($id);
        return view('post.ViewComment', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts= Post::findOrFail($id);
        return view('post.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts=$request->validate([
            'title' => 'required',
        ]);
        Post::whereId($id)->update($posts);
        return redirect()->route('posts.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::findOrFail($id);
        $posts->delete();
        return redirect()->route('posts.index')
            ->with('success', ' deleted successfully');
    }
}

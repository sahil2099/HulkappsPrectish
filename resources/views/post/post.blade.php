

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>post</h1>
    <div>
        <a href="{{ route('posts.create') }}">Create</a>
{{--        <a href="{{url('/posts/insert')}}">Create Post</a>--}}
    </div>
    <form action="{{route('posts.index')}}" method="get">
        {{ csrf_field() }}
        <div>
            <div>
                <input type="text" name="search">
                <button type="submit"> Search</button>
            </div>
        </div>
    </form>
        @if(isset($posts))
        <table>
                <th>Auther</th>
                <th>@sortablelink('title')</th>
                <th>@sortablelink('created_at')</th>
                <th>Action</th>
            </tr>
            @if($posts->isNotEmpty())
                @foreach($posts as $post)
                    <tr>
                        <td>    {{$post->User->name}}</td>
                        <td>    {{$post->title}}</td>
                        <td>    {{$post->created_at}}</td>

                        @if($post->user->id==Auth::user()->id)

                            <td><a href="{{route('posts.edit',$post->id)}}" >Edit</a></td>
                            <td><a href="{{route('posts.destroy',$post->id)}}" >Delete</a></td>
                            <td><a href="{{route('posts.show',$post->id)}}" >view</a></td>

                        @else

                            <td><a href="{{route('posts.show',$post->id)}}" >view</a></td>

                        @endif
                    </tr>
                @endforeach

            @else

                <div>
                    <h2>notfound</h2>
                </div>
            @endif
        </table>
        @endif

{{--    {{ $posts->links('page') }}--}}
    {!! $posts->appends(\Request::except('page'))->render()!!}
{{--    --}}
</body>
</html>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
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
<h1>update</h1>
<form action="{{route('posts.update',$posts->id)}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="">Title</label>
        <input type="text" name="title" id="title" value="{{$posts->title}}">
    </div>
    <div>
        <button type="submit">Update Comment </button>
    </div>
</form>
</body>
</html>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Comments') }}
        </h2>
    </x-slot>

    <x-slot name="" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($posts))
                <table>
                    <tr>
                        <th>Auther</th>
                        <th>Title</th>
                    </tr>
                    <tr>
                        <td>{{$posts->User->name}}</td>
                        <td>    {{$posts->title}}</td>
                    </tr>
                </table>
            @endif
        </h2>
    </x-slot>

{{--    <x-slot name="header">--}}
{{----}}
{{--    </x-slot>--}}



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
<div>

@if(isset($posts))
       <table>
            <tr>
                <th>Auther</th>
                <th>Title</th>
            </tr>
                    <tr>
                        <td>{{$posts->User->name}}</td>
                        <td>    {{$posts->title}}</td>
                    </tr>
        </table>
    @endif
      <table>
            <tr>
                <th>Auther</th>
            </tr>
          <tr>
              <td>comment</td>
          </tr>
          <tr>
              <td>
                  <x-jet-secondary-button  >
                      {{ __('Replay') }}
                  </x-jet-secondary-button>
              </td>
          </tr>
      </table>

    <form action="{{route('posts.comments.store',['id'=>$posts->id])}}" method="post">
        @csrf
        <textarea name="comment" id="commnent" cols="30" rows="5"></textarea>
        <button type="submit" name="btncomment">Comment</button>
    </form>
</div>


</body>
</html>
</x-app-layout>

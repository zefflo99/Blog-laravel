@extends('layout')


@section('title', 'mon blog')

@section('body')
    <div class="container">
        <h1 class="text-center">Acceuil</h1>

        <ul>
            @foreach ($posts as $post)
                <li>
                    <div class="card">
                        <div class="card-header">
                            Auteur: {{$post->user->firstname}} {{ $post->user->lastname}}
                        </div>
                        <div class="card-body">
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->content}}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info" href="{{route('post.show', $post)}}">Voir plus</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $posts->links() }}
    </div>
@endsection

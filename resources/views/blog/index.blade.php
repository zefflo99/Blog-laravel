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
                            Auteur: {{ $post->user->first_name }} {{ $post->user->last_name }}
                        </div>
                        <div class="card-body">
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->content}}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info" href="">Voir plus</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $posts->links() }}
    </div>
@endsection

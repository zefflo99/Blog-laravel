@extends('layout')


@section('title', 'Detail de la publication')

@section('body')
    <div class="container">
        <h1 class="text-center">Detail de la publication</h1>


                    <div class="card">
                        <div class="card-header">
                            Auteur: {{ $post->user->first_name }} {{ $post->user->last_name }}
                        </div>
                        <div class="card-body">
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->content}}</p>
                            <img src="/storage/{{$post->image}}" alt="{{$post->title}}">
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info" href="{{route('post.show', $post)}}">Modifier</a>
                            <form action="" method="post">
                                @csrf
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
    </div>
@endsection

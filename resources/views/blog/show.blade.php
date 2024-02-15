@extends('layout')


@section('title', 'Detail de la publication')

@section('body')
    <div class="container">
        <h1 class="text-center">Detail de la publication</h1>


                    <div class="card w-50 mx-auto my-5">
                        <div class="card-header">
                            Auteur: {{$post->user->firstname}} {{$post->user->lastname}}
                        </div>
                        <div class="card-body">
                            <h4>{{$post->title}}</h4>
                            <p>{{$post->content}}</p>
                            <img style="width: 100%; object-fit: contain" src="/storage/{{$post->image}}" alt="{{$post->title}}">
                        </div>
                        @can('update', $post)
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="btn btn-info" href="{{route('post.edit', $post)}}">Modifier</a>
                            <form action="{{route('post.delete', $post)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                        @endcan
                    </div>
    </div>
@endsection

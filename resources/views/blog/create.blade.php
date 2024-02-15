@extends('layout')
@section('title', 'Créer une publication')


@section('body')
    <div class="container">
        <h1 class="text-center">Creer une publication</h1>

        <form class="w-75 mx-auto my-5" action="" method="post" enctype="multipart/form-data">
            @csrf
            <x-input name="title" label="Titre" value="{{old('title')}}" />
            <x-input name="image" label="Image" type="file" value="{{old('image')}}" />
            <x-input name="content" label="Contenu" type="textarea">{{old('content')}}</x-input>
            <button class="btn btn-info">Ajouter</button>
        </form>
    </div>
@endsection

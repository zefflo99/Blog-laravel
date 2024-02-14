@extends('layout')
@section('title', 'Connexion')

@section('body')
    <div class="container">
        <h1 class="text-center">Connexion</h1>

        <form class="w-75 mx-auto my-5" action="" method="post">
            @csrf
            <x-input name="email" label="Email" value="" type="email+"/>
            <x-input name="password" label="Mot de passe" value="" type="password"/>
            <button class="btn btn-info">Connexion</button>
        </form>
    </div>
@endsection

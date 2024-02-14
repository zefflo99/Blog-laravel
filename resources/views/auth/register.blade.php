@extends('layout')
@section('title', 'Inscription')

@section('body')
    <div class="container">
        <h1 class="text-center">Inscription</h1>


        <form class="w-75 mx-auto my-5" action="" method="post">
            @csrf
            <x-input name="firstname" label="Prénom" value="{{old('firstname')}}" type="text"/>
            <x-input name="lastname" label="Nom" value="{{old('lastname')}}" type="text"/>
            <x-input name="email" label="Email" value="{{old('email')}}" type="email+"/>
            <x-input name="password" label="Mot de passe" value="{{old('password')}}" type="password"/>
            <button class="btn btn-info">Inscription</button>
        </form>
    </div>
@endsection

@extends('seller.layouts.app')

@section('content')
    <div class="container">
        <h1>Créer une boutique</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('shops.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nom de la boutique</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <textarea id="address" name="address" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer la boutique</button>
        </form>
    </div>
@endsection
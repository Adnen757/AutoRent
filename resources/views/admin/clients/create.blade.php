@extends('layouts.admin')

@section('title', 'Ajouter un Client')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div class="table-container" style="padding: 2rem;">
            <form action="{{ route('admin.clients.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" required minlength="6">
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem;">
                    <a href="{{ route('admin.clients') }}" class="btn btn-danger" style="background: #6b7280;">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
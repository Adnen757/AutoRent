@extends('layouts.admin')

@section('title', 'Mon Profil')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <div class="table-container" style="padding: 2rem;">
            <div style="text-align: center; margin-bottom: 2rem;">
                <div
                    style="width: 80px; height: 80px; background: #4f46e5; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1rem;">
                    {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                </div>
                <h2 style="margin: 0;">{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p style="color: #6b7280; margin: 0.5rem 0 0;">Administrateur</p>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" name="password" class="form-control" minlength="6">
                </div>

                <div style="display: flex; justify-content: flex-end; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary">Mettre à jour mon profil</button>
                </div>
            </form>
        </div>
    </div>
@endsection
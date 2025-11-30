@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] flex bg-white">
        <!-- Left Side - Image -->
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                alt="Register Background" class="absolute inset-0 w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-gradient-to-r from-slate-900/80 to-slate-900/40 flex items-center justify-center">
                <div class="text-white max-w-lg px-8 text-center">
                    <h2 class="text-4xl font-bold mb-6">Rejoignez l'aventure</h2>
                    <p class="text-lg text-slate-200">Créez votre compte en quelques secondes et accédez à la plus belle
                        flotte de véhicules pour vos déplacements.</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-slate-50">
            <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Inscription</h2>
                    <p class="text-slate-500">Commencez votre voyage avec AutoRent</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Last Name (Nom) -->
                        <div>
                            <label for="last_name" class="block text-sm font-semibold text-slate-700 mb-2">Nom</label>
                            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                                autofocus
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Dupont">
                            @error('last_name')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- First Name (Prénom) -->
                        <div>
                            <label for="first_name" class="block text-sm font-semibold text-slate-700 mb-2">Prénom</label>
                            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Jean">
                            @error('first_name')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400">✉️</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="votre@email.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Mot de passe</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400">🔒</span>
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">Confirmer
                            le mot de passe</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400">🔒</span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-primary/50 transform hover:-translate-y-1 mt-4">
                        S'inscrire
                    </button>

                    <div class="text-center mt-6">
                        <p class="text-slate-500 text-sm">
                            Déjà inscrit ?
                            <a href="{{ route('login') }}"
                                class="text-primary hover:text-secondary font-bold transition-colors">
                                Se connecter
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
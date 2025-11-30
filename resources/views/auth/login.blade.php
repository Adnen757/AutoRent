@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] flex bg-white">
        <!-- Left Side - Image -->
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                alt="Login Background" class="absolute inset-0 w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-gradient-to-r from-slate-900/80 to-slate-900/40 flex items-center justify-center">
                <div class="text-white max-w-lg px-8 text-center">
                    <h2 class="text-4xl font-bold mb-6">Bon retour parmi nous</h2>
                    <p class="text-lg text-slate-200">Connectez-vous pour gérer vos réservations, accéder à vos offres
                        exclusives et profiter d'une expérience de location fluide.</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-slate-50">
            <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">Connexion</h2>
                    <p class="text-slate-500">Accédez à votre espace personnel</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400">✉️</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-slate-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 w-4 h-4">
                            <span class="ml-2 text-sm text-slate-600">Se souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-primary hover:text-secondary font-medium transition-colors"
                                href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-primary/50 transform hover:-translate-y-1">
                        Se connecter
                    </button>

                    <div class="text-center mt-6">
                        <p class="text-slate-500 text-sm">
                            Pas encore de compte ?
                            <a href="{{ route('register') }}"
                                class="text-primary hover:text-secondary font-bold transition-colors">
                                Créer un compte
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
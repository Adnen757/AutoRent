@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="bg-slate-900 py-20 text-white relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center opacity-20">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 to-slate-900/90"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Nos Services Premium</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">Une expérience de mobilité complète, conçue pour répondre à
                toutes vos exigences.</p>
        </div>
    </div>

    <div class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-primary">
                            {!! $service->icon ?? '🚗' !!}
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $service->title }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $service->description }}</p>
                    </div>
                @empty
                    <!-- Fallback static services if DB is empty -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-primary">
                            ✈️
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Transfert Aéroport</h3>
                        <p class="text-slate-600 leading-relaxed">Un service ponctuel et confortable pour vos départs et
                            arrivées. Nous suivons votre vol en temps réel.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-amber-500">
                            👨‍✈️
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Chauffeur Privé</h3>
                        <p class="text-slate-600 leading-relaxed">Profitez du savoir-faire de nos chauffeurs professionnels pour
                            vos déplacements d'affaires ou privés.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-green-500">
                            📅
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Location Longue Durée</h3>
                        <p class="text-slate-600 leading-relaxed">Des solutions flexibles et avantageuses pour vos besoins de
                            mobilité sur plusieurs mois.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-purple-500">
                            🎉
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Événements Spéciaux</h3>
                        <p class="text-slate-600 leading-relaxed">Mariages, cérémonies, VIP. Des véhicules d'exception pour
                            rendre vos moments inoubliables.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-red-500">
                            🆘
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Assistance 24/7</h3>
                        <p class="text-slate-600 leading-relaxed">Une panne ? Un accident ? Notre service d'assistance
                            intervient rapidement, partout en Europe.</p>
                    </div>
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group border border-slate-100 hover:-translate-y-1">
                        <div
                            class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center text-4xl mb-6 group-hover:scale-110 transition-transform duration-300 text-teal-500">
                            📱
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">Réservation Mobile</h3>
                        <p class="text-slate-600 leading-relaxed">Gérez vos locations en toute simplicité depuis notre
                            application mobile ou notre site web optimisé.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
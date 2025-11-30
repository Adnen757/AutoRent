@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="bg-slate-900 py-20 text-white relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center opacity-20">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 to-slate-900/90"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Contactez-nous</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">Notre équipe est à votre disposition pour répondre à toutes
                vos questions.</p>
        </div>
    </div>

    <div class="bg-slate-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-8">Parlons de votre projet</h2>
                    <p class="text-slate-600 mb-12 text-lg leading-relaxed">
                        Que vous ayez besoin d'un véhicule pour une journée ou pour un mois, nous sommes là pour vous aider
                        à trouver la solution idéale. N'hésitez pas à nous contacter ou à passer nous voir en agence.
                    </p>

                    <div class="space-y-8">
                        <div
                            class="flex items-start p-6 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                            <div
                                class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-2xl text-primary mr-6 flex-shrink-0">
                                📍
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-1">Adresse</h3>
                                <p class="text-slate-600">123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start p-6 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                            <div
                                class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-2xl text-green-500 mr-6 flex-shrink-0">
                                📞
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-1">Téléphone</h3>
                                <p class="text-slate-600">+33 1 23 45 67 89</p>
                                <p class="text-sm text-slate-400 mt-1">Du Lundi au Samedi, 9h - 19h</p>
                            </div>
                        </div>

                        <div
                            class="flex items-start p-6 bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                            <div
                                class="w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center text-2xl text-amber-500 mr-6 flex-shrink-0">
                                ✉️
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-900 mb-1">Email</h3>
                                <p class="text-slate-600">contact@autorent.com</p>
                                <p class="text-sm text-slate-400 mt-1">Réponse sous 24h garantie</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Envoyez-nous un message</h3>
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nom complet</label>
                            <input type="text" name="name" id="name" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Votre nom">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="votre@email.com">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Message</label>
                            <textarea name="message" id="message" rows="5" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                placeholder="Comment pouvons-nous vous aider ?"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-secondary text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-primary/50 transform hover:-translate-y-1">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
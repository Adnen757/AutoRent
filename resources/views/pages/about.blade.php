@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="bg-slate-900 py-20 text-white relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1560179707-f14e90ef3623?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center opacity-20">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 to-slate-900/90"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Notre Histoire</h1>
            <p class="text-xl text-slate-300 max-w-2xl mx-auto">Redéfinir les standards de la location de voiture depuis
                2025.</p>
        </div>
    </div>

    <div class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full z-0"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-secondary/10 rounded-full z-0"></div>
                    <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                        alt="About Us"
                        class="relative z-10 rounded-2xl shadow-2xl transform hover:scale-[1.02] transition-transform duration-500">
                </div>

                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-8 leading-tight">
                        Plus qu'une simple <br>
                        <span class="text-primary">location de voiture</span>
                    </h2>

                    <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                        <p>
                            Chez AutoRent, nous croyons que la location de voiture doit être simple, transparente et
                            accessible à tous. Notre mission est de vous fournir une expérience de conduite exceptionnelle,
                            que ce soit pour un voyage d'affaires, des vacances en famille ou une escapade le temps d'un
                            week-end.
                        </p>
                        <p>
                            Nous nous engageons à offrir une flotte de véhicules modernes, régulièrement entretenus et
                            propres, afin de garantir votre sécurité et votre confort. Chaque véhicule est inspecté
                            rigoureusement avant chaque départ.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-8 mt-12">
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                            <h4 class="font-bold text-4xl text-primary mb-2">500+</h4>
                            <p class="text-slate-600 font-medium">Véhicules Premium</p>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                            <h4 class="font-bold text-4xl text-primary mb-2">10k+</h4>
                            <p class="text-slate-600 font-medium">Clients Satisfaits</p>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                            <h4 class="font-bold text-4xl text-primary mb-2">50+</h4>
                            <p class="text-slate-600 font-medium">Villes Desservies</p>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                            <h4 class="font-bold text-4xl text-primary mb-2">24/7</h4>
                            <p class="text-slate-600 font-medium">Support Client</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-slate-50 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Nos Valeurs</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Les principes qui guident chacune de nos actions.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-lg transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-3xl mb-6 text-primary">
                        💎</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Excellence</h3>
                    <p class="text-slate-600">Nous visons la perfection dans chaque détail, de la propreté de nos voitures à
                        la qualité de notre accueil.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-lg transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center text-3xl mb-6 text-green-600">
                        🌿</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Durabilité</h3>
                    <p class="text-slate-600">Nous investissons massivement dans une flotte hybride et électrique pour
                        réduire notre empreinte carbone.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-lg transition-all duration-300">
                    <div
                        class="w-16 h-16 mx-auto bg-amber-100 rounded-full flex items-center justify-center text-3xl mb-6 text-amber-600">
                        🤝</div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Confiance</h3>
                    <p class="text-slate-600">La transparence est au cœur de notre relation client. Pas de frais cachés, pas
                        de mauvaises surprises.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
<x-app-layout>
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg"
        data-background="{{ asset('img/banner/breadcrumb-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                    <div class="tp-breadcrumb">
                        <div class="tp-breadcrumb__link mb-10">
                            <span class="breadcrumb-item-active"><a href="index.html">Accueil</a></span>
                            <span>500</span>
                        </div>
                        <h2 class="tp-breadcrumb__title">Erreur 500</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- error-area-start -->
    <section class="erroe-area pt-70 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="eperror__wrapper items-center justify-center mx-auto flex flex-col text-center">
                        <div class="tperror__thumb mb-35">
                            <img loading="lazy" src="{{ asset('img/icon/error.png') }}" alt="">
                        </div>
                        <div class="tperror__content">
                            <h4 class="tperror__title mb-25">500. Erreur interne du serveur</h4>
                            <p>Désolé, une erreur interne s'est produite sur le serveur. Veuillez réessayer plus tard ou
                                <br> retourner à la page d'accueil.</p>
                            <button class="tpsecondary-btn tp-color-btn tp-error-btn"><i
                                    class="fal fa-long-arrow-left"></i> Retour à l'accueil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error-area-end -->

    @section('footer')
        @include('partials.footer')
    @endsection
</x-app-layout>

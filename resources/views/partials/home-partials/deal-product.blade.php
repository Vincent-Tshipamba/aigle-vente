@if (empty($promotion))
@else
    <section class="dealproduct-area pb-95">
        <div class="container">
            <div class="theme-bg pt-40 pb-40">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealproduct">
                            <div class="tpdealproduct__thumb p-relative text-center">
                                @php
                                    $firstPhoto = $promotion->product->photos->first();

                                    $initialPrice = $promotion->product->price ?? 59;
                                    $discountPrice = $promotion->discount_percentage ?? 1;
                                    $percentageChange = ($initialPrice / $discountPrice) * 100;
                                @endphp
                                <img loading="lazy" src="{{ $firstPhoto->image ?? asset('img/floded/floded-01.png') }}"
                                    alt="{{ $promotion->product->name }}" class="w-96 h-96 object-cover mx-auto">

                                <div class="tpdealproductd__offer">
                                    <h5 class="tpdealproduct__offer-price">
                                        <span>À partir de</span>{{ $percentageChange ?? '49€' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="tpdealcontact pt-30">
                            <div class="tpdealcontact__price mb-5">
                                <span>{{ number_format($percentageChange ?? 49, 2, ',', ' ') }}€</span>
                                <del>{{ number_format($promotion->product->unit_price ?? 59, 2, ',', ' ') }}€</del>
                            </div>
                            <div class="tpdealcontact__text mb-30">
                                <h4 class="tpdealcontact__title mb-10">
                                    <a
                                        href="{{ route('products.show', $promotion->product->_id) }}">{{ $promotion->product->name ?? 'Pots Pliés Abstraits Pro2' }}</a>
                                </h4>

                                <p>{!! substr($promotion->product->description, 0, 20) ?? 'Design élégant et décoration coexistent.' !!}</p>
                            </div>

                            <div class="tpdealcontact__progress mb-30">
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="tpdealcontact__count">
                                <div class="tpdealcontact__countdown"
                                    data-countdown="{{ $promotion->promotion_duration }}">
                                </div>
                                <i>Reste jusqu'à la <br> fin de l'offre</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

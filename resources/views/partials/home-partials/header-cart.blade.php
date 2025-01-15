<!-- header-cart-start -->
<div class="tpcartinfo tp-cart-info-area p-relative">
    <button class="tpcart__close"><i class="fal fa-times"></i></button>
    <div class="tpcart">
        <h4 class="tpcart__title">La liste de vos souhaits</h4>
        <div class="tpcart__product">
            <div class="tpcart__product-list">
                <ul>
                    @foreach ($wishlists->take(4) as $wishlist)
                        <li>
                            <div class="tpcart__item">
                                <div class="tpcart__img">
                                    <img loading="lazy"
                                        src="{{ $wishlist->product->photos->first()->image }}"
                                        alt="">
                                    <div class="tpcart__del">
                                        <form action="{{ route('client.wishlist.remove', $wishlist->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="reload" value="true">
                                            <button type="submit" href="">
                                                <i class="far fa-times-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tpcart__content">
                                    <span class="tpcart__content-title"><a
                                            href="{{ route('products.show', $wishlist->product->_id) }}">{{ $wishlist->product->name }}</a></span>
                                    <div class="tpcart__cart-price">
                                        <span class="new-price">${{ $wishlist->product->unit_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tpcart__checkout">
                <div class="tpcart__total-price d-flex justify-content-between align-items-center">
                    <span>Sous-total :</span>
                    <span class="heilight-price">{{ $totalAmount }}</span>
                </div>
                <div class="tpcart__checkout-btn">
                    <a class="tpcheck-btn" href="{{ route('client.wishlist') }}">Voir la liste complète</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cartbody-overlay"></div>
<!-- header-cart-end -->

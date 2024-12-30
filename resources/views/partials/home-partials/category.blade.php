<!-- category-area-start -->
<section class="category-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tpsection mb-40">
                    <h4 class="tpsection__title">Top <span> Catégories </span></h4>
                </div>
            </div>
        </div>
        <div class="custom-row category-border pb-45 justify-content-xl-between xl:gap-10">
            @foreach ($categories as $i => $category)
                <div class="tpcategory mb-40">
                    <div class="tpcategory__icon bg-cover bg-center p-relative"
                        style="background-image: url('{{ asset($category->image) }}');">
                        <img loading="lazy" src="{{ asset($category->image) }}" width="33" height="50" />
                        <span>{{ $i + 1 }}</span>
                    </div>
                    <div class="tpcategory__content">
                        <h5 class="tpcategory__title">
                            {{ $category->name }}
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- category-area-end -->

<div class="container" id="categories">
    <div class="pb-50">
        <div class="section-title-furits text-center">
            <img src="{{ asset('frontend/img/icon-img/49.png') }}" alt="">
            <h2>BROWSE OUR CATEGORIES</h2>
        </div>
        <br>
        <section>
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <a class="category-item" href="{{ route('shop.index', $categories[0]->slug ?? '') }}">
                        @if($categories[0]->cover ?? '')
                            <img class="img-fluid"
                                 src="{{ asset('storage/images/categories/' . $categories[0]->cover ?? '') }}"
                                 alt="{{ $categories[0]->name ?? '' }}">
                        @else
                            <img class="img-fluid" src="{{ asset('frontend/assets/categories/cat-img-1.jpg') }}" alt="">
                        @endif
                        <strong class="category-item-title">{{ $categories[0]->name ?? '' }}</strong>
                    </a>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <a class="category-item mb-4" href="{{ route('shop.index', $categories[1]->slug ?? '') }}">
                        @if($categories[1]->cover ?? '')
                            <img class="img-fluid"
                                 src="{{ asset('storage/images/categories/' . $categories[1]->cover ?? '') }}"
                                 alt="{{ $categories[1]->name ?? '' }}">
                        @else
                            <img class="img-fluid"
                                 style="margin: 7px;"
                                 src="{{ asset('frontend/assets/categories/cat-img-2.jpg') }}"
                                 alt="{{ $categories[1]->name ?? '' }}">
                        @endif
                        <strong class="category-item-title" style="margin-top: -124px;">{{ $categories[1]->name ?? '' }}</strong>
                    </a>
                    <a class="category-item" href="{{ route('shop.index', $categories[2]->slug ?? '') }}">
                        @if($categories[2]->cover ?? '')
                            <img class="img-fluid"
                                 src="{{ asset('storage/images/categories/' . $categories[2]->cover ?? '') }}"
                                 alt="{{ $categories[2]->name ?? '' }}">
                        @else
                            <img class="img-fluid"
                                 style="margin: 9px;"
                                 src="{{ asset('frontend/assets/categories/cat-img-3.jpg') }}"
                                 alt="{{ $categories[2]->name ?? '' }}">
                        @endif
                        <strong class="category-item-title" style="margin-top: 104px;">{{ $categories[2]->name ?? '' }}</strong>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="category-item" href="{{ route('shop.index', $categories[3]->slug ?? '') }}">
                        @if($categories[3]->cover ?? '')
                            <img class="img-fluid"
                                 src="{{ asset('storage/images/categories/' . $categories[3]->cover ?? '') }}"
                                 alt="">
                        @else
                            <img class="img-fluid" src="{{ asset('frontend/assets/categories/cat-img-4.jpg') }}"
                                 alt="{{ $categories[3]->name ?? '' }}">
                        @endif
                        <strong class="category-item-title">{{ $categories[3]->name ?? '' }}</strong>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
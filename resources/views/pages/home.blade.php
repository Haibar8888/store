 @extends('layouts.app')

 @section('title', 'Store - Your Best Marketplace')

 @section('content')
 {{-- content --}}
 <div class="page-content page-home">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      class="d-block w-100"
                      alt="Carousel Image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Trend Categories</h5>
            </div>
          </div>
          <div class="row">
            @php
              $categoryIncrement = 0;
            @endphp
            @forelse($category as $item)
              <div
                class="col-6 col-md-3 col-lg-2"
                data-aos="fade-up"
                data-aos-delay="{{$categoryIncrement += 100}}"
              >
                <a class="component-categories d-block" href="{{route('category.detail',$item->slug)}}">
                  <div class="categories-image">
                    <img
                      src="{{Storage::url($item->photo)}}"
                      alt="Gadgets Categories"
                      class="w-100"
                    />
                  </div>
                  <p class="categories-text">
                  {{$item->name}}
                  </p>
                </a>
            </div>
            @empty
              <div
                class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                Belum ada Kategori Product
            </div>
            @endforelse
          </div>
        </div>
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
            @php
              $productIncrement = 0;
            @endphp
            @forelse ($product as $item)
            <div
                class="col-6 col-md-4 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="{{$productIncrement += 100}}"
              >
                <a class="component-products d-block" href="">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        @if($item->galleries->count())
                            background-image: url('{{Storage::url($item->galleries->first()->photo)}}');
                        @else
                            background-color: #eee;
                        @endif
                        ">
                    </div>
                  </div>
                  <div class="products-text">
                    {{$item->name}}
                  </div>
                  <div class="products-price">
                    {{$item->price}}
                  </div>
                </a>
            </div>
            @empty
                <div
                class="col-12 text-center py-5"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                Belum ada Product
            </div>
            @endforelse
         
          </div>
        </div>
      </section>
    </div>
 @endsection
 @extends('layouts.app')

 @section('title', 'Categories - BWA Store')

 @section('content')
 {{-- content --}}
   <!-- Page Content -->
    <div class="page-content page-categories">
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Categories</h5>
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
      </section>
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
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
          <div class="row">
            <div class="col-12 mt-4">
              {{$product->links('pagination::bootstrap-4')}}
            </div>
          </div>
        </div>
      </section>
    </div>
 @endsection
@extends('frontend.layouts.default')

@php
 
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $price = $detail->json_params->price ?? null;
  $price_old = $detail->json_params->price_old ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
@endphp

@push('style')
  <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/favicon2c6f.png?1697597694844') }}" rel="icon" type="image/x-icon"  />
  <link rel="apple-touch-icon" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/favicon2c6f.png?1697597694844') }}">

  <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/product_style.scss2c6f.css?1697597694844') }}">

  <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/product_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />
  <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/product_style.scss2c6f.css?1697597694844') }}">
  <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/product_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />

  <style>
    .km-hot .box-promotion p {
        margin-bottom: 15px;
        line-height: 1.6;
    }
    .section_maybe_iwish .swap:after {
      display: none;
    }
  </style>
@endpush

@section('content')
  <div class="main-index">
      <section class="bread-crumb">
        <div class="container">
          <div class="row">
            <div class="col-12 a-left">
              <ul class="breadcrumb" >          
                <li class="home">
                  <a  href="{{ route('frontend.home') }}" ><span >Trang chủ</span></a>            
                  <span class="mr_lr">&nbsp;/&nbsp;</span>
                </li>
                <li>
                  <a  href="{{ $alias_category }}" ><span >{{ $taxonomy_title }}</span></a>
                  <span class="mr_lr">&nbsp;/&nbsp;</span>
                </li>
                <li><strong><span>{{ $title }}</span></strong><li>
              </ul>
            </div>
          </div>
        </div>
      </section> 

      <section class="product details-main" itemscope itemtype="https://schema.org/Product">  
        <div class="container">
          <div class="row ">
            <div class="col-lg-12 col-12">
              <div class="row">
                <div class="product-detail-left product-images col-12 col-md-12 col-lg-5">
                  <div class="product-image-detail">
                    <div class="swiper-container gallery-top margin-bottom-10">
                      <div class="swiper-wrapper" id="lightgallery">
                        <a class="swiper-slide" data-hash="0" href="{{ $image }}"  title="{{ $title }}">
                          <img src="{{ $image }}" alt="Samsung Galaxy Note 21" data-image="{{ $image }}" class="img-responsive mx-auto d-block swiper-lazy" />
                          <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                        </a>
                        @isset($detail->json_params->gallery_image)
                            @foreach ($detail->json_params->gallery_image as $key => $value)
                            <a class="swiper-slide" data-hash="1" href="{{ $value }}"  title="{{ $title }}">
                              <img src="{{ $value }}" class="img-responsive mx-auto d-block swiper-lazy" />
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                            </a>
                            @endforeach
                        @endisset
                      </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide" data-hash="0">
                          <img src="{{ $image }}"data-image="{{ $image }}" class="swiper-lazy" />
                          <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                        </div>
                        @isset($detail->json_params->gallery_image)
                            @foreach ($detail->json_params->gallery_image as $key => $value)
                            <div class="swiper-slide" data-hash="0">
                              <img src="{{ $value }}"data-image="{{ $value }}" class="swiper-lazy" />
                              <div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
                            </div>
                            @endforeach
                        @endisset
                      </div>
                      <div class="swiper-button-prev"><svg class="icon"> <use xlink:href="#previcon"></use> </svg></div>
                      <div class="swiper-button-next"><svg class="icon"> <use xlink:href="#nexticon"></use> </svg></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7 details-pro">
                  <h1 class="title-head">{{ $title }}</h1>
                  <div class="product-top clearfix">
                    <div class="sku-product clearfix">
                      <span>Thương hiệu: <strong>{{ $detail->taxonomy_title??"" }}</strong></span>
                    </div>
                  </div>
                  <div class="group-power">
                    <div class="inventory_quantity d-none">
                      <span class="a-stock a2">Còn hàng</span>
                    </div>
                    <div class="price-box clearfix">
                      
                      <span class="special-price">
                        <span class="price product-price">{!! isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' ₫' : __('Contact') !!}</span>
                      </span> <!-- Giá Khuyến mại -->
                      <span class="old-price">
                        Giá niêm yết:
                        <del class="price product-price-old">
                          {!! isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' ₫' : "" !!}
                        </del>
                      </span> <!-- Giás gốc -->
                      @if(isset($price_old) && $price_old > 0 && isset($price_old) && $price_old > 0 && $price<$price_old)
                      <span class="save-price">Tiết kiệm:
                        <span class="price product-price-save">{{  number_format(($price_old - $price), 0, ',', '.') . ' ₫' }}</span> so với giá thị trường
                      </span> <!-- Tiết kiệm -->
                      @endif
                    </div>
                  </div>
                  <div class="km-hot">
                    <div class="box-km">
                      <h2 class="title_km">
                        <span>Thông tin sản phẩm</span>
                      </h2>
                      <div class="box-promotion">
                        {!! $brief !!}
                      </div>
                    </div>
                  </div>
                  <form enctype="multipart/form-data" id="add-to-cart-form" data-cart-form  method="post" class="wishItem">
                    <div class="form-product">
                      <div class="box-variant clearfix  d-none ">
                      </div>
                      <div class="clearfix from-action-addcart ">
                        <div class="qty-ant clearfix custom-btn-number ">
                          <div class="custom custom-btn-numbers clearfix input_number_product">   
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty) & qty > 1 ) result.value--;return false;" class="btn-minus btn-cts" type="button">–</button>
                            <input aria-label="Số lượng" type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;" />
                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" class="btn-plus btn-cts" type="button">+</button>
                          </div>
                        </div>
                        <div class="btn-mua">
                                            
                          <button type="button" data-id="{{ $detail->id }}" data-quantity="1" class="btn btn-lg btn-gray btn-cart btn_buy add-to-cart">Thêm vào giỏ<span>Cam kết chính hãng / đổi trả 24h</span></button>
                          <button data-id="{{ $detail->id }}" data-quantity="1" type="button" class="btn btn-lg btn-gray btn_buy btn-buy-now add-to-cart-now">Mua ngay<span>Thanh toán nhanh chóng</span></button>
                        </div>
                      </div>
                      <div class="product-wish">
                        <div class="product-hotline">Gọi <a href="tel:{{ $web_information->information->phone ?? '' }}" title="{{ $web_information->information->phone ?? '' }}">{{ $web_information->information->phone ?? '' }}</a> để tư vấn mua hàng</div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-12 col-lg-12 product-spection">
                  <div class="row">
                    <div class="col-lg-12 col-12">
                      <div class="specifications margin-bottom-20">
                        <h2 class="fs-dttop">Thông tin sản phẩm</h2>
                        {!! $content !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if (isset($relatedPosts) && count($relatedPosts) > 0)
            <div class="col-12 col-lg-12">
            <section class="section_maybe_iwish">
              <div class="container">
                <div class="swap">
                  <h2 class="title-block upscape">
                    <a title="sản phẩm tương tự">Sản phẩm tương tự</a>
                  </h2>
                  <div class="slide-iwish">
                    <div class="swiper-container">
                      <div class="swiper-iwish">
                        <div class="swiper-wrapper">
                          
                          @if($relatedPosts)
                            @foreach ($relatedPosts as $item_sub)
                              @php
                              $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                              $price = $item_sub->json_params->price ?? null;
                              $price_old = $item_sub->json_params->price_old ?? null;
                              $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                              $image = $item_sub->image_thumb != '' ? $item_sub->image_thumb : ($item_sub->image != '' ? $item_sub->image : null);
                              $date = date('H:i d/m/Y', strtotime($item_sub->created_at));
                              // Viet ham xu ly lay slug
                              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item_sub->taxonomy_title, $item_sub->taxonomy_id);
                              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item_sub->id, 'detail', $item_sub->taxonomy_title);
                              @endphp
                              <div class="swiper-slide">
                                <div class=" item_product_main">
                                            <div class="product-thumbnail {{ ($price>0 && $price_old>0 && $price < $price_old)? "sale":"" }} " data-sale='Giảm {{ ($price>0 && $price_old>0 && $price < $price_old) ?round(100-($price/$price_old)*100):"" }} % '>
                                              <a class="image_thumb" href="{{ $alias }}" title="Samsung Galaxy Note 21">
                                                <picture>
                                                  <img  
                                                    width="240" height="240" src="{{ $image }}"  
                                                    alt="Samsung Galaxy Note 21" class="lazyload img-responsive center-block" />
                                                </picture>
                                              </a>
                                            </div>
                                            <div class="product-info">
                                              <h3 class="product-name"><a href="{{ $alias }}" title="{{ $title }}">{{ $title }}</a></h3>
                                              <div class="price-box">
                                                <span class="price">{!! isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' ₫' : __('Contact') !!}</span>
                                                @if(isset($price_old) && $price_old > 0)
                                                <span class="compare-price">{!! isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' ₫' : "" !!}</span>
                                                @endif
                                                <div class="action-cart">
                                                  <button data-id="{{ $item_sub->id }}" data-quantity="1" class="btn-buy btn-views add_to_cart add-to-cart" title="Mua ngay">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25">
                                                      <circle cx="7" cy="17" r="2"></circle>
                                                      <circle cx="15" cy="17" r="2"></circle>
                                                      <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
                                                           V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
                                                           C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"></path>
                                                    </svg>
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                              </div>
                            @endforeach 
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                  </div>
                </div>
              </div>
            </section>
            </div>
            @endif
          </div>
        </div>
      </section>
    </div>
    <br>
@endsection
@push('js_filter')
    <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/lightgallery2c6f.css?1697597694844') }}">
    <link rel="preload" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/lightgallery2c6f.js?1697597694844') }}" as="script">
    <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/lightgallery2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/lightgallery2c6f.js?1697597694844') }}" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
        $("#lightgallery").lightGallery({
          thumbnail: false
        }); 
      });
    </script>
    <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/bpr-products-module2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />
    <div class="sapo-product-reviews-module"></div>
    <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/animate.scss2c6f.css?1697597694844') }}">
    <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/animate.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />
    <script type='text/javascript'>
      var font = 'myCss';  
      if (!document.getElementById(font))
      {
        var headx  = document.getElementsByClassName('footer')[0];
        var font_link  = document.createElement('link');
        font_link.id   = font;
        font_link.rel  = 'stylesheet';
        font_link.type = 'text/css';
        font_link.href = '{{ asset('themes/frontend/watches/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}';
        font_link.media = 'all';
        headx.appendChild(font_link);
      }
    </script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
          spaceBetween: 10,
          slidesPerView: 5,
          freeMode: true,
          lazy: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          hashNavigation: false,
          navigation: {
            nextEl: '.gallery-thumbs .swiper-button-next',
            prevEl: '.gallery-thumbs .swiper-button-prev',
          },
          slideToClickedSlide: true,
          breakpoints: {
            300: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
            500: {
              slidesPerView: 4,
              spaceBetween: 10,
            },
            640: {
              slidesPerView: 5,
              spaceBetween: 10,
            },
            768: {
              slidesPerView: 6,
              spaceBetween: 10,
            },
            1024: {
              slidesPerView: 5,
              spaceBetween: 10,
            },
          }
        });
        var galleryTop = new Swiper('.gallery-top', {
          spaceBetween: 10,
          lazy: true,
          hashNavigation: false,
          thumbs: {
            swiper: galleryThumbs
          }
        });

        var galleryRelated = new Swiper('.swiper_related', {
          spaceBetween: 5,
          slidesPerView: 1,
          freeMode: true,
          lazy: true,
          watchSlidesVisibility: true,
          watchSlidesProgress: true,
          hashNavigation: true,
          slideToClickedSlide: false,
          slidesPerColumn: 5,
          slidesPerColumnFill: 'row',
          roundLengths: true,
          navigation: {
            nextEl: '.swiper_related .swiper-button-next',
            prevEl: '.swiper_related .swiper-button-prev',
          },
          breakpoints: {
            300: {
              slidesPerView: 1.2,
              spaceBetween: 7,
              slidesPerColumn: 1,
              allowTouchMove: true
            },
            500: {
              slidesPerView: 2,
              spaceBetween: 7,
              slidesPerColumn: 1,
              allowTouchMove: true
            },
            640: {
              slidesPerView: 2,
              spaceBetween: 7,
              slidesPerColumn: 1,
              allowTouchMove: true
            },
            768: {
              slidesPerView: 2.5,
              spaceBetween: 7,
              slidesPerColumn: 1,
              allowTouchMove: true
            },
            1024: {
              slidesPerView: 1,
              spaceBetween: 5,
              allowTouchMove: true
            }
          }
        });
      </script>
@endpush
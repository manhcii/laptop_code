@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp
@push('style')
  <style>

  </style>
@endpush
@section('content')
  <div class="main-index">
      <div class="section wrap_background">
        <section class="bread-crumb">
          <div class="container">
            <div class="row">
              <div class="col-12 a-left">
                <ul class="breadcrumb" >          
                  <li class="home">
                    <a  href="/" ><span >Trang chủ</span></a>            
                    <span class="mr_lr">&nbsp;/&nbsp;</span>
                  </li>
                  <li><strong ><span> {{ $page_title }}</span></strong></li>
                </ul>
              </div>
            </div>
          </div>
        </section>  
        <div class="container ">
          <div class="bg_collection section">
            <div class="row">
              <div class="main_container collection col-lg-12 col-md-12 col-sm-12">
                <div class="block-des">
                 
                  <div class="des">
                    <h1 class="collectiontitle">Tìm kiếm @if (isset($params['keyword']) && $params['keyword'] != ''){!! ': ' . $params['keyword'] !!}@endif</h1>
                  </div>
                </div>

                <div class="category-products products">
                  <section class="products-view products-view-grid collection_reponsive list_hover_pro">
                    <div class="row">
                      @foreach ($posts as $item)
                      @php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $price = $item->json_params->price ?? null;
                        $price_old = $item->json_params->price_old ?? null;
                        // $date = date('H:i d/m/Y', strtotime($item->created_at));
                        $date = date('d', strtotime($item->created_at));
                        $month = date('M', strtotime($item->created_at));
                        $year = date('Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                      @endphp
                      <div class="col-6 col-md-3 col-lg-3 product-col">
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
                                <button data-id="{{ $item->id }}" data-quantity="1" class="btn-buy btn-views add_to_cart add-to-cart" title="Mua ngay">
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
                    </div>
                    {{ $posts->withQueryString()->links('frontend.pagination.default') }}
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <br>
@endsection

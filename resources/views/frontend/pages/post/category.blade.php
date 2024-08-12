@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $page_brief = $taxonomy->json_params->brief->{$locale} ?? ($taxonomy->brief ?? null);
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
@endphp
@push('style')
<link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/blog_article_style.scss2c6f.css?1697597694844') }}">
<link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/blog_article_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />

<link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/sidebar_style.scss2c6f.css?1697597694844') }}">
<link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/sidebar_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />  
<style>
  .blog-grid img{
    max-height: 186px;
    min-width: 100%;
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
              <a  href="/" ><span >Trang chủ</span></a>           
              <span class="mr_lr">&nbsp;/&nbsp;</span>
            </li>
            <li><strong ><span>Tin tức</span></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </section> 
  <section class="blogpage clearfix">
    <div class="containers" itemscope itemtype="https://schema.org/Blog">
      <div class="section full_background_blog clearfix">
        <div class="container">
          <div class="row">
            @include('frontend.components.sidebar.post')
            <div class="right-content col-xl-9 col-lg-9 col-md-12 col-12 order-lg-last order-xl-last">
              <div class="title-block-page">
                <h1>Tin tức</h1>
              </div>
              <section class="list-blogs blog-main listmain_blog clearfix">
                <div class="row clearfix">
                  @foreach ($posts as $key => $item)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    // $date = date('H:i d/m/Y', strtotime($item->created_at));
                    $date = date('d', strtotime($item->created_at));
                    $month = date('M', strtotime($item->created_at));
                    $year = date('Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                  @endphp
                  <div class="col-xl-{{ $key < 2 ?6:4 }} col-md-6 col-12">
                    <div class="blog-grid clearfix">
                      <a class="thumb" href="{{ $alias }}" title="{{ $title }}">
                        <img src="{{ $image }}"  alt="{{ $title }}" class="lazyload img-responsive" />
                      </a>
                      <div class="content_blog clearfix">
                        <h3><a href="{{ $alias }}" title="{{ $title }}" class="a-title">{{ $title }}</a></h3>
                        <p>
                          {{ $brief }}
                        </p>
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
  </section>
</div>
@endsection
{{-- {{ $posts->withQueryString()->links('frontend.pagination.default') }} --}}

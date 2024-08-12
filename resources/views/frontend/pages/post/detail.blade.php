@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  $page_brief = $taxonomy->json_params->brief->{$locale} ?? ($taxonomy->brief ?? null);
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
@endphp

@push('style')
  <style>
    
  </style>

  <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/blog_article_style.scss2c6f.css?1697597694844') }}">
  <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/blog_article_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" />
  <link rel="preload" as='style' type="text/css" href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/sidebar_style.scss2c6f.css?1697597694844') }}">
  <link href="{{ asset('themes/frontend/watches/bizweb.dktcdn.net/100/429/689/themes/869367/assets/sidebar_style.scss2c6f.css?1697597694844') }}" rel="stylesheet" type="text/css" media="all" /> 
  
@endpush

@push('schema')
 

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
                
                <li >
                  <a  href="{{ $alias_category }}"><span >{{ $detail->taxonomy_title }}</span></a> 
                  <span class="mr_lr">&nbsp;/&nbsp;</span>
                </li>
                <li><strong><span >{{ $title }}</span></strong></li>
                
              </ul>
            </div>
          </div>
        </div>
      </section> 
      <section class="blogpage clearfix mb-3">
          <div class="container article-wraper">
            <div class="row">   
              <section class="right-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <article class="article-main clearfix">
                  <div class="row">
                    @include('frontend.components.sidebar.post')

                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 order-lg-last order-xl-last">
                      <div class="article-details clearfix">
                        <h1 class="article-title clearfix">{{ $title }}</h1>
                        <div class="time-post">
                          
                          <span class="icon posted">
                            <span class="text bold">{{ $detail->taxonomy_title }}</span> | <span class="text">{{ $date }}</span>
                          </span> 
                        </div>

                        <div class="article-content clearfix">
                          <div class="rte">
                            {!! $content !!}
                          </div>
                          
                        </div>
                      </div>

                    </div>
                  </div>        
                </article>
              </section>    
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection

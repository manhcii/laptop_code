@if ($block)
@php
  $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
  $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
  $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
@endphp
  <section class="section_category">
    <div class="container">
      <div class="cate-list">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            @isset($taxonomys)
                @foreach ($taxonomys as $item_sub)
                  @php
                    $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                    $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                    $image= $item_sub->json_params->image != '' ? $item_sub->json_params->image : null;
                    $alias_category = App\Helpers::generateRoute($item_sub->taxonomy, $item_sub->alias ?? $item_sub->title, $item_sub->id);
                  @endphp
                  @if ($item_sub->parent_id == 0 || $item_sub->parent_id == null)
                    <div class="swiper-slide">
                      <div class="cate-item">
                        <a class="image" href="{{ $alias_category }}" title="{{ $title }}">

                          <img class="image_cate_thumb" width="80" height="80" src="{{ $image }}"   alt="{{ $title }}"/>
                        </a>
                        <h4 class="title_cate_"><a href="{{ $alias_category }}" title="{{ $title }}">{{ $title }}</a></h4> 
                      </div>
                    </div>
                  @endif
                @endforeach
            @endisset  
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>
@endif  
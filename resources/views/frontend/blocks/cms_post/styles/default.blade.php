@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(4)
        ->get();
  @endphp
  <div class="container section_blog">
        <div class="swap">
          <h2 class="title-block upscape">
            <a href="{{ $url_link }}" title="Tin tức mới nhất">{{ $title }}</a>
          </h2>
          <div class="row blogs_mobile_base">
            @foreach ($rows as $item)
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
            <div class="col-lg-3 col-md-3 col-8">
              <div class="item_blog_base">
                <a class="thumb" href="{{ $alias }}" title="{{  $item->taxonomy_title }}">
                  
                  <img src="{{ $image }}" alt="{{  $item->taxonomy_title }}" class="lazyload img-responsive" />
                  
                  <span class="thead"> {{  $item->taxonomy_title }}</span>
                </a>
                <div class="content_blog clearfix">
                  <h3><a href="{{ $alias }}" title="{{ $title }}" class="a-title">{{ $title }}</a></h3>
                  <p>{{ $brief }}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endif
</div>
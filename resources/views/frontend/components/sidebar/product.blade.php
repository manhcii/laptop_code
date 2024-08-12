<aside class="dqdt-sidebar sidebar left-content col-lg-3 col-md-4 col-sm-4">
  <div class="wrap_background_aside asidecollection">
    <div class="filter-content aside-filter">
      
      <div class="filter-container">  
        <aside class="aside-item blog-sidebar sidebar-category collection-category margin-bottom-25">
          <h2 class="title-block"><span>Danh mục sản phẩm</span></h2>
          @php
            $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
            $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
            
            $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
          @endphp
          @isset($taxonomys)
          <div class="aside-content">
            <nav class="nav-category navbar-toggleable-md">
              <ul class="nav navbar-pills">
               @foreach ($taxonomys as $item)
                @if ($item->parent_id == 0 || $item->parent_id == null)
                  @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id);
                    
                    $url_current = url()->full();
                    $current = $alias_category == $url_current ? 'active' : '';
                  @endphp
                  <li class="nav-item">
                    <a href="{{ $alias_category }}" class="nav-link ">
                      {{ $title }}
                    </a>
                    @if($item->sub_taxonomy_id!=null)
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="fa-plus svg-inline--fa fa-caret-down fa-w-10"><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z" class=""></path></svg>
                    @endif
                    <ul class="dropdown-menu">
                      @foreach ($taxonomys as $sub)
                        @if ($sub->parent_id == $item->id)
                          @php
                            $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;

                            $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $sub->alias ?? $title_sub, $sub->id);
                            
                            $current = $alias_category_sub == $url_current ? 'active' : '';
                          @endphp
                          <li class="nav-item">
                            <a class="nav-link" href="{{ $alias_category_sub }}">{{ $title_sub }}
                            </a>
                          </li>
                            @foreach ($taxonomys as $subsub)
                              @if ($subsub->parent_id == $sub->id)
                                @php
                                  $title_sub = $subsub->json_params->title->{$locale} ?? $subsub->title;
      
                                  $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $subsub->alias ?? $title_sub, $subsub->id);
                                  
                                  $current = $alias_category_sub == $url_current ? 'active' : '';
                                @endphp
                                <li style="margin-left: 10px" class="nav-item">
                                  <a  class="nav-link" href="{{ $alias_category_sub }}">-- {{ $title_sub }}
                                  </a>
                                </li>
                              @endif
                            @endforeach
                        @endif
                      @endforeach
                    </ul>
                  </li>
                  @endif
                @endforeach
              </ul>
            </nav>
          </div>
          @endisset
        </aside>
        
        
        <!-- End Lọc Thương hiệu -->
        <!-- Lọc giá -->
        <form action=""method='get' >
          @csrf
        <aside class="aside-item filter-price f-left">
          <div class="aside-title">
            <h2 class="title-filter title-head margin-top-0"><span>Khoảng giá</span></h2>
          </div>
          <div class="aside-content margin-top-0 filter-group content_price">
            <ul>
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="1-000-000d" for="filter-duoi-1-000-000d">
                    <input @isset($params['range_price'])@if(in_array(1, $params['range_price'])) checked @endif @endisset name="range_price[]" type="checkbox" id="filter-duoi-1-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="Dưới 1.000.000đ" value="1" data-operator="OR">
                    <i class="fa"></i>
                    Dưới 1 triệu
                  </label>
                </span>
              </li>
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="2-000-000d" for="filter-1-000-000d-2-000-000d">
                    <input @isset($params['range_price'])@if(in_array(2, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-1-000-000d-2-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="1.000.000đ - 2.000.000đ" value="2" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 1 đến 2 triệu              
                  </label>
                </span>
              </li> 
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="4-000-000d" for="filter-2-000-000d-4-000-000d">
                    <input @isset($params['range_price'])@if(in_array(3, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-2-000-000d-4-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="2.000.000đ - 4.000.000đ" value="3" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 2 đến 4 triệu              
                  </label>
                </span>
              </li> 
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="6-000-000d" for="filter-4-000-000d-6-000-000d">
                    <input @isset($params['range_price'])@if(in_array(4, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-4-000-000d-6-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="4.000.000đ - 6.000.000đ" value="4" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 4 đến 6 triệu              
                  </label>
                </span>
              </li> 
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="8-000-000d" for="filter-6-000-000d-8-000-000d">
                    <input @isset($params['range_price'])@if(in_array(5, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-6-000-000d-8-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="6.000.000đ - 8.000.000đ" value="5" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 6 đến 8 triệu              
                  </label>
                </span>
              </li> 
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="10-000-000d" for="filter-8-000-000d-10-000-000d">
                    <input  @isset($params['range_price'])@if(in_array(6, $params['range_price'])) checked @endif @endisset name="range_price[]" type="checkbox" id="filter-8-000-000d-10-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="8.000.000đ - 10.000.000đ" value="6" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 8 đến 10 triệu             
                  </label>
                </span>
              </li> 
                                    
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="20-000-000d" for="filter-10-000-000d-20-000-000d">
                    <input  @isset($params['range_price'])@if(in_array(7, $params['range_price'])) checked @endif @endisset name="range_price[]" type="checkbox" id="filter-10-000-000d-20-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="10.000.000đ - 20.000.000đ" value="7" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 10 đến 20 triệu              
                  </label>
                </span>
              </li> 
              
              
              
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="40-000-000d" for="filter-20-000-000d-40-000-000d">
                    <input @isset($params['range_price'])@if(in_array(8, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-20-000-000d-40-000-000d"  data-group="Khoảng giá" data-field="price_min" data-text="20.000.000đ - 40.000.000đ" value="8" data-operator="OR">
                    <i class="fa"></i> 
                    Từ 20 đến 40 triệu              
                  </label>
                </span>
              </li> 
                                    
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="50-000-000d" for="filter-40-000-000d-50-000-000d">
                    <input @isset($params['range_price'])@if(in_array(9, $params['range_price'])) checked @endif @endisset  name="range_price[]" type="checkbox" id="filter-40-000-000d-50-000-000d" data-group="Khoảng giá" data-field="price_min" data-text="40.000.000đ - 50.000.000đ" value="9" data-operator="OR">
                    <i class="fa"></i>
                    Từ 40 đến 50 triệu              
                  </label>
                </span>
              </li> 
              <li class="filter-item filter-item--check-box filter-item--green">
                <span>
                  <label data-filter="50-000-000d" for="filter-tren50-000-000d">
                    <input  @isset($params['range_price'])@if(in_array(10, $params['range_price'])) checked @endif @endisset name="range_price[]"  type="checkbox" id="filter-tren50-000-000d" data-group="Khoảng giá" data-field="price_min" data-text="Trên 50.000.000đ" value="10" data-operator="OR">
                    <i class="fa"></i>
                    Trên 50 triệu
                  </label>
                </span>
              </li>
                           
            </ul>
          </div>
        </aside>
        <button class="btn btn-warning btn-sm text-dark">Tìm kiếm</button>
        <!-- End Lọc giá -->
        </form>
      </div>
    </div>
  </div>
</aside>
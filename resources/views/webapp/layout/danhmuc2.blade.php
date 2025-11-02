  <section class="category-section">
            <div class="category-container">
                @foreach($categories as $category)
                    @if($category->children->count() > 0)
                        <!-- Danh mục cha có con -->
                        <div class="category-item has-submenu">
                            <a href="{{route('detail', $category->id)}}">{{ $category->name }} ▾</a>
                            <ul class="submenu">
                                @foreach($category->children as $child)
                                    <li>
                                        <a href="{{route('detail', $child->id)}}">{{ $child->name }}</a>
                                        @if($child->children->count() > 0)
                                            <ul class="submenu">
                                                @foreach($child->children as $grandchild)
                                                    <li><a href="{{route('detail', $child->id)}}">{{ $grandchild->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <!-- Danh mục cha không có con -->
                        <div class="category-item">
                            <a href="{{route('detail', $category->id)}}">{{$category->name}}</a> 
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

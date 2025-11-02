 <div class="menu-3">
                        <a href="#">Danh mục</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                @if($category->children->count() > 0)
                                    <li class="has-submenu">
                                        <a href="{{route('detail', $category->id)}}">{{ $category->name }} ▸</a>
                                        <ul class="submenu">
                                            @foreach($category->children as $child)
                                                <li><a href="{{route('detail', $child->id)}}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('detail', $category->id)}}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
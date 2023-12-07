{{-- <div class="header-left">
    <div class="dropdown category-dropdown">
        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" data-display="static" title="Browse Categories">
            Danh mục sản phẩm <i class="icon-angle-down"></i>
        </a>

        <div class="dropdown-menu">
            <nav class="side-nav">
                <ul class="menu-vertical sf-arrows">
                    @foreach ($categorys as $category)
                        <li>
                            <a href="#">{{ $category->name }}</a>
                            <!-- Danh mục con-->
                            <ul class="submenu">
                                @foreach ($category->categoryChildrent as $categoryChildrent)
                                    <li>
                                        <a
                                            href="{{ route('category.product', ['slug' => $categoryChildrent->slug, 'id' => $categoryChildrent->id]) }}">
                                            {{ $categoryChildrent->name }}
                                        </a>
                                    </li>
                                    <!-- Thêm danh mục con khác nếu cần -->
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul><!-- End .menu-vertical -->
            </nav><!-- End .side-nav -->
        </div><!-- End .dropdown-menu -->
    </div><!-- End .category-dropdown -->
</div><!-- End .header-left --> --}}

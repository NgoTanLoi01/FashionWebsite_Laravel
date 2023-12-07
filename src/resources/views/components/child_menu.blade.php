@if ($categoryParent->categoryChildrent->count())
    <div class="megamenu megamenu-sm">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="menu-col">
                    <ul>
                        @foreach ($categoryParent->categoryChildrent as $categoryChild)
                            <li>
                                <a href="product.html">{{ $categoryChild->name }}</a>
                                @if ($categoryChild->categoryChildrent->count())
                                    @include('components.child_menu', ['categoryParent' => $categoryChild])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div><!-- End .menu-col -->
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .megamenu megamenu-sm -->
@endif

<nav class="category-nav white-nav  ">
    <div>
        <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse categories</a>
        <ul class="category-menu">
            @foreach ($headerCategories as $category)
                <li class="cat-item">
                    <a href="{{ url('/books/category/'.$category->slug) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
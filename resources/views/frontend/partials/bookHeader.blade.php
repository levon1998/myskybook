<div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-xs-1">
        <div class="product-view-mode">
            <a href="#" class="sorting-btn active" data-target="list "><i class="fas fa-list"></i></a>
        </div>
    </div>
    <div class="col-xs-5 col-md-5 col-sm-5 mt--10 mt-sm--0">
        <span class="toolbar-status">
            Showing 10 to {{ $books->currentPage() }} of {{ $books->lastPage() }}
        </span>
    </div>
    @php ($sort = app('request')->input('sort'))
    <div class="col-lg-6 col-md-6 col-sm-6 mt--10 mt-md--0 ">
        <form action="{{ route('books') }}" id="bookSorting">
            <div class="sorting-selection">
                <span>Sort By:</span>
                <select class="form-control nice-select sort-select mr-0" name="sort">
                    <option value="" selected="selected">Default Sorting</option>
                    <option value="a-z" {{ $sort == "a-z" ? 'selected' : '' }}>Sort
                        By:Name (A - Z)
                    </option>
                    <option value="z-a" {{ $sort == "z-a" ? 'selected' : '' }}>Sort
                        By:Name (Z - A)
                    </option>
                    <option value="high" {{ $sort == "high" ? 'selected' : '' }}>Sort
                        By:Rating (Highest)
                    </option>
                    <option value="low" {{ $sort == "low" ? 'selected' : '' }}>Sort
                        By:Rating (Lowest)
                    </option>
                </select>
            </div>
        </form>
    </div>
</div>
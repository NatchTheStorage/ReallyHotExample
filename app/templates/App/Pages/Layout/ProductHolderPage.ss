<div class="container">
    $Content

    <div class="product-search">
        $ProductSearchForm
    </div>


    <div class="product-holder">
        <% loop $Results %>
            <% include ProductCard %>
        <% end_loop %>
    </div>
</div>


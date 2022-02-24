<div class="productpage">
    <div class="crumbs">$Breadcrumbs</div>

    <h1 class="productpage_title mobile">$Title</h1>
    <div class="productpage_inner">
        <div class="productpage_inner-left">
            <% if $Image %>
                $Image.Fit(500,500)
            <% else %>
                <img class="placeholderimg" src="app/images/placeholder.jpeg" alt="placeholder">
            <% end_if %>
        </div>
        <div class="productpage_inner-right">
            <h1 class="productpage_title desktop">$Title</h1>
            <h2>{$Price}</h2>
            <div>$Content</div>
        </div>
    </div>
</div>

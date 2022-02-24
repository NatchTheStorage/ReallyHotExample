<div class="product">
    <a href="$Link">
        <% if $Image %>
            $Image.Fit(600,600)
        <% else %>
            <img class="placeholderimg" src="app/images/placeholder.jpeg" alt="placeholder">
        <% end_if %>

    </a>
    <h2>$Title</h2>
    <div>$Blurb</div>

</div>


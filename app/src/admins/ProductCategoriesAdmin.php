<?php

namespace App\Admins;

use App\Models\ProductCategory;
use SilverStripe\Admin\ModelAdmin;

class ProductCategoriesAdmin extends ModelAdmin
{
    private static $menu_title = "Product Category Admin";
    private static $url_segment = "product-admin";

    private static $managed_models = [
        ProductCategory::class
    ];
}
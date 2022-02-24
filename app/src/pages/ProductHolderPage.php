<?php

namespace App\Pages;

use App\Controllers\ProductHolderPageController;
use Page;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class ProductHolderPage extends Page
{
    private static $table_name = "ProductHolderPage";
    private static $singular_name = "Product Holder Page";
    private static $plural_name = "Product Holder Pages";
    private static $controller_name = ProductHolderPageController::class;

    private static $db = [
        'Content' => "HTMLText"
    ];

    private static $summary_fields = [
        'Title'
    ];

    private static $allowed_children = [
        ProductPage::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Content'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            HTMLEditorField::create('Content')
        ]);

        return $fields;
    }
}

<?php

namespace App\Pages;

use App\Models\ProductCategory;
use Page;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class ProductPage extends Page
{
    private static $table_name = "ProductPage";
    private static $singular_name = "Product Page";
    private static $plural_name = "Product Pages";

    private static $db = [
        "Title" => "Text",
        'Blurb' => 'Text',
        'Price' => 'Text',
        'Content' => 'HTMLText',
        "SortOrder" => "Int"
    ];

    private static $summary_fields = [
        'Title',
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $many_many = [
        "Categories" => ProductCategory::class
    ];

    private static $owns = [
        'Image',
        'Categories'
    ];

    private static $allowed_children = [
        ProductPage::class
    ];

    private static $default_sort = 'SortOrder ASC';


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Content'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
            TextField::create("Blurb"),
            TextField::create("Price"),
            HTMLEditorField::create('Content'),
            UploadField::create('Image'),
            CheckboxSetField::create('Categories', 'Categories', ProductCategory::get())
        ]);

        return $fields;
    }
}

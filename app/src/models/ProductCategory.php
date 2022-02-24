<?php

namespace App\Models;

use App\Pages\ProductPage;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

class ProductCategory extends DataObject
{
    private static $table_name = "ProductCategory";
    private static $singular_name = "Product Category";
    private static $plural_name = "Product Categories";

    private static $db = [
        "Title" => "Text",
        "Content" => "HTMLText"

    ];

    private static $summary_fields = [
        'Title',
    ];

    private static $belongs_many_many = [
        "Products" => ProductPage::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            "Content", "Products"
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create('Title'),
        ]);

        return $fields;
    }
}


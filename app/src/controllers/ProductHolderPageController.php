<?php

namespace App\Controllers;

use App\Models\ProductCategory;
use App\Pages\ProductPage;
use PageController;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;

class ProductHolderPageController extends PageController
{
    private static $allowed_actions = [
        'ProductSearchForm',
        'searchProduct'
    ];

    protected function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
    }

    public function index(HTTPRequest $request)
    {
        $products = ProductPage::get()->limit(12);

        if ($search = $request->getVar('Category')) {
            $products = $products->filter([
                'Categories.ID' => $search]
            );
        }

        return [
            'Results' => $products
        ];
    }


    public function ProductSearchForm() {
        $form = Form::create(
            $this,
            'ProductSearchForm',
            FieldList::create(
                DropdownField::create('Category')
                    ->setEmptyString('-- any --')
                    ->setSource(ProductCategory::get()->map("ID", 'Title'))
            ),
            FieldList::create(
                FormAction::create('searchProduct','Search')
            )
        );
        $form->setFormMethod('GET')
            ->setFormAction($this->Link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());

        return $form;
    }

    public function searchProduct($data) {
    }

    public function FilteredProducts($cat) {
        return ProductPage::get()->filter('ProductCategories', $cat);
    }
}
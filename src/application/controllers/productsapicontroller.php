<?php

class ProductsApiController extends ApiController
{
    function getSearchData()
    {
        $products = $this->Product->custom("SELECT `product_id`, `NAME` from `products`;");

        if ($products === false) {
            return array();
        }

        $result = array();
        foreach ($products as $product) {
            $result[] = array('id' => $product['Product']['product_id'], 'name' => $product['Product']['NAME']);
        }

        return $result;
    }
}

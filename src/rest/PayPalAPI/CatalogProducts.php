<?php

/*
 * This file is part of the pkg6/paypal
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * (L) Licensed <https://opensource.org/license/MIT>
 *
 * (A) zhiqiang <https://www.zhiqiang.wang>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace pkg6\paypal\rest\PayPalAPI;

trait CatalogProducts
{
    /**
     * Create a product.
     *
     * @param array $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_create
     */
    public function createProduct(array $data)
    {
        $this->apiEndPoint = 'v1/catalogs/products';

        $this->options['json'] = $data;

        $this->verb = 'post';

        return $this->doPayPalRequest();
    }

    /**
     * List products.
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_list
     */
    public function listProducts()
    {
        $this->apiEndPoint = "v1/catalogs/products?page={$this->currentPage}&page_size={$this->pageSize}&total_required={$this->showTotals}";

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }

    /**
     * Update a product.
     *
     * @param string $product_id
     * @param array  $data
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_patch
     */
    public function updateProduct(string $product_id, array $data)
    {
        $this->apiEndPoint = "v1/catalogs/products/{$product_id}";

        $this->options['json'] = $data;

        $this->verb = 'patch';

        return $this->doPayPalRequest(false);
    }

    /**
     * Get product details.
     *
     * @param string $product_id
     *
     * @throws \Throwable
     *
     * @return array|\Psr\Http\Message\StreamInterface|string
     *
     * @see https://developer.paypal.com/docs/api/catalog-products/v1/#products_get
     */
    public function showProductDetails(string $product_id)
    {
        $this->apiEndPoint = "v1/catalogs/products/{$product_id}";

        $this->verb = 'get';

        return $this->doPayPalRequest();
    }
}

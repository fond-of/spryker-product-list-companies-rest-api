<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client;

use FondOfSpryker\Client\ProductListCompany\ProductListCompanyClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCompaniesRestApiToProductListCompanyClientBridge implements ProductListCompaniesRestApiToProductListCompanyClientInterface
{
    /**
     * @var \FondOfSpryker\Client\ProductListCompany\ProductListCompanyClientInterface
     */
    protected $productListCompanyClient;

    /**
     * @param \FondOfSpryker\Client\ProductListCompany\ProductListCompanyClientInterface $productListCompanyClient
     */
    public function __construct(ProductListCompanyClientInterface $productListCompanyClient)
    {
        $this->productListCompanyClient = $productListCompanyClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer {
        return $this->productListCompanyClient->expandCustomerWithProductListIds($customerTransfer);
    }
}

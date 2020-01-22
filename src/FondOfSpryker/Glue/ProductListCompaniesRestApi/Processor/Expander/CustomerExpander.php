<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander;

use FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface
     */
    protected $productListCustomerClient;

    /**
     * @param \FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface $productListCustomerClient
     */
    public function __construct(
        ProductListCompaniesRestApiToProductListCompanyClientInterface $productListCustomerClient
    ) {
        $this->productListCustomerClient = $productListCustomerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->productListCustomerClient->expandCustomerWithProductListIds($customerTransfer);
    }
}

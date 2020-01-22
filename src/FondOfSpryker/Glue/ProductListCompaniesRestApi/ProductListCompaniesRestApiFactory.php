<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi;

use FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ProductListCompaniesRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getProductListCompanyClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface
     */
    protected function getProductListCompanyClient(): ProductListCompaniesRestApiToProductListCompanyClientInterface
    {
        return $this->getProvidedDependency(ProductListCompaniesRestApiDependencyProvider::CLIENT_PRODUCT_LIST_COMPANY);
    }
}

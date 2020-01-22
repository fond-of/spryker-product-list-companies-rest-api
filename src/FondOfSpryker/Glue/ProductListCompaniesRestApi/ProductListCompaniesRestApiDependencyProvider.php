<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi;

use FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class ProductListCompaniesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_PRODUCT_LIST_COMPANY = 'CLIENT_PRODUCT_LIST_COMPANY';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addProductListCompanyClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addProductListCompanyClient(Container $container): Container
    {
        $container[static::CLIENT_PRODUCT_LIST_COMPANY] = function (Container $container) {
            return new ProductListCompaniesRestApiToProductListCompanyClientBridge(
                $container->getLocator()->productListCompany()->client()
            );
        };

        return $container;
    }
}

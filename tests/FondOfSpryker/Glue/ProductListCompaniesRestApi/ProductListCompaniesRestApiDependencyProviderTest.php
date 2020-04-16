<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class ProductListCompaniesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiDependencyProvider
     */
    protected $productListCompaniesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompaniesRestApiDependencyProvider = new ProductListCompaniesRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->productListCompaniesRestApiDependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}

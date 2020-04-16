<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class ProductListCompaniesRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory
     */
    protected $productListCompaniesRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface
     */
    protected $productListCompaniesRestApiToProductListCompanyClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompaniesRestApiToProductListCompanyClientInterfaceMock = $this->getMockBuilder(ProductListCompaniesRestApiToProductListCompanyClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompaniesRestApiFactory = new ProductListCompaniesRestApiFactory();
        $this->productListCompaniesRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListCompaniesRestApiDependencyProvider::CLIENT_PRODUCT_LIST_COMPANY)
            ->willReturn($this->productListCompaniesRestApiToProductListCompanyClientInterfaceMock);

        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->productListCompaniesRestApiFactory->createCustomerExpander()
        );
    }
}

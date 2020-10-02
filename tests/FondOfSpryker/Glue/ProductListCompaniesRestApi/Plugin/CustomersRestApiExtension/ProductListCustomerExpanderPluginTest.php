<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Plugin\CustomersRestApiExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpanderInterface;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class ProductListCustomerExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\Plugin\CustomersRestApiExtension\ProductListCustomerExpanderPlugin
     */
    protected $productListCustomerExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory
     */
    protected $productListCompaniesRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCompaniesRestApiFactoryMock = $this->getMockBuilder(ProductListCompaniesRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerExpanderPlugin = new class (
            $this->productListCompaniesRestApiFactoryMock
        ) extends ProductListCustomerExpanderPlugin {
            /**
             * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory
             */
            protected $productListCompaniesRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory $productListCompaniesRestApiFactory
             */
            public function __construct(ProductListCompaniesRestApiFactory $productListCompaniesRestApiFactory)
            {
                $this->productListCompaniesRestApiFactory = $productListCompaniesRestApiFactory;
            }

            /**
             * @return \Spryker\Glue\Kernel\AbstractFactory
             */
            protected function getFactory(): AbstractFactory
            {
                return $this->productListCompaniesRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->productListCompaniesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->productListCustomerExpanderPlugin->expand(
                $this->customerTransferMock,
                $this->restRequestInterfaceMock
            )
        );
    }
}

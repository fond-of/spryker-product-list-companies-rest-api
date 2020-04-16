<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client;

use Codeception\Test\Unit;
use FondOfSpryker\Client\ProductListCompany\ProductListCompanyClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCompaniesRestApiToProductListCompanyClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientBridge
     */
    protected $productListCompaniesRestApiToProductListCompanyClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\ProductListCompany\ProductListCompanyClientInterface
     */
    protected $productListCompanyClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCompanyClientInterfaceMock = $this->getMockBuilder(ProductListCompanyClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCompaniesRestApiToProductListCompanyClientBridge = new ProductListCompaniesRestApiToProductListCompanyClientBridge(
            $this->productListCompanyClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerWithProductListIds(): void
    {
        $this->productListCompanyClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->productListCompaniesRestApiToProductListCompanyClientBridge->expandCustomerWithProductListIds(
                $this->customerTransferMock
            )
        );
    }
}

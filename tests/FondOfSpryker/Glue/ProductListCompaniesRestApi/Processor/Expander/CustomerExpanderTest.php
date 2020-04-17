<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\ProductListCompaniesRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client\ProductListCompaniesRestApiToProductListCompanyClientInterface
     */
    protected $productListCompaniesRestApiToProductListCompanyClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCompaniesRestApiToProductListCompanyClientInterfaceMock = $this->getMockBuilder(ProductListCompaniesRestApiToProductListCompanyClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander(
            $this->productListCompaniesRestApiToProductListCompanyClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->productListCompaniesRestApiToProductListCompanyClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expand(
                $this->customerTransferMock
            )
        );
    }
}

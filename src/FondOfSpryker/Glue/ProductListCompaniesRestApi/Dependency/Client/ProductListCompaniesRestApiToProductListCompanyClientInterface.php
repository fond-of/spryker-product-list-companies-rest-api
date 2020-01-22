<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Dependency\Client;

use Generated\Shared\Transfer\CustomerTransfer;

interface ProductListCompaniesRestApiToProductListCompanyClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(
        CustomerTransfer $customerTransfer
    ): CustomerTransfer;
}

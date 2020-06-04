<?php

namespace FondOfSpryker\Glue\ProductListCompaniesRestApi\Plugin\CustomersRestApiExtension;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\CustomersRestApiExtension\Dependency\Plugin\CustomerExpanderPluginInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Glue\ProductListCompaniesRestApi\ProductListCompaniesRestApiFactory getFactory()
 */
class ProductListCustomerExpanderPlugin extends AbstractPlugin implements CustomerExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer, RestRequestInterface $restRequest): CustomerTransfer
    {
        return $this->getFactory()->createCustomerExpander()->expand($customerTransfer);
    }
}

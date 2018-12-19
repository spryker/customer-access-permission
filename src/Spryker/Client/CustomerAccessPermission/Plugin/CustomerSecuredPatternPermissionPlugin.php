<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\CustomerAccessPermission\Plugin;

use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\PermissionExtension\Dependency\Plugin\CustomerSecuredPatternPermissionPluginInterface;
use Spryker\Shared\PermissionExtension\Dependency\Plugin\InfrastructuralPermissionPluginInterface;

/**
 * @method \Spryker\Client\CustomerAccessPermission\CustomerAccessPermissionFactory getFactory()
 * @method \Spryker\Client\CustomerAccessPermission\CustomerAccessPermissionConfig getConfig()
 */
class CustomerSecuredPatternPermissionPlugin extends AbstractPlugin implements InfrastructuralPermissionPluginInterface, CustomerSecuredPatternPermissionPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return bool
     */
    public function isApplicable(): bool
    {
        return !$this->getFactory()
            ->getCustomerClient()
            ->isLoggedIn();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $securedPattern
     *
     * @return string
     */
    public function execute(string $securedPattern): string
    {
        $unauthenticatedCustomerAccess = $this->getFactory()->getCustomerAccessStorageClient()->getUnauthenticatedCustomerAccess();

        return $this->getFactory()
           ->createCustomerAccess()
           ->applyCustomerAccessOnCustomerSecuredPattern($unauthenticatedCustomerAccess, $securedPattern);
    }
}

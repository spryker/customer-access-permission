<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\CustomerAccessPermission\CustomerAccess;

use Generated\Shared\Transfer\CustomerAccessTransfer;
use Generated\Shared\Transfer\PermissionCollectionTransfer;

interface CustomerAccessInterface
{
    public function getLoggedInCustomerPermissions(): PermissionCollectionTransfer;

    public function getLoggedOutCustomerPermissions(): PermissionCollectionTransfer;

    public function getCustomerSecuredPatternForUnauthenticatedCustomerAccess(): string;

    public function applyCustomerAccessOnCustomerSecuredPattern(
        CustomerAccessTransfer $customerAccessTransfer,
        string $customerSecuredPattern
    ): string;
}

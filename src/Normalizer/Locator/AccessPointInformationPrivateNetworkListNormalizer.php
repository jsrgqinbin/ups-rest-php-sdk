<?php

namespace ShipStream\Ups\Normalizer\Locator;

use ShipStream\Ups\Api\Normalizer\AccessPointInformationPrivateNetworkListNormalizer as BaseNormalizer;
use function array_is_list;
use function is_array;

class AccessPointInformationPrivateNetworkListNormalizer extends BaseNormalizer
{
    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if ($data === null || is_array($data) === false) {
            return parent::denormalize($data, $class, $format, $context);
        }

        // Force PrivateNetwork to always be an array even when the API returns a single value
        if (isset($data['PrivateNetwork']) && ! array_is_list($data['PrivateNetwork'])) {
            $data['PrivateNetwork'] = [$data['PrivateNetwork']];
        }
        return parent::denormalize($data, $class, $format, $context);
    }
}

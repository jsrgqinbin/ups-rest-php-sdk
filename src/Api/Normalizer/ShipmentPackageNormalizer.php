<?php

namespace ShipStream\Ups\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use ShipStream\Ups\Api\Runtime\Normalizer\CheckArray;
use ShipStream\Ups\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ShipmentPackageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'ShipStream\\Ups\\Api\\Model\\ShipmentPackage';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'ShipStream\\Ups\\Api\\Model\\ShipmentPackage';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ShipStream\Ups\Api\Model\ShipmentPackage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Description', $data)) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        }
        if (\array_key_exists('PalletDescription', $data)) {
            $object->setPalletDescription($data['PalletDescription']);
            unset($data['PalletDescription']);
        }
        if (\array_key_exists('NumOfPieces', $data)) {
            $object->setNumOfPieces($data['NumOfPieces']);
            unset($data['NumOfPieces']);
        }
        if (\array_key_exists('UnitPrice', $data)) {
            $object->setUnitPrice($data['UnitPrice']);
            unset($data['UnitPrice']);
        }
        if (\array_key_exists('PackagingType', $data)) {
            $object->setPackagingType($this->denormalizer->denormalize($data['PackagingType'], 'ShipStream\\Ups\\Api\\Model\\PackagePackaging', 'json', $context));
            unset($data['PackagingType']);
        }
        if (\array_key_exists('Dimensions', $data)) {
            $object->setDimensions($this->denormalizer->denormalize($data['Dimensions'], 'ShipStream\\Ups\\Api\\Model\\PackageDimensions', 'json', $context));
            unset($data['Dimensions']);
        }
        if (\array_key_exists('DimWeight', $data)) {
            $object->setDimWeight($this->denormalizer->denormalize($data['DimWeight'], 'ShipStream\\Ups\\Api\\Model\\PackageDimWeight', 'json', $context));
            unset($data['DimWeight']);
        }
        if (\array_key_exists('PackageWeight', $data)) {
            $object->setPackageWeight($this->denormalizer->denormalize($data['PackageWeight'], 'ShipStream\\Ups\\Api\\Model\\PackagePackageWeight', 'json', $context));
            unset($data['PackageWeight']);
        }
        if (\array_key_exists('LargePackageIndicator', $data)) {
            $object->setLargePackageIndicator($data['LargePackageIndicator']);
            unset($data['LargePackageIndicator']);
        }
        if (\array_key_exists('ReferenceNumber', $data)) {
            $values = array();
            foreach ($data['ReferenceNumber'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'ShipStream\\Ups\\Api\\Model\\PackageReferenceNumber', 'json', $context);
            }
            $object->setReferenceNumber($values);
            unset($data['ReferenceNumber']);
        }
        if (\array_key_exists('AdditionalHandlingIndicator', $data)) {
            $object->setAdditionalHandlingIndicator($data['AdditionalHandlingIndicator']);
            unset($data['AdditionalHandlingIndicator']);
        }
        if (\array_key_exists('SimpleRate', $data)) {
            $object->setSimpleRate($this->denormalizer->denormalize($data['SimpleRate'], 'ShipStream\\Ups\\Api\\Model\\PackageSimpleRate', 'json', $context));
            unset($data['SimpleRate']);
        }
        if (\array_key_exists('UPSPremier', $data)) {
            $object->setUPSPremier($this->denormalizer->denormalize($data['UPSPremier'], 'ShipStream\\Ups\\Api\\Model\\PackageUPSPremier', 'json', $context));
            unset($data['UPSPremier']);
        }
        if (\array_key_exists('PackageServiceOptions', $data)) {
            $object->setPackageServiceOptions($this->denormalizer->denormalize($data['PackageServiceOptions'], 'ShipStream\\Ups\\Api\\Model\\PackagePackageServiceOptions', 'json', $context));
            unset($data['PackageServiceOptions']);
        }
        if (\array_key_exists('Commodity', $data)) {
            $object->setCommodity($this->denormalizer->denormalize($data['Commodity'], 'ShipStream\\Ups\\Api\\Model\\PackageCommodity', 'json', $context));
            unset($data['Commodity']);
        }
        if (\array_key_exists('HazMatPackageInformation', $data)) {
            $object->setHazMatPackageInformation($this->denormalizer->denormalize($data['HazMatPackageInformation'], 'ShipStream\\Ups\\Api\\Model\\PackageHazMatPackageInformation', 'json', $context));
            unset($data['HazMatPackageInformation']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['Description'] = $object->getDescription();
        }
        if ($object->isInitialized('palletDescription') && null !== $object->getPalletDescription()) {
            $data['PalletDescription'] = $object->getPalletDescription();
        }
        if ($object->isInitialized('numOfPieces') && null !== $object->getNumOfPieces()) {
            $data['NumOfPieces'] = $object->getNumOfPieces();
        }
        if ($object->isInitialized('unitPrice') && null !== $object->getUnitPrice()) {
            $data['UnitPrice'] = $object->getUnitPrice();
        }
        $data['PackagingType'] = $this->normalizer->normalize($object->getPackagingType(), 'json', $context);
        if ($object->isInitialized('dimensions') && null !== $object->getDimensions()) {
            $data['Dimensions'] = $this->normalizer->normalize($object->getDimensions(), 'json', $context);
        }
        if ($object->isInitialized('dimWeight') && null !== $object->getDimWeight()) {
            $data['DimWeight'] = $this->normalizer->normalize($object->getDimWeight(), 'json', $context);
        }
        if ($object->isInitialized('packageWeight') && null !== $object->getPackageWeight()) {
            $data['PackageWeight'] = $this->normalizer->normalize($object->getPackageWeight(), 'json', $context);
        }
        if ($object->isInitialized('largePackageIndicator') && null !== $object->getLargePackageIndicator()) {
            $data['LargePackageIndicator'] = $object->getLargePackageIndicator();
        }
        if ($object->isInitialized('referenceNumber') && null !== $object->getReferenceNumber()) {
            $values = array();
            foreach ($object->getReferenceNumber() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['ReferenceNumber'] = $values;
        }
        if ($object->isInitialized('additionalHandlingIndicator') && null !== $object->getAdditionalHandlingIndicator()) {
            $data['AdditionalHandlingIndicator'] = $object->getAdditionalHandlingIndicator();
        }
        if ($object->isInitialized('simpleRate') && null !== $object->getSimpleRate()) {
            $data['SimpleRate'] = $this->normalizer->normalize($object->getSimpleRate(), 'json', $context);
        }
        if ($object->isInitialized('uPSPremier') && null !== $object->getUPSPremier()) {
            $data['UPSPremier'] = $this->normalizer->normalize($object->getUPSPremier(), 'json', $context);
        }
        if ($object->isInitialized('packageServiceOptions') && null !== $object->getPackageServiceOptions()) {
            $data['PackageServiceOptions'] = $this->normalizer->normalize($object->getPackageServiceOptions(), 'json', $context);
        }
        if ($object->isInitialized('commodity') && null !== $object->getCommodity()) {
            $data['Commodity'] = $this->normalizer->normalize($object->getCommodity(), 'json', $context);
        }
        if ($object->isInitialized('hazMatPackageInformation') && null !== $object->getHazMatPackageInformation()) {
            $data['HazMatPackageInformation'] = $this->normalizer->normalize($object->getHazMatPackageInformation(), 'json', $context);
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('ShipStream\\Ups\\Api\\Model\\ShipmentPackage' => false);
    }
}
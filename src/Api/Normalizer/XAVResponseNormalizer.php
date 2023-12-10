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
class XAVResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'ShipStream\\Ups\\Api\\Model\\XAVResponse';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'ShipStream\\Ups\\Api\\Model\\XAVResponse';
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
        $object = new \ShipStream\Ups\Api\Model\XAVResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Response', $data)) {
            $object->setResponse($this->denormalizer->denormalize($data['Response'], 'ShipStream\\Ups\\Api\\Model\\XAVResponseResponse', 'json', $context));
            unset($data['Response']);
        }
        if (\array_key_exists('ValidAddressIndicator', $data) && $data['ValidAddressIndicator'] !== null) {
            $object->setValidAddressIndicator($data['ValidAddressIndicator']);
            unset($data['ValidAddressIndicator']);
        }
        elseif (\array_key_exists('ValidAddressIndicator', $data) && $data['ValidAddressIndicator'] === null) {
            $object->setValidAddressIndicator(null);
        }
        if (\array_key_exists('AmbiguousAddressIndicator', $data) && $data['AmbiguousAddressIndicator'] !== null) {
            $object->setAmbiguousAddressIndicator($data['AmbiguousAddressIndicator']);
            unset($data['AmbiguousAddressIndicator']);
        }
        elseif (\array_key_exists('AmbiguousAddressIndicator', $data) && $data['AmbiguousAddressIndicator'] === null) {
            $object->setAmbiguousAddressIndicator(null);
        }
        if (\array_key_exists('NoCandidatesIndicator', $data) && $data['NoCandidatesIndicator'] !== null) {
            $object->setNoCandidatesIndicator($data['NoCandidatesIndicator']);
            unset($data['NoCandidatesIndicator']);
        }
        elseif (\array_key_exists('NoCandidatesIndicator', $data) && $data['NoCandidatesIndicator'] === null) {
            $object->setNoCandidatesIndicator(null);
        }
        if (\array_key_exists('AddressClassification', $data)) {
            $object->setAddressClassification($this->denormalizer->denormalize($data['AddressClassification'], 'ShipStream\\Ups\\Api\\Model\\XAVResponseAddressClassification', 'json', $context));
            unset($data['AddressClassification']);
        }
        if (\array_key_exists('Candidate', $data) && $data['Candidate'] !== null) {
            $object->setCandidate($this->denormalizer->denormalize($data['Candidate'], 'ShipStream\\Ups\\Api\\Model\\XAVResponseCandidate', 'json', $context));
            unset($data['Candidate']);
        }
        elseif (\array_key_exists('Candidate', $data) && $data['Candidate'] === null) {
            $object->setCandidate(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        $data['Response'] = $this->normalizer->normalize($object->getResponse(), 'json', $context);
        if ($object->isInitialized('validAddressIndicator') && null !== $object->getValidAddressIndicator()) {
            $data['ValidAddressIndicator'] = $object->getValidAddressIndicator();
        }
        if ($object->isInitialized('ambiguousAddressIndicator') && null !== $object->getAmbiguousAddressIndicator()) {
            $data['AmbiguousAddressIndicator'] = $object->getAmbiguousAddressIndicator();
        }
        if ($object->isInitialized('noCandidatesIndicator') && null !== $object->getNoCandidatesIndicator()) {
            $data['NoCandidatesIndicator'] = $object->getNoCandidatesIndicator();
        }
        if ($object->isInitialized('addressClassification') && null !== $object->getAddressClassification()) {
            $data['AddressClassification'] = $this->normalizer->normalize($object->getAddressClassification(), 'json', $context);
        }
        if ($object->isInitialized('candidate') && null !== $object->getCandidate()) {
            $data['Candidate'] = $this->normalizer->normalize($object->getCandidate(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('ShipStream\\Ups\\Api\\Model\\XAVResponse' => false);
    }
}
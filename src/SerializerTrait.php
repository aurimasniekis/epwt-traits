<?php

namespace EPWT\Traits;

/**
 * Trait SerializerTrait
 * @package EPWT\Traits
 * @author Aurimas Niekis <aurimas.niekis@gmail.com>
 */
trait SerializerTrait
{
    /**
     * @var bool
     */
    protected $igBinarySupported;

    /**
     * @param mixed $data Data to serialize
     * @param bool $useIgBinary Use igBinary extension if supported
     *
     * @return string
     */
    protected function phpSerialize($data, $useIgBinary = true)
    {
        if ($this->isIgBinarySupported() && $useIgBinary) {
            return igbinary_serialize($data);
        }

        return serialize($data);
    }

    /**
     * @param mixed $data Data to unserialize
     * @param bool|true $useIgBinary Use igBinary extension if supported
     *
     * @return string
     */
    protected function phpUnserialize($data, $useIgBinary = true)
    {
        if ($this->isIgBinarySupported() && $useIgBinary) {
            return igbinary_unserialize($data);
        }

        return unserialize($data);
    }

    /**
     * @return bool Is igBinary Supported
     */
    protected function isIgBinarySupported()
    {
        if (null !== $this->igBinarySupported) {
            return $this->igBinarySupported;
        }

        $this->igBinarySupported = extension_loaded('igbinbary');

        return $this->igBinarySupported;
    }
}

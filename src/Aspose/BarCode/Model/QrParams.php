<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use ArrayAccess;
use Aspose\BarCode\ObjectSerializer;

/**
 * QrParams
 *
 * @description Optional QR barcode generation parameters. Applies to QR, GS1QR, MicroQR, and RectMicroQR barcode types.
 */
class QrParams implements ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $swaggerModelName = "QrParams";

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $swaggerTypes = [
        'qr_encode_mode' => '\Aspose\BarCode\Model\QREncodeMode',
        'qr_error_level' => '\Aspose\BarCode\Model\QRErrorLevel',
        'qr_version' => '\Aspose\BarCode\Model\QRVersion',
        'qr_eci_encoding' => '\Aspose\BarCode\Model\ECIEncodings',
        'qr_aspect_ratio' => 'float',
        'micro_qr_version' => '\Aspose\BarCode\Model\MicroQRVersion',
        'rect_micro_qr_version' => '\Aspose\BarCode\Model\RectMicroQRVersion'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var (string|null)[]
     */
    protected static array $swaggerFormats = [
        'qr_encode_mode' => null,
        'qr_error_level' => null,
        'qr_version' => null,
        'qr_eci_encoding' => null,
        'qr_aspect_ratio' => 'float',
        'micro_qr_version' => null,
        'rect_micro_qr_version' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'qr_encode_mode' => 'qrEncodeMode',
        'qr_error_level' => 'qrErrorLevel',
        'qr_version' => 'qrVersion',
        'qr_eci_encoding' => 'qrECIEncoding',
        'qr_aspect_ratio' => 'qrAspectRatio',
        'micro_qr_version' => 'microQRVersion',
        'rect_micro_qr_version' => 'rectMicroQrVersion'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'qr_encode_mode' => 'setQrEncodeMode',
        'qr_error_level' => 'setQrErrorLevel',
        'qr_version' => 'setQrVersion',
        'qr_eci_encoding' => 'setQrEciEncoding',
        'qr_aspect_ratio' => 'setQrAspectRatio',
        'micro_qr_version' => 'setMicroQrVersion',
        'rect_micro_qr_version' => 'setRectMicroQrVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'qr_encode_mode' => 'getQrEncodeMode',
        'qr_error_level' => 'getQrErrorLevel',
        'qr_version' => 'getQrVersion',
        'qr_eci_encoding' => 'getQrEciEncoding',
        'qr_aspect_ratio' => 'getQrAspectRatio',
        'micro_qr_version' => 'getMicroQrVersion',
        'rect_micro_qr_version' => 'getRectMicroQrVersion'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }





    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->container['qr_encode_mode'] = isset($data['qr_encode_mode']) ? $data['qr_encode_mode'] : null;
        $this->container['qr_error_level'] = isset($data['qr_error_level']) ? $data['qr_error_level'] : null;
        $this->container['qr_version'] = isset($data['qr_version']) ? $data['qr_version'] : null;
        $this->container['qr_eci_encoding'] = isset($data['qr_eci_encoding']) ? $data['qr_eci_encoding'] : null;
        $this->container['qr_aspect_ratio'] = isset($data['qr_aspect_ratio']) ? $data['qr_aspect_ratio'] : null;
        $this->container['micro_qr_version'] = isset($data['micro_qr_version']) ? $data['micro_qr_version'] : null;
        $this->container['rect_micro_qr_version'] = isset($data['rect_micro_qr_version']) ? $data['rect_micro_qr_version'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['qr_aspect_ratio']) && ($this->container['qr_aspect_ratio'] > 1)) {
            $invalidProperties[] = "invalid value for 'qr_aspect_ratio', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['qr_aspect_ratio']) && ($this->container['qr_aspect_ratio'] < 0.001)) {
            $invalidProperties[] = "invalid value for 'qr_aspect_ratio', must be bigger than or equal to 0.001.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        if ($this->container['qr_aspect_ratio'] > 1) {
            return false;
        }
        if ($this->container['qr_aspect_ratio'] < 0.001) {
            return false;
        }
        return true;
    }


    /**
     * Gets qr_encode_mode
     *
     * @return \Aspose\BarCode\Model\QREncodeMode
     */
    public function getQrEncodeMode()
    {
        return $this->container['qr_encode_mode'];
    }

    /**
     * Sets qr_encode_mode
     *
     * @param \Aspose\BarCode\Model\QREncodeMode $qr_encode_mode QR barcode encode mode.
     *
     * @return $this
     */
    public function setQrEncodeMode($qr_encode_mode)
    {
        $this->container['qr_encode_mode'] = $qr_encode_mode;

        return $this;
    }

    /**
     * Gets qr_error_level
     *
     * @return \Aspose\BarCode\Model\QRErrorLevel
     */
    public function getQrErrorLevel()
    {
        return $this->container['qr_error_level'];
    }

    /**
     * Sets qr_error_level
     *
     * @param \Aspose\BarCode\Model\QRErrorLevel $qr_error_level QR barcode error correction level.
     *
     * @return $this
     */
    public function setQrErrorLevel($qr_error_level)
    {
        $this->container['qr_error_level'] = $qr_error_level;

        return $this;
    }

    /**
     * Gets qr_version
     *
     * @return \Aspose\BarCode\Model\QRVersion
     */
    public function getQrVersion()
    {
        return $this->container['qr_version'];
    }

    /**
     * Sets qr_version
     *
     * @param \Aspose\BarCode\Model\QRVersion $qr_version QR barcode version. Automatically selects the smallest version that fits the data.
     *
     * @return $this
     */
    public function setQrVersion($qr_version)
    {
        $this->container['qr_version'] = $qr_version;

        return $this;
    }

    /**
     * Gets qr_eci_encoding
     *
     * @return \Aspose\BarCode\Model\ECIEncodings
     */
    public function getQrEciEncoding()
    {
        return $this->container['qr_eci_encoding'];
    }

    /**
     * Sets qr_eci_encoding
     *
     * @param \Aspose\BarCode\Model\ECIEncodings $qr_eci_encoding ECI encoding for QR barcode data.
     *
     * @return $this
     */
    public function setQrEciEncoding($qr_eci_encoding)
    {
        $this->container['qr_eci_encoding'] = $qr_eci_encoding;

        return $this;
    }

    /**
     * Gets qr_aspect_ratio
     *
     * @return float
     */
    public function getQrAspectRatio()
    {
        return $this->container['qr_aspect_ratio'];
    }

    /**
     * Sets qr_aspect_ratio
     *
     * @param float $qr_aspect_ratio QR barcode aspect ratio. Values: 0 to 1.
     *
     * @return $this
     */
    public function setQrAspectRatio($qr_aspect_ratio)
    {

        if (!is_null($qr_aspect_ratio) && ($qr_aspect_ratio > 1)) {
            throw new \InvalidArgumentException('invalid value for $qr_aspect_ratio when calling QrParams., must be smaller than or equal to 1.');
        }
        if (!is_null($qr_aspect_ratio) && ($qr_aspect_ratio < 0.001)) {
            throw new \InvalidArgumentException('invalid value for $qr_aspect_ratio when calling QrParams., must be bigger than or equal to 0.001.');
        }

        $this->container['qr_aspect_ratio'] = $qr_aspect_ratio;

        return $this;
    }

    /**
     * Gets micro_qr_version
     *
     * @return \Aspose\BarCode\Model\MicroQRVersion
     */
    public function getMicroQrVersion()
    {
        return $this->container['micro_qr_version'];
    }

    /**
     * Sets micro_qr_version
     *
     * @param \Aspose\BarCode\Model\MicroQRVersion $micro_qr_version MicroQR barcode version. Used when BarcodeType is MicroQR.
     *
     * @return $this
     */
    public function setMicroQrVersion($micro_qr_version)
    {
        $this->container['micro_qr_version'] = $micro_qr_version;

        return $this;
    }

    /**
     * Gets rect_micro_qr_version
     *
     * @return \Aspose\BarCode\Model\RectMicroQRVersion
     */
    public function getRectMicroQrVersion()
    {
        return $this->container['rect_micro_qr_version'];
    }

    /**
     * Sets rect_micro_qr_version
     *
     * @param \Aspose\BarCode\Model\RectMicroQRVersion $rect_micro_qr_version RectMicroQR barcode version. Used when BarcodeType is RectMicroQR.
     *
     * @return $this
     */
    public function setRectMicroQrVersion($rect_micro_qr_version)
    {
        $this->container['rect_micro_qr_version'] = $rect_micro_qr_version;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param string $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param string $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param string $offset Offset
     * @param mixed  $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param string $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

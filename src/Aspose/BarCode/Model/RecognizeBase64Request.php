<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use ArrayAccess;
use Aspose\BarCode\ObjectSerializer;

/**
 * RecognizeBase64Request
 *
 * @description Barcode recognition request.
 */
class RecognizeBase64Request implements ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $swaggerModelName = "RecognizeBase64Request";

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $swaggerTypes = [
        'barcode_types' => '\Aspose\BarCode\Model\DecodeBarcodeType[]',
        'file_base64' => 'string',
        'recognition_mode' => '\Aspose\BarCode\Model\RecognitionMode',
        'recognition_image_kind' => '\Aspose\BarCode\Model\RecognitionImageKind'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var (string|null)[]
     */
    protected static array $swaggerFormats = [
        'barcode_types' => null,
        'file_base64' => null,
        'recognition_mode' => null,
        'recognition_image_kind' => null
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
        'barcode_types' => 'barcodeTypes',
        'file_base64' => 'fileBase64',
        'recognition_mode' => 'recognitionMode',
        'recognition_image_kind' => 'recognitionImageKind'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'barcode_types' => 'setBarcodeTypes',
        'file_base64' => 'setFileBase64',
        'recognition_mode' => 'setRecognitionMode',
        'recognition_image_kind' => 'setRecognitionImageKind'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'barcode_types' => 'getBarcodeTypes',
        'file_base64' => 'getFileBase64',
        'recognition_mode' => 'getRecognitionMode',
        'recognition_image_kind' => 'getRecognitionImageKind'
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
        $this->container['barcode_types'] = isset($data['barcode_types']) ? $data['barcode_types'] : null;
        $this->container['file_base64'] = isset($data['file_base64']) ? $data['file_base64'] : null;
        $this->container['recognition_mode'] = isset($data['recognition_mode']) ? $data['recognition_mode'] : null;
        $this->container['recognition_image_kind'] = isset($data['recognition_image_kind']) ? $data['recognition_image_kind'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['barcode_types'] === null) {
            $invalidProperties[] = "'barcode_types' can't be null";
        }
        if ($this->container['file_base64'] === null) {
            $invalidProperties[] = "'file_base64' can't be null";
        }
        if ((strlen($this->container['file_base64']) > 28730982)) {
            $invalidProperties[] = "invalid value for 'file_base64', the character length must be smaller than or equal to 28730982.";
        }

        if ((strlen($this->container['file_base64']) < 1)) {
            $invalidProperties[] = "invalid value for 'file_base64', the character length must be bigger than or equal to 1.";
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
        if ($this->container['barcode_types'] === null) {
            return false;
        }
        if ($this->container['file_base64'] === null) {
            return false;
        }
        if (strlen($this->container['file_base64']) > 28730982) {
            return false;
        }
        if (strlen($this->container['file_base64']) < 1) {
            return false;
        }
        return true;
    }


    /**
     * Gets barcode_types
     *
     * @return \Aspose\BarCode\Model\DecodeBarcodeType[]
     */
    public function getBarcodeTypes()
    {
        return $this->container['barcode_types'];
    }

    /**
     * Sets barcode_types
     *
     * @param \Aspose\BarCode\Model\DecodeBarcodeType[] $barcode_types Array of barcode decode types to find.
     *
     * @return $this
     */
    public function setBarcodeTypes($barcode_types)
    {
        $this->container['barcode_types'] = $barcode_types;

        return $this;
    }

    /**
     * Gets file_base64
     *
     * @return string
     */
    public function getFileBase64()
    {
        return $this->container['file_base64'];
    }

    /**
     * Sets file_base64
     *
     * @param string $file_base64 Barcode image bytes encoded as base-64.
     *
     * @return $this
     */
    public function setFileBase64($file_base64)
    {
        if ((strlen($file_base64) > 28730982)) {
            throw new \InvalidArgumentException('invalid length for $file_base64 when calling RecognizeBase64Request., must be smaller than or equal to 28730982.');
        }
        if ((strlen($file_base64) < 1)) {
            throw new \InvalidArgumentException('invalid length for $file_base64 when calling RecognizeBase64Request., must be bigger than or equal to 1.');
        }

        $this->container['file_base64'] = $file_base64;

        return $this;
    }

    /**
     * Gets recognition_mode
     *
     * @return \Aspose\BarCode\Model\RecognitionMode
     */
    public function getRecognitionMode()
    {
        return $this->container['recognition_mode'];
    }

    /**
     * Sets recognition_mode
     *
     * @param \Aspose\BarCode\Model\RecognitionMode $recognition_mode recognition_mode
     *
     * @return $this
     */
    public function setRecognitionMode($recognition_mode)
    {
        $this->container['recognition_mode'] = $recognition_mode;

        return $this;
    }

    /**
     * Gets recognition_image_kind
     *
     * @return \Aspose\BarCode\Model\RecognitionImageKind
     */
    public function getRecognitionImageKind()
    {
        return $this->container['recognition_image_kind'];
    }

    /**
     * Sets recognition_image_kind
     *
     * @param \Aspose\BarCode\Model\RecognitionImageKind $recognition_image_kind recognition_image_kind
     *
     * @return $this
     */
    public function setRecognitionImageKind($recognition_image_kind)
    {
        $this->container['recognition_image_kind'] = $recognition_image_kind;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
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
     * @param integer $offset Offset
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
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
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
     * @param integer $offset Offset
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

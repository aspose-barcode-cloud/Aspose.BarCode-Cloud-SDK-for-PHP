<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use ArrayAccess;
use Aspose\BarCode\ObjectSerializer;

/**
 * BatchGenerateItem
 *
 * @description One barcode to generate in a batch.
 */
class BatchGenerateItem implements ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $swaggerModelName = "BatchGenerateItem";

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $swaggerTypes = [
        'file_name' => 'string',
        'generation' => '\Aspose\BarCode\Model\GenerateParams'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var (string|null)[]
     */
    protected static array $swaggerFormats = [
        'file_name' => null,
        'generation' => null
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
        'file_name' => 'fileName',
        'generation' => 'generation'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'file_name' => 'setFileName',
        'generation' => 'setGeneration'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'file_name' => 'getFileName',
        'generation' => 'getGeneration'
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
        $this->container['file_name'] = isset($data['file_name']) ? $data['file_name'] : null;
        $this->container['generation'] = isset($data['generation']) ? $data['generation'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['file_name']) && (strlen($this->container['file_name']) > 255)) {
            $invalidProperties[] = "invalid value for 'file_name', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['file_name']) && (strlen($this->container['file_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'file_name', the character length must be bigger than or equal to 0.";
        }

        if ($this->container['generation'] === null) {
            $invalidProperties[] = "'generation' can't be null";
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
        if (strlen($this->container['file_name']) > 255) {
            return false;
        }
        if (strlen($this->container['file_name']) < 0) {
            return false;
        }
        if ($this->container['generation'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets file_name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->container['file_name'];
    }

    /**
     * Sets file_name
     *
     * @param string $file_name Optional file name inside the archive. When omitted or blank, a sequential name is generated. Supplied safe names are preserved; the image format is independent of the file extension.
     *
     * @return $this
     */
    public function setFileName($file_name)
    {
        if (!is_null($file_name) && (strlen($file_name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $file_name when calling BatchGenerateItem., must be smaller than or equal to 255.');
        }
        if (!is_null($file_name) && (strlen($file_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $file_name when calling BatchGenerateItem., must be bigger than or equal to 0.');
        }

        $this->container['file_name'] = $file_name;

        return $this;
    }

    /**
     * Gets generation
     *
     * @return \Aspose\BarCode\Model\GenerateParams
     */
    public function getGeneration()
    {
        return $this->container['generation'];
    }

    /**
     * Sets generation
     *
     * @param \Aspose\BarCode\Model\GenerateParams $generation Barcode generation parameters.
     *
     * @return $this
     */
    public function setGeneration($generation)
    {
        $this->container['generation'] = $generation;

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

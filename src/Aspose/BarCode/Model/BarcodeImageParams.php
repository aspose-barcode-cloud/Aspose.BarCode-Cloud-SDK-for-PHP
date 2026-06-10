<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use ArrayAccess;
use Aspose\BarCode\ObjectSerializer;

/**
 * BarcodeImageParams
 *
 * @description Optional barcode image parameters.
 */
class BarcodeImageParams implements ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $swaggerModelName = "BarcodeImageParams";

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $swaggerTypes = [
        'image_format' => '\Aspose\BarCode\Model\BarcodeImageFormat',
        'text_location' => '\Aspose\BarCode\Model\CodeLocation',
        'foreground_color' => 'string',
        'background_color' => 'string',
        'units' => '\Aspose\BarCode\Model\GraphicsUnit',
        'resolution' => 'float',
        'image_height' => 'float',
        'image_width' => 'float',
        'rotation_angle' => 'int'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var (string|null)[]
     */
    protected static array $swaggerFormats = [
        'image_format' => null,
        'text_location' => null,
        'foreground_color' => null,
        'background_color' => null,
        'units' => null,
        'resolution' => 'float',
        'image_height' => 'float',
        'image_width' => 'float',
        'rotation_angle' => 'int32'
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
        'image_format' => 'imageFormat',
        'text_location' => 'textLocation',
        'foreground_color' => 'foregroundColor',
        'background_color' => 'backgroundColor',
        'units' => 'units',
        'resolution' => 'resolution',
        'image_height' => 'imageHeight',
        'image_width' => 'imageWidth',
        'rotation_angle' => 'rotationAngle'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'image_format' => 'setImageFormat',
        'text_location' => 'setTextLocation',
        'foreground_color' => 'setForegroundColor',
        'background_color' => 'setBackgroundColor',
        'units' => 'setUnits',
        'resolution' => 'setResolution',
        'image_height' => 'setImageHeight',
        'image_width' => 'setImageWidth',
        'rotation_angle' => 'setRotationAngle'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'image_format' => 'getImageFormat',
        'text_location' => 'getTextLocation',
        'foreground_color' => 'getForegroundColor',
        'background_color' => 'getBackgroundColor',
        'units' => 'getUnits',
        'resolution' => 'getResolution',
        'image_height' => 'getImageHeight',
        'image_width' => 'getImageWidth',
        'rotation_angle' => 'getRotationAngle'
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
        $this->container['image_format'] = isset($data['image_format']) ? $data['image_format'] : null;
        $this->container['text_location'] = isset($data['text_location']) ? $data['text_location'] : null;
        $this->container['foreground_color'] = isset($data['foreground_color']) ? $data['foreground_color'] : 'Black';
        $this->container['background_color'] = isset($data['background_color']) ? $data['background_color'] : 'White';
        $this->container['units'] = isset($data['units']) ? $data['units'] : null;
        $this->container['resolution'] = isset($data['resolution']) ? $data['resolution'] : null;
        $this->container['image_height'] = isset($data['image_height']) ? $data['image_height'] : null;
        $this->container['image_width'] = isset($data['image_width']) ? $data['image_width'] : null;
        $this->container['rotation_angle'] = isset($data['rotation_angle']) ? $data['rotation_angle'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['resolution']) && ($this->container['resolution'] > 100000)) {
            $invalidProperties[] = "invalid value for 'resolution', must be smaller than or equal to 100000.";
        }

        if (!is_null($this->container['resolution']) && ($this->container['resolution'] < 1)) {
            $invalidProperties[] = "invalid value for 'resolution', must be bigger than or equal to 1.";
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
        if ($this->container['resolution'] > 100000) {
            return false;
        }
        if ($this->container['resolution'] < 1) {
            return false;
        }
        return true;
    }


    /**
     * Gets image_format
     *
     * @return \Aspose\BarCode\Model\BarcodeImageFormat
     */
    public function getImageFormat()
    {
        return $this->container['image_format'];
    }

    /**
     * Sets image_format
     *
     * @param \Aspose\BarCode\Model\BarcodeImageFormat $image_format image_format
     *
     * @return $this
     */
    public function setImageFormat($image_format)
    {
        $this->container['image_format'] = $image_format;

        return $this;
    }

    /**
     * Gets text_location
     *
     * @return \Aspose\BarCode\Model\CodeLocation
     */
    public function getTextLocation()
    {
        return $this->container['text_location'];
    }

    /**
     * Sets text_location
     *
     * @param \Aspose\BarCode\Model\CodeLocation $text_location text_location
     *
     * @return $this
     */
    public function setTextLocation($text_location)
    {
        $this->container['text_location'] = $text_location;

        return $this;
    }

    /**
     * Gets foreground_color
     *
     * @return string
     */
    public function getForegroundColor()
    {
        return $this->container['foreground_color'];
    }

    /**
     * Sets foreground_color
     *
     * @param string $foreground_color Specify the display color for bars and content. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: Black.
     *
     * @return $this
     */
    public function setForegroundColor($foreground_color)
    {
        $this->container['foreground_color'] = $foreground_color;

        return $this;
    }

    /**
     * Gets background_color
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->container['background_color'];
    }

    /**
     * Sets background_color
     *
     * @param string $background_color Background color of the barcode image. Value: Color name from https://reference.aspose.com/drawing/net/system.drawing/color/ or ARGB value starting with #. For example: AliceBlue or #FF000000. Default value: White.
     *
     * @return $this
     */
    public function setBackgroundColor($background_color)
    {
        $this->container['background_color'] = $background_color;

        return $this;
    }

    /**
     * Gets units
     *
     * @return \Aspose\BarCode\Model\GraphicsUnit
     */
    public function getUnits()
    {
        return $this->container['units'];
    }

    /**
     * Sets units
     *
     * @param \Aspose\BarCode\Model\GraphicsUnit $units units
     *
     * @return $this
     */
    public function setUnits($units)
    {
        $this->container['units'] = $units;

        return $this;
    }

    /**
     * Gets resolution
     *
     * @return float
     */
    public function getResolution()
    {
        return $this->container['resolution'];
    }

    /**
     * Sets resolution
     *
     * @param float $resolution Resolution of the barcode image. One value for both dimensions. Default value: 96 dpi. Decimal separator is a dot.
     *
     * @return $this
     */
    public function setResolution($resolution)
    {

        if (!is_null($resolution) && ($resolution > 100000)) {
            throw new \InvalidArgumentException('invalid value for $resolution when calling BarcodeImageParams., must be smaller than or equal to 100000.');
        }
        if (!is_null($resolution) && ($resolution < 1)) {
            throw new \InvalidArgumentException('invalid value for $resolution when calling BarcodeImageParams., must be bigger than or equal to 1.');
        }

        $this->container['resolution'] = $resolution;

        return $this;
    }

    /**
     * Gets image_height
     *
     * @return float
     */
    public function getImageHeight()
    {
        return $this->container['image_height'];
    }

    /**
     * Sets image_height
     *
     * @param float $image_height Height of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     *
     * @return $this
     */
    public function setImageHeight($image_height)
    {
        $this->container['image_height'] = $image_height;

        return $this;
    }

    /**
     * Gets image_width
     *
     * @return float
     */
    public function getImageWidth()
    {
        return $this->container['image_width'];
    }

    /**
     * Sets image_width
     *
     * @param float $image_width Width of the barcode image in the specified units. Default units: pixels. Decimal separator is a dot.
     *
     * @return $this
     */
    public function setImageWidth($image_width)
    {
        $this->container['image_width'] = $image_width;

        return $this;
    }

    /**
     * Gets rotation_angle
     *
     * @return int
     */
    public function getRotationAngle()
    {
        return $this->container['rotation_angle'];
    }

    /**
     * Sets rotation_angle
     *
     * @param int $rotation_angle Barcode image rotation angle, measured in degrees. For example, RotationAngle = 0 or RotationAngle = 360 means no rotation. If RotationAngle is not equal to 90, 180, 270, or 0, it may increase the difficulty for the scanner to read the image. Default value: 0.
     *
     * @return $this
     */
    public function setRotationAngle($rotation_angle)
    {
        $this->container['rotation_angle'] = $rotation_angle;

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

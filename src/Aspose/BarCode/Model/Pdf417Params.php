<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use ArrayAccess;
use Aspose\BarCode\ObjectSerializer;

/**
 * Pdf417Params
 *
 * @description Optional PDF417 barcode generation parameters. Applies to Pdf417, MacroPdf417, MicroPdf417, and GS1MicroPdf417 barcode types.
 */
class Pdf417Params implements ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $swaggerModelName = "Pdf417Params";

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $swaggerTypes = [
        'pdf417_encode_mode' => '\Aspose\BarCode\Model\Pdf417EncodeMode',
        'pdf417_error_level' => '\Aspose\BarCode\Model\Pdf417ErrorLevel',
        'pdf417_truncate' => 'bool',
        'pdf417_columns' => 'int',
        'pdf417_rows' => 'int',
        'pdf417_aspect_ratio' => 'float',
        'pdf417_eci_encoding' => '\Aspose\BarCode\Model\ECIEncodings',
        'pdf417_is_reader_initialization' => 'bool',
        'pdf417_macro_characters' => '\Aspose\BarCode\Model\MacroCharacter',
        'pdf417_is_linked' => 'bool',
        'pdf417_is_code128_emulation' => 'bool'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var (string|null)[]
     */
    protected static array $swaggerFormats = [
        'pdf417_encode_mode' => null,
        'pdf417_error_level' => null,
        'pdf417_truncate' => null,
        'pdf417_columns' => 'int32',
        'pdf417_rows' => 'int32',
        'pdf417_aspect_ratio' => 'float',
        'pdf417_eci_encoding' => null,
        'pdf417_is_reader_initialization' => null,
        'pdf417_macro_characters' => null,
        'pdf417_is_linked' => null,
        'pdf417_is_code128_emulation' => null
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
        'pdf417_encode_mode' => 'pdf417EncodeMode',
        'pdf417_error_level' => 'pdf417ErrorLevel',
        'pdf417_truncate' => 'pdf417Truncate',
        'pdf417_columns' => 'pdf417Columns',
        'pdf417_rows' => 'pdf417Rows',
        'pdf417_aspect_ratio' => 'pdf417AspectRatio',
        'pdf417_eci_encoding' => 'pdf417ECIEncoding',
        'pdf417_is_reader_initialization' => 'pdf417IsReaderInitialization',
        'pdf417_macro_characters' => 'pdf417MacroCharacters',
        'pdf417_is_linked' => 'pdf417IsLinked',
        'pdf417_is_code128_emulation' => 'pdf417IsCode128Emulation'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'pdf417_encode_mode' => 'setPdf417EncodeMode',
        'pdf417_error_level' => 'setPdf417ErrorLevel',
        'pdf417_truncate' => 'setPdf417Truncate',
        'pdf417_columns' => 'setPdf417Columns',
        'pdf417_rows' => 'setPdf417Rows',
        'pdf417_aspect_ratio' => 'setPdf417AspectRatio',
        'pdf417_eci_encoding' => 'setPdf417EciEncoding',
        'pdf417_is_reader_initialization' => 'setPdf417IsReaderInitialization',
        'pdf417_macro_characters' => 'setPdf417MacroCharacters',
        'pdf417_is_linked' => 'setPdf417IsLinked',
        'pdf417_is_code128_emulation' => 'setPdf417IsCode128Emulation'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'pdf417_encode_mode' => 'getPdf417EncodeMode',
        'pdf417_error_level' => 'getPdf417ErrorLevel',
        'pdf417_truncate' => 'getPdf417Truncate',
        'pdf417_columns' => 'getPdf417Columns',
        'pdf417_rows' => 'getPdf417Rows',
        'pdf417_aspect_ratio' => 'getPdf417AspectRatio',
        'pdf417_eci_encoding' => 'getPdf417EciEncoding',
        'pdf417_is_reader_initialization' => 'getPdf417IsReaderInitialization',
        'pdf417_macro_characters' => 'getPdf417MacroCharacters',
        'pdf417_is_linked' => 'getPdf417IsLinked',
        'pdf417_is_code128_emulation' => 'getPdf417IsCode128Emulation'
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
        $this->container['pdf417_encode_mode'] = isset($data['pdf417_encode_mode']) ? $data['pdf417_encode_mode'] : null;
        $this->container['pdf417_error_level'] = isset($data['pdf417_error_level']) ? $data['pdf417_error_level'] : null;
        $this->container['pdf417_truncate'] = isset($data['pdf417_truncate']) ? $data['pdf417_truncate'] : null;
        $this->container['pdf417_columns'] = isset($data['pdf417_columns']) ? $data['pdf417_columns'] : null;
        $this->container['pdf417_rows'] = isset($data['pdf417_rows']) ? $data['pdf417_rows'] : null;
        $this->container['pdf417_aspect_ratio'] = isset($data['pdf417_aspect_ratio']) ? $data['pdf417_aspect_ratio'] : null;
        $this->container['pdf417_eci_encoding'] = isset($data['pdf417_eci_encoding']) ? $data['pdf417_eci_encoding'] : null;
        $this->container['pdf417_is_reader_initialization'] = isset($data['pdf417_is_reader_initialization']) ? $data['pdf417_is_reader_initialization'] : null;
        $this->container['pdf417_macro_characters'] = isset($data['pdf417_macro_characters']) ? $data['pdf417_macro_characters'] : null;
        $this->container['pdf417_is_linked'] = isset($data['pdf417_is_linked']) ? $data['pdf417_is_linked'] : null;
        $this->container['pdf417_is_code128_emulation'] = isset($data['pdf417_is_code128_emulation']) ? $data['pdf417_is_code128_emulation'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['pdf417_columns']) && ($this->container['pdf417_columns'] > 30)) {
            $invalidProperties[] = "invalid value for 'pdf417_columns', must be smaller than or equal to 30.";
        }

        if (!is_null($this->container['pdf417_columns']) && ($this->container['pdf417_columns'] < 0)) {
            $invalidProperties[] = "invalid value for 'pdf417_columns', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['pdf417_rows']) && ($this->container['pdf417_rows'] > 90)) {
            $invalidProperties[] = "invalid value for 'pdf417_rows', must be smaller than or equal to 90.";
        }

        if (!is_null($this->container['pdf417_rows']) && ($this->container['pdf417_rows'] < 0)) {
            $invalidProperties[] = "invalid value for 'pdf417_rows', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['pdf417_aspect_ratio']) && ($this->container['pdf417_aspect_ratio'] > 10)) {
            $invalidProperties[] = "invalid value for 'pdf417_aspect_ratio', must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['pdf417_aspect_ratio']) && ($this->container['pdf417_aspect_ratio'] < 2)) {
            $invalidProperties[] = "invalid value for 'pdf417_aspect_ratio', must be bigger than or equal to 2.";
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
        if ($this->container['pdf417_columns'] > 30) {
            return false;
        }
        if ($this->container['pdf417_columns'] < 0) {
            return false;
        }
        if ($this->container['pdf417_rows'] > 90) {
            return false;
        }
        if ($this->container['pdf417_rows'] < 0) {
            return false;
        }
        if ($this->container['pdf417_aspect_ratio'] > 10) {
            return false;
        }
        if ($this->container['pdf417_aspect_ratio'] < 2) {
            return false;
        }
        return true;
    }


    /**
     * Gets pdf417_encode_mode
     *
     * @return \Aspose\BarCode\Model\Pdf417EncodeMode
     */
    public function getPdf417EncodeMode()
    {
        return $this->container['pdf417_encode_mode'];
    }

    /**
     * Sets pdf417_encode_mode
     *
     * @param \Aspose\BarCode\Model\Pdf417EncodeMode $pdf417_encode_mode pdf417_encode_mode
     *
     * @return $this
     */
    public function setPdf417EncodeMode($pdf417_encode_mode)
    {
        $this->container['pdf417_encode_mode'] = $pdf417_encode_mode;

        return $this;
    }

    /**
     * Gets pdf417_error_level
     *
     * @return \Aspose\BarCode\Model\Pdf417ErrorLevel
     */
    public function getPdf417ErrorLevel()
    {
        return $this->container['pdf417_error_level'];
    }

    /**
     * Sets pdf417_error_level
     *
     * @param \Aspose\BarCode\Model\Pdf417ErrorLevel $pdf417_error_level pdf417_error_level
     *
     * @return $this
     */
    public function setPdf417ErrorLevel($pdf417_error_level)
    {
        $this->container['pdf417_error_level'] = $pdf417_error_level;

        return $this;
    }

    /**
     * Gets pdf417_truncate
     *
     * @return bool
     */
    public function getPdf417Truncate()
    {
        return $this->container['pdf417_truncate'];
    }

    /**
     * Sets pdf417_truncate
     *
     * @param bool $pdf417_truncate Whether to use truncated PDF417 format (removes right-side stop pattern).
     *
     * @return $this
     */
    public function setPdf417Truncate($pdf417_truncate)
    {
        $this->container['pdf417_truncate'] = $pdf417_truncate;

        return $this;
    }

    /**
     * Gets pdf417_columns
     *
     * @return int
     */
    public function getPdf417Columns()
    {
        return $this->container['pdf417_columns'];
    }

    /**
     * Sets pdf417_columns
     *
     * @param int $pdf417_columns Number of columns in the PDF417 barcode. Values between 1 and 30. 0 for auto.
     *
     * @return $this
     */
    public function setPdf417Columns($pdf417_columns)
    {

        if (!is_null($pdf417_columns) && ($pdf417_columns > 30)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_columns when calling Pdf417Params., must be smaller than or equal to 30.');
        }
        if (!is_null($pdf417_columns) && ($pdf417_columns < 0)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_columns when calling Pdf417Params., must be bigger than or equal to 0.');
        }

        $this->container['pdf417_columns'] = $pdf417_columns;

        return $this;
    }

    /**
     * Gets pdf417_rows
     *
     * @return int
     */
    public function getPdf417Rows()
    {
        return $this->container['pdf417_rows'];
    }

    /**
     * Sets pdf417_rows
     *
     * @param int $pdf417_rows Number of rows in the PDF417 barcode. Values between 3 and 90. 0 for automatic.
     *
     * @return $this
     */
    public function setPdf417Rows($pdf417_rows)
    {

        if (!is_null($pdf417_rows) && ($pdf417_rows > 90)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_rows when calling Pdf417Params., must be smaller than or equal to 90.');
        }
        if (!is_null($pdf417_rows) && ($pdf417_rows < 0)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_rows when calling Pdf417Params., must be bigger than or equal to 0.');
        }

        $this->container['pdf417_rows'] = $pdf417_rows;

        return $this;
    }

    /**
     * Gets pdf417_aspect_ratio
     *
     * @return float
     */
    public function getPdf417AspectRatio()
    {
        return $this->container['pdf417_aspect_ratio'];
    }

    /**
     * Sets pdf417_aspect_ratio
     *
     * @param float $pdf417_aspect_ratio PDF417 barcode aspect ratio (height/width of the barcode module). Values are defined by the standard: 2 to 5 for MicroPdf417; 3 to 5 for Pdf417 and MacroPdf417.
     *
     * @return $this
     */
    public function setPdf417AspectRatio($pdf417_aspect_ratio)
    {

        if (!is_null($pdf417_aspect_ratio) && ($pdf417_aspect_ratio > 10)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_aspect_ratio when calling Pdf417Params., must be smaller than or equal to 10.');
        }
        if (!is_null($pdf417_aspect_ratio) && ($pdf417_aspect_ratio < 2)) {
            throw new \InvalidArgumentException('invalid value for $pdf417_aspect_ratio when calling Pdf417Params., must be bigger than or equal to 2.');
        }

        $this->container['pdf417_aspect_ratio'] = $pdf417_aspect_ratio;

        return $this;
    }

    /**
     * Gets pdf417_eci_encoding
     *
     * @return \Aspose\BarCode\Model\ECIEncodings
     */
    public function getPdf417EciEncoding()
    {
        return $this->container['pdf417_eci_encoding'];
    }

    /**
     * Sets pdf417_eci_encoding
     *
     * @param \Aspose\BarCode\Model\ECIEncodings $pdf417_eci_encoding pdf417_eci_encoding
     *
     * @return $this
     */
    public function setPdf417EciEncoding($pdf417_eci_encoding)
    {
        $this->container['pdf417_eci_encoding'] = $pdf417_eci_encoding;

        return $this;
    }

    /**
     * Gets pdf417_is_reader_initialization
     *
     * @return bool
     */
    public function getPdf417IsReaderInitialization()
    {
        return $this->container['pdf417_is_reader_initialization'];
    }

    /**
     * Sets pdf417_is_reader_initialization
     *
     * @param bool $pdf417_is_reader_initialization Whether the barcode is used for reader initialization (programming).
     *
     * @return $this
     */
    public function setPdf417IsReaderInitialization($pdf417_is_reader_initialization)
    {
        $this->container['pdf417_is_reader_initialization'] = $pdf417_is_reader_initialization;

        return $this;
    }

    /**
     * Gets pdf417_macro_characters
     *
     * @return \Aspose\BarCode\Model\MacroCharacter
     */
    public function getPdf417MacroCharacters()
    {
        return $this->container['pdf417_macro_characters'];
    }

    /**
     * Sets pdf417_macro_characters
     *
     * @param \Aspose\BarCode\Model\MacroCharacter $pdf417_macro_characters pdf417_macro_characters
     *
     * @return $this
     */
    public function setPdf417MacroCharacters($pdf417_macro_characters)
    {
        $this->container['pdf417_macro_characters'] = $pdf417_macro_characters;

        return $this;
    }

    /**
     * Gets pdf417_is_linked
     *
     * @return bool
     */
    public function getPdf417IsLinked()
    {
        return $this->container['pdf417_is_linked'];
    }

    /**
     * Sets pdf417_is_linked
     *
     * @param bool $pdf417_is_linked Whether to use linked mode (for MicroPdf417).
     *
     * @return $this
     */
    public function setPdf417IsLinked($pdf417_is_linked)
    {
        $this->container['pdf417_is_linked'] = $pdf417_is_linked;

        return $this;
    }

    /**
     * Gets pdf417_is_code128_emulation
     *
     * @return bool
     */
    public function getPdf417IsCode128Emulation()
    {
        return $this->container['pdf417_is_code128_emulation'];
    }

    /**
     * Sets pdf417_is_code128_emulation
     *
     * @param bool $pdf417_is_code128_emulation Whether to use Code128 emulation for MicroPdf417.
     *
     * @return $this
     */
    public function setPdf417IsCode128Emulation($pdf417_is_code128_emulation)
    {
        $this->container['pdf417_is_code128_emulation'] = $pdf417_is_code128_emulation;

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

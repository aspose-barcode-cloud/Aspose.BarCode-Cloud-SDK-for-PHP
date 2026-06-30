<?php

declare(strict_types=1);

namespace Aspose\BarCode\Model;

use Aspose\BarCode\ObjectSerializer;

/**
 * DecodeBarcodeType
 *
 * @description See https://reference.aspose.com/barcode/net/aspose.barcode.barcoderecognition/decodetype/
 */
class DecodeBarcodeType
{
    /// <summary>
    /// Enum value MostCommonlyUsed
    /// </summary>
    public const MostCommonlyUsed =  "MostCommonlyUsed";
    public const MOST_COMMONLY_USED = "MostCommonlyUsed";

    /// <summary>
    /// Enum value QR
    /// </summary>
    public const QR =  "QR";

    /// <summary>
    /// Enum value AustraliaPost
    /// </summary>
    public const AustraliaPost =  "AustraliaPost";
    public const AUSTRALIA_POST = "AustraliaPost";

    /// <summary>
    /// Enum value AustralianPosteParcel
    /// </summary>
    public const AustralianPosteParcel =  "AustralianPosteParcel";
    public const AUSTRALIAN_POSTE_PARCEL = "AustralianPosteParcel";

    /// <summary>
    /// Enum value Aztec
    /// </summary>
    public const Aztec =  "Aztec";
    public const AZTEC = "Aztec";

    /// <summary>
    /// Enum value Codabar
    /// </summary>
    public const Codabar =  "Codabar";
    public const CODABAR = "Codabar";

    /// <summary>
    /// Enum value CodablockF
    /// </summary>
    public const CodablockF =  "CodablockF";
    public const CODABLOCK_F = "CodablockF";

    /// <summary>
    /// Enum value Code11
    /// </summary>
    public const Code11 =  "Code11";
    public const CODE11 = "Code11";

    /// <summary>
    /// Enum value Code128
    /// </summary>
    public const Code128 =  "Code128";
    public const CODE128 = "Code128";

    /// <summary>
    /// Enum value Code16K
    /// </summary>
    public const Code16K =  "Code16K";
    public const CODE16_K = "Code16K";

    /// <summary>
    /// Enum value Code32
    /// </summary>
    public const Code32 =  "Code32";
    public const CODE32 = "Code32";

    /// <summary>
    /// Enum value Code39
    /// </summary>
    public const Code39 =  "Code39";
    public const CODE39 = "Code39";

    /// <summary>
    /// Enum value Code39FullASCII
    /// </summary>
    public const Code39FullASCII =  "Code39FullASCII";
    public const CODE39_FULL_ASCII = "Code39FullASCII";

    /// <summary>
    /// Enum value Code93
    /// </summary>
    public const Code93 =  "Code93";
    public const CODE93 = "Code93";

    /// <summary>
    /// Enum value CompactPdf417
    /// </summary>
    public const CompactPdf417 =  "CompactPdf417";
    public const COMPACT_PDF417 = "CompactPdf417";

    /// <summary>
    /// Enum value DataLogic2of5
    /// </summary>
    public const DataLogic2of5 =  "DataLogic2of5";
    public const DATA_LOGIC2OF5 = "DataLogic2of5";

    /// <summary>
    /// Enum value DataMatrix
    /// </summary>
    public const DataMatrix =  "DataMatrix";
    public const DATA_MATRIX = "DataMatrix";

    /// <summary>
    /// Enum value DatabarExpanded
    /// </summary>
    public const DatabarExpanded =  "DatabarExpanded";
    public const DATABAR_EXPANDED = "DatabarExpanded";

    /// <summary>
    /// Enum value DatabarExpandedStacked
    /// </summary>
    public const DatabarExpandedStacked =  "DatabarExpandedStacked";
    public const DATABAR_EXPANDED_STACKED = "DatabarExpandedStacked";

    /// <summary>
    /// Enum value DatabarLimited
    /// </summary>
    public const DatabarLimited =  "DatabarLimited";
    public const DATABAR_LIMITED = "DatabarLimited";

    /// <summary>
    /// Enum value DatabarOmniDirectional
    /// </summary>
    public const DatabarOmniDirectional =  "DatabarOmniDirectional";
    public const DATABAR_OMNI_DIRECTIONAL = "DatabarOmniDirectional";

    /// <summary>
    /// Enum value DatabarStacked
    /// </summary>
    public const DatabarStacked =  "DatabarStacked";
    public const DATABAR_STACKED = "DatabarStacked";

    /// <summary>
    /// Enum value DatabarStackedOmniDirectional
    /// </summary>
    public const DatabarStackedOmniDirectional =  "DatabarStackedOmniDirectional";
    public const DATABAR_STACKED_OMNI_DIRECTIONAL = "DatabarStackedOmniDirectional";

    /// <summary>
    /// Enum value DatabarTruncated
    /// </summary>
    public const DatabarTruncated =  "DatabarTruncated";
    public const DATABAR_TRUNCATED = "DatabarTruncated";

    /// <summary>
    /// Enum value DeutschePostIdentcode
    /// </summary>
    public const DeutschePostIdentcode =  "DeutschePostIdentcode";
    public const DEUTSCHE_POST_IDENTCODE = "DeutschePostIdentcode";

    /// <summary>
    /// Enum value DeutschePostLeitcode
    /// </summary>
    public const DeutschePostLeitcode =  "DeutschePostLeitcode";
    public const DEUTSCHE_POST_LEITCODE = "DeutschePostLeitcode";

    /// <summary>
    /// Enum value DotCode
    /// </summary>
    public const DotCode =  "DotCode";
    public const DOT_CODE = "DotCode";

    /// <summary>
    /// Enum value DutchKIX
    /// </summary>
    public const DutchKIX =  "DutchKIX";
    public const DUTCH_KIX = "DutchKIX";

    /// <summary>
    /// Enum value EAN13
    /// </summary>
    public const EAN13 =  "EAN13";

    /// <summary>
    /// Enum value EAN14
    /// </summary>
    public const EAN14 =  "EAN14";

    /// <summary>
    /// Enum value EAN8
    /// </summary>
    public const EAN8 =  "EAN8";

    /// <summary>
    /// Enum value GS1Aztec
    /// </summary>
    public const GS1Aztec =  "GS1Aztec";
    public const GS1_AZTEC = "GS1Aztec";

    /// <summary>
    /// Enum value GS1Code128
    /// </summary>
    public const GS1Code128 =  "GS1Code128";
    public const GS1_CODE128 = "GS1Code128";

    /// <summary>
    /// Enum value GS1CompositeBar
    /// </summary>
    public const GS1CompositeBar =  "GS1CompositeBar";
    public const GS1_COMPOSITE_BAR = "GS1CompositeBar";

    /// <summary>
    /// Enum value GS1DataMatrix
    /// </summary>
    public const GS1DataMatrix =  "GS1DataMatrix";
    public const GS1_DATA_MATRIX = "GS1DataMatrix";

    /// <summary>
    /// Enum value GS1DotCode
    /// </summary>
    public const GS1DotCode =  "GS1DotCode";
    public const GS1_DOT_CODE = "GS1DotCode";

    /// <summary>
    /// Enum value GS1HanXin
    /// </summary>
    public const GS1HanXin =  "GS1HanXin";
    public const GS1_HAN_XIN = "GS1HanXin";

    /// <summary>
    /// Enum value GS1MicroPdf417
    /// </summary>
    public const GS1MicroPdf417 =  "GS1MicroPdf417";
    public const GS1_MICRO_PDF417 = "GS1MicroPdf417";

    /// <summary>
    /// Enum value GS1QR
    /// </summary>
    public const GS1QR =  "GS1QR";
    public const GS1_QR = "GS1QR";

    /// <summary>
    /// Enum value HanXin
    /// </summary>
    public const HanXin =  "HanXin";
    public const HAN_XIN = "HanXin";

    /// <summary>
    /// Enum value HIBCAztecLIC
    /// </summary>
    public const HIBCAztecLIC =  "HIBCAztecLIC";
    public const HIBC_AZTEC_LIC = "HIBCAztecLIC";

    /// <summary>
    /// Enum value HIBCAztecPAS
    /// </summary>
    public const HIBCAztecPAS =  "HIBCAztecPAS";
    public const HIBC_AZTEC_PAS = "HIBCAztecPAS";

    /// <summary>
    /// Enum value HIBCCode128LIC
    /// </summary>
    public const HIBCCode128LIC =  "HIBCCode128LIC";
    public const HIBC_CODE128_LIC = "HIBCCode128LIC";

    /// <summary>
    /// Enum value HIBCCode128PAS
    /// </summary>
    public const HIBCCode128PAS =  "HIBCCode128PAS";
    public const HIBC_CODE128_PAS = "HIBCCode128PAS";

    /// <summary>
    /// Enum value HIBCCode39LIC
    /// </summary>
    public const HIBCCode39LIC =  "HIBCCode39LIC";
    public const HIBC_CODE39_LIC = "HIBCCode39LIC";

    /// <summary>
    /// Enum value HIBCCode39PAS
    /// </summary>
    public const HIBCCode39PAS =  "HIBCCode39PAS";
    public const HIBC_CODE39_PAS = "HIBCCode39PAS";

    /// <summary>
    /// Enum value HIBCDataMatrixLIC
    /// </summary>
    public const HIBCDataMatrixLIC =  "HIBCDataMatrixLIC";
    public const HIBC_DATA_MATRIX_LIC = "HIBCDataMatrixLIC";

    /// <summary>
    /// Enum value HIBCDataMatrixPAS
    /// </summary>
    public const HIBCDataMatrixPAS =  "HIBCDataMatrixPAS";
    public const HIBC_DATA_MATRIX_PAS = "HIBCDataMatrixPAS";

    /// <summary>
    /// Enum value HIBCQRLIC
    /// </summary>
    public const HIBCQRLIC =  "HIBCQRLIC";

    /// <summary>
    /// Enum value HIBCQRPAS
    /// </summary>
    public const HIBCQRPAS =  "HIBCQRPAS";

    /// <summary>
    /// Enum value IATA2of5
    /// </summary>
    public const IATA2of5 =  "IATA2of5";
    public const IATA2OF5 = "IATA2of5";

    /// <summary>
    /// Enum value ISBN
    /// </summary>
    public const ISBN =  "ISBN";

    /// <summary>
    /// Enum value ISMN
    /// </summary>
    public const ISMN =  "ISMN";

    /// <summary>
    /// Enum value ISSN
    /// </summary>
    public const ISSN =  "ISSN";

    /// <summary>
    /// Enum value ITF14
    /// </summary>
    public const ITF14 =  "ITF14";

    /// <summary>
    /// Enum value ITF6
    /// </summary>
    public const ITF6 =  "ITF6";

    /// <summary>
    /// Enum value Interleaved2of5
    /// </summary>
    public const Interleaved2of5 =  "Interleaved2of5";
    public const INTERLEAVED2OF5 = "Interleaved2of5";

    /// <summary>
    /// Enum value ItalianPost25
    /// </summary>
    public const ItalianPost25 =  "ItalianPost25";
    public const ITALIAN_POST25 = "ItalianPost25";

    /// <summary>
    /// Enum value MacroPdf417
    /// </summary>
    public const MacroPdf417 =  "MacroPdf417";
    public const MACRO_PDF417 = "MacroPdf417";

    /// <summary>
    /// Enum value Mailmark
    /// </summary>
    public const Mailmark =  "Mailmark";
    public const MAILMARK = "Mailmark";

    /// <summary>
    /// Enum value Matrix2of5
    /// </summary>
    public const Matrix2of5 =  "Matrix2of5";
    public const MATRIX2OF5 = "Matrix2of5";

    /// <summary>
    /// Enum value MaxiCode
    /// </summary>
    public const MaxiCode =  "MaxiCode";
    public const MAXI_CODE = "MaxiCode";

    /// <summary>
    /// Enum value MicrE13B
    /// </summary>
    public const MicrE13B =  "MicrE13B";
    public const MICR_E13_B = "MicrE13B";

    /// <summary>
    /// Enum value MicroPdf417
    /// </summary>
    public const MicroPdf417 =  "MicroPdf417";
    public const MICRO_PDF417 = "MicroPdf417";

    /// <summary>
    /// Enum value MicroQR
    /// </summary>
    public const MicroQR =  "MicroQR";
    public const MICRO_QR = "MicroQR";

    /// <summary>
    /// Enum value MSI
    /// </summary>
    public const MSI =  "MSI";

    /// <summary>
    /// Enum value OneCode
    /// </summary>
    public const OneCode =  "OneCode";
    public const ONE_CODE = "OneCode";

    /// <summary>
    /// Enum value OPC
    /// </summary>
    public const OPC =  "OPC";

    /// <summary>
    /// Enum value PatchCode
    /// </summary>
    public const PatchCode =  "PatchCode";
    public const PATCH_CODE = "PatchCode";

    /// <summary>
    /// Enum value Pdf417
    /// </summary>
    public const Pdf417 =  "Pdf417";
    public const PDF417 = "Pdf417";

    /// <summary>
    /// Enum value Pharmacode
    /// </summary>
    public const Pharmacode =  "Pharmacode";
    public const PHARMACODE = "Pharmacode";

    /// <summary>
    /// Enum value Planet
    /// </summary>
    public const Planet =  "Planet";
    public const PLANET = "Planet";

    /// <summary>
    /// Enum value Postnet
    /// </summary>
    public const Postnet =  "Postnet";
    public const POSTNET = "Postnet";

    /// <summary>
    /// Enum value PZN
    /// </summary>
    public const PZN =  "PZN";

    /// <summary>
    /// Enum value RectMicroQR
    /// </summary>
    public const RectMicroQR =  "RectMicroQR";
    public const RECT_MICRO_QR = "RectMicroQR";

    /// <summary>
    /// Enum value RM4SCC
    /// </summary>
    public const RM4SCC =  "RM4SCC";
    public const RM4_SCC = "RM4SCC";

    /// <summary>
    /// Enum value SCC14
    /// </summary>
    public const SCC14 =  "SCC14";

    /// <summary>
    /// Enum value SSCC18
    /// </summary>
    public const SSCC18 =  "SSCC18";

    /// <summary>
    /// Enum value Standard2of5
    /// </summary>
    public const Standard2of5 =  "Standard2of5";
    public const STANDARD2OF5 = "Standard2of5";

    /// <summary>
    /// Enum value Supplement
    /// </summary>
    public const Supplement =  "Supplement";
    public const SUPPLEMENT = "Supplement";

    /// <summary>
    /// Enum value SwissPostParcel
    /// </summary>
    public const SwissPostParcel =  "SwissPostParcel";
    public const SWISS_POST_PARCEL = "SwissPostParcel";

    /// <summary>
    /// Enum value UPCA
    /// </summary>
    public const UPCA =  "UPCA";

    /// <summary>
    /// Enum value UPCE
    /// </summary>
    public const UPCE =  "UPCE";

    /// <summary>
    /// Enum value VIN
    /// </summary>
    public const VIN =  "VIN";

}

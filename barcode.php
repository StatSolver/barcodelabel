<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Label</title>
    <style>
        <?php
        // Get selected label size from POST
        $labelSize = $_POST['label_size'] ?? '50x25mm';

        // Default size
        $pageWidth = '50mm';
        $pageHeight = '25mm';

        // Match the size selection
        switch ($labelSize) {
            case '76x127mm':
                $pageWidth = '76.2mm';
                $pageHeight = '127mm';
                break;
            case '101x152mm':
                $pageWidth = '101.6mm';
                $pageHeight = '152.4mm';
                break;
        }
        ?>

        @page {
            size: <?= $pageWidth ?> <?= $pageHeight ?>;
            margin: 0;
        }

        @media print {
            body {
                margin: 0;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .label {
            width: <?= $pageWidth ?>;
            height: <?= $pageHeight ?>;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 0;
            overflow: hidden;
        }

        .text {
           font-size: 6pt;                  /* slightly smaller font */
    text-align: left;
    line-height: 1.1;
    padding: 0.5mm 1mm;              /* reduce padding */
    width: 100%;
    max-height: 10mm;                /* limit height */
    overflow: hidden;                /* cut off anything outside */
    white-space: normal;             /* allow line wrapping */
    word-wrap: break-word;
    overflow-wrap: break-word;
    box-sizing: border-box;
        }

        .barcode {
            margin-top: 1mm;
            display: block;
            text-align: center;
        }

        .barcode img {
            height: 14mm;
            max-width: 90%;
        }
    </style>
</head>
<body onload="window.print();">
    <div class="label">
        <div class="text">
            <?php
            $asin = $_POST['asin'] ?? '';
            $sku = $_POST['sku'] ?? '';
            $itemname = $_POST['itemname'] ?? '';

            echo "<div><strong>SKU  :</strong><strong>$sku</strong></div>";
            echo "<div>$itemname</div>";
            ?>
        </div>
        <div class="barcode">
            <?php
            function bar128($text) {
                $encoded = urlencode($text);
                return "<img src='https://barcode.tec-it.com/barcode.ashx?data=$encoded&code=Code128&dpi=300' alt='barcode'>";
            }

            echo bar128($asin);
            ?>
        </div>
    </div>
</body>
</html>

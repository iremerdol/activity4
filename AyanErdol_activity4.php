<!DOCTYPE html>
<html lang="en">

<head>
    <title>ACTIVITY-4</title>
    <meta name="description" content="CENG 311 Inclass Activity-4" />
</head>

<body>
    <?php
    //define default currency values
    $default_from_currency = isset($_GET['from_currency']) ? $_GET['from_currency'] : 'USD';
    $default_to_currency = isset($_GET['to_currency']) ? $_GET['to_currency'] : 'USD';

    //check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['value'])) {
            $value = floatval($_GET['value']);
            $from_currency = isset($_GET['from_currency']) ? $_GET['from_currency'] : $default_from_currency;
            $to_currency = isset($_GET['to_currency']) ? $_GET['to_currency'] : $default_to_currency;
            
            //define conversion rates
            $conversion_rates = array(
                "USD" => 1.0,
                "CAD" => 1.25, 
                "EUR" => 0.85
            );

            //calculate conversion
            $converted_value = $value * ($conversion_rates[$to_currency] / $conversion_rates[$from_currency]);
        } 
    }
?>

    <form action="AyanErdol_activity4.php" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="value" value="<?php echo (isset($value)) ? $value : ''; ?>" /></td>
                <td>Currency:</td>
                <td>
                    <select name="from_currency">
                        <option value="USD" <?php if ($default_from_currency == 'USD') echo 'selected'; ?>>Dollar
                        </option>
                        <option value="CAD" <?php if ($default_from_currency == 'CAD') echo 'selected'; ?>>Canadian Dollar</option>
                        <option value="EUR" <?php if ($default_from_currency == 'EUR') echo 'selected'; ?>>Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" name="answer"
                        value="<?php echo (isset($converted_value)) ? $converted_value : ''; ?>" /></td>
                <td> Currency:</td>
                <td>
                    <select name="to_currency">
                        <option value="USD" <?php if ($default_to_currency == 'USD') echo 'selected'; ?>>Dollar</option>
                        <option value="CAD" <?php if ($default_to_currency == 'CAD') echo 'selected'; ?>>Canadian Dollar</option>
                        <option value="EUR" <?php if ($default_to_currency == 'EUR') echo 'selected'; ?>>Euro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="convert" /></td>
            </tr>
        </table>
    </form>

</body>

</html>
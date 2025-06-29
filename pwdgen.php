<?php
$pepper = "QhwTRMfHL4VjsJSW"; // SECRET !!!
$result = "";

if (isset($_POST['submit'])) {
    if ($_POST['n1'] == "" || $_POST['n2'] == "")
        $result = "Eroare: Completează ambele câmpuri.";
    else {
        $intermediate = hash("sha384", $_POST['n1'] . $_POST['n2']);
        $result = hash("sha384", $intermediate . $pepper);
    }
}

if (isset($_POST['clear'])) {
    $result = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>* x . k . o . z . e . d *</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            text-align: center;
            padding-top: 20px;
        }
        table {
            margin-top: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        button {
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #007bb5;
        }
        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        .center {
            text-align: center;
        }
        /* Buton roșu pentru ștergerea câmpurilor */
        #clearButton {
            background-color: #FF4C4C;
        }
        #clearButton:hover {
            background-color: #FF2A2A;
        }
    </style>
</head>
<body>

<h2>Salt & Pepper Password Hashing Method<br>Made by xKozeD. - 2025</h2><br>

<form method="post">
    <table>
        <tr>
            <td><strong>Parola:</strong></td>
            <td><input type="text" name="n1" value="<?php echo isset($_POST['n1']) ? htmlspecialchars($_POST['n1']) : ''; ?>"></td>
        </tr>
        <tr>
            <td><strong>Salt parola:</strong></td>
            <td><input type="text" name="n2" value="<?php echo isset($_POST['n2']) ? htmlspecialchars($_POST['n2']) : ''; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Generează Hash">
            </td>
        </tr>
    </table>
</form>

<?php if ($result != "" && $result != "Eroare: Completează ambele câmpuri."): ?>
    <br>
    <table>
        <tr>
            <td><strong>Rezultatul Hash:</strong></td>
        </tr>
        <tr>
            <td id="resultText"><?php echo htmlspecialchars($result); ?></td>
        </tr>
    </table>
    <br>
    <center>
        <button id="copyButton" onclick="copyToClipboard()">Copiază în clipboard</button>
        <form method="post">
            <button id="clearButton" name="clear">Șterge câmpurile</button>
        </form>
    </center>
<?php elseif ($result == "Eroare: Completează ambele câmpuri."): ?>
    <br>
    <div class="error"><?php echo $result; ?></div>
<?php endif; ?>

<script>
// Funcția pentru a copia în clipboard
function copyToClipboard() {
    var tempInput = document.createElement("input");
    tempInput.value = document.getElementById("resultText").textContent;  // Se obține textul rezultatului
    document.body.appendChild(tempInput);
    tempInput.select();  // Selectează textul
    document.execCommand("copy");  // Copiază în clipboard
    document.body.removeChild(tempInput);  // Șterge inputul temporar
}
</script>

</body>
</html>

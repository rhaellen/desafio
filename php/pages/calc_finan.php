<?php
$print_json = [];

$val_1 = $_POST['val_1'];
$val_1 = str_ireplace(",", ".", $val_1);

$val_2 = $_POST['val_2'];

switch ($val_2) {
    case 6:
        $juros = 0.04;
        break;

    case 12:
        $juros = 0.045;
        break;

    case 18:
        $juros = 0.05;
        break;

    case 24:
        $juros = 0.053;
        break;

    case 36:
        $juros = 0.055;
        break;
}
$valor_parcelas = ($val_1 / $val_2);
$total_parcelas = ($valor_parcelas * $juros) + $valor_parcelas;
$total_finan = $total_parcelas * $val_2;

$total_parcelas = number_format($total_parcelas, 2, ',', '.');
$total_finan = number_format($total_finan, 2, ',', '.');

for ($i = 1; $i <= $val_2; $i++) {
    $print_json["valor_html"] .= "<p>Parcela " . $i . ' - R$' . $total_parcelas . " - Juros: " . $juros . "</p>";
}


$print_json["valor_html"] .= "<p>Valor total do financiamento: R$" . $total_finan . "</p>";

echo json_encode($print_json);
?>
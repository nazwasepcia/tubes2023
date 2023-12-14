<?php
include '../includes/db_connect.php';
include '../includes/functions.php';

echo "<br>";
echo "testing validateuser:";
echo "<br>";

$valid_user = "wawa";
$valid_password = "040904";

$invalid_user = "bukan_wawa";
$invalid_password = "bukan_040904";

$test_user_cases = [
    ["case1",$valid_user, $valid_password, true],
    ["case2",$valid_user, $invalid_password, false],
    ["case3",$invalid_user, $valid_password, false]
];
foreach ($test_user_cases as [$case_order, $user, $password, $is_valid]) {
    $case_valid = validateUser($pdo, $user, $password);
    if ($case_valid == $is_valid) {
        echo "Uji $case_order berhasil";
        echo "<br>";
    } else {
        echo "Uji $case_order gagal";
        echo "<br>";
    }
}
echo "=================================";
echo "<br>";
echo "testing getProducts:";
echo "<br>";

$products = getProducts($pdo);
echo "diperoleh produk:";
echo "<br>";
foreach ($products as $product) {
    var_dump($product);
    echo "<br>";
}

?>
<?php
if (isset($_SERVER["admin"])) {
    $manifestUrl = "../dist/.vite/manifest.json";
    $source = "admin/js/index.js";
} else {
    $manifestUrl = "./dist/.vite/manifest.json";
    $source = "js/index.js";
}
if (isset($pageInIncludes)) { //added the if to avoid souping up stuff by moving php files around
    $manifestUrl = "../dist/.vite/manifest.json";
}
$manifestJson = file_get_contents($manifestUrl);
$manifestObj = json_decode($manifestJson, true);
$cssPath = $manifestObj[$source]["css"][0];
$jsPath = $manifestObj[$source]["file"];

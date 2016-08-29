<?php

require_once __DIR__ . '/hmac.php';

$md5Fn = function($message) { return md5($message, true); };
$sha1Fn = function($message) { return sha1($message, true); };
$sha256Fn = function($message) { return hash('sha256', $message, true); };
$sha512Fn = function($message) { return hash('sha512', $message, true); };

$str = '';
$key = '';
echo bin2hex(\lyoshenka\hmac($str, $key, $md5Fn, 64)) . "\n";     // 74e6f7298a9c2d168935f58c001bad88
echo bin2hex(\lyoshenka\hmac($str, $key, $sha1Fn, 64)) . "\n";    // fbdb1d1b18aa6c08324b7d64b71fb76370690e1d
echo bin2hex(\lyoshenka\hmac($str, $key, $sha256Fn, 64)) . "\n";  // b613679a0814d9ec772f95d778c35fc5ff1697c493715653c6c712144292c5ad
echo bin2hex(\lyoshenka\hmac($str, $key, $sha512Fn, 128)) . "\n"; // b936cee86c9f87aa5d3c6f2e84cb5a4239a5fe50480a6ec66b70ab5b1f4ac6730c6c515421b327ec1d69402e53dfb49ad7381eb067b338fd7b0cb22247225d47

echo "\n";

$str = 'The quick brown fox jumps over the lazy dog';
$key = 'key';
echo bin2hex(\lyoshenka\hmac($str, $key, $md5Fn, 64)) . "\n";     // 80070713463e7749b90c2dc24911e275
echo bin2hex(\lyoshenka\hmac($str, $key, $sha1Fn, 64)) . "\n";    // de7c9b85b8b78aa6bc8a7a36f70a90701c9db4d9
echo bin2hex(\lyoshenka\hmac($str, $key, $sha256Fn, 64)) . "\n";  // f7bc83f430538424b13298e6aa6fb143ef4d59a14946175997479dbc2d1a3cd8
echo bin2hex(\lyoshenka\hmac($str, $key, $sha512Fn, 128)) . "\n"; // b42af09057bac1e2d41708e48a902e09b5ff7f12ab428a4fe86653c73dd248fb82f948a549f7b791a5b41915ee4d1ec3935357e4e2317250d0372afa2ebeeb3a
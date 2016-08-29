<?php

namespace lyoshenka;

/**
 * A generic HMAC that can use any hash function.
 * Don't forget to use a timing-attack-safe comparison function when comparing hashes
 *
 * @param string   $message              The message to be authenticated
 * @param string   $key                  The key
 * @param callable $hashFn               The hash function. This function must return raw data, not hex
 * @param int      $hashBlockSizeInBytes The hash function block size (in bytes). This is NOT the output size or the digest size.
 *                                       You'll probably have to look this up.
 *
 * @return string The raw HMAC digest (not hex)
 */
function hmac($message, $key, callable $hashFn, $hashBlockSizeInBytes)
{
    if (strlen($key) > $hashBlockSizeInBytes)
    {
        $key = $hashFn($key);
    }

    if (strlen($key) < $hashBlockSizeInBytes)
    {
        $key = $key . str_repeat(chr(0x00), $hashBlockSizeInBytes - strlen($key));
    }

    $outerKeyPad = str_repeat(chr(0x5c), $hashBlockSizeInBytes);
    $innerKeyPad = str_repeat(chr(0x36), $hashBlockSizeInBytes);

    return $hashFn(($outerKeyPad ^ $key) . $hashFn(($innerKeyPad ^ $key) . $message));
}

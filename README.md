# php-hmac

A generic HMAC function that can be used with any hash


## Install

    composer install lyoshenka/php-hmac


## Use

    require __DIR__.'/vendor/autoload.php';

    # Ensure that your hash functions returns raw output (not hex)
    $sha256Fn = function($message) { return hash('sha256', $message, true); };

    # Look up the block size - https://en.wikipedia.org/wiki/Comparison_of_cryptographic_hash_functions
    $blockSize = 64; // make sure this in bytes, not bits

    # Compute the HMAC digest
    $digest = \lyoshenka\hmac("The message text goes here", "secret-key", $sha256Fn, $blockSize);

    # Output the digest as a hex string
    echo bin2hex($digest) . "\n";


## Examples

See `examples.php`


## References

- https://tools.ietf.org/html/rfc2104
- https://en.wikipedia.org/wiki/Hash-based_message_authentication_code
- https://en.wikipedia.org/wiki/Comparison_of_cryptographic_hash_functions

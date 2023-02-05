<?php

declare(strict_types=1);

namespace BenyCode\KeySignatory;

use function openssl_get_privatekey;
use function openssl_sign;

final class Signer
{
    public static function signWithPrivateKey(string $content, string $privateKey, string $passphrase = ''): string
    {
        $sign = '';

        $key = openssl_get_privatekey($privateKey, $passphrase);

        openssl_sign($content, $sign, $key);

        return $sign;
    }
}

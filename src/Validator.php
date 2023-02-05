<?php

declare(strict_types=1);

namespace BenyCode\KeySignatory;

use BenyCode\KeySignatory\Exception\ValidationFailedException;

use function openssl_pkey_get_public;
use function openssl_verify;
use function openssl_error_string;

final class Validator
{
    public static function validateWithPublicKey(string $content, string $signature, string $publicKey): void
    {
        $publicKeyId = openssl_pkey_get_public($publicKey);

        $ok = openssl_verify($content, $signature, $publicKeyId);

        if ($ok === 0) {
            throw new ValidationFailedException((string)openssl_error_string());
        }
    }
}

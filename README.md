# Public and private key Signatory

Validate and sign content with a RSA private and public key

## Table of contents

- [Install](#install)
- [Usage](#usage)

## Install

Via Composer

``` bash
$ composer require benycode/key-signatory
```

Requires PHP8+.

## Usage

Sign a content with a private key

```php
use BenyCode\KeySignatory\Signer;

$content = 'a content to be signed';

$privateKey = '-----BEGIN RSA PRIVATE KEY-----<<....>>-----END RSA PRIVATE KEY-----';

$passphrase = '';

$signature = Signer::signWithPrivateKey($content, $privateKey, $passphrase);
```

Validate a content with a public key

```php
use BenyCode\KeySignatory\Validator;

$content = 'a content to be verified';

$publicKey = '-----BEGIN RSA PUBLIC KEY-----<<....>>-----END RSA PUBLIC KEY-----';

$signature = '';

$signature = Validator::validateWithPublicKey($content, $signature, $publicKey);
```

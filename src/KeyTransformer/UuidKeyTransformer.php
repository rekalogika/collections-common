<?php

declare(strict_types=1);

/*
 * This file is part of rekalogika/collections package.
 *
 * (c) Priyadi Iman Nurcahyo <https://rekalogika.dev>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Rekalogika\Domain\Collections\Common\KeyTransformer;

use Rekalogika\Contracts\Collections\Exception\NotFoundException;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;

class UuidKeyTransformer implements KeyTransformer
{
    private static ?self $instance = null;

    public static function create(): self
    {
        return self::$instance ??= new self();
    }

    private function __construct()
    {
    }

    #[\Override]
    public function transformToKey(mixed $key): int|string
    {
        if ($key instanceof AbstractUid) {
            return $key->toRfc4122();
        }

        if (!\is_string($key)) {
            throw new NotFoundException();
        }

        try {
            $uuid = new Uuid($key);

            return $key;
        } catch (\InvalidArgumentException) {
            throw new NotFoundException();
        }
    }
}

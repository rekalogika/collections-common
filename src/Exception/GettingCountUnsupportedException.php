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

namespace Rekalogika\Domain\Collections\Common\Exception;

use Rekalogika\Contracts\Collections\Exception\BadMethodCallException;

final class GettingCountUnsupportedException extends BadMethodCallException {}

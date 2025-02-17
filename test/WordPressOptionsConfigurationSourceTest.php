<?php

/*
 * Copyright (c) 2025 Martin Pettersson
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace N7e\Configuration;

use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(WordPressOptionsConfigurationSource::class)]
class WordPressOptionsConfigurationSourceTest extends TestCase
{
    use PHPMock;

    #[Test]
    public function shouldProduceConfiguration(): void
    {
        $option = 'test';
        $value = ['key' => 'value'];
        $configurationSource = new WordPressOptionsConfigurationSource($option);
        $getOptionMock = $this->getFunctionMock(__NAMESPACE__, 'get_option');

        $getOptionMock
            ->expects($this->once())
            ->with($option, [])
            ->willReturn($value);

        $this->assertEquals($value, $configurationSource->load());
    }
}

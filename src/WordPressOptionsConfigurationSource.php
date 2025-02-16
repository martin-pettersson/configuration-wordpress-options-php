<?php

/*
 * Copyright (c) 2025 Martin Pettersson
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace N7e\Configuration;

/**
 * WordPress Options configuration source implementation.
 *
 * @see \N7e\Configuration\ConfigurationSourceInterface
 */
class WordPressOptionsConfigurationSource implements ConfigurationSourceInterface
{
    /**
     * WordPress option.
     *
     * @var string
     */
    private string $option;

    /**
     * Create a new configuration source instance.
     *
     * @param string $option WordPress option.
     */
    public function __construct(string $option)
    {
        $this->option = $option;
    }

    /** {@inheritDoc} */
    public function load(): array
    {
        return (array) get_option($this->option, []);
    }
}

<?php

namespace VedianSoft\VedianCms\Contracts;

use Illuminate\Support\Collection;
use Reflection;
use ReflectionClass;
use ReflectionMethod;

/**
 * The CssContract interface defines the contract for CSS classes in the Vedian CMS package.
 */
interface CssContract
{
    public function __toString(): string;
}

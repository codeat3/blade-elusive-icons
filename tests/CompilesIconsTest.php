<?php

declare(strict_types=1);

namespace Tests;

use Codeat3\BladeElusiveIcons\BladeElusiveIconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('elusive-bulb')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg viewBox="0 0 1200 1200"><path d="M600 119.608c-158.775 0-287.486 96.415-287.486 215.368l163.322 494.645h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369v.015zm0 46.996c158.775 0 240.479 128.138 240.479 168.362L724.161 680.393H475.833L359.515 334.966c0-49.63 81.704-168.362 240.479-168.362H600zM472.215 865.699v85.982h255.57v-85.984h-255.57v.002zm0 128.725v85.982h255.57v-85.982h-255.57z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('elusive-bulb', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" viewBox="0 0 1200 1200"><path d="M600 119.608c-158.775 0-287.486 96.415-287.486 215.368l163.322 494.645h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369v.015zm0 46.996c158.775 0 240.479 128.138 240.479 168.362L724.161 680.393H475.833L359.515 334.966c0-49.63 81.704-168.362 240.479-168.362H600zM472.215 865.699v85.982h255.57v-85.984h-255.57v.002zm0 128.725v85.982h255.57v-85.982h-255.57z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('elusive-bulb', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" viewBox="0 0 1200 1200"><path d="M600 119.608c-158.775 0-287.486 96.415-287.486 215.368l163.322 494.645h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369v.015zm0 46.996c158.775 0 240.479 128.138 240.479 168.362L724.161 680.393H475.833L359.515 334.966c0-49.63 81.704-168.362 240.479-168.362H600zM472.215 865.699v85.982h255.57v-85.984h-255.57v.002zm0 128.725v85.982h255.57v-85.982h-255.57z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeElusiveIconsServiceProvider::class,
        ];
    }
}

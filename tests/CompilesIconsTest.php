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
            <svg xmlns="http://www.w3.org/2000/svg" docname="bulb.svg" version="0.48.4 r9939" x="0px" y="0px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve" fill="currentColor"><path id="rect2989" connector-curvature="0" d="M600,119.608c-158.775,0-287.486,96.415-287.486,215.368l163.322,494.645 h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369V119.608z M600,166.604 c158.775,0,240.479,128.138,240.479,168.362L724.161,680.393H475.833L359.515,334.966c0-49.63,81.704-168.362,240.479-168.362H600z M472.215,865.699v85.982h255.57v-85.984h-255.57V865.699L472.215,865.699z M472.215,994.424v85.982h255.57v-85.982H472.215 L472.215,994.424z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('elusive-bulb', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" docname="bulb.svg" version="0.48.4 r9939" x="0px" y="0px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve" fill="currentColor"><path id="rect2989" connector-curvature="0" d="M600,119.608c-158.775,0-287.486,96.415-287.486,215.368l163.322,494.645 h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369V119.608z M600,166.604 c158.775,0,240.479,128.138,240.479,168.362L724.161,680.393H475.833L359.515,334.966c0-49.63,81.704-168.362,240.479-168.362H600z M472.215,865.699v85.982h255.57v-85.984h-255.57V865.699L472.215,865.699z M472.215,994.424v85.982h255.57v-85.982H472.215 L472.215,994.424z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('elusive-bulb', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" docname="bulb.svg" version="0.48.4 r9939" x="0px" y="0px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve" fill="currentColor"><path id="rect2989" connector-curvature="0" d="M600,119.608c-158.775,0-287.486,96.415-287.486,215.368l163.322,494.645 h248.328l163.322-494.659c0-118.951-128.702-215.369-287.486-215.369V119.608z M600,166.604 c158.775,0,240.479,128.138,240.479,168.362L724.161,680.393H475.833L359.515,334.966c0-49.63,81.704-168.362,240.479-168.362H600z M472.215,865.699v85.982h255.57v-85.984h-255.57V865.699L472.215,865.699z M472.215,994.424v85.982h255.57v-85.982H472.215 L472.215,994.424z"/></svg>
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

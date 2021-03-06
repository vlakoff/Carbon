<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Localization;

use Carbon\Carbon;
use Tests\AbstractTestCase;

class SrTest extends AbstractTestCase
{
    public function testDiffForHumansLocalizedInSr()
    {
        Carbon::setLocale('sr');

        $scope = $this;
        $this->wrapWithNonDstDate(function () use ($scope) {
            $d = Carbon::now()->subSecond();
            $scope->assertSame('pre 1 sekund', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('pre 2 sekunde', $d->diffForHumans());

            $d = Carbon::now()->subMinute();
            $scope->assertSame('pre 1 minut', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('pre 2 minuta', $d->diffForHumans());

            $d = Carbon::now()->subHour();
            $scope->assertSame('pre 1 sat', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('pre 2 sata', $d->diffForHumans());

            $d = Carbon::now()->subDay();
            $scope->assertSame('pre 1 dan', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('pre 2 dana', $d->diffForHumans());

            $d = Carbon::now()->subWeek();
            $scope->assertSame('pre 1 nedelja', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('pre 2 nedelje', $d->diffForHumans());

            $d = Carbon::now()->subMonth();
            $scope->assertSame('pre 1 mesec', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('pre 2 meseca', $d->diffForHumans());

            $d = Carbon::now()->subYear();
            $scope->assertSame('pre 1 godina', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('pre 2 godine', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('1 sekund od sada', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('nakon 1 sekund', $d->diffForHumans($d2));
            $scope->assertSame('pre 1 sekund', $d2->diffForHumans($d));

            $scope->assertSame('1 sekund', $d->diffForHumans($d2, true));
            $scope->assertSame('2 sekunde', $d2->diffForHumans($d->addSecond(), true));
        });
    }
}

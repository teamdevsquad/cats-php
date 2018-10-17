<?php

namespace Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase as BaseTestCase;

class HelperFormatDateTest extends BaseTestCase
{

    public function test()
    {
        $date  = Carbon::createFromFormat('Y-m-d H:i:s', '2015-12-27 09:14:22');
        $value = format_date($date);
        self::assertEquals('2015-12-27T09:14:22-07:00', $value);
    }

}
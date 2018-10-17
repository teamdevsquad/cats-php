<?php

namespace Tests\Unit;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase as BaseTestCase;

class HelperParseUriTest extends BaseTestCase
{

    public function test()
    {
        $uri = "/candidates/{id}/{xyz}/{x}";

        $parsedUri = parse_uri($uri, ['id' => 1, 'xyz' => 2, 'x' => 3]);

        self::assertEquals('/candidates/1/2/3', $parsedUri);
    }

}
<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Cats\Cats;
use Cats\Http\HttpClient;
use Cats\Models\Candidate;
use Mockery\Mock;
use PHPUnit\Framework\TestCase as BaseTestCase;

class CandidateTest extends BaseTestCase
{

    public function test()
    {

        $httpClient = \Mockery::mock(HttpClient::class);
        $httpClient
            ->shouldReceive('get')
            ->times(1)
            ->andReturn(['id' => 1, 'first_name' => 'John Doe']);

        Cats::setup("123", $httpClient);

        /** @var Candidate $candidate */
        $candidate = Candidate::find(1);

        self::assertEquals('John Doe', $candidate->first_name);
    }

}
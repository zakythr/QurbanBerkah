<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Service;
use Mockery;
use Mockery\MockInterface;

public function testListCicilan()
{
    $cobaCicilanRepository = $this->getMockBuilder('app\Repositories\cicilanRepository.php')
    ->disableOriginalConstructor()
    ->getMethods(['getCicilanById'])
    ->getMock();
    $cobaCicilanRepository->method('getCicilanById')->willReturn(true);
}
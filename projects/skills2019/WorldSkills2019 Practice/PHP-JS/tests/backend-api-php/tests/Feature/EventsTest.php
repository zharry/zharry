<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\ReadTest;

class EventsTest extends ReadTest
{
    public function testA1aGetIndexLoggedIn()
    {
        $res = $this->http->get('/api/v1/events?token='.$this->getLoginToken());

        $this->assertStatusCode(200, $res);
        $this->assertHeadersContains(['content-type' => 'application/json'], $res);
        $this->assertResponse([
            [
                'id' => 1,
                'title' => 'Web conference',
                'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
                'date' => '2019-08-15',
                'time' => '08:00:00',
                'duration_days' => 1,
                'location' => 'Floor1',
                'standard_price' => 500,
                'capacity' => 250,
                'sessions' => [
                    [
                        'id' => 1,
                        'event_id' => 1,
                        'title' => 'CSS applied at 8:30',
                        'room' => 'R05',
                        'speaker' => 'Mac Entyre',
                    ],
                    [
                        'id' => 2,
                        'event_id' => 1,
                        'title' => 'JS advanced at 10:00',
                        'room' => 'R06',
                        'speaker' => 'Ann Codelle',
                    ],
                ],
            ],
            [
                'id' => 2,
                'title' => 'Fishing experience',
                'description' => 'Lorem ipsum dolor sit amet, sadipscing consetetur elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
                'date' => '2019-08-30',
                'time' => '08:00:00',
                'duration_days' => 1,
                'location' => 'Garden Area',
                'standard_price' => 100,
                'capacity' => 30,
                'sessions' => [
                    [
                        'id' => 3,
                        'event_id' => 2,
                        'title' => 'fishing in troubled waters',
                        'room' => null,
                        'speaker' => null,
                    ],
                    [
                        'id' => 4,
                        'event_id' => 2,
                        'title' => 'preparing fish for dish',
                        'room' => null,
                        'speaker' => null,
                    ],
                ],
            ],
        ], $res);
    }

    public function testA1aGetIndexUnauthorized()
    {
        $res = $this->http->get('/api/v1/events');

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Unauthorized user',
        ], $res);
    }

    public function testA1aGetIndexInvalidToken()
    {
        $res = $this->http->get('/api/v1/events?token=xxxxxxxxxxxxxxxxxxxxxx');

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'Unauthorized user',
        ], $res);
    }
}

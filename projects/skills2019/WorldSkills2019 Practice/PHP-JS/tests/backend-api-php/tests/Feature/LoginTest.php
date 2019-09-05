<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\WriteTest;
use WorldSkills\Trade17\Tests\Helper\Config;

class LoginTest extends WriteTest
{
    public function testA4aCorrectLogin()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'username' => 'attendee1',
                'password' => 'attendee1pass',
            ],
        ]);

        $this->assertStatusCode(200, $res);
        $this->assertResponse([
            'token' => Config::$LOGIN_TOKEN,
        ], $res);
    }

    public function testA4aInvalidPassword()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'username' => 'attendee1',
                'password' => 'attendee1passwrong',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'invalid login',
        ], $res);
    }

    public function testA4aInvalidUsername()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'username' => 'attendee1wrong',
                'password' => 'attendee1pass',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'invalid login',
        ], $res);
    }

    public function testA4aInvalidRequest()
    {
        $res = $this->http->post('/api/v1/login', [
            'json' => [
                'foo' => 'bar',
            ],
        ]);

        $this->assertStatusCode(401, $res);
        $this->assertResponse([
            'message' => 'invalid login',
        ], $res);
    }
}

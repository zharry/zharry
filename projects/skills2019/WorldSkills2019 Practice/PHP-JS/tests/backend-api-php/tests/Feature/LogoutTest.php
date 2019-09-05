<?php

namespace WorldSkills\Trade17\Tests\Feature;

use WorldSkills\Trade17\Tests\Helper\WriteTest;

class LogoutTest extends WriteTest
{
    public function testA4bLogout()
    {
        // login the user and get the token
        $token = $this->getLoginToken();

        // event list should be accessible after login
        $this->assertStatusCode(200, $this->http->get('/api/v1/events?token='.$token));

        // logout the user
        $res = $this->http->get('/api/v1/logout?token='.$token);
        $this->assertStatusCode(200, $res);
        $this->assertResponse([
            'message' => 'logout success',
        ], $res);

        // after logout, event list should no longer be accessible
        $this->assertStatusCode(401, $this->http->get('/api/v1/events?token='.$token));
    }
}

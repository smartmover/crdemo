<?php

class InfoControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->call('GET', '/api/v1/info');
        $this->assertResponseStatus(200);

        $this->get('/api/v1/info')
            ->seeJsonStructure([
                'name',
                'gender',
                'phone',
                'email',
                'address',
                'nationality',
                'dob',
                'edu_background',
                'prefer_moc',
            ]);
    }
}

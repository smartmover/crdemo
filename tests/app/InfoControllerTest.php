<?php

class InfoControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->call('GET', '/info');
        $this->assertResponseStatus(200);

        $this->get('/info')
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

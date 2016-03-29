<?php

use App\Repository\CsvInfoRepository;

class InfoControllerTest extends TestCase
{
    protected $info;

    protected $data = [
        'name'           => 'Sachin Joshi',
        'gender'         => 'Male',
        'phone'          => '9849465853',
        'email'          => 'satchin.joshi@gmail.com',
        'address'        => 'Kathmandu, Nepal',
        'nationality'    => 'Nepali',
        'dob'            => '1989-12-12',
        'edu_background' => 'BIM',
        'prefer_moc'     => 'Email'
    ];

    public function setUp()
    {
        parent::setUp();
        $this->info = new CsvInfoRepository();
        \File::put(storage_path(env('CSV_PATH')), '');
    }

    public function testIndex()
    {
        $response = $this->call('GET', '/api/v1/info');
        $this->assertInstanceOf('Illuminate\Http\Response', $response);
        $this->assertResponseStatus(200);
    }

    public function testStoreData()
    {
        Event::shouldReceive('fire')
                    ->once();
        $this->json('POST', '/api/v1/info', $this->data)
            ->seeJsonEquals([
                'message' => 'Successfully Saved'
            ]);
    }

    public function testInvalidRequest()
    {
        $data = $this->data;
        unset($data['name']);
        $data['email'] = 'invalid_email';
        $this->json('POST', '/api/v1/info', $data)
            ->seeJsonEquals([
                'name' => ['The name field is required.'],
                'email' => ['The email must be a valid email address.']
            ]);
    }

    public function testResponseData()
    {
        $this->info->save($this->data);
        $this->get('/api/v1/info')
            ->seeJson([
                'data' => [$this->data],
                'meta' => [
                    'cursor' => [
                        'current' => 0,
                        'prev' => -6,
                        'next' => 6,
                        'count' => 1
                    ]
          ]
        ]);
    }

    public function tearDown()
    {
        \File::delete(storage_path(env('CSV_PATH')));
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BrowserTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected $baseUrl = 'http://localhost:8000';

    protected function setUp()
    {
        $this->setHost('localhost');
        $this->setBrowser('firefox');
        $this->setBrowserUrl($this->baseUrl);
    }

    public function validInputsProvider()
    {
        $inputs[] = [
            [
                "name" => "Sachin Joshi",
                "gender" => "Male",
                "phone" => "9849465853",
                "email" => "satchin.joshi@gmail.com",
                "address" => "Kathmandu, Nepal",
                "nationality" => "Nepali",
                "dob" => "1989-12-12",
                "edu_background" => "BIM",
                "prefer_moc" => "Email"
            ]
        ];
        return $inputs;
    }

    public function fillFormAndSubmit(array $inputs)
    {
        $form = $this->byId('infoForm');
        foreach ($inputs as $input => $value) {
            $form->byName($input)->value($value);
        }
        $this->byCssSelector('input[type="submit"]')->click();
    }

    /**
     * @dataProvider validInputsProvider
     */
    public function testValidFormSubmission(array $inputs)
    {
        $this->url('/add');
        $this->fillFormAndSubmit($inputs);
        $successMessage = $this->byCssSelector('.alert-success')->text();
        $this->assertEquals('Successfully Saved', $successMessage);
    }

    public function tearDown()
    {
        $this->stop();
    }
}

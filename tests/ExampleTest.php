<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Sign in to start your session');
    }

    public function testTruckOwnerLogin()
    {
        $credentials = [
            'email'    => 'to@truckjee.com',
            'password' => 'younus'
        ];
        $this->visit('/login')
            ->submitForm($credentials)
            ->see('truck owner dashboard')
            ->seePageIs('/truck-owner');
    }

    public function testTransporterLogin()
    {
        $credentials = [
            'email'    => 'tr@truckjee.com',
            'password' => 'younus'
        ];
        $this->visit('/login')
            ->submitForm($credentials)
            ->see('transporter dashboard')
            ->seePageIs('/transporter');
    }

    public function testAdminLogin()
    {
        $credentials = [
            'email'    => 'itsme@theyounus.com',
            'password' => 'younus'
        ];
        $this->visit('/login')
            ->submitForm($credentials)
            ->see('admin dashboard')
            ->seePageIs('/admin');
    }

    public function testTruckOwnerMiddleWares()
    {
        $this->actingAs(\TruckJee\User::find(3))
            ->visit('/truck-owner')
            ->see('Unauthorized to perform this truck owner action');

        $this->actingAs(\TruckJee\User::find(1))
            ->visit('/truck-owner')
            ->see('Unauthorized to perform this truck owner action');
    }

    public function testTransporterMiddleWares()
    {
        $this->actingAs(\TruckJee\User::find(2))
            ->visit('/transporter')
            ->see('Unauthorized to perform this transporter action');

        $this->actingAs(\TruckJee\User::find(1))
            ->visit('/transporter')
            ->see('Unauthorized to perform this transporter action');
    }

    public function testAdminMiddleWares()
    {
        $this->actingAs(\TruckJee\User::find(2))
            ->visit('/admin')
            ->see('Unauthorized to perform this admin action');

        $this->actingAs(\TruckJee\User::find(3))
            ->visit('/admin')
            ->see('Unauthorized to perform this admin action');
    }
}

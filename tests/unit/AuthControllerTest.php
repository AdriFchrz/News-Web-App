<?php

namespace Tests\Controllers;

use App\Controllers\AuthController;
use App\Models\NewsModel;
use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use Config\Services;

class AuthControllerTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $migrateOnce = true;
    protected $seedOnce = true;
    protected $seed = 'UserSeederTest'; // Memanggil seeder UserSeeder

    public function setUp(): void
    {
        parent::setUp();
        $this->userModel = new UserModel();
        $this->newsModel = new NewsModel();
    }

    public function testLoginGet()
    {
        $result = $this->withURI('/login')
            ->controller(AuthController::class)
            ->execute('login');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('Login'));
    }

    public function testLoginPostSuccess()
    {
        $result = $this->withURI('/login')
            ->withRequest(Services::request())
            ->withBody([
                'username' => 'admin',
                'password' => 'admin',
            ])
            ->controller(AuthController::class)
            ->execute('login');

        $this->assertTrue($result->isRedirect());
        $this->assertEquals('logintest', $result->getRedirectUrl());
        $this->assertEquals(1, session('user_id'));
    }

    public function testLoginPostFail()
    {
        $result = $this->withURI('/login')
            ->withRequest(Services::request())
            ->withBody([
                'username' => 'admin',
                'password' => 'wrong',
            ])
            ->controller(AuthController::class)
            ->execute('login');

        $this->assertTrue($result->isRedirect());
        $this->assertEquals('/login', $result->getRedirectUrl());
        $this->assertEquals('Login failed. Please check your credentials.', $result->getRedirectData()['error']);
    }

    public function testRegisterGet()
    {
        $result = $this->withURI('/register')
            ->controller(AuthController::class)
            ->execute('register');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('Register'));
    }

    public function testRegisterPost()
    {
        $result = $this->withURI('/register')
            ->withRequest(Services::request())
            ->withBody([
                'username' => 'test',
                'password' => 'test',
            ])
            ->controller(AuthController::class)
            ->execute('register');

        $this->assertTrue($result->isRedirect());
        $this->assertEquals('/login', $result->getRedirectUrl());
        $this->assertNotNull($this->userModel->where('username', 'test')->first());
    }

    public function testLogout()
    {
        $result = $this->withURI('/logout')
            ->controller(AuthController::class)
            ->execute('logout');

        $this->assertTrue($result->isRedirect());
        $this->assertEquals('/login', $result->getRedirectUrl());
        $this->assertNull(session('user_id'));
    }
}

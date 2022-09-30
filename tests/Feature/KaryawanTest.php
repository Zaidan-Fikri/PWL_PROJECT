<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Karyawan;

class KaryawanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function createKaryawan(){
        return Karyawan::create([
            'foto' => 'z.jpg',
            'nama' => 'zaidan',
            'email' => 'zaidan@gmail.com',
            'no_hp' => '085646449670',
            'jabatan' => 'CTO'
        ]);
    }
    public function test_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_register_data()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'dahyunisme@gmail.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(302);
    }

    public function test_add_karyawan()
    {
        $response = $this->post('/karyawan', [
            'foto' => 'foto.jpg',
            'nama' => 'John Doe',
            'email' => 'kepodek@gmail.com',
            'no_hp' => '08123456789',
            'jabatan' => 'Manager',
        ]);

        $response->assertStatus(302);
    }

    public function test_remove_karyawan()
    {
        $data = KaryawanTest::createKaryawan();
        $response = $this->delete("/karyawan/$data->id");

        $response->assertStatus(302);
    }

    public function test_edit_karyawan()
    {
        $data = KaryawanTest::createKaryawan();
        $response = $this->post("/karyawan/$data->id/edit", [
            "_method" => "PUT",
            'foto' => 'foto.jpg',
            'nama' => 'John Doe',
            'email' => 'anjirluwh@gmail.com',
            'no_hp' => '08123456789',
            'jabatan' => 'CEO',
        ]);

        $response->assertSee("Karyawan Berhasil Dirubah");
    }

    public function test_read_karyawan(){
        $data = KaryawanTest::createKaryawan();
        $response = $this->get("/karyawan/$data->id");   

        $response->assertStatus(200);
    }
}

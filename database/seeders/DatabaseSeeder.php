<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Student SEEDER
        Student::create(['name' => 'Marsudi Hakim', 'birthday' => '2000-01-01', 'gender' => 'Pria', 'nisn' => '0072022001']);
        Student::create(['name' => 'Bakianto Simbolon', 'birthday' => '2014-05-11', 'gender' => 'Pria', 'nisn' => '0072022002']);
        Student::create(['name' => 'Ikhsan Sinaga', 'birthday' => '2014-09-20', 'gender' => 'Pria', 'nisn' => '0072022003']);
        Student::create(['name' => 'Martana Sandi', 'birthday' => '2014-11-12', 'gender' => 'Perempuan', 'nisn' => '0072022004']);
        Student::create(['name' => 'Almira Purwanti', 'birthday' => '2014-01-23', 'gender' => 'Perempuan', 'nisn' => '0072022005']);
        Student::create(['nisn' => '990010001', 'name' => 'Ferdinan Jaya', 'birthday' => '2000-01-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010002', 'name' => 'Ferdi', 'birthday' => '2000-03-24', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010003', 'name' => 'Mikha Tamba', 'birthday' => '2000-01-22', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010004', 'name' => 'Noni', 'birthday' => '2000-12-20', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010005', 'name' => 'Kusnaidi', 'birthday' => '2000-07-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010021', 'name' => 'Kusni', 'birthday' => '1999-01-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010022', 'name' => 'Virda', 'birthday' => '1999-04-05', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010023', 'name' => 'Florensia', 'birthday' => '1999-05-02', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010024', 'name' => 'Zahwa', 'birthday' => '1999-06-21', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010025', 'name' => 'Kevin', 'birthday' => '1999-07-22', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010031', 'name' => 'Kumparan', 'birthday' => '1998-06-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010032', 'name' => 'Stevent', 'birthday' => '1999-07-21', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010033', 'name' => 'Puspa', 'birthday' => '1999-03-22', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010034', 'name' => 'Yulvia', 'birthday' => '1999-11-10', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010035', 'name' => 'Fabio', 'birthday' => '1999-08-02', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010041', 'name' => 'Messi', 'birthday' => '1998-01-12', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010042', 'name' => 'Ronaldo', 'birthday' => '1998-07-07', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010043', 'name' => 'Mourinho', 'birthday' => '1998-07-27', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010044', 'name' => 'Rebecca', 'birthday' => '1998-05-02', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010045', 'name' => 'Hilda', 'birthday' => '1999-01-20', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010051', 'name' => 'Cortes', 'birthday' => '1997-01-01', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010052', 'name' => 'Filipus', 'birthday' => '1997-01-02', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010053', 'name' => 'Kambuaya', 'birthday' => '1997-11-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010054', 'name' => 'Lofren', 'birthday' => '1998-01-23', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010055', 'name' => 'Tanaka', 'birthday' => '1997-07-27', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010061', 'name' => 'Pedri', 'birthday' => '1997-11-22', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010062', 'name' => 'Pedro', 'birthday' => '1997-01-22', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010063', 'name' => 'Siska', 'birthday' => '1996-01-29', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010064', 'name' => 'Mia Malkova', 'birthday' => '1997-01-30', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010065', 'name' => 'Boateng', 'birthday' => '1997-01-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010071', 'name' => 'Sukaisi', 'birthday' => '1996-09-20', 'gender' => 'Perempuan']);
        Student::create(['nisn' => '990010072', 'name' => 'Elvis', 'birthday' => '1997-08-25', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010073', 'name' => 'Kosta', 'birthday' => '1996-08-28', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010074', 'name' => 'Luffy', 'birthday' => '1996-01-21', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010075', 'name' => 'Dragon', 'birthday' => '1996-01-10', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010081', 'name' => 'Toni Kross', 'birthday' => '1995-01-30', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010082', 'name' => 'Sergio Bors', 'birthday' => '1995-01-22', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010083', 'name' => 'Hermes', 'birthday' => '1996-02-10', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010084', 'name' => 'Trafalgar', 'birthday' => '1996-06-20', 'gender' => 'Pria']);
        Student::create(['nisn' => '990010085', 'name' => 'Nami', 'birthday' => '1995-10-20', 'gender' => 'Perempuan']);


        // MATA PELAJARAN SEEDER
        Subject::create(['name' => 'Bahasa Indonesia']);
        Subject::create(['name' => 'Bahasa Inggris']);
        Subject::create(['name' => 'Bahasa Daerah']);
        Subject::create(['name' => 'Seni Budaya']);
        Subject::create(['name' => 'PPKn']);
        Subject::create(['name' => 'Matematika']);
        Subject::create(['name' => 'PJOK']);
        Subject::create(['name' => 'IPA']);
        Subject::create(['name' => 'IPS']);
        Subject::create(['name' => 'Pengembangan Diri']);

        // TEACHERS SEEDER
        // Teacher::create(['name' => 'Siti Nurbayar, S.Pd',    'birthday' => '1980-01-01', 'gender' => 'Perempuan', 'address' => 'Jl. Cempaka',       'nuptk' => '125678978', 'username' => 'siti.nurbayar', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Khodijah, S.Pd',         'birthday' => '1979-12-01', 'gender' => 'Perempuan', 'address' => 'Jl. Kurnia',        'nuptk' => '124678354', 'username' => 'khodijah01', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Warisman, S.Pd',         'birthday' => '1976-11-21', 'gender' => 'Pria',      'address' => 'Jl. Kartama',       'nuptk' => '120985944', 'username' => 'waris11', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Joko Anwar, S.Pd',       'birthday' => '1980-07-01', 'gender' => 'Pria',      'address' => 'Jl. Rambutan',      'nuptk' => '126584930', 'username' => 'jokoan80', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Jordan, S.Pd',           'birthday' => '1980-05-05', 'gender' => 'Pria',      'address' => 'Jl. Kempas',        'nuptk' => '129467589', 'username' => 'jordan05', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Pince, S.Kom',           'birthday' => '1980-11-11', 'gender' => 'Pria',      'address' => 'Jl. London',        'nuptk' => '123564789', 'username' => 'pince11', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Kurniawan, S.Pd',        'birthday' => '1970-01-01', 'gender' => 'Pria',      'address' => 'Jl. Bejo',          'nuptk' => '193846734', 'username' => 'kurni01', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Fabinho, S.Pd',          'birthday' => '1980-08-01', 'gender' => 'Pria',      'address' => 'Jl. Pepaya',        'nuptk' => '129576845', 'username' => 'Fabio08', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Nurlela, S.Pd',          'birthday' => '1980-08-18', 'gender' => 'Perempuan', 'address' => 'Jl. Cempaka Putih', 'nuptk' => '123923467', 'username' => 'nurlela08', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Nuryani, S.Pd',          'birthday' => '1980-12-11', 'gender' => 'Perempuan', 'address' => 'Jl. Kortes',        'nuptk' => '187238978', 'username' => 'nuryani12', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Siti Badriah, S.Pd',     'birthday' => '1980-06-06', 'gender' => 'Perempuan', 'address' => 'Jl. Kompas',        'nuptk' => '128947839', 'username' => 'sitibad06', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Tono Soecipto, S.Pd',    'birthday' => '1980-11-11', 'gender' => 'Pria',      'address' => 'Jl. Kembar',        'nuptk' => '128497679', 'username' => 'tonocipto1', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Vincent, S.Pd',          'birthday' => '1980-12-11', 'gender' => 'Pria',      'address' => 'Jl. Cempaka',       'nuptk' => '129758865', 'username' => 'vincent01', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Yenny Komala, S.Pd',     'birthday' => '1982-01-15', 'gender' => 'Perempuan', 'address' => 'Jl. Kulim',         'nuptk' => '128950378', 'username' => 'yenny01', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Barita, S.Kom',          'birthday' => '1985-07-06', 'gender' => 'Pria',      'address' => 'Jl. Kutilang',      'nuptk' => '127589678', 'username' => 'barita76', 'password' => Hash::make('123123')]);
        // Teacher::create(['name' => 'Arief Alfiansyah, S.Pd', 'birthday' => '1988-07-11', 'gender' => 'Pria',      'address' => 'Jl. Kodratnya',     'nuptk' => '127593765', 'username' => 'ariefalfi07', 'password' => Hash::make('123123')]);

        Teacher::create(['name' => 'Siti Nurbayar, S.Pd',    'phone' => '082290909001', 'birthday' => '1980-01-01', 'address' => 'Jl. Cempaka',       'nuptk' => '125678978', 'username' => 'siti.nurbayar', 'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Khodijah, S.Pd',         'phone' => '082290909002', 'birthday' => '1979-12-01', 'address' => 'Jl. Kurnia',        'nuptk' => '124678354', 'username' => 'khodijah01',    'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Warisman, S.Pd',         'phone' => '082290909003', 'birthday' => '1976-11-21', 'address' => 'Jl. Kartama',       'nuptk' => '120985944', 'username' => 'waris11',       'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Joko Anwar, S.Pd',       'phone' => '082290909004', 'birthday' => '1980-07-01', 'address' => 'Jl. Rambutan',      'nuptk' => '126584930', 'username' => 'jokoan80',      'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Jordan, S.Pd',           'phone' => '082290909005', 'birthday' => '1980-05-05', 'address' => 'Jl. Kempas',        'nuptk' => '129467589', 'username' => 'jordan05',      'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Pince, S.Kom',           'phone' => '082290909006', 'birthday' => '1980-11-11', 'address' => 'Jl. London',        'nuptk' => '123564789', 'username' => 'pince11',       'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Kurniawan, S.Pd',        'phone' => '082290909007', 'birthday' => '1970-01-01', 'address' => 'Jl. Bejo',          'nuptk' => '193846734', 'username' => 'kurni01',       'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Fabinho, S.Pd',          'phone' => '082290909008', 'birthday' => '1980-08-01', 'address' => 'Jl. Pepaya',        'nuptk' => '129576845', 'username' => 'Fabio08',       'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Nurlela, S.Pd',          'phone' => '082290909009', 'birthday' => '1980-08-18', 'address' => 'Jl. Cempaka Putih', 'nuptk' => '123923467', 'username' => 'nurlela08',     'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Nuryani, S.Pd',          'phone' => '082290909010', 'birthday' => '1980-12-11', 'address' => 'Jl. Kortes',        'nuptk' => '187238978', 'username' => 'nuryani12',     'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Siti Badriah, S.Pd',     'phone' => '082290909011', 'birthday' => '1980-06-06', 'address' => 'Jl. Kompas',        'nuptk' => '128947839', 'username' => 'sitibad06',     'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Tono Soecipto, S.Pd',    'phone' => '082290909012', 'birthday' => '1980-11-11', 'address' => 'Jl. Kembar',        'nuptk' => '128497679', 'username' => 'tonocipto1',    'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Vincent, S.Pd',          'phone' => '082290909013', 'birthday' => '1980-12-11', 'address' => 'Jl. Cempaka',       'nuptk' => '129758865', 'username' => 'vincent01',     'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Yenny Komala, S.Pd',     'phone' => '082290909014', 'birthday' => '1982-01-15', 'address' => 'Jl. Kulim',         'nuptk' => '128950378', 'username' => 'yenny01',       'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Barita, S.Kom',          'phone' => '082290909015', 'birthday' => '1985-07-06', 'address' => 'Jl. Kutilang',      'nuptk' => '127589678', 'username' => 'barita76',      'password' => Hash::make('123123')]);
        Teacher::create(['name' => 'Arief Alfiansyah, S.Pd', 'phone' => '082290909016', 'birthday' => '1988-07-11', 'address' => 'Jl. Kodratnya',     'nuptk' => '127593765', 'username' => 'ariefalfi07',   'password' => Hash::make('123123')]);

        // CLASSROOMS SEEDERS
        Classroom::create(['name' => '1A']);
        Classroom::create(['name' => '2A']);
        Classroom::create(['name' => '2B']);
        Classroom::create(['name' => '3A']);
        Classroom::create(['name' => '4A']);
        Classroom::create(['name' => '4B']);
        Classroom::create(['name' => '5A']);
        Classroom::create(['name' => '6A']);

        User::create(['name' => 'william', 'username' => 'admin', 'email' => 'william.jr@gmail.com', 'password' => Hash::make('admin')]);
    }
}

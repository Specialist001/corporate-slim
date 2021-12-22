<?php

use App\Domain\Contacts\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keysAvailable = Contact::$keysAvailable;

        foreach ($keysAvailable as $item) {
            DB::table('contacts')->insert([
                [
                    'key' => $item,
                    'value' => null
                ],
                [
                    'key' => 'email',
                    'value' => 'test@mail.ru',
                ],
                [
                    'key' => 'address_ru',
                    'value' => null,
                ],
                [
                    'key' => 'address_uz',
                    'value' => null,
                ],
                [
                    'key' => 'address_en',
                    'value' => null,
                ],
                [
                    'key' => 'facebook',
                    'value' => null,
                ],
                [
                    'key' => 'telegram',
                    'value' => null,
                ],
            ]);
        }
    }
}

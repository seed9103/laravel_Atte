<?php

namespace Database\Factories;

use App\Models\TimeStamp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class TimeStampFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeStamp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => function () {
                
                $name = $this->generateJapaneseName();

                $user = User::factory()->create([
                    'name' =>  $name, 
                    
                ]);
                return $user->id;
            },
            'punch_in' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'punch_out' => $this->faker->dateTimeBetween('punch_in', 'now'), 
            'total_work' => $this->faker->time(), 
            'total_break' => $this->faker->time('H:i:s')
        ];


    }
    private function generateJapaneseName()
    {
        
        $names = ['田中', '佐藤', '鈴木', '高橋', '渡辺', '伊藤', '山本', '中村', '小林', '加藤'];
        // ランダムな名前を選択
        return $this->faker->randomElement($names);
    }

}

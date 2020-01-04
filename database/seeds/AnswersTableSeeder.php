<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
                'id' => 1,
                'question_id' => 1,
                'answer' => "A few years ago I was invited to a gathering at the house of a very rich man in one of the upscale desert cities southeast of Los Angeles. For the sole purpose of parties and weekend retreats, he had built an Italianate villa on a large piece of land opening up onto the wilderness. The house was partially circumscribed by a crescent shaped infinity pool that fell off into nothingness before the great rolling hills of the Sonoran landscape. The walls retracted so that the entire dwelling seemed intimately joined with this outdoor paradise. Its interior was appointed in the most opulent manner, with imported marble floors, expensive original paintings from contemporary artists, and, most impressively for me, a massive wine cellar full of hundreds of rare wines and scotches.",
                'user_id' => 2,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 2,
                'question_id' => 2,
                'answer' => "1) Decision making, through the use of information, technology managers are able to analyze data thus making an informed decision. 2) Cost reduction, managers can embrace information to help with cost reduction. 3) Competitive advantage, a manager who adopts information technology in the workplace is able to maintain a competitive advantage. Through the use of information technology, a company is able to differentiate its products and enhance customer services.",
                'user_id' => 2,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 3,
                'question_id' => 3,
                'answer' => "HTTP middleware is a technique for filtering HTTP requests. Laravel includes a middleware that checks whether application user is authenticated or not.",
                'user_id' => 3,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 4,
                'question_id' => 4,
                'answer' => "Activation function translates the inputs into outputs. Activation function decides whether a neuron should be activated or not by calculating the weighted sum and further adding bias with it. The purpose of the activation function is to introduce non-linearity into the output of a neuron. There can be many Activation functions like: Linear or Identity, Unit or Binary Step, Sigmoid or Logistic, Tanh, ReLU and Softmax.",
                'user_id' => 4,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 5,
                'question_id' => 5,
                'answer' => "Even after a huge amount of work published, Computer vision is not solved. It works only under few constraints. One main reason for this difficulty is that the human visual system is simply too good for many tasks e.g.- face recognition. A human can recognize faces under all kinds of variations in illumination, viewpoint, expression, etc. which a computer suffers in such situations.",
                'user_id' => 5,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 6,
                'question_id' => 6,
                'answer' => "As I understood from your question, you have to see what is your view? you may use basic features to describe characters then it most likely is not linear! I mean you need to see how you would describe the data? But in general it is very, very difficult to assume that such data are linear because of human behavior on writing like hand speed, writing style, spaces between characters and a lot of other issues. Just for your info, handwriting is Chaotic phenomena which means it is not linear.",
                'user_id' => 6,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 7,
                'question_id' => 7,
                'answer' => "MySQL database server is reliable, fast and very easy to use.  This software can be downloaded as freeware and can be downloaded from the internet.",
                'user_id' => 7,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 8,
                'question_id' => 8,
                'answer' => "Docker is an open-source lightweight containerization technology. It has gained widespread popularity in the cloud and application packaging world. It allows you to automate the deployment of applications in lightweight and portable containers.",
                'user_id' => 8,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 9,
                'question_id' => 9,
                'answer' => "Yah, aku sangat mencintai kamu",
                'user_id' => 9,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 10,
                'question_id' => 10,
                'answer' => "Karena aku sudah tidak suka kamu lagi, kita putus yukk",
                'user_id' => 10,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 11,
                'question_id' => 11,
                'answer' => "Kapan-kapan pun bisa",
                'user_id' => 11,
                'answerCreateDate' => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}

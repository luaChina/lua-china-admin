<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class SendDingDing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:dingding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $client = new Client();
            $message = [
                'msgtype' => 'text',
                'text' => [
                    'content' => 'hello world'
                ]
            ];
            $response = $client->request('POST', 'https://oapi.dingtalk.com/robot/send?access_token=92c1df07719d349b06aa7a2092ba06706af4223b39b01f43c13516024e241006', [
                'headers' => ['Content-Type' => 'application/json'],
                'body'    => json_encode($message),
            ]);
            dump($response);
        } catch (\Exception $e) {
            dump($e);
        }
    }
}

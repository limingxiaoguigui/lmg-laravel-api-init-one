<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-04 15:54:23
 * @LastEditors: LMG
 * @LastEditTime: 2020-01-04 15:55:21
 */

namespace App\Jobs\Api;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveLastTokenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $model;
    protected $token;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($model, $token)
    {
        //
        $this->model = $model;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->model->last_token = $this->token;
        $this->model->save();
    }
}
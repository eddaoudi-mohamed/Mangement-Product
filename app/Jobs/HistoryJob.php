<?php

namespace App\Jobs;

use App\Models\History;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class HistoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $action;
    private $table;
    private $item;
    private $id;
    /**
     * @param Action,Table,Item,Id 
     */
    public function __construct($action, $table, $item, $id)
    {
        $this->action = $action;
        $this->table = $table;
        $this->item = $item;
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (isset($this->action, $this->table, $this->item, $this->id)) {
            History::create([
                'action_name' => $this->action, 'item_name' => $this->item,
                'table_name' => $this->table, 'id_item' => $this->id
            ]);
        }
    }
}

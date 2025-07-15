<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcastNow
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $cnt;
  public $alertType;

  public function __construct($alertType) {
    $this->alertType = $alertType;

    if ($alertType == 'cashIn') {
      $this->cnt = 1;
    }
    elseif ($alertType == 'cashOut') {
      $this->cnt = 3;
    }
    elseif ($alertType == 'alert') {
      $this->cnt = 10;
    }
  }

  public function broadcastOn(): array {
    return [
      new Channel('alert'),
    ];
  }

  public function broadcastWith(): array {
    return ['type' => $this->alertType, 'count' => $this->cnt];
  }
}

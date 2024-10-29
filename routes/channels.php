<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('user-status-changed', function () {
    return true;
});
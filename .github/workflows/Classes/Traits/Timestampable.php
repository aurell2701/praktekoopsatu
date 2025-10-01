<?php
namespace Traits;

trait Timestampable {
    public function getTimestamp(): string {
        return date("Y-m-d H:i:s");
    }
}
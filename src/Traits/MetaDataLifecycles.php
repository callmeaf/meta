<?php

namespace Callmeaf\Meta\Traits;

trait MetaDataLifecycles
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const DELETED = 'deleted';
    const RESTORED = 'restored';
    const LIFECYCLES = [self::CREATED,self::UPDATED,self::DELETED,self::RESTORED];
    private function created(?array $metaData = null): self
    {
        $this->data[self::CREATED] = $metaData;
        return $this;
    }

    private function updated(?array $metaData = null): self
    {
        $this->data[self::UPDATED] = $metaData;
        return $this;
    }

    private function deleted(?array $metaData = null): self
    {
        $this->data[self::DELETED] = $metaData;
        return $this;
    }

    private function restored(?array $metaData = null): self
    {
        $this->data[self::RESTORED] = $metaData;
        return $this;
    }

}

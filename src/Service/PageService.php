<?php

namespace VedianSoft\VedianCms\Service;

use Illuminate\Support\Collection;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class PageService extends CmsService
{
    protected Collection $rows;
    
    public function save()
    {
        
    }

    public function addRow(RowService $row)
    {
        $this->rows->push($row);
    }

    public function removeRow(RowService $row)
    {
        $this->rows->forget($row);
    }

}

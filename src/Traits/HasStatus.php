
<?php 
namespace VedianSOFT\CMS\Traits;

use InvalidArgumentException;
use VedianSOFT\CMS\Enumerations\Status;

trait HasStatus
{
    protected $status;

    public function setStatus($status)
    {
        if (!in_array($status, Status::getValues())) {
            throw new InvalidArgumentException('Invalid status');
        }

        $this->status = $status->value;
    }

    public function getStatus()
    {
        return $this->status;
    }


    public function isDraft()
    {
        return $this->status === Status::DRAFT;
    }

    public function isPublished()
    {
        return $this->status === Status::PUBLISHED;
    }

    public function isDeleted()
    {
        return $this->status === Status::DELETED;
    }

    public function isHidden()
    {
        return $this->status === Status::HIDDEN;
    }

    public function isArchived()
    {
        return $this->status === Status::ARCHIVE;
    }
}



<?php


namespace App\Repository\Contact;


use App\Helpers\Traits\Instanced;
use App\Models\ContactBock;
use App\Models\UserAuth\User;
use App\Repository\Base\BaseRepository;

class ContactBockRepository extends BaseRepository
{
    use Instanced;

    private function __construct()
    {
        $this->setModel(ContactBock::class);
    }

    public function publicContact($pagination = 10)
    {
        $items = $this->getCondition()
            ->where([['status', '=', 1], ['attach', '=', 0]])
            ->paginate($pagination)
            ->toArray();
        $data = $items['data'];

        unset($items['data']);

        return [
            'data' => $data,
            'paginate' => $items
        ];
    }

    public function userContact($userID, $pagination = 10)
    {
        $items = User::where('id', $userID)
            ->with(['contacts'])
            ->paginate($pagination)
            ->toArray();

        $data = current($items['data']);

        unset($items['data']);

        return [
            'data' => $data['contacts'],
            'paginate' => $items
        ];
    }
}

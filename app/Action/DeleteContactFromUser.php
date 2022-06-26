<?php


namespace App\Action;


use App\Models\ContactBock;
use App\Models\UserContactTree;
use Illuminate\Support\Facades\DB;

class DeleteContactFromUser
{
    public function handle($userID, $data)
    {
        $status = false;
        DB::transaction(function () use($data, $userID, &$status) {
            if (is_array($data)) {
                UserContactTree::whereIn([['user_id', $userID], ['contact_id', array_values($data)]])->delete();
                ContactBock::whereIn('id', array_values($data))
                    ->update(['attach' => 0]);
            } else {
                UserContactTree::where([['user_id', $userID], ['contact_id', $data]])->delete();
                ContactBock::where('id', $data)
                    ->update(['attach' => 0]);
            }

            $status = true;
        });

        return $status;
    }
}

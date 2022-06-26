<?php


namespace App\Action;


use App\Models\ContactBock;
use App\Models\UserContactTree;
use Illuminate\Support\Facades\DB;

class AddContactToUser
{
    public function handle($userID, $data)
    {
        $status = false;
        DB::transaction(function () use($data, $userID, &$status) {
            if (is_array($data)) {

                ContactBock::whereIn('id', array_values($data))
                    ->update(['attach' => 1]);

                $data = collect($data)->transform(function ($item) use ($userID) {
                    return [
                        'user_id' => $userID,
                        'contact_id' => $item,
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ];
                })->toArray();
                UserContactTree::insert($data);
            } else {
                ContactBock::where('id', $data)->update(['attach' => 1]);
                UserContactTree::create([
                    'user_id' => $userID,
                    'contact_id' => $data
                ]);
                $status = true;
            }
        });
        return $status;
    }
}

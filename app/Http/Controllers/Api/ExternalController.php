<?php

namespace App\Http\Controllers\Api;

use App\Models\ExternalModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use function response;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;


class ExternalController extends Controller {

    public function externalApi (Request $request) {
        // выполняем аутентификацию пользователя через JWT
        try {
            auth('api')->userOrfail();
        } catch (UserNotDefinedException $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 200);
        }

        $data = $request->all();

        if ($data['status'] == 'success') {
            foreach ($data['data'] as $itemdata) {
                $id = $itemdata['id'];
                $record = DB::table('external_services')->where('id', $id)->first();

                // если записи нет в БД, создать
                if (!$record) {
                    DB::table('external_services')->insert($itemdata);
                    continue;
                }

                switch ($record) {
                    // если поле subject пустое удаляем эту запись
                    case ($record->id && empty($itemdata['subject'])):
                        $external = ExternalModel::find($record->id);
                        $external->delete();
                        continue 2;
                    // если поле subject не изменилось, оставляем без изменения
                    case ($record->id && $record->subject == $itemdata['subject']):
                        continue 2;
                    // если есть поле subject перезапишем эту запись
                    case ($record->id && $record->subject):
                        DB::table('external_services')->where('id', $record->id)->update($itemdata);
                }
            }
        }

        return response()->json(ExternalModel::get(), '200');
    }
}

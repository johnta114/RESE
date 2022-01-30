<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reservation_date' => 'required|date|after:yesterday',
            'reservation_time' => 'required|after:"now"',
            'number_people' => 'required|between:1,8',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required' => '来店日を入力してください',
            'reservation_date.after' => '来店日は今日以降の日付を入力してください',
            'reservation_time.required' => '来店時間を入力してください',
            'reservation_time.after' => '来店時間は現在以降の時刻を入力してください',
            'number_people.required' => '来店人数を入力してください',
            'number_people.between:1,8' => '来店人中が8人を超える際は、直接店舗に連絡してください',

        ];
    }
}

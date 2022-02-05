@extends('layouts.default')

@section('content')
<div class="bg-blue-600 w-96 mb-5 mx-auto p-5 rounded shadow-md shadow-gray-500">
            <div class="mb-2">
                <i class="far fa-clock text-white"></i>
            </div>
            <table>
                <tr>
                    <th class="font-normal text-white pr-10">店名</th>
                    <td class="font-normal text-white">{{$reservation->shop->shop_name}}</td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">日付</th>
                    <td>
                        <input type="text" class="datepicker form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none " value="{{$reservation->reservation_date}}">
                    </td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">時間</th>
                    <td>
                        <input type="text"  name="reservation_time" required class="timepicker form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$reservation->reservation_time}}">
                    </td>
                </tr>
                <tr>
                    <th class="font-normal text-white pr-10">人数</th>
                    <td>
                        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="number_people" required>
                            <option hidden selected >{{$reservation->number_people}}</option>
                            <option value="1">1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                            <option value="7">7人</option>
                            <option value="8">8人</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="text-right">
                <a href="" class="text-xs tect-white bg-blue-500 text-white py-1.5 px-3 rounded">予約変更</a>
            </div>
        </div>
@endsection
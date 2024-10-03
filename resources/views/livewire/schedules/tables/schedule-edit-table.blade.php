<div>
    <div class="schedule">
        <div class="schedule-header px-6 py-3 bg-gray-50">
            Upper Office
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-5 py-2 bg-gray-50"></th>
                    @foreach ($upperWorks as $work)
                        <th scope="col" class="px-5 py-2">{{ $work->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($taskGroup as $tg)
                @php
                    $key = -1;
                @endphp
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                        Week {{ $tg->week }} <br> ({{ $tg->weekStart }} - {{ $tg->weekEnd }})
                    </td>
                    @foreach ($upperWorks as $work)
                        @php
                            $key++;
                        @endphp
                        <td class="px-1 py-1">
                            <select class="name-dropdown">
                                <option value="default">Select</option>
                                @foreach ($staffs as $person)
                                    @if ($person->gender == $work->gender || $work->gender == 'both')
                                        <option value="{{ $tg->id }}|{{ $work->id }}|{{ $person->id }}" data-color="{{ $person->color }}" {{ $tg->toArray()['task_details'][$key]['staff_id'] == $person->id ? 'selected' : '' }}>
                                            {{ $person->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

    <div class="schedule">
        <div class="schedule-header px-6 py-3 bg-gray-50">
            Lower Office
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-5 py-2 bg-gray-50"></th>
                    @foreach ($lowerWorks as $work)
                        <th scope="col" class="px-5 py-2">{{ $work->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($taskGroup as $tg)
                    @php
                        $key = 10;
                    @endphp
                    <tr class="border-b border-gray-200">
                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                            Week {{ $tg->week }} <br> ({{ $tg->weekStart }} - {{ $tg->weekEnd }})
                        </td>
                        @foreach ($lowerWorks as $work)
                            @php
                                $key++;
                            @endphp
                            <td class="px-1 py-1">
                                <select class="name-dropdown">
                                    <option value="default">Select</option>
                                    @foreach ($staffs as $person)
                                        @if ($person->gender == $work->gender || $work->gender == 'both')
                                            <option value="{{ $tg->id }}|{{ $work->id }}|{{ $person->id }}" data-color="{{ $person->color }}" {{ $tg->toArray()['task_details'][$key]['staff_id'] == $person->id ? 'selected' : '' }}>
                                                {{ $person->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <br>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

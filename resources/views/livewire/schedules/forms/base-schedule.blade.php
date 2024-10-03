<div class="relative overflow-x-auto shadow-md sm:rounded-lg schedule-container">
    <form id="taskDetailsForm" wire:submit.prevent="storeTaskDetails">
        <div class="container mx-auto p-6">
            <div class="schedule mb-8">
                <div class="schedule-header px-6 py-3 bg-gray-200 sticky top-0 z-10">
                    Upper Office
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th scope="col" class="px-5 py-2 bg-gray-200"></th>
                                @foreach ($upperWorks as $uw)
                                    <th scope="col" class="px-5 py-2">{{ $uw->name }}</th>
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
                                        Week {{ $tg['week'] }} <br> ({{ $tg['weekStart'] }} - {{ $tg['weekEnd'] }})
                                    </td>
                                    @foreach ($upperWorks as $work)
                                        @php
                                            $key++;
                                        @endphp
                                        <td class="px-1 py-1">
                                            <select class="name-dropdown border rounded-md p-1">
                                                <option value="default">Select</option>
                                                @foreach ($staffs as $person)
                                                    @if ($person->gender == $work->gender || $work->gender == 'both')
                                                        @if ($mode == 'edit')
                                                            <option
                                                                value="{{ $tg->id }}|{{ $work->id }}|{{ $person->id }}"
                                                                data-color="{{ $person->color }}"
                                                                {{ $tg->toArray()['task_details'][$key]['staff_id'] == $person->id ? 'selected' : '' }}>
                                                                {{ $person->name }}
                                                            </option>
                                                        @else
                                                            <option
                                                                value="{{ $tg['id'] }}|{{ $work->id }}|{{ $person->id }}"
                                                                data-color="{{ $person->color }}">{{ $person->name }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="schedule mb-8">
                <div class="schedule-header px-6 py-3 bg-gray-200 sticky top-0 z-10">
                    Lower Office
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th scope="col" class="px-5 py-2 bg-gray-200"></th>
                                @foreach ($lowerWorks as $lw)
                                    <th scope="col" class="px-5 py-2">{{ $lw->name }}</th>
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
                                        Week {{ $tg['week'] }} <br> ({{ $tg['weekStart'] }} - {{ $tg['weekEnd'] }})
                                    </td>
                                    @foreach ($lowerWorks as $work)
                                        @php
                                            $key++;
                                        @endphp
                                        <td class="px-1 py-1">
                                            <select class="name-dropdown border rounded-md p-1">
                                                <option value="default">Select</option>
                                                @foreach ($staffs as $person)
                                                    @if ($person->gender == $work->gender || $work->gender == 'both')
                                                        @if ($mode == 'edit')
                                                            <option
                                                                value="{{ $tg->id }}|{{ $work->id }}|{{ $person->id }}"
                                                                data-color="{{ $person->color }}"
                                                                {{ $tg->toArray()['task_details'][$key]['staff_id'] == $person->id ? 'selected' : '' }}>
                                                                {{ $person->name }}
                                                            </option>
                                                        @else
                                                            <option
                                                                value="{{ $tg['id'] }}|{{ $work->id }}|{{ $person->id }}"
                                                                data-color="{{ $person->color }}">{{ $person->name }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

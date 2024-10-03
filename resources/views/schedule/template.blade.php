<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        
    /* Adjust styles for the printable area */
    body {
        font-size: 12px; /* Adjust font size for better readability on paper */
        padding: 0; /* Remove padding to maximize printable area */
    }

    .main-header {
        text-align: center;
        margin-top: 10mm;
        font-size: 30px; /* Adjust top margin for header */
    }

    .schedule-container {
        margin: 10mm auto; /* Center the content horizontally */
    }

    .schedule {
        width: calc(100% - 20px); /* Adjust width to fit within printable area */
        margin: 10px 0;
        overflow: visible; /* Allow content to overflow into subsequent pages */
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px; /* Adjust cell padding for better spacing */
        text-align: center;
    }

    .schedule-header {
        background-color: #f0f0f0;
        font-weight: bold;
        text-align: center;
    }

    .day-cell {
        width: 50%;
    }

    .sub-column {
        display: flex;
        justify-content: space-between;
        padding: 5px;
    }

    .sub-column div {
        width: calc(50% - 10px); /* Adjust the width as needed */
    }


    </style>
</head>
<body>
    <?php

        // if (!function_exists('getColorForPerson')) {
        //     function getColorForPerson($personId) {
        //         // Start the session if it's not already started
        //         if (session_status() == PHP_SESSION_NONE) {
        //             session_start();
        //         }
        
        //         // Check if the color is already set for this person ID in the session
        //         if (isset($_SESSION['person_colors'][$personId])) {
        //             return $_SESSION['person_colors'][$personId];
        //         }
        
        //         // Generate a random RGB color
        //         $red = mt_rand(0, 255);
        //         $green = mt_rand(0, 255);
        //         $blue = mt_rand(0, 255);
            
        //         // Format the RGB values into a CSS color string
        //         $color = "rgb($red, $green, $blue)";
        
        //         // Store the color in the session for future use
        //         $_SESSION['person_colors'][$personId] = $color;
        
        //         return $color;
        //     }
        // }
    ?>
{{-- <div class="main-header">
    Duty Schedule {{ date('F', mktime(0, 0, 0, $month, 1)) }}
</div> --}}

<div class="schedule-container">
    <div class="schedule">
        <div class="schedule-header">Upper Office</div>
        <table id="schedule-table">
            <tr>
                <th></th>
                @foreach($upperWorks as $work)
                <th>{{ $work->name }}</th>
                @endforeach
            </tr>
            <tbody>
            @foreach ($taskGroup as $tg)
            <tr>
                <td>Week {{ $tg->week }} ({{ $tg->weekStart }} - {{ $tg->weekEnd }})</td>
                @foreach ($upperWorks as $work)
                    @foreach ($staffs as $person)
                        @foreach ($taskDetail as $td)
                            @if ($td->task_group_id == $tg->id && $td->work_id == $work->id && $td->staff_id == $person->id)
                                <td style="background-color: {{ $person->color }};">
                                    {{ $person->name }}
                                </td>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="schedule">
        <div class="schedule-header">Lower Office</div>
        <table id="schedule-table">
            <tr>
                <th></th>
                @foreach($lowerWorks as $work)
                    <th>{{ $work->name }}</th>
                @endforeach
            </tr>
            <tbody>
            @foreach ($taskGroup as $tg)
            <tr>
                <td>Week {{ $tg->week }} ({{ $tg->weekStart }} - {{ $tg->weekEnd }})</td>
                @foreach ($lowerWorks as $work)
                    @foreach ($staffs as $person)
                        @foreach ($taskDetail as $td)
                            @if ($td->task_group_id == $tg->id && $td->work_id == $work->id && $td->staff_id == $person->id)
                                <td style="background-color: {{ $person->color }};">
                                    {{ $person->name }}
                                </td>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</body>
</html>

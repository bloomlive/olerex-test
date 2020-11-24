@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($message))
        <div class="px-6 p-6 text-gray-700 font-semibold">{{ $message }}</div>
    @endif
    <table class="px-6 p-6">
        <thead>
        <tr>
            <th></th>
            <th>Nimetus</th>
            <th>Algus</th>
            <th>Lõpp</th>
            <th>Päev (h)</th>
            <th>Öö (h)</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if($items && count($items))
            @foreach($items as $item)
                <tr>
                    <td>
                        <a class="font-semibold text-color-red" href="{{ route('table.delete', ['shift' => $item->id]) }}">X</a>
                    </td>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>
                        {{ $item->start }}
                    </td>
                    <td>
                        {{ $item->end }}
                    </td>
                    <td class="text-center">
                        {{ $item->proportion->day }}
                    </td>
                    <td class="text-center">
                        {{ $item->proportion->night }}
                    </td>
                    <td>
                        <a href="{{ route('table.edit', ['shift' => $item->id]) }}" class="text-gray-500 sm:text-right">Muuda</a>
                    </td>
                </tr>
            @endforeach
        @endif
        <form action="{{ route('table.post') }}" method="post" name="schedule">
            @csrf

            <tr class="table__row table__row--new-item">
                <td class="font-semibold">
                    Uus:
                </td>
                <td>
                    <input type="text" name="title" placeholder="Ametikoht" required>
                </td>
                <td>
                    <input type="time" name="start" title="Algus kell" min="00:00" max="23:30" step="{{ ShiftModel::HOURS_STEP_IN_SECONDS }}" required pattern="[0-9]{2}:[0-9]{2}">
                </td>
                <td>
                    <input type="time" name="end" title="Lõpu kell" min="00:00" max="23:30" step="1800" required pattern="[0-9]{2}:[0-9]{2}">
                </td>
                <td>
                    -
                </td>
                <td>
                    -
                </td>
                <td>
                    <input type="submit" class="font-semibold" title="Pane teele" value="Salvesta!"/>
                </td>
            </tr>
        </form>
        </tbody>
    </table>
@endsection

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
    <div class="text-color-red font-semibold">{{ $message }}</div>
@endif

<div class="px-6 p-6 text-gray-700 font-semibold">Oled muutmas kirjet <strong>{{ $items[0]->title }}</strong>.</div>
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
    <form action="{{ route('table.update', ['shift' => $items[0]->id]) }}" method="post" name="schedule">
        @csrf

        <tr class="table__row table__row--new-item">
            <td class="font-semibold">
                Muuda:
            </td>
            <td>
                <input type="text" name="title" value="{{ old('title') ?? $items[0]->title }}" placeholder="Ametikoht" required>
            </td>
            <td>
                <input type="time" name="start" title="Algus kell" min="00:00" max="23:30" value="{{ old('start') ?? $items[0]->start }}" step="{{ ShiftModel::HOURS_STEP_IN_SECONDS }}" required pattern="[0-9]{2}:[0-9]{2}">
            </td>
            <td>
                <input type="time" name="end" title="Lõpu kell" min="00:00" max="23:30" step="1800" value="{{ old('end') ?? $items[0]->end }}" required pattern="[0-9]{2}:[0-9]{2}">
            </td>
            <td>
                {{ $items[0]->proportion->day }}
            </td>
            <td>
                {{ $items[0]->proportion->night }}
            </td>
            <td>
                <input type="submit" class="font-semibold" title="Pane teele" value="Salvesta!"/>
            </td>
        </tr>
    </form>
    </tbody>
</table>
@endsection

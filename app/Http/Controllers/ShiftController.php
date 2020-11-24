<?php

namespace App\Http\Controllers;

use App\Period;
use App\Rules\TwelveHoursMaxBetween;
use App\Shift;
use App\ShiftProportion;
use DateInterval;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Spatie\Period\Precision;

class ShiftController extends Controller
{

    private Period $dayPeriod;
    private Period $nightPeriod;

    /**
     * ShiftController constructor.
     */
    public function __construct()
    {
        $this->dayPeriod   = $this->makeDayPeriod();
        $this->nightPeriod = $this->makeNightPeriod();
    }

    public function index()
    {
        $items = Shift::all();

        return view('welcome', compact('items'));
    }

    public function show(Shift $shift)
    {
        return view('edit', ['items' => [$shift]]);
    }

    public function create(Request $request)
    {
        $data = $this->prepareDataForTransaction($request);
        $proportion = $this->createOrFindProportion($data);

        Shift::create(
            [
                'title'         => $data['title'],
                'start'         => $data['start'],
                'end'           => $data['end'],
                'proportion_id' => $proportion->id,
            ]
        );

        return redirect()->back()->with('message', sprintf('%s tabelisse lisatud.', $data['title']));
    }

    public function update(Shift $shift, Request $request)
    {
        $data = $this->prepareDataForTransaction($request);

        $proportion = $this->createOrFindProportion($data);

        $shift->title         = $data['title'];
        $shift->start         = $data['start'];
        $shift->end           = $data['end'];
        $shift->proportion_id = $proportion->id;

        $shift->save();

        $items = Shift::all();

        return redirect()->to(route('table'));
    }

    public function delete(Shift $shift)
    {
        $shift->delete();

        return redirect()->to(route('table'));
    }

    private function createOrFindProportion($data) {
        return $proportion = ShiftProportion::firstOrCreate(
            [
                'day'   => $data['day'],
                'night' => $data['night'],
            ]
        );
    }

    private function getDayNight($start, $end)
    {
        $periodStart = DateTimeImmutable::createFromFormat('G:i', $start);
        $periodEnd   = DateTimeImmutable::createFromFormat('G:i', $end);

        if ($periodStart->diff($periodEnd)->invert) {
            $periodEnd = $periodEnd->add(DateInterval::createFromDateString('+1 day'));
        }

        $period = Period::make(
            $periodStart,
            $periodEnd,
            Precision::MINUTE
        );

        $data['day']   = 0;
        $data['night'] = 0;

        if ($period->overlap($this->dayPeriod)->count() > 0 && ($period->overlap($this->dayPeriod)[0]->lengthInMinutes() >= 1)) {
            $data['day'] = $period->overlap($this->dayPeriod)[0]->lengthInMinutes();
        }

        if ($period->overlap($this->nightPeriod)->count() > 0 && ($period->overlap($this->nightPeriod)[0]->lengthInMinutes() >= 1)) {
            $data['night'] = $period->overlap($this->nightPeriod)[0]->lengthInMinutes();
        }

        return $data;
    }

    private function prepareDataForTransaction(Request $request) {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'start' => 'required',
                'end'   => ['required', new TwelveHoursMaxBetween('start', $request->only('start'))],
            ]
        );

        $timeData = $this->getDayNight($data['start'], $data['end']);

        return array_merge($data, $timeData);
    }

    private function makeDayPeriod(): Period
    {
        return Period::make(
            DateTimeImmutable::createFromFormat('G:i', Shift::DAY_HOURS_START),
            DateTimeImmutable::createFromFormat('G:i', Shift::DAY_HOURS_END),
            Precision::MINUTE
        );
    }

    private function makeNightPeriod(): Period
    {
        return Period::make(
            DateTimeImmutable::createFromFormat('G:i', Shift::NIGHT_HOURS_START),
            DateTimeImmutable::createFromFormat('G:i', Shift::NIGHT_HOURS_END)->add(DateInterval::createFromDateString('+1 day')),
            Precision::MINUTE
        );
    }

}

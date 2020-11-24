<?php

namespace App\Http\Controllers;

use App\Period;
use App\Rules\OneDayMaxBetween;
use App\Shift;
use App\ShiftProportion;
use DateInterval;
use Illuminate\Http\Request;
use Spatie\Period\PeriodCollection;
use Spatie\Period\Precision;

class ShiftController extends Controller
{

    private PeriodCollection $dayPeriods;
    private PeriodCollection $nightPeriods;

    /**
     * ShiftController constructor.
     */
    public function __construct()
    {
        $this->dayPeriods   = $this->makeDayPeriods();
        $this->nightPeriods = $this->makeNightPeriods();
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
        $data       = $this->prepareDataForTransaction($request);
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

    private function prepareDataForTransaction(Request $request): array
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'start' => 'required',
                'end'   => ['required', new OneDayMaxBetween('start', $request->only('start'))],
            ]
        );

        $timeData = $this->getDayNight($data['start'], $data['end']);

        return array_merge($data, $timeData);
    }

    private function getDayNight($start, $end): array
    {
        $periodStart = \DateTime::createFromFormat('G:i', $start);
        $periodEnd   = \DateTime::createFromFormat('G:i', $end);

        $oneDay = DateInterval::createFromDateString('+1 day');

        if ($periodStart->diff($periodEnd)->invert) {
            $periodEnd = $periodEnd->add($oneDay);
        }

        if ($periodStart == $periodEnd) {
            $periodEnd->add($oneDay);
        }

        $period = Period::make(
            $periodStart,
            $periodEnd,
            Precision::MINUTE
        );

        $data['day']   = $this->getOverlap($this->dayPeriods, $period);
        $data['night'] = $this->getOverlap($this->nightPeriods, $period);

        return $data;
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

        return redirect()->to(route('table'));
    }

    public function delete(Shift $shift)
    {
        $shift->delete();

        return redirect()->to(route('table'));
    }

    private function getOverlap(PeriodCollection $collection, Period $period)
    {
        $returnValue = 0;

        foreach ($collection as $item) {
            if ($period->overlapSingle($item) !== null) {
                $returnValue += $period->overlapSingle($item)->lengthInMinutes();
            }
        }

        return $returnValue;
    }

    private function createOrFindProportion($data): ShiftProportion
    {
        return $proportion = ShiftProportion::firstOrCreate(
            [
                'day'   => $data['day'],
                'night' => $data['night'],
            ]
        );
    }


    private function makeDayPeriods(): PeriodCollection
    {
        return new PeriodCollection(
            Period::make(
                \DateTime::createFromFormat('G:i', Shift::DAY_HOURS_START),
                \DateTime::createFromFormat('G:i', Shift::DAY_HOURS_END),
                Precision::MINUTE
            ),
            Period::make(
                \DateTime::createFromFormat('G:i', Shift::DAY_HOURS_START)->add(DateInterval::createFromDateString('1 day')),
                \DateTime::createFromFormat('G:i', Shift::DAY_HOURS_END)->add(DateInterval::createFromDateString('1 day')),
                Precision::MINUTE
            )
        );
    }

    private function makeNightPeriods(): PeriodCollection
    {
        return new PeriodCollection(
            Period::make(
                \DateTime::createFromFormat('G:i', Shift::NIGHT_HOURS_START)->sub(DateInterval::createFromDateString('1 day')),
                \DateTime::createFromFormat('G:i', Shift::NIGHT_HOURS_END),
                Precision::MINUTE
            ),
            Period::make(
                \DateTime::createFromFormat('G:i', Shift::NIGHT_HOURS_START),
                \DateTime::createFromFormat('G:i', Shift::NIGHT_HOURS_END)->add(DateInterval::createFromDateString('1 day')),
                Precision::MINUTE
            )
        );
    }

}

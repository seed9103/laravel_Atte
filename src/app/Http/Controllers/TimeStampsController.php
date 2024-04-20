<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeStamp;
use App\Models\BreakTime;
use Illuminate\Http\Request;


class TimeStampsController extends Controller
{


  
    public function index()
    {
        return view('index');
    }

    public function punchIn()
    {
        $user = Auth::user();
        TimeStamp::create([
            'user_id' => $user->id,
            'punch_in' => now()
        ]);

        return redirect()->back();
    }

    public function punchout()
    {
        $user = Auth::user();

        // 直近の出勤記録を取得
        $lastRecord = TimeStamp::where('user_id', $user->id)
            ->whereNull('punch_out')
            ->latest()
            ->first();

        if ($lastRecord) {
            // 退勤時刻の記録
            $punchOutTime = now();

            // 直近の休憩記録を取得
            $breaks = BreakTime::where('user_id', $user->id)
                ->whereNotNull('break_end')
                ->whereBetween('break_start', [$lastRecord->punch_in, $punchOutTime])
                ->get();

            // 休憩時間を合計
            $totalBreakDuration = 0;
            foreach ($breaks as $break) {
                $start = Carbon::parse($break->break_start);
                $end = Carbon::parse($break->break_end);
                $totalBreakDuration += $end->diffInSeconds($start);
            }

            // 出勤記録の total_break カラムに合計休憩時間を記録
            $lastRecord->update(['total_break' => $totalBreakDuration]);

            // 出勤時刻から退勤時刻を取得
            $punchIn = Carbon::parse($lastRecord->punch_in);
            $punchOut = Carbon::parse($punchOutTime);

            // 勤務時間を計算し、休憩時間を引く
            $actualWorkDuration = $punchOut->diffInSeconds($punchIn) - $totalBreakDuration;

            // 実際の勤務時間を出勤記録の `total_work` カラムに設定
            $lastRecord->update(['total_work' => $actualWorkDuration]);

            // 退勤時間を記録
            $lastRecord->update(['punch_out' => $punchOutTime]);
        }

        return redirect()->back();
    }

    public function startBreak()
    {
        $user = Auth::user();

        // 新しい休憩を記録
        $breakTime = new BreakTime();
        $breakTime->user_id = $user->id;
        $breakTime->break_start = now();
        $breakTime->save();

        return redirect()->back();
    }

    public function endBreak()
    {
        $user = Auth::user();

        // 直近の休憩を取得
        $lastBreak = BreakTime::where('user_id', $user->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        if ($lastBreak) {
            // 休憩終了時刻を記録
            $lastBreak->break_end = now();

            // 休憩時間を計算して保存
            $start = Carbon::parse($lastBreak->break_start);
            $end = Carbon::parse($lastBreak->break_end);
            $breakTime = $end->diffInSeconds($start);
            $lastBreak->break_time = $breakTime;

            $lastBreak->save();
        }

        return redirect()->back();
    }

    
     
    

    

    public function attendance()
    {

        $timeStamps = TimeStamp::Paginate(5);

        return view('attendance', compact('timeStamps'));
    }

}

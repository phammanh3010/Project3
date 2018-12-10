<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use \DateTime;
use \DateInterval;
use \DB;
use \View;
use \Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Schema::defaultStringLength(191);
        View::composer('*', function($view) {

            $curent_date = new DateTime();
            $date_remind = new DateTime();
            $curdate_fogot = new DateTime();
            $date_remind ->add(new DateInterval('P3D'));
            $date_remind = $date_remind ->format('Y-m-d H:i:s');
            // Carbon::now()->toDateString()
            $noticfications = [];
            $group_notices = DB::table('student')
                            ->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                            ->join('group', 'group.id_group', '=', 'group_student.id_group')
                            ->join('group_scheduel', 'group.id_group', '=', 'group_scheduel.id_group')
                            ->join('content_group_scheduel', 'group_scheduel.id_scheduel', '=', 'content_group_scheduel.id_scheduel')
                            ->select('group.*', 'content_group_scheduel.*')
                            ->where('content_group_scheduel.time_deadline', '<', $date_remind)
                            ->where('content_group_scheduel.time_deadline', '>=', $curent_date)
                            ->where('student.username', '=', '20152128')
                            ->get();

            foreach ($group_notices as $value) {
                $require = DB::table('group')->join('document', 'group.id_group', '=', 'document.id_group')
                                ->select('document.*')
                                ->where('group.id_group','=', $value->id_group)
                                ->where('document.type', '=', $value->require)->get();
                // add notification to array
                if($require->count() == 0) {
                    array_push($noticfications, $value);
                }
            }           
            $sub_notice = DB::table('student')
                                ->join('group_student', 'student.id_student', '=', 'group_student.id_student')
                                ->join('group', 'group.id_group', '=', 'group_student.id_group')
                                ->join('subject', 'group.id_subject','=','subject.id_subject')
                                ->join('subject_scheduel', 'subject.id_subject', '=', 'subject_scheduel.id_subject')
                                ->join('content_sub_scheduel', 'subject_scheduel.id_subject_scheduel', '=', 'content_sub_scheduel.id_subject_scheduel')
                                ->select('group.*', 'content_sub_scheduel.*')
                                ->where('content_sub_scheduel.time_deadline', '<', $date_remind)
                                ->where('content_sub_scheduel.time_deadline', '>=', $curent_date)
                                ->where('student.username', '=', '20152128')->get();
                
            foreach ($sub_notice as $value) {
                $require = DB::table('group')->join('document', 'group.id_group', '=', 'document.id_group')
                                ->select('document.*')
                                ->where('group.id_group','=', $value->id_group)
                                ->where('document.type', '=', $value->require)->get();
                // add notification to array
                if($require->count() == 0) {
                    array_push($noticfications, $value);
                }
            }
            $view->with('noticfications', $noticfications);
        // Request::session()->put('count_notifi', count($noticfications));
        // View::share('noticfications', $noticfications);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

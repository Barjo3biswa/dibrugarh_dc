<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\admin\Cast;
use App\Models\admin\content;
use App\Models\admin\course;
use App\Models\admin\job;
use App\Models\admin\Notification;
use App\Models\admin\Qualification;
use App\Models\admin\training;
use App\Models\applicant;
use App\Models\Attachment;
use App\Models\Enquiry;
use App\Models\sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use \PDF;
use PHPUnit\Framework\Error\Notice;

class CourseController extends Controller
{
    public function index(){
        $trainings= training::with('department','course','scheme')->where('active_status',1)->orderby('start_date','desc')->get();
        return view('dibrugarh.course-details',compact('trainings'));
    }

    public function ViewCourseDetails(Request $request){
        $data=Crypt::decryptString($request->id);
        $coursedtl=training::with('department','course','scheme')->where('id',$data)->first();
        return view('dibrugarh.course-event',compact('coursedtl'));
    }

    public function ApplyOrReqister(Request $request){
        $data=Crypt::decryptString($request->id);
        $coursedtl=training::where('id',$data)->first();
        $qualification=Qualification::all();
        $cast=Cast::all();
        return view('dibrugarh.course-registration',compact('coursedtl','qualification','cast'));
    }

    public function ApplyOrLogin(Request $request){
        return view('dibrugarh.course-login');
    }

    public function Reqister(Request $request){
        // dd($request->all());
        $manual_validation = applicant::where(['training_id'=>$request->Training_id,'app_email'=>$request->email])->first();
        // dd($manual_validation);
        if($manual_validation!=null){
            return redirect()->route('course_dtl')->with('status','You Have Already Applied For This Course');
        }
        $maxid=applicant::max('id');
        if($maxid==null){
            $suffix='00001';
        }else{
            $maxid++;
            $suffix='';
            $numl = strlen((string)$maxid);
            for($i=5;$i>=0;$i--){
                if($i==$numl){
                    $suffix.=$maxid;
                    break;
                }else{
                    $suffix.=0;
                }
            }
        }
        // dd($maxid);
        Db::beginTransaction();
        try{
            $appId='DCDIB'.date("Y").$suffix;
            if ($request->hasFile('voter_card')) {
                $path="";
                $path = public_path() . '/images/applicant_attachments/voter_card';
                $file=$request->file('voter_card');
                $imageName = date('dmy').'voter_card'.$appId.'.'.$file->getClientOriginalExtension() ;
                $file->move($path, $imageName);
                $path = '/images/applicant_attachments/voter_card/' . $imageName;
                $attachment1=[
                    'reg_no'       => $appId,
                    'att_name'     => 'voter_card',
                    'att_location' => $path,
                ];
                // dd($attachment1);
                Attachment::insert($attachment1);
            }

            if ($request->hasFile('aadhar_card')) {
                $path="";
                $path = public_path() . '/images/applicant_attachments/aadhar_card';
                $file=$request->file('aadhar_card');
                $imageName = date('dmy') . 'aadhar_card' . $appId .'.'. $file->getClientOriginalExtension() ;
                $file->move($path, $imageName);
                $path = '/images/applicant_attachments/aadhar_card/' . $imageName;
                $attachment2=[
                    'reg_no'       => $appId,
                    'att_name'     => 'aadhar_card',
                    'att_location' => $path,
                ];
                Attachment::insert($attachment2);
            }

            if ($request->hasFile('pan_card')) {
                $path="";
                $path = public_path() . '/images/applicant_attachments/pan_card';
                $file=$request->file('pan_card');
                $imageName = date('dmy') . 'pan_card' . $appId .'.'. $file->getClientOriginalExtension() ;
                $file->move($path, $imageName);
                $path = '/images/applicant_attachments/pan_card/' . $imageName;
                $attachment3=[
                    'reg_no'       => $appId,
                    'att_name'     => 'pan_card',
                    'att_location' => $path,
                ];
                Attachment::insert($attachment3);
            }

            if ($request->hasFile('resume')) {
                $path="";
                $path = public_path() . '/images/applicant_attachments/resume';
                $file=$request->file('resume');
                $imageName = date('dmy') . 'resume.' . $appId .'.'. $file->getClientOriginalExtension() ;
                $file->move($path, $imageName);
                $path = '/images/applicant_attachments/resume/' . $imageName;
                $attachment4=[
                    'reg_no'       => $appId,
                    'att_name'     => 'resume',
                    'att_location' => $path,
                ];
                Attachment::insert($attachment4);
            }
            $department_id=training::where('training_id',$request->Training_id)->first();
            $data=[
                'application_id'    =>$appId,
                'department_id'     =>$department_id->department_code,
                'training_id'       =>$request->Training_id,
                'training_name'     =>$request->Training_id,
                'app_name'          =>$request->name,
                'app_father_name'   =>$request->father_name,
                'app_mother_name'   =>$request->mother_name,
                'app_email'         =>$request->email,
                'app_phone'         =>$request->mobile,
                'app_dob'           =>$request->dob,
                'app_qualification' =>$request->qualification,
                'app_gender'        =>$request->gender,
                'p_vill'            =>$request->p_village,
                'p_district'        =>$request->p_district,
                'p_state'           =>$request->p_state,
                'p_zip'             =>$request->p_zip,
                'p_po'              =>$request->p_po,
                'p_ps'              =>$request->p_ps,
                'per_vill'          =>$request->per_village,
                'per_district'      =>$request->per_district,
                'per_state'         =>$request->per_state,
                'per_zip'           =>$request->per_zip,
                'per_po'            =>$request->per_po,
                'per_ps'            =>$request->per_ps,
                'category'          =>$request->category,
            ];
            applicant::insert($data);
            DB::commit();
        } catch ( \Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error','Something Went Wrong Please Try Again');
        }
        $pdf=$this->fun_pdf($appId);
        return $pdf->download($appId.'.pdf');
        // return redirect()->route('course_dtl')->with('status',$pdf);
    }

    public function fun_pdf($id){
        $applications=applicant::with('department')->where('application_id',$id)->first();
        $pdf = \PDF::loadView('both-end.download-show',array('applications' => $applications)); //load view page array('salesorder' => $salesorder,)
        return $pdf;
    }

    public function showHomepage()
    {
        $sector=sector::all();
        $course=course::all();
        $today=date('Y-m-d');
        $upcomingevents=training::where(DB::raw("str_to_date(start_date, '%Y-%m-%d')"), '>', $today)->get();
        $notice = Notification::with('noticationtype')->where('status',1)->orderby('created_at','desc')->get();
        $jobs   = job::where('status',1)->get();
        $about = content::first();
        $paragraph=$this->ExtractFirstPara($about->about_us);

        return view('dibrugarh.index',compact('sector','course','upcomingevents','notice','jobs','paragraph'));
    }

    public function ExtractFirstPara($paragraph)
    {
        $words = explode("</p>", $paragraph);
        return $words[0];
    }

    public function SearchCourses(Request $request)
    {
        $trainings= training::with('department','course','scheme')->where('active_status',1)
                            ->when($request->sector,function($query) use($request){
                                return $query->where('trainings.sector_id',$request->sector);
                                })
                            ->when($request->courses,function($query) use($request){
                                return $query->where('trainings.course_id',$request->courses);
                                })
                            ->orderby('start_date','desc')->get();
        return view('dibrugarh.course-details',compact('trainings'));
    }

    public function NoticeBoard(Request $request)
    {
        if($request->has('id')){
            $notice=Notification::with('noticationtype')->where(['id'=>$request->id,'status'=>1])->first();
        }else{
            $notice="";
        }
        // dd($notice);
        $noticepartii = Notification::with('noticationtype')->where('status',1)->where('id','!=',$request->id)->orderby('created_at','desc')->get();
        return view('dibrugarh.view-notification',compact('notice','noticepartii'));
        // dd($notice);
    }

    public function SearchJobs(Request $request)
    {
        $job=job::where(['id'=>$request->id,'status'=>1])->first();
        // dd($job);
        $jobs_real = job::where('status',1)
                    ->when($request->id,function($query) use($request){
                        return $query->where('id','!=',$request->id);
                        })
                    ->orderby('created_at','desc')->get();
        return view('dibrugarh.view-jobs',compact('job','jobs_real'));
    }

    public function AboutDib(Request $request)
    {
        $content=content::first();
        return view('dibrugarh.about-dibrugarh',compact('content'));
    }

    public function AboutUs(Request $request)
    {
        $content=content::first();
        return view('dibrugarh.about',compact('content'));
    }

    public function JobRequest(Request $request)
    {
        // dd("Ok");
        $qualification=Qualification::get();
        return view('dibrugarh.request-for-job',compact('qualification'));
    }

    public function JobRequestSave(Request $request)
    {
        if ($request->hasFile('attachment')) {
            $path="";
            $path = public_path() . '/images/attachment/job/';
            $file=$request->file('attachment');
            $imageName = $request->training_code.date('dmyhis') .'attachment.'.$file->getClientOriginalExtension();
            $file->move($path, $imageName);
            $path = url('/') . '/images/attachment/job/' . $imageName;
        }
        $id=job::max('id');
        if($id==null){
            $id=0;
        }
        $data=[
            'job_id'        => 'job-'.++$id,
            'company_name'  => $request->company_name,
            'job_title'     => $request->job_title,
            'description'   => $request->description,
            'no_of_post'    => $request->no_of_post,
            'location'      => $request->location,
            'eligibility'   => $request->qualification,
            'experience'    => $request->location,
            'attachments'   => $path ?? "",
            'date'          => date('Y-m-d'),
            'job_type'      => $request->comp_type,
            'comp_reg_no'   => $request->company_reg_no,
            'mobile'        => $request->phone,
            'email'         => $request->email_address,
        ];

        job::create($data);
        return redirect()->route('employee_corner')->with('status', 'successfully Added Job Request... Wait For Administrator To Approve Your Request');
    }

    public function Enquiry(Request $request)
    {
        $data=[
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'message'  => $request->message,
        ];
        Enquiry::create($data);
        return redirect()->back()->with('success','Successfully send messages');
    }

    public function ShowJobViaPopUp(Type $var = null)
    {
        # code...
    }
}

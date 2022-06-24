<style>
    .bold {
        font-weight: bold;
    }
    table td, table th{
        padding: 7px;
        /* border-color: #ddd; */
    }
    table{
        /* border-color: #ddd; */
    }
    *{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
    }
</style>

<div class="container" id="page-content">
    <div class="row">
        <table width="100%">
            <tbody >
                <tr class="text-center">
                    <td width="20%" class="padding-xs">
                        <img style="max-width: 100px" width="100" class="avatar avatar-xxl"
                            src="{{ asset('dibrugarh') }}/img/assam-govt-logo.svg.png">
                    </td>
                    <td class="padding-xs" style="text-align: center;">
                        <div class="card-body text-center">
                            <h1 style="font-size:20px;text-align:center">Office of The Deputy Commissioner,Dibrugarh</h1>
                            {{-- {{$applications}} --}}
                            <h2 style="font-size:15px;text-align:center">{{$applications['training_name']}} Trainings Under {{$applications['department']['department_name']}} Department</h2>
                        </div>
                    </td>
                    <td width="20%" class="padding-xs">
                    </td>
                </tr>

            </tbody>
        </table>
    </div><br/><br/>
    <div class="row">
        <div class="col-sm-12">
            {{-- <h2>Personal Details</h2> --}}
            <table class="table table-bordered "  width="100%" {{-- border="1px solid" --}} style="border-collapse: collapse;">
                <tbody style="border: thin solid black;">
                    <tr>
                        <td class="padding-xs bold" colspan="4">Applicants Details</td>
                    </tr>
                    <tr>
                        <td class="padding-xs">Registration Number</td>
                        <td class="padding-xs bold" colspan="3">{{$applications['application_id']}}</td>
                    </tr>
                    <tr>
                        <td class="padding-xs">Training Name</td>
                        <td class="padding-xs bold">{{$applications['training_name']}}</td>
                        <td class="padding-xs">Department Name</td>
                        <td class="padding-xs bold">{{$applications['department']['department_name']}}</td>
                    </tr>

                    <tr>
                        <td class="padding-xs">Preasent&nbsp;Add.</td>
                        <td class="padding-xs bold">
                            Vill/Town:  {{$applications['p_vill']}} </br>
                            PS: {{$applications['p_ps']}} </br>
                            PO: {{$applications['p_po']}} </br>
                            Dist: {{$applications['p_district']}} </br>
                            State: {{$applications['p_state']}} -  {{$applications['p_zip']}}
                        </td>
                        <td class="padding-xs">Permanent&nbsp;Add.</td>
                        <td class="padding-xs bold">
                            Vill/Town:  {{$applications['per_vill']}} </br>
                            PS: {{$applications['per_ps']}} </br>
                            PO: {{$applications['per_po']}} </br>
                            Dist: {{$applications['per_district']}} </br>
                            State: {{$applications['per_state']}} -  {{$applications['p_zip']}}
                        </td>
                    </tr>
                    <tr>
                        <td class="padding-xs">Full Name</td>
                        <td class="padding-xs bold">{{$applications['app_name']}}</td>
                        <td class="padding-xs">Date of Birth</td>
                        <td class="padding-xs bold">{{$applications['app_dob']}}</td>

                    </tr>
                    <tr>
                        <td class="padding-xs">Gender</td>
                        <td class="padding-xs bold ">{{$applications['app_gender']}}</td>
                        <td class="padding-xs">Religion</td>
                        <td class="padding-xs bold">NA</td>
                    </tr>
                    <tr>
                        <td class="padding-xs">Father's Name</td>
                        <td class="padding-xs bold">{{$applications['app_father_name']}}</td>
                        <td class="padding-xs">Mother's Name</td>
                        <td class="padding-xs bold">{{$applications['app_mother_name']}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table"  width="100%">
            </table>
        </div>
    </div>
</div>

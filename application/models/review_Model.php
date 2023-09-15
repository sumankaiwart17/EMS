<?php



class Review_Model extends CI_Model

{



    public function getreviews()

    {

        $q = $this->db->select('*')

            ->from('hospital_review_user')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = hospital_review_user.email_id')

            ->order_by('hospital_review_user.datetime', 'desc')

            ->get();
        //   echo"<pre>";
        //   print_r($q);
        //   die;
        $q1 = $this->db->select('*')

            ->from('department_review_user')

            ->join('departments', 'departments.dept_id = department_review_user.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = department_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = department_review_user.email_id')

            ->order_by('department_review_user.datetime', 'desc')

            ->get();

        $q2 = $this->db->select('*')

            ->from('doctor_review_user')

            ->join('doctor_details', 'doctor_details.doc_id = doctor_review_user.doc_id')

            ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

            ->join('user_details', 'user_details.email_id = doctor_review_user.email_id')

            ->order_by('doctor_review_user.datetime', 'desc')

            ->get();

        $q3 = $this->db->select('*')

            ->from('treatment_review_user')

            ->join('treatments', 'treatments.treat_id = treatment_review_user.treat_id')

            ->join('hospital_details', 'hospital_details.hos_id = treatment_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = treatment_review_user.email_id')

            ->order_by('treatment_review_user.datetime', 'desc')

            ->get();

        if ($q->num_rows() || $q1->num_rows() || $q2->num_rows() || $q3->num_rows()) {



            $data = array(

                'hosRev' => $q->result_array(),

                'depRev' => $q1->result_array(),

                'docRev' => $q2->result_array(),

                'treatRev' => $q3->result_array()

            );

            return $data;
        } else {

            return false;
        }
    }

    /* Filter function */

    public function filterDoc($hos_id, $dept_id, $doc_name)

    {

        $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

            ->from('doctor_details')

            ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

            // ->where($search)

            ->group_by('doctor_review_user.doc_id')

            ->order_by('star_rating', 'desc')

            ->get();

        if (isset($hos_id) && !isset($dept_id) && !isset($doc_id)) {



            $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

                ->from('doctor_details')

                ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

                ->where_in('doctor_details.hos_id', $hos_id)

                ->group_by('doctor_review_user.doc_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } else if (!isset($hos_id) && !isset($dept_id) && ($doc_name)) {

            // $search = array(

            //     'doctor_details.specialization' => $dept_id

            // );

            $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

                ->from('doctor_details')

                ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

                ->where_in('doctor_details.doc_name', $doc_name)

                ->group_by('doctor_review_user.doc_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } else if (!isset($hos_id) && isset($dept_id) && !isset($doc_name)) {

            // $search = array(

            //     'doctor_details.specialization' => $dept_id

            // );

            $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

                ->from('doctor_details')

                ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

                ->where_in('doctor_details.specialization', $dept_id)

                ->group_by('doctor_review_user.doc_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } else if (isset($hos_id) && isset($dept_id) && ($doc_name)) {

            // $search = array(

            //     'doctor_details.hos_id' => $hos_id,

            //     'doctor_details.specialization' => $dept_id

            // );

            $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

                ->from('doctor_details')

                ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

                ->where_in('doctor_details.hos_id', $hos_id)

                ->where_in('doctor_details.specialization', $dept_id)

                ->where_in('doctor_details.doc_name', $doc_name)

                ->group_by('doctor_review_user.doc_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }

        // if (isset($hos_id) || isset($dept_id)) {

        //     $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, count(doctor_review_user.star_rating) as review_count')

        //         ->from('doctor_details')

        //         ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

        //         ->where_in($search)

        //         ->group_by('doctor_review_user.doc_id')

        //         ->order_by('star_rating', 'desc')

        //         ->get();

        // }

        $output = '';

        if ($docData->num_rows()) {

            $docData = $docData->result_array();

            $reviews = '';

            foreach ($docData as $x) {

                if ($x['review_count'] > 1) {

                    $reviews = $x['review_count'] . ' reviews';
                } else {

                    $reviews = $x['review_count'] . ' review';
                }



                $ontimecount = number_format(($x['star_rating_ontime'] * 20), 0);



                if ($ontimecount >= 75) :

                    $ontimeshow = '<span class="badge badge-success position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-up"></i>

                                    ' . $ontimecount . ' % on time</span>';

                elseif ($ontimecount > 40 && $ontimecount < 75) :

                    $ontimeshow = '<span class="badge badge-warning position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-up"></i>

                                    ' . $ontimecount . ' % on time</span>';

                elseif ($ontimecount <= 40) :

                    $ontimeshow = '<span class="badge badge-danger position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-down"></i>

                                    ' . $ontimecount . ' % on time</span>';

                endif;



                $output .= '<div class="col-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 15px; padding-left: 5px; padding-right: 5px">

                <div class="card p-2 card-body">

                    <div class="row">

                        <img src="' . $x['picture']

                    . '" class="img-thumbnail float-left rounded-square ml-3" style="height:90px;width:80px; border:none;" alt="">

                        ' . $ontimeshow . '



                        <div class="col-6 m-0 p-1">

                            <h5 style="font-size:18px;"><a href="' . site_url('mainController/viewDoctor/' . $x['doc_id'])

                    . '" class="text-info">' . $x['doc_name']

                    . '</a> <span class="badge p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="border-radius: 50px; font-size: 8px;"><i class="fas fa-check-circle text-white"></i> Verified</span></h5>

          <p class="m-0 p-0" style="font-size:14px;"> <small style="" class="text-muted">'.$x['degree'].'over'.$x['experience'].'years of experience</small></p>

                          


                        </div>

                        <div class="col-3 mt-3 pr-3 row justify-content-center">

                            <h6 class="text-danger text-center p-0 m-0 mt-2" style="font-size:12px;">' . $reviews . '</h6>

                            <p class="p-0 m-0" style="font-size:12px;">' . round($x['star_rating'], 1)

                    . ' out of 5</p>

                            <div id="rateYo' . $x['doc_id']

                    . '" class="m-0 p-0"></div>



                            <a href="" style="font-size:10px;" class="btn btn-danger member mt-3 p-1" data-toggle="modal" data-target="#modal' . $x['doc_id']

                    . '">Book Appointment</a>

                        </div>

                    </div>

                </div>

            </div>

            <script>

        $(function() {

                $("#rateYo' . $x['doc_id'] . '").rateYo({

                    rating: ' . $x['star_rating'] . ',

                    readOnly: true,

                    starWidth: "15px",

                    spacing: "2px"

                });

        });

    </script>';
            }
        }

        return $output;
    }


    public function filterTopHos($dept_id, $hos_name)

    {

        $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

            ->from('hospital_details')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

            // ->where($search)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('star_rating', 'desc')

            ->get();

        if (isset($dept_id) && !isset($hos_name)) {



            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->join('hospital_departments', 'hospital_departments.hos_id=hospital_details.hos_id')

                ->where_in('hospital_departments.dept_id', $dept_id)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } elseif (isset($hos_name) && !isset($dept_id)) {

            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->where_in('hospital_details.hos_name', $hos_name)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }
        $output = '';

        if ($hosData->num_rows()) {

            $hosData = $hosData->result_array();

            $reviews = '';

            $rank = 1;

            $sup = '';

            foreach ($hosData as $x) {

                if ($rank == 1) {

                    $sup = 'st';
                } else if ($rank == 2) {

                    $sup = 'nd';
                } else if ($rank == 3) {

                    $sup = 'rd';
                } else if ($rank <= 10) {

                    $sup = 'th';
                }

                if ($x['review_count'] > 1) {

                    $reviews = $x['review_count'] . ' reviews';
                } else {

                    $reviews = $x['review_count'] . ' review';
                }

                $output .= '<li class="booking-card" style="background-image: url(' . base_url('userUploads/' . $x['logo']) . ');background-repeat: no-repeat;background-position: 0px 0px;background-size: 220px 220px;">';



                if ($rank <= 10) {

                    $output .= '<div style="font-style: italic; font-family: Trebuchet MS; font-size:large;" class="ribbon-' . $rank . ' expandable">' . $rank . '<sup>' . $sup . '</sup></div>';
                }







                $output .= '<div class="book-container">

                    <div class="content">

                        <a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '" class="btn">View Details</a>

                    </div>

                </div>

                <div class="informations-container">

                    <h2 class="title"><a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '">' . $x['hos_name'] . '</a></h2>

                    <div class="d-flex pt-2 justify-content-between">

                        <div class="my-auto">

                            <p class="text-center"><strong style="font-size: 15px;">' . $x['review_count'] . ' Reviews</strong>' . '</p>

                        </div>

                        <div class="">

                            <span class="text-center">

                                <div id="rateYo' . $x['hos_id'] . '"></div>

                            </span>

                            <p class="text-center mb-1">' . round($x['star_rating'], 1) . ' out of 5' . '</p>

                        </div>

                    </div>

                    <div class="more-information row">

                        <p class="sub-title mb-1 col-12">Address: ' . $x['city'] . '</p>

                        <p class="price col-12 mt-0">Contact: ' . $x['phone'] . '</p>

                        <div class=" mt-0 mx-auto">

                            <form action="' . site_url('appointment_Controller/hosAppointment') . '" method="post">

                                <a href="' . site_url('mainController/viewHospital/' . $x['hos_id']) . '" class="btn btn-sm mb-1 btn-primary btn-block">View Profile</a>

                                <button type="submit" name="submit" class="btn btn-sm btn-danger btn-block">Book Appointment</button>

                            </form>

                        </div>

                    </div>

                </div>

            </li>

            <script>

        $(function() {

                $("#rateYo' . $x['hos_id'] . '").rateYo({

                    rating: ' . $x['star_rating'] . ',

                    readOnly: true,

                    starWidth: "15px",

                    spacing: "2px"

                });

        });

    </script>';

                $rank++;
            }
        }

        return $output;
    }



    public function filterDocName($search)
    {

      

     if (isset($search)) {

            $s = '%' . $search . '%';


        $docData = $this->db->select('doctor_details.*, avg(doctor_review_user.star_rating) as star_rating, avg(doctor_review_user.star_rating_ontime) as star_rating_ontime, count(doctor_review_user.star_rating) as review_count')

            ->from('doctor_details')

            ->join('doctor_review_user', 'doctor_review_user.doc_id = doctor_details.doc_id')

            ->where('doctor_details.doc_name like', $s)

            ->group_by('doctor_review_user.doc_id')

            ->order_by('star_rating', 'desc')

            ->get();
    }
   

     $output = '';

        if ($docData->num_rows()) {

            $docData = $docData->result_array();

            $reviews = '';

            foreach ($docData as $x) {

                if ($x['review_count'] > 1) {

                    $reviews = $x['review_count'] . ' reviews';
                } else {

                    $reviews = $x['review_count'] . ' review';
                }



                $ontimecount = number_format(($x['star_rating_ontime'] * 20), 0);



                if ($ontimecount >= 75) :

                    $ontimeshow = '<span class="badge badge-success position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-up"></i>

                                    ' . $ontimecount . ' % on time</span>';

                elseif ($ontimecount > 40 && $ontimecount < 75) :

                    $ontimeshow = '<span class="badge badge-warning position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-up"></i>

                                    ' . $ontimecount . ' % on time</span>';

                elseif ($ontimecount <= 40) :

                    $ontimeshow = '<span class="badge badge-danger position-absolute ml-4 p-1" style="border-radius:50px; margin-top:95px; font-size:8px;"><i class="fas fa-thumbs-down"></i>

                                    ' . $ontimecount . ' % on time</span>';

                endif;



                $output .= '<div class="col-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 15px; padding-left: 5px; padding-right: 5px">

                <div class="card p-2 card-body">

                    <div class="row">

                        <img src="' . $x['picture']

                    . '" class="img-thumbnail float-left rounded-square ml-3" style="height:90px;width:80px; border:none;" alt="">

                        ' . $ontimeshow . '



                        <div class="col-6 m-0 p-1">

                            <h5 style="font-size:18px;"><a href="' . site_url('mainController/viewDoctor/' . $x['doc_id'])

                    . '" class="text-info">' . $x['doc_name']

                    . '</a> <span class="badge p-1 badge-success position-absolute ml-1 mt-1 text-white font-weight-bold" style="border-radius: 50px; font-size: 8px;"><i class="fas fa-check-circle text-white"></i> Verified</span></h5>

                            <p class="m-0 p-0" style="font-size:14px;"> <small style="" class="text-muted">of experience</small></p>




                        </div>

                        <div class="col-3 mt-3 pr-3 row justify-content-center">

                            <h6 class="text-danger text-center p-0 m-0 mt-2" style="font-size:12px;">' . $reviews . '</h6>

                            <p class="p-0 m-0" style="font-size:12px;">' . round($x['star_rating'], 1)

                    . ' out of 5</p>

                            <div id="rateYo' . $x['doc_id']

                    . '" class="m-0 p-0"></div>



                            <a href="" style="font-size:10px;" class="btn btn-danger member mt-3 p-1" data-toggle="modal" data-target="#modal' . $x['doc_id']

                    . '">Book Appointment</a>

                        </div>

                    </div>

                </div>

            </div>

            <script>

        $(function() {

                $("#rateYo' . $x['doc_id'] . '").rateYo({

                    rating: ' . $x['star_rating'] . ',

                    readOnly: true,

                    starWidth: "15px",

                    spacing: "2px"

                });

        });

    </script>';
            }
        }

        return $output;
}



    public function filterCompHos($dept_id, $treat_id, $star_rate, $highRate, $lowRate, $emc, $selectedHos, $search, $location)

    {

        $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

            ->from('hospital_details')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

            // ->where($search)

            ->group_by('hospital_review_user.hos_id')

            ->order_by('star_rating', 'desc')

            ->get();

        if (isset($search) && !isset($location)) {

            $s = '%' . $search . '%';

            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->where('hospital_details.hos_name like', $s)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } else if (isset($location) && !isset($search)) {



            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->where("(hospital_details.city LIKE '%" . $location . "%' OR hospital_details.country LIKE '%" . $location . "%' OR hospital_details.state LIKE '%" . $location . "%' OR hospital_details.zip LIKE '%" . $location . "%')", NULL, FALSE)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        } else if (isset($search) && isset($location)) {

            $s = '%' . $search . '%';

            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->where('hospital_details.hos_name like', $s)

                ->where("(hospital_details.city LIKE '%" . $location . "%' OR hospital_details.country LIKE '%" . $location . "%' OR hospital_details.state LIKE '%" . $location . "%' OR hospital_details.zip LIKE '%" . $location . "%')", NULL, FALSE)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }

        if (isset($dept_id) && !isset($treat_id)) {



            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->join('hospital_departments', 'hospital_departments.hos_id=hospital_details.hos_id')

                ->where_in('hospital_departments.dept_id', $dept_id)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }

        if (isset($treat_id) && !isset($dept_id)) {



            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->join('hospital_treatments', 'hospital_treatments.hos_id=hospital_details.hos_id')

                ->where_in('hospital_treatments.treat_id', $treat_id)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }

        if (isset($treat_id) && isset($dept_id)) {



            $hosData = $this->db->select('hospital_details.*, avg(hospital_review_user.star_rating) as star_rating, count(hospital_review_user.star_rating) as review_count')

                ->from('hospital_details')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_details.hos_id')

                ->join('hospital_departments', 'hospital_departments.hos_id=hospital_details.hos_id')

                ->join('hospital_treatments', 'hospital_treatments.hos_id=hospital_details.hos_id')

                ->where_in('hospital_treatments.treat_id', $treat_id)

                ->where_in('hospital_departments.dept_id', $dept_id)

                ->group_by('hospital_review_user.hos_id')

                ->order_by('star_rating', 'desc')

                ->get();
        }

        $output = '';

        if ($hosData->num_rows()) {

            $hosData = $hosData->result_array();





            foreach ($hosData as $x) {

                if (isset($highRate)) {

                    if (round($x['star_rating']) < 4) {

                        continue;
                    }
                }

                if (isset($lowRate)) {

                    if (round($x['star_rating']) >= 4) {

                        continue;
                    }
                }

                if (isset($star_rate)) {

                    $r = round($x['star_rating']);

                    if (!in_array($r, $star_rate)) {

                        continue;
                    }
                }

                if (isset($emc) && $emc != '') {

                    if ($x['emc'] == 0) {

                        continue;
                    }
                }

                $output .= '<li class="booking-card" style="background-image: url(' . base_url('userUploads/' . $x['logo']) . ');background-repeat: no-repeat;background-position: 0px 0px;background-size: 210px 210px;">

                    <label class="label">

                        <input class="label__checkbox" name="hosCard" value="' . $x['hos_id'] . '" type="checkbox" />

                        <span class="label__text">

                            <span class="label__check">

                                <i class="fa fa-check icon"></i>

                            </span>

                        </span>

                    </label>

                    <div class="book-container">

                        <!-- <div class="content">

                            <a href="' . site_url('hospital_Controller/recHospital/') . '" class="btn">View Details</a>

                        </div> -->

                    </div>

                    <div class="informations-container">

                        <h2 class="title"><a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '">' . $x['hos_name'] . '</a>



                        </h2>

                        <div class="d-flex pt-2 justify-content-between">

                            <div class="my-auto">

                                <p class="text-center"><strong style="font-size: 13px;">' . $x['review_count'] . ' Reviews</strong></p>

                            </div>

                            <div class="">

                                <span class="text-center">

                                    <div id="rateYo' . $x['hos_id'] . '"></div>

                                </span>

                                <p class="text-center mb-1">' . round($x['star_rating'], 1) . ' out of 5</p>

                            </div>

                        </div>

                        <div class="more-information row">

                            <p class="sub-title mb-1 col-12">Address: ' . $x['city'] . '</p>

                            <p class="price col-12 mt-0" style="font-size: 15px;">Contact: ' . $x['phone'] . '</p>

                            <div class=" mt-0 mx-auto">

                                <!-- <form action="' . site_url('appointment_Controller/hosAppointment') . '" method="post">

                                    <a href="' . site_url('mainController/viewHospital/') . '" class="btn btn-sm mb-1 btn-primary btn-block" style="">View Profile</a>

                                    <button type="submit" name="submit" class="btn btn-sm btn-danger btn-block">Book Appointment</button>

                                </form> -->

                            </div>

                        </div>

                    </div>

                </li>

                        <script>

                    $(function() {

                        



                            $("#rateYo' . $x['hos_id'] . '").rateYo({

                                rating: ' . $x['star_rating'] . ',

                                readOnly: true,

                                starWidth: "15px",

                                spacing: "2px"

                            });



                        

                    });

                </script>';
            }
        } else {

            $output = '<li><h2 class="mt-5 text-muted">No Hospitals Found!!</h2> </li>';
        }

        if ($selectedHos != '') {

            $line = " var selHos = '" . $selectedHos . "';

            selHos = selHos.split(',');";
        } else {

            $line = "var selHos = []";
        }

        $output .= " <script>" . $line . "

        $('.label__checkbox').on('change', function() {



            if ($('.label__checkbox:checked').length > 5) {

                this.checked = false;

            }

            if ($('.label__checkbox').is(':checked')) {

                selHos.push($(this).val());



            } else if ($('.label__checkbox').not(':checked')) {

                var index = selHos.indexOf($(this).val());

                console.log(index);

                selHos.splice(index, 1);

            }



            $('.hosInput').val(selHos.toString());

            $('.selected').html($('.label__checkbox:checked').length + '/5 selected');



            if ($('.label__checkbox:checked').length == 5) {

                $('.selected').addClass('text-success');

            } else {

                $('.selected').removeClass('text-success');

            }



            if ($('.label__checkbox:checked').length < 2) {

                $('.compare-btn').attr('disabled', true);

                $('.compare-btn').removeClass('btn-success');

                $('.compare-btn').addClass('btn-secondary');

            } else {

                $('.compare-btn').attr('disabled', false);

                $('.compare-btn').removeClass('btn-secondary');

                $('.compare-btn').addClass('btn-success');

            }

            //  console.log(selHos);

        });

    </script>";

        return $output;
    }


    

    public function filterData($hos_id, $dept_id, $doc_id, $highRate, $lowRate)

    {

        //$query = makeQuery($hos_id,$dept_id,$doc_id);

        /* Filter Data */

        $hosData = $this->db->select('*')

            ->from('hospital_review_user')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = hospital_review_user.email_id')

            ->order_by('hospital_review_user.datetime', 'desc')

            ->get();

        $deptData = $this->db->select('*')

            ->from('department_review_user')

            ->join('departments', 'departments.dept_id = department_review_user.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = department_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = department_review_user.email_id')

            ->order_by('department_review_user.datetime', 'desc')

            ->get();

        $docData = $this->db->select('*')

            ->from('doctor_review_user')

            ->join('doctor_details', 'doctor_details.doc_id = doctor_review_user.doc_id')

            ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

            ->join('user_details', 'user_details.email_id = doctor_review_user.email_id')

            ->order_by('doctor_review_user.datetime', 'desc')

            ->get();

        // $treatData = $this->db->select('*')

        //     ->from('treatment_review_user')

        //     ->join('treatments', 'treatments.treat_id = treatment_review_user.treat_id')

        //     ->join('hospital_details', 'hospital_details.hos_id = treatment_review_user.hos_id')

        //     ->join('user_details', 'user_details.email_id = treatment_review_user.email_id')

        //     ->order_by('treatment_review_user.datetime', 'desc')

        //     ->get();



        if (isset($doc_id)) {

            $docData = $this->db->select('*')

                ->from('doctor_review_user')

                ->join('doctor_details', 'doctor_details.doc_id = doctor_review_user.doc_id')

                ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

                ->join('user_details', 'user_details.email_id = doctor_review_user.email_id')

                ->where_in('doctor_review_user.doc_id', $doc_id)

                ->order_by('doctor_review_user.datetime', 'desc')

                ->get();
        }

        if (isset($dept_id)) {

            $deptData = $this->db->select('*')

                ->from('department_review_user')

                ->join('departments', 'departments.dept_id = department_review_user.dept_id')

                ->join('hospital_details', 'hospital_details.hos_id = department_review_user.hos_id')

                ->join('user_details', 'user_details.email_id = department_review_user.email_id')

                ->where_in('department_review_user.dept_id', $dept_id)

                ->order_by('department_review_user.datetime', 'desc')

                ->get();
        }

        if (isset($hos_id)) {

            $hosData = $this->db->select('*')

                ->from('hospital_review_user')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_review_user.hos_id')

                ->join('user_details', 'user_details.email_id = hospital_review_user.email_id')

                ->where_in('hospital_review_user.hos_id', $hos_id)

                ->order_by('hospital_review_user.datetime', 'desc')

                ->get();
        }

       

        if (isset($doc_id) && isset($dept_id) && isset($hos_id)) {

            $data = array(

                'hosRev' => $hosData->result_array(),

                'depRev' => $deptData->result_array(),

                'docRev' => $docData->result_array(),

                

            );
        } elseif (isset($doc_id) && isset($dept_id) && !isset($hos_id)) {

            $data = array(

                'depRev' => $deptData->result_array(),

                'docRev' => $docData->result_array(),


            );
        } elseif (isset($hos_id) && !isset($doc_id) && !isset($dept_id)) {

            $data = array(

                'hosRev' => $hosData->result_array(),

                

            );
        } elseif (isset($doc_id) && !isset($dept_id) && isset($hos_id)) {

            $data = array(

                'hosRev' => $hosData->result_array(),

                'docRev' => $docData->result_array(),

            );
        } elseif (!isset($doc_id) && isset($dept_id) && isset($hos_id)) {

            $data = array(

                'hosRev' => $hosData->result_array(),

                'depRev' => $deptData->result_array(),

            );
        } elseif (isset($doc_id) && !isset($dept_id) && !isset($hos_id) && !isset($treat_id)) {

            $data = array(

                'docRev' => $docData->result_array(),

            );
        } elseif (!isset($doc_id) && isset($dept_id) && !isset($hos_id) && !isset($treat_id)) {

            $data = array(

                'depRev' => $deptData->result_array(),

            );
        } elseif (!isset($doc_id) && !isset($dept_id) && isset($hos_id) && !isset($treat_id)) {

            $data = array(

                'hosRev' => $hosData->result_array(),

            );
        }  else {

            $data = array(

                'hosRev' => $hosData->result_array(),

                'depRev' => $deptData->result_array(),

                'docRev' => $docData->result_array(),

            
            );
        }

        $reviewCount = 0;

        $reviews = array();



        if (isset($data['hosRev'])) {

            foreach ($data['hosRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;
            }
        }

        if (isset($data['depRev'])) {

            foreach ($data['depRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;
            }
        }

        if (isset($data['docRev'])) {

            foreach ($data['docRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;
            }
        }

        if (isset($data['treatRev'])) {

            foreach ($data['treatRev'] as $x) {

                $reviews[$reviewCount] = $x;

                $reviewCount += 1;
            }
        }



        function date_compare($a, $b)

        {

            $t1 = strtotime($a['datetime']);

            $t2 = strtotime($b['datetime']);

            return $t1 - $t2;
        }

        usort($reviews, 'date_compare');

        $reviews = array_reverse($reviews);



        /* Output */

        $output = '';

        if ($reviews) {

            $stars = '';

            $revOn = '';

            $count = 0;

            foreach ($reviews as $x) :

                if (isset($highRate) && $x['star_rating'] <= 3) {

                    continue;
                } else if (isset($lowRate) && $x['star_rating'] >= 3) {

                    continue;
                }

                $revOn = '';

                $date = date_create($x['datetime']);

                $rateId = '';

                if (isset($x['doc_name'])) {

                    $revOn = '' . $x['doc_name'];

                    $rateId = '' . $x['review_id'] . $x['doc_id'];
                } elseif (isset($x['treat_name']) && isset($x['hos_name'])) {

                    $revOn = '' . $x['hos_name'] . ',' . $x['treat_name'];

                    $rateId = '' . $x['review_id'] . $x['dept_id'];
                } elseif (isset($x['hos_name']) && isset($x['dept_name'])) {

                    $revOn = '' . $x['dept_name'] . ' dept, ' . $x['hos_name'];

                    $rateId = '' . $x['review_id'] . $x['dept_id'];
                } elseif (isset($x['hos_name'])) {

                    $revOn = '' . $x['hos_name'];

                    $rateId = '' . $x['review_id'] . $x['hos_id'];
                }

                if (isset($x['doc_name'])) :

                    $upper = '<a href=""><strong class="rev-sub">' . 'Dr. ' . $x['doc_name'] . '</strong></a>';

                elseif (isset($x['hos_name']) && isset($x['treat_name'])) :

                    $upper = '<a href=""><strong class="rev-sub">' . $x['hos_name'] . ' , ' . $x['treat_name'] . ' </strong></a>';

                elseif (isset($x['hos_name']) && isset($x['dept_name'])) :

                    $upper = '<a href=""><strong class="rev-sub">' . $x['dept_name'] . ' dept, ' . $x['hos_name'] . '</strong></a>';

                elseif (isset($x['hos_name'])) :

                    $upper = '<a href=""><strong class="rev-sub">' . $x['hos_name'] . '</strong></a>';

                endif;



                if (isset($x['doc_name'])) :

                    $rateyoavg = '<div class="rateYo' . $x['review_id'] . $x['doc_id'] . '"></div>' .

                        '<script>

                                                                                        $(function(){

                                                                                            $(".rateYo' . $x['review_id'] . $x['doc_id'] . '").rateYo({

                                                                                                rating: ' . $x['star_rating'] . ',

                                                                                                readOnly: true,

                                                                                                starWidth: "30px",

                                                                                                spacing: "5px"

                                                                                            });

                                                                                        });

                                                                                    </script>';

                elseif (isset($x['hos_name']) && isset($x['dept_name'])) :

                    $rateyoavg = '<div class="rateYo' . $x['review_id'] . $x['dept_id'] . '"></div>' .

                        '<script>

                                                                                        $(function(){

                                                                                            $(".rateYo' . $x['review_id'] . $x['dept_id'] . '").rateYo({

                                                                                                rating: ' . $x['star_rating'] . ',

                                                                                                readOnly: true,

                                                                                                starWidth: "30px",

                                                                                                spacing: "5px"

                                                                                            });

                                                                                        });

                                                                                    </script>';

                elseif (isset($x['treat_name']) && isset($x['hos_name'])) :

                    $rateyoavg = '<div class="rateYo' . $x['review_id'] . $x['treat_id'] . '"></div>' .

                        '<script>

                                                                                        $(function(){

                                                                                            $(".rateYo' . $x['review_id'] . $x['treat_id'] . '").rateYo({

                                                                                                rating: ' . $x['star_rating'] . ',

                                                                                                readOnly: true,

                                                                                                starWidth: "30px",

                                                                                                spacing: "5px"

                                                                                            });

                                                                                        });

                                                                                    </script>';

                elseif (isset($x['hos_name'])) :

                    $rateyoavg = '<div class="rateYo' . $x['review_id'] . $x['hos_id'] . '"></div>' .

                        '<script>

                                                                                        $(function(){

                                                                                            $(".rateYo' . $x['review_id'] . $x['hos_id'] . '").rateYo({

                                                                                                rating: ' . $x['star_rating'] . ',

                                                                                                readOnly: true,

                                                                                                starWidth: "30px",

                                                                                                spacing: "5px"

                                                                                            });

                                                                                        });

                                                                                    </script>';



                endif;







                if (isset($x['doc_name'])) :

                    $modalfooter = '<div class="d-flex flex-column m-2">

                                                                <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                    <div class="rating-desc">

                                                                        <h5>Rating given for Promptness:</h5>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <h5 class="text-center">' . $x['star_rating_promptness'] . 'out of 5</h5>

                                                                        <div id="rysm" class="rateYostardoc2' . $x['review_id'] . $x['doc_id'] . '"></div>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                    <div class="rating-desc">

                                                                        <h5>Rating given for Bedside Manner:</h5>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <h5 class="text-center">' . $x['star_rating_bedside_manner'] . 'out of 5</h5>

                                                                        <div id="rysm" class="rateYostardoc3' . $x['review_id'] . $x['doc_id'] . '"></div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="d-flex flex-column m-2">

                                                                <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                    <div class="rating-desc">

                                                                        <h5>Rating given for On-time visit:</h5>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <h5 class="text-center">' . $x['star_rating_ontime'] . 'out of 5</h5>

                                                                        <div id="rysm" class="rateYostardoc4' . $x['review_id'] . $x['doc_id'] . '"></div>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                    <div class="rating-desc">

                                                                        <h5>Rating given for Follow-up after treatment:</h5>

                                                                    </div>

                                                                    <div class="d-flex flex-column">

                                                                        <h5 class="text-center">' . $x['star_rating_follow_up'] . ' out of 5</h5>

                                                                        <div id="rysm" class="rateYostardoc5' . $x['review_id'] . $x['doc_id'] . '"></div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                                <script>

                                                                        $(function () {

                                                                            $(".rateYostardoc2' . $x['review_id'] . $x['doc_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_promptness'] . '?>,

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                            $(".rateYostardoc3' . $x['review_id'] . $x['doc_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_bedside_manner'] . '?>,

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                            $(".rateYostardoc4' . $x['review_id'] . $x['doc_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_ontime'] . '?>,

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                            $(".rateYostardoc5' . $x['review_id'] . $x['doc_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_follow_up'] . '?>,

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                        });

                                                                </script>';

                elseif (isset($x['hos_name']) && isset($x['dept_name'])) :

                    $modalfooter = '<div class="d-flex flex-column m-2">

                                                                    <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                        <div class="rating-desc">

                                                                            <h5>Rating given for Doctors available in the department:</h5>

                                                                        </div>

                                                                        <div class="d-flex flex-column">

                                                                            <h5 class="text-center">' . $x['star_rating_dept_doctors_availability'] . 'out of 5</h5>

                                                                            <div id="rysm" class="rateYostardept2' . $x['review_id'] . $x['dept_id'] . '"></div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                        <div class="rating-desc">

                                                                            <h5>Rating given for Department facilities:</h5>

                                                                        </div>

                                                                        <div class="d-flex flex-column">

                                                                            <h5 class="text-center">' . $x['star_rating_department_facilities'] . 'out of 5</h5>

                                                                            <div id="rysm" class="rateYostardept3' . $x['review_id'] . $x['dept_id'] . '"></div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <div class="d-flex flex-column m-2">

                                                                    <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                                        <div class="rating-desc">

                                                                            <h5>Rating given for Medicine availability:</h5>

                                                                        </div>

                                                                        <div class="d-flex flex-column">

                                                                            <h5 class="text-center">' . $x['star_rating_medicine_availability'] . 'out of 5</h5>

                                                                            <div id="rysm" class="rateYostardept4' . $x['review_id'] . $x['dept_id'] . '"></div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                    <script>

                                                                        $(function () {

                                                                            $(".rateYostardept2' . $x['review_id'] . $x['dept_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_dept_doctors_availability'] . ',

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                            $(".rateYostardept3' . $x['review_id'] . $x['dept_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_department_facilities'] . ',

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                            $(".rateYostardept4' . $x['review_id'] . $x['dept_id'] . '").rateYo({

                                                                                rating: ' . $x['star_rating_medicine_availability'] . ',

                                                                                readOnly: true,

                                                                                starWidth: "20px",

                                                                                spacing: "3px"

                                                                            });

                                                                        });

                                                                    </script>';


                elseif (isset($x['hos_name'])) :

                    $modalfooter = '<div class="d-flex flex-column m-2">

                                                                    <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                  <div class="rating-desc">

                                                      <h5>Rating given for Hospital Cleanliness:</h5>

                                                  </div>

                                                  <div class="d-flex flex-column">

                                                      <h5 class="text-center">' . $x['star_rating_cleanliness'] . 'out of 5</h5>

                                                      <div id="rysm" class="rateYostarhos2' . $x['review_id'] . $x['hos_id'] . '"></div>

                                                  </div>

                                              </div>

                                              <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                  <div class="rating-desc">

                                                      <h5>Rating given for Accommodation:</h5>

                                                  </div>

                                                  <div class="d-flex flex-column">

                                                      <h5 class="text-center">' . $x['star_rating_accomodation'] . ' out of 5</h5>

                                          <div id="rysm" class="rateYostarhos3' . $x['review_id'] . $x['hos_id'] . '"></div>

                                                  </div>

                                              </div>

                                          </div>

                                          <div class="d-flex flex-column m-2">

                                              <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                  <div class="rating-desc">

                                                      <h5>Rating given for Doctors Availability:</h5>

                                                  </div>

                                                  <div class="d-flex flex-column">

                                                      <h5 class="text-center">' . $x['star_rating_availability'] . ' out of 5</h5>

                                                      <div id="rysm" class="rateYostarhos4' . $x['review_id'] . $x['hos_id'] . '"></div>

                                                  </div>

                                              </div>

                                              <div class="d-flex flex-row justify-content-between alert alert-warning">

                                                  <div class="rating-desc">

                                                      <h5>Rating given for Facilities given</h5>

                                                  </div>

                                                  <div class="d-flex flex-column">

                                                      <h5 class="text-center">' . $x['star_rating_facilities'] . ' out of 5</h5>

                                                      <div id="rysm" class="rateYostarhos5' . $x['review_id'] . $x['hos_id'] . '"></div>

                                                  </div>

                                              </div>

                                          </div>

                                              <script>

                                                  $(function () {

                                                      $(".rateYostarhos2' . $x['review_id'] . $x['hos_id'] . '").rateYo({

                                                          rating: ' . $x['star_rating_cleanliness'] . ',

                                                          readOnly: true,

                                                          starWidth: "25px",

                                                          spacing: "3px"

                                                      });

                                                      $(".rateYostarhos3' . $x['review_id'] . $x['hos_id'] . '").rateYo({

                                                          rating: ' . $x['star_rating_accomodation'] . ',

                                                          readOnly: true,

                                                          starWidth: "25px",

                                                          spacing: "3px"

                                                      });

                                                      $(".rateYostarhos4' . $x['review_id'] . $x['hos_id'] . '").rateYo({

                                                          rating: ' . $x['star_rating_availability'] . ',

                                                          readOnly: true,

                                                          starWidth: "25px",

                                                          spacing: "3px"

                                                      });

                                                      $(".rateYostarhos5' . $x['review_id'] . $x['hos_id'] . '").rateYo({

                                                          rating:' . $x['star_rating_facilities'] . ',

                                                          readOnly: true,

                                                          starWidth: "25px",

                                                          spacing: "3px"

                                                      });

                                                  });

                                                                    </script>';

                endif;

                $count += 1;

                if (strlen($x['review_content']) >= 200) :

                    $modalbtn = '<p class="pl-2 pt-2 wwdtext"><div class="revbody">' . substr($x['review_content'], 0, 200) . ' <span data-toggle="modal" data-target="#exampleModalCenter' . $count . '" style="cursor : pointer; padding:5px; font-weight:bold; color:#0096FF;">  ...show more</span></div></p>';

                else :

                    $modalbtn = '<p class="pl-2 pt-2 wwdtext"><div class="revbody">' . $x['review_content'] . ' <span data-toggle="modal" data-target="#exampleModalCenter' . $count . '" style="cursor : pointer; padding:5px; font-weight:bold; color:#0096FF;">  ...show star ratings</span></div></p>';

                endif;







                echo $output .= '<div class="card card-body mt-2 pb-4">

                    <div class="row">

                    <div class="col-12"> 
                  
                
                <img src="' . $x['picture'] . '" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" alt="">
                
              
                
                <i class="fas fa-ellipsis-v fa-lg mt-2 float-right"></i>
                
                <h5 class="pt-2"><a href="">' . $x['name'] . '</a> reviewed <a href=""><strong class="rev-sub">' . $revOn . '</strong></a><br>
                
                <small style="font-size:13px;">' . date_format($date, 'd/m/Y') . '</small></h5>
                
                </div>
                

                    </div>

                    <div class="row">

                        <div class="col-9">

                        <strong class="pl-2 mt-2 text-info" style="font-size: 18px;">' . $x['review_title'] . '</strong>

                        ' . $modalbtn . '

                        </div>

                        <div class="col-3">

                            <div class="mt-2">

                                <h5 class="text-center">' . $x['star_rating'] . ' out of 5</h5>

                                <div class="row justify-content-center">

                                <div id="rateYo' . $rateId . '"></div>

                                </div>

                                <script>

                                $(function () {

                                    

                                        $("#rateYo' . $rateId . '").rateYo({

                                            rating: ' . $x['star_rating'] . ',

                                            readOnly: true,

                                            starWidth: "20px",

                                            spacing: "3px"

                                        });

                                   

                                });

                                </script>

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-6 pl-5" ><i class="fas fa-thumbs-up icons"></i>&nbsp;Like</div>

                        <div class="col-3 pl-5"><i class="fas fa-share icons"></i>&nbsp;Share</div>

                    </div>

                </div>

                

                
                                    <div class="modal fade" id="exampleModalCenter' . $count . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <div class="modal-title" id="exampleModalLongTitle">

                                                        

                                                        <div class="row">

                                                            <div class="col-12">

                                                                <img src="' . $x['picture'] . '" class="img-thumbnail ml-3 mr-3 float-left rounded-circle" style="height: 70px; width:70px;" alt="">

                                                            

                                                                <h5 class="pt-2"><a href="">' . $x['name'] . '</a> reviewed' .

                    $upper . '<br>' .

                    '<small style="font-size:13px;">' . date_format(date_create($x['datetime']), 'd/m/y')

                    . '</small>

                                                                </h5>

                                                            </div>

                                                        </div>



                                                    </div>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                        <span aria-hidden="true">&times;</span>

                                                    </button>

                                                </div>

                                                <div class="modal-body m-2">

                                                

                                                    <div class="col" id="card-body">

                                                        <div class="row justify-content-between">

                                                            <strong style="font-size: 25px;"><p class="text-info">' . $x['review_title'] . '</p></strong>

                                                            <div class="col-3 alert alert-warning" style="height: 130px;">

                                                                <div class="mt-2">

                                                                    <h5 class="text-center">Overall Rating:</h5>

                                                                    <h5 class="text-center">' . $x['star_rating'] . 'out of 5</h5>

                                                                    <div class="row justify-content-center">' .

                    $rateyoavg

                    . '</div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    <p class="pl-2 pt-2 wwdtext"><div class="revbody" style="width:100%; word-break: break-all;">' . $x['review_content'] . '</div></p>

                                                </div>

                                            </div>

                                            <hr>

                                            <div class="modal_footer m-2 ">

                                                <div class="d-flex flex-row">' .

                    $modalfooter . '

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                ';

            endforeach;

            return $output;
        }
    }









    public function filterHosData($treat_id, $rate, $budget)

    {

        //$query = makeQuery($hos_id,$dept_id,$doc_id);

        /* Filter Data */

        $data = $this->db->select('*,avg(hospital_review_user.star_rating) as avr,sum(hospital_review_user.star_rating) as ratings,count(hospital_review_user.star_rating) as totalRate')

            ->from('hospital_treatments')

            ->where('hospital_treatments.treat_id', $treat_id)

            ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

            ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_treatments.hos_id')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments.hos_id')

            ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')

            ->group_by('hospital_review_user.hos_id')

            ->sort_by('avr', 'desc')

            ->get();



        if (isset($rate) && isset($budget)) {

            $search = array(

                'avr <' => $rate,

                'hospital_treatments.budget >' => $budget,

            );

            $data = $this->db->select('*,avg(hospital_review_user.star_rating) avr')

                ->from('hospital_treatments')

                ->where('hospital_treatments.treat_id', $treat_id)

                ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_treatments.hos_id')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments.hos_id')

                ->where_in($search)

                ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')

                ->get();
        } elseif (!isset($rate) && isset($budget)) {

            $search = array(

                'hospital_treatments.budget >' => $budget,

            );

            $data = $this->db->select('*,avg(hospital_review_user.star_rating) avr')

                ->from('hospital_treatments')

                ->where('hospital_treatments.treat_id', $treat_id)

                ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_treatments.hos_id')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments.hos_id')

                ->where_in($search)

                ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')

                ->get();
        } elseif (isset($rate) && !isset($budget)) {

            $search = array(

                'avr <' => $rate,

            );

            $data = $this->db->select('*,avg(hospital_review_user.star_rating) avr')

                ->from('hospital_treatments')

                ->where('hospital_treatments.treat_id', $treat_id)

                ->join('treatments', 'treatments.treat_id = hospital_treatments.treat_id')

                ->join('hospital_review_user', 'hospital_review_user.hos_id = hospital_treatments.hos_id')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_treatments.hos_id')

                ->where_in($search)

                ->join('hospital_departments', 'hospital_departments.dept_id = treatments.dept_id AND hospital_departments.hos_id = hospital_treatments.hos_id')

                ->get();
        }

        $Data = $data->result_array();



        /* Output */

        $output = '';

        if ($Data) {



            foreach ($Data as $x) :

                if (isset($x['hos_id'])) :

                    $stars = '';

                    $spoc = '<span style="font-size: 13px;" class="ml-1">NOT AVAILABLE</span>';

                    for ($i = 0; $i < $x['avr']; $i++) {

                        $stars .= '<i class="fas fa-star"></i>';
                    }

                    if (isset($x['spoc'])) {

                        $spoc = '<span style="font-size: 13px;" class="ml-1">' . $x['spoc'] . '<br>

                        <small class="text-muted">' . $x['spoc_email'] . '</small></span>';
                    }

                    $output .= '<div class="col-sm-4 mb-4">

                    <div class="card"> <img src="' . base_url('userUploads/' . $x['cover_pic']) . '" class="card-img-top" >

                        <div class="card-body pt-0 pb-0 px-0">

                            <a href="" class="btn wish-btn"><i class="far fa-heart fa-lg"></i></a>

                            <div class="row mb-0 px-3"> <a href="' . site_url('hospital_Controller/recHospital/' . $x['hos_id']) . '"><h5 class="text-danger font-weight-bold ml-3 mt-2">' . $x['hos_name'] . '</h5></a>

                                <h6 class="text-muted mt-auto ml-2" style="padding-bottom: 2px; font-size: 15px;">' . $x['city'] . '</h6>

                            </div>

                            <hr class="mt-2 mx-3 mb-2">

                            <div class="d-flex flex-row justify-content-between mt-2 px-3 pb-2">

                                <div class="d-flex flex-column"><span class="text-muted text-center">' . $x['treat_name'] . '</span><strong class="text-muted"><i class="fas fa-rupee-sign"></i>' . $x['budget'] . '</strong></div>

                                <div class="d-flex flex-column">

                                    <h5 style="padding-top: 5px;" class="mb-0 text-center">' . round($x['avr'], 1) . '/5</h5>

                                    <span class="text-warning text-center">' . $stars . '</span>

                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between mt-2 p-3 mb-2 pb-0 mid">

                                <div class="d-flex flex-column"><small class="text-muted mb-1">Contact:</small>

                                    <div class="d-flex flex-row"><i class="fas fa-address-book text-secondary fa-lg mt-1"></i>

                                        <div class="d-flex flex-column ml-1"><small class="ghj">' . $x['phone'] . '</small><small class="ghj">' . $x['email_id'] . '</small></div>

                                    </div>

                                </div>

                                <div class="d-flex flex-column"><small class="text-muted mb-1">Department SPOC:</small>

                                    <div class="d-flex flex-row"><i class="fas fa-doctor"></i>' . $spoc . '</div>

                                </div>

                            </div><!-- 

                            <div class="row aftHvrDt justify-content-center">

                                <h6>Top Doctors</h6>

                                <p>Dr. Rajendra Prasad <br>Dr. Duggal Joshi</p>

                            </div> -->

                            <div class="mx-3 mt-3 mb-1"><button type="button" class="btn btn-danger btn-block"><small>VIEW</small></button></div>

                        </div>

                    </div>

                </div>';

                endif;

            endforeach;

            return $output;
        } else {

            $output = '<h2>NO DATA</h2>';

            return $output;
        }
    }

    public function fetchDept($hos_id)

    {

        $q = $this->db->select('departments.*')

            ->from('departments')

            ->join('hospital_departments', 'hospital_departments.dept_id = departments.dept_id')

            ->where('hospital_departments.hos_id', $hos_id)

            ->get();

        $output = '<option value="">Select a department</option>';

        if ($q->num_rows()) {

            $q = $q->result_array();

            foreach ($q as $x) {

                $output .= '<option value="' . $x['dept_id'] . '">' . $x['dept_name'] . '</option>';
            }
        }

        return $output;
    }



    public function getEmail($email_id)
    {

        $q = $this->db->select('user_details')->where('email_id', $email_id)->get();
        if ($q->num_rows()) {
            return true;
        } else {
            return false;
        }
    }



    public function fetchTreat($hos_id)

    {

        $q = $this->db->select('treatments.*')

            ->from('treatments')

            ->join('hospital_treatments', 'hospital_treatments.treat_id = treatments.treat_id')

            ->where('hospital_treatments.hos_id', $hos_id)

            ->get();

        $output = '<option value="">Select a Treatment</option>';

        if ($q->num_rows()) {

            $q = $q->result_array();

            foreach ($q as $x) {

                $output .= '<option value="' . $x['treat_id'] . '">' . $x['treat_name'] . '</option>';
            }
        }

        return $output;
    }

    public function postReview($data, $revname)

    {

        if ($revname == 'Hospital') {

            $this->db->insert('hospital_review_user', $data);

            $q = $this->db->where($data)

                ->get('hospital_review_user');

            // echo"<pre>";
            // print_r($q->result_array());
            // echo"</pre>";
            // die;                ;

            if ($q->num_rows()) {

                return $q;
            } else {

                return false;
            }
        } elseif ($revname == 'Doctor') {

            $this->db->insert('doctor_review_user', $data);

            $q = $this->db->where($data)

                ->get('doctor_review_user');

            if ($q->num_rows()) {

                return $q;
            } else {

                return false;
            }
        } elseif ($revname == 'Department') {

            $this->db->insert('department_review_user', $data);

            $q = $this->db->where($data)

                ->get('department_review_user');

            if ($q->num_rows()) {

                return $q;
            } else {

                return false;
            }
        } elseif ($revname == 'Treatment') {

            $this->db->insert('treatment_review_user', $data);

            $q = $this->db->where($data)

                ->get('treatment_review_user');

            if ($q->num_rows()) {

                return $q;
            } else {

                return false;
            }
        }
    }

    public function postData($email)

    {

        $userData = $this->db->where('user_details.email_id', $email)

            ->get('user_details');

        $hosData = $this->db->get('hospital_details');

        $docData = $this->db->get('doctor_details');

        $diseases = $this->db->get('diseases');

        //  echo '<pre>';

        //   print_R($userData->result_array());



        if ($userData->num_rows() || $hosData->num_rows() || $docData->num_rows()) {

            $data = array(

                'userData' => $userData->result_array(),

                'hosData' => $hosData->result_array(),

                'docData' => $docData->result_array(),

                'diseases' => $diseases->result_array(),

            );

            return $data;
        }
    }

    public function reviewfilterCategory()

    {



        $hos = $this->db->distinct()

            ->select('hospital_review_user.hos_id,hospital_details.hos_name')

            ->from('hospital_review_user')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_review_user.hos_id')

            ->get();
        // echo"<pre>";

        // print_r($hos->result_array());die;

        $depts = $this->db->distinct()

            ->select('department_review_user.dept_id,departments.dept_name')

            ->from('department_review_user')

            ->join('departments', 'departments.dept_id = department_review_user.dept_id')

            ->get();

        $docs = $this->db->distinct()

            ->select('doctor_review_user.doc_id,doctor_details.doc_name')

            ->from('doctor_review_user')

            ->join('doctor_details', 'doctor_details.doc_id = doctor_review_user.doc_id')

            ->get();

        $treat = $this->db->distinct()

            ->select('treatments.treat_name,treatments.treat_id')

            ->from('treatments')

            ->get();

        if ($hos->num_rows() || $depts->num_rows() || $docs->num_rows()) {

            $data = array(

                'hos' => $hos->result_array(),

                'depts' => $depts->result_array(),

                'docs' => $docs->result_array(),

                'treat' => $treat->result_array(),

            );

            return $data;
        }
    }

    public function fetchSlot($doc_id, $date)

    {

        $search = array(

            'doc_id' => $doc_id,

            'appt_datetime' => $date,

        );

        $doctors = $this->db->where('doctor_details.doc_id', $doc_id)

            ->from('doctor_details')

            ->join('doctors_schedule', 'doctors_schedule.doc_id = doctor_details.doc_id')

            ->join('departments', 'departments.dept_id = doctor_details.specialization')

            ->get()

            ->result_array();

        $appointments = $this->db->where($search)

            ->get('doctors_appointment')

            ->result_array();





        $slots = array();

        $bookSlots = array();



        foreach ($doctors as $x) {

            $bookSlots[$x['doc_id']] = array();

            foreach ($appointments as $y) {

                array_push($bookSlots[$x['doc_id']], $y['appt_slot_time']);
            }

            $slots[$x['doc_id']] =  explode(',', $x['slots']);
        }

        $bfr = '';

        $afr = '';

        foreach ($slots[$x['doc_id']] as $y => $z) :

            $time = explode(':', date("H:i:s", strtotime($z)));

            $brk = explode(':', date("H:i:s", strtotime($x['brk_time'])));

            if (!in_array($z, $bookSlots[$x['doc_id']]) && $brk[0] > $time[0]) {

                $bfr .= '<input type="radio" name="slot" id="bfr' . $y . $x['doc_id'] . '" required value="' . $z . '"><label for="bfr' . $y . $x['doc_id'] . '">' . $z . '</label>';
            }

        endforeach;

        foreach ($slots[$x['doc_id']] as $y => $z) :

            $time = explode(':', date("H:i:s", strtotime($z)));

            $brk = explode(':', date("H:i:s", strtotime($x['brk_time'])));

            if (!in_array($z, $bookSlots[$x['doc_id']]) && $brk[0] < $time[0]) {

                $afr .= '<input type="radio" name="slot" id="afr' . $y . $x['doc_id'] . '" required value="' . $z . '"><label for="afr' . $y . $x['doc_id'] . '">' . $z . '</label>';
            }

        endforeach;

        $output = ' <p class="shifts text-muted col-4 col-sm-4 col-md-3 col-lg-3"><i class="fas fa-sun fa-lg"></i> First Half</p>

        <div class="col-8 col-sm-8 col-md-9 col-lg-9">' . $bfr . '

          <hr>

        </div>

      

        <p class="shifts text-muted  col-4 col-sm-4 col-md-3 col-lg-3"><i class="far fa-moon fa-lg"></i> Second Half</p>

        <div class="col-8 col-sm-8 col-md-9 col-lg-9">

          ' . $afr . '</div>';

        return $output;
    }



    public function myfeeedback($email)

    {

        $q = $this->db->select('*')

            ->from('hospital_review_user')

            ->join('hospital_details', 'hospital_details.hos_id = hospital_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = hospital_review_user.email_id')

            // ->where('hospital_review_user.email_id', $email)

            ->order_by('hospital_review_user.datetime', 'desc')

            ->get();



        $q1 = $this->db->select('*')

            ->from('department_review_user')

            ->join('departments', 'departments.dept_id = department_review_user.dept_id')

            ->join('hospital_details', 'hospital_details.hos_id = department_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = department_review_user.email_id')

            //            ->where('department_review_user.email_id', $email)

            ->order_by('department_review_user.datetime', 'desc')

            ->get();

        $q2 = $this->db->select('*')

            ->from('doctor_review_user')

            ->join('doctor_details', 'doctor_details.doc_id = doctor_review_user.doc_id')

            ->join('hospital_details', 'hospital_details.hos_id = doctor_details.hos_id')

            ->join('user_details', 'user_details.email_id = doctor_review_user.email_id')

            //          ->where('doctor_review_user.email_id', $email)

            ->order_by('doctor_review_user.datetime', 'desc')

            ->get();

        $q3 = $this->db->select('*')

            ->from('treatment_review_user')

            ->join('treatments', 'treatments.treat_id = treatment_review_user.treat_id')

            ->join('hospital_details', 'hospital_details.hos_id = treatment_review_user.hos_id')

            ->join('user_details', 'user_details.email_id = treatment_review_user.email_id')

            //        ->where('treatment_review_user.email_id', $email)

            ->order_by('treatment_review_user.datetime', 'desc')

            ->get();






        if ($q->num_rows() || $q1->num_rows() || $q2->num_rows() || $q3->num_rows()) {



            $data = array(

                'hosRev' => $q->result_array(),

                'depRev' => $q1->result_array(),

                'docRev' => $q2->result_array(),

                'treatRev' => $q3->result_array()

            );

            // echo "<pre>";

            // print_r($data);

            // die;

            return $data;
        } else {

            return false;
        }
    }
}

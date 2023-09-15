<?php



class Offer_Model extends CI_Model

{



    public function filterOffer($hos_id, $doc_id, $treat_id)

    {

        if ($hos_id == "" && $doc_id == "" && $treat_id == "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id != "" && $doc_id == "" && $treat_id == "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.hos_id', $hos_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id == "" && $doc_id != "" && $treat_id == "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.doc_id', $doc_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id == "" && $doc_id == "" && $treat_id != "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.treat_id', $treat_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id != "" && $doc_id != "" && $treat_id == "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.hos_id', $hos_id)

                ->where_in('hospital_offers.doc_id', $doc_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id != "" && $doc_id == "" && $treat_id != "") {

            $data = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.hos_id', $hos_id)

                ->where_in('hospital_offers.treat_id', $treat_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get()

                ->result_array();

        } elseif ($hos_id == "" && $doc_id != "" && $treat_id != "") {

            $drData = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.doc_id', $doc_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get();

            $trtData = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.treat_id', $treat_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get();

            $ofr = array(

                'docOfr' => $drData->result_array(),

                'trtOfr' => $trtData->result_array()

            );

            $dataCount = 0;

            $data = array();

            foreach ($ofr['docOfr'] as $x) {

                $data[$dataCount] = $x;

                $dataCount += 1;

            }

            foreach ($ofr['trtOfr'] as $x) {

                $data[$dataCount] = $x;

                $dataCount += 1;

            }

        } elseif ($hos_id != "" && $doc_id != "" && $treat_id != "") {

            $hosData = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.hos_id', $hos_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get();

            $drData = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.doc_id', $doc_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get();

            $trtData = $this->db->select('hospital_offers.*,hospital_details.*,doctor_registration.doc_name,treatments.treat_name')

                ->from('hospital_offers')

                ->join('hospital_details', 'hospital_details.hos_id = hospital_offers.hos_id')

                ->join('doctor_registration', 'doctor_registration.doc_id = hospital_offers.doc_id', 'left')

                ->join('treatments', 'treatments.treat_id = hospital_offers.treat_id', 'left')

                ->where_in('hospital_offers.treat_id', $treat_id)

                ->order_by('hospital_offers.coupon_id', 'desc')

                ->get();

            $ofr = array(

                'hosOfr' => $hosData->result_array(),

                'docOfr' => $drData->result_array(),

                'trtOfr' => $trtData->result_array()

            );

            $dataCount = 0;

            $data = array();

            foreach ($ofr['hosOfr'] as $x) {

                $data[$dataCount] = $x;

                $dataCount += 1;

            }

            foreach ($ofr['docOfr'] as $x) {

                $data[$dataCount] = $x;

                $dataCount += 1;

            }

            foreach ($ofr['trtOfr'] as $x) {

                $data[$dataCount] = $x;

                $dataCount += 1;

            }

        }

        $date1 = '';

        $date2 = '';

        $diff = 0;

        $days = 0;

        $stl = '';

        $first = 1;

        $q = '';

        $yy = '';

        $xx = '';

        $y = '';

        $x = '';

        $date = '';

        $d = '';

        $s = '';

        foreach ($data as $dt) :

            if ($dt['status'] != 0) :

                if ($first == 1) {

                    $x = 'first';

                    $s = 'show';

                } else {

                    $x = 'collapsed';

                    $s = '';

                }

                $date1 = date_create($dt['creat_on']);

                $date2 = date_create(date('Y-m-d'));

                $diff = date_diff($date1, $date2);

                $days = $diff->format("%a") + 1;

                if ($days > 3) {

                    $stl = 'display:none;';

                }

                if ($dt['doc_name'] != "") {

                    $y = "Book Dr. " . $dt['doc_name'] . "'s appoinment now.";

                } elseif ($dt['treat_name'] != "") {

                    $y = "Book appoinment on " . $dt['treat_name'] . " now.";

                }

                if ($dt['offer_on'] == "Doctor") {

                    $xx = $dt['coupon_code'];

                    $yy = "offerBooking";

                } elseif ($dt['offer_on'] == "Treatment") {

                    $xx = $dt['coupon_code'];

                    $yy = "treatofferbooking";

                }

                $date = date_create($dt['valid_till']);

                $d = date_format($date, " dS M' y");

                $q .= '

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">

                    <div class="panel-heading" role="tab" id="' . $dt['coupon_id'] . '">

                        <h4 class="panel-title">

                            <a class="' . $x . '" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $dt['coupon_id'] . '" aria-expanded="true" aria-controls="collapse' . $dt['coupon_id'] . '">

                            <span class="Shos_name">' . $dt['hos_name'] . '</span> - ' . $dt['coupon_title'] . '                                            <span style="' . $stl . '" class="badge new badge-warning rounded">New</span><span class="float-right off mr-2 text-white discount">' . $dt['discount'] . '% OFF</span>

                            </a>

                        </h4>

                    </div>

                    <div id="collapse' . $dt['coupon_id'] . '" class="panel-collapse collapse ' . $s . ' in" role="tabpanel" aria-labelledby="' . $dt['coupon_id'] . '">

                        <div class="panel-body container pt-0">

                            <div class="row pt-0 mt-0">

                                <div class="col-12">

                                    <span style="font-size: 15px;" class="validity mt-4 p-2 badge badge-success float-right mr-3">Valid Till: ' . $d . '

                                    </span>

                                    <img src="' . base_url('userUploads/' . $dt['logo']) . '" class="img-thumbnail float-left" style="border:0px; height:80px; width:80px;" alt="">

                                    <h6 class="text-dark pt-4"><strong style="font-size: 20px; margin-left:10px;">' . $dt['hos_name'] . '</strong> <small>' . $dt['city'] . ', ' . $dt['state'] . '</small></h6>

                                </div>

                            </div>

                            <div class="row mt-2">

                                <div class="col-8 text-dark">

                                    <h6>Offer Description</h6>

                                    <p class="wwdtext' . $dt['coupon_id'] . '" style="margin: auto;">

                                    ' . $dt['coupon_desc'] . '                                                </p>

                                    <p class="Sdt_name">

                                    ' . $y . '                                                </p>



                                </div>

                                <div class="col-4">

                                    <center><span id="coupon' . $dt['coupon_id'] . '" class="coupon" style="font-size: 14px;">' . $dt['coupon_code'] . ' <a class="btn p-1 mb-1" onclick="copyFunction(' . $dt['coupon_id'] . ')"><i class="far text-weight-bold fa-copy fa-lg"></i></a></span></center><!-- </p> -->

                                    <a href="' . site_url('appointment_Controller/' . $yy . '/' . $xx) . '" style="margin-top: 5px;" class="btn btn-danger btn-block btn-md">Book Now</a>

                                    <center> <a class="text-danger pop" href="#" data-toggle="popover" title="Terms & Conditions" data-placement="top" data-content="Terms of service are the legal agreements between a service provider and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.">&ast; Terms & Conditions</a></center>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>';

                $first += 1;

            endif;

        endforeach;

        return $q;

    }

}


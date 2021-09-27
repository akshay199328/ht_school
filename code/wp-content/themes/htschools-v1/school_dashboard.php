
<?php
/**
 * WPLMS- DASHBOARD TEMPLATE
 */

if (!defined("ABSPATH")) {
    exit();
}

if (!is_user_logged_in()) {
    wp_redirect(home_url(), "302");
}

get_header(vibe_get_header());

$profile_layout = vibe_get_customizer("profile_layout");
$user_id = get_current_user_id();
$user = new WP_User($user_id);
$user_role = strval(wp_sprintf_l("%l", $user->roles));

if ($user_role != "school") {
    $profile_layout = "blank";
}
$user = wp_get_current_user();

vibe_include_template("profile/top$profile_layout.php");
function school_lms_student_info_data($page_num, $num)
{
    global $wpdb;
    $user = wp_get_current_user();

    $user_id = $user->ID;

    $schoolFieldID = 0;
    $schoolFieldIDSql =
        "SELECT ID FROM ht_bp_xprofile_fields WHERE name = 'Linked School'";
    $schoolFieldIDList = $wpdb->get_results(
        $wpdb->prepare($schoolFieldIDSql, [])
    );

    if (count($schoolFieldIDList) > 0) {
        $schoolFieldID = $schoolFieldIDList[0]->ID;
    }

    $st_stats = apply_filters(
        "wplms_report_student_stats",
        $wpdb->get_results(
            "
        SELECT posts.post_title as course,umeta.user_id as user,(SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_key = umeta.user_id AND post_id = posts.ID LIMIT 1) as score,posts.ID as course_id
        FROM {$wpdb->usermeta} AS umeta
        LEFT JOIN {$wpdb->posts} AS posts ON umeta.meta_key = posts.ID
        WHERE   posts.post_type     = 'course'
        AND     posts.post_status   = 'publish'
        AND     umeta.meta_key REGEXP '^[0-9]+$'
        AND     umeta.user_id IN (" .
                getStudentListQuery(2) .
                ")
        ORDER BY umeta.user_id DESC
        #LIMIT $page_num, $num
    "
        )
    );

    $schoolList = [];
    $student_info = [];

    $i = 0;
    foreach ($st_stats as $st) {
        $avg = get_post_meta($st->course_id, "average", true);
        $status = get_user_meta(
            $st->user,
            "course_status" . $st->course_id,
            true
        );
        if (isset($status)) {
            $schoolName = "";
            $schoolIDSql =
                "SELECT value FROM ht_bp_xprofile_data WHERE user_id = '%s' AND field_id = '%s'";

            $schoolIDList = $wpdb->get_results(
                $wpdb->prepare($schoolIDSql, [$st->user, $schoolFieldID])
            );
            //echo "<pre>";print_r($schoolIDList);exit();

            if (count($schoolIDList) > 0) {
                $school_id = $schoolIDList[0]->value;
                if (isset($schoolList[$schoolIDList[0]->value])) {
                    $schoolName = $schoolList[$schoolIDList[0]->value];
                } else {
                    $schoolName = get_user_meta(
                        $schoolIDList[0]->value,
                        "nickname",
                        true
                    );
                    $schoolList[$schoolIDList[0]->value] = $schoolName;
                }
            }

            $last_activity = get_user_meta($st->user, "last_activity", true);
            //$threshold = apply_filters('wplms_login_threshold',1800);
            $last_active_time = strtotime($last_activity);
            $difference = time() - $last_active_time - $threshold;

            $progress = bp_course_get_user_progress($st->user, $st->course_id);

            $child = $wpdb->get_results(
                "SELECT * FROM " .
                    $wpdb->prefix .
                    "parent_child_mapping WHERE child_id = " .
                    $st->user
            );

            $student_info[$i]["user"] = get_the_author_meta(
                "display_name",
                $st->user
            );
            $student_info[$i]["grade"] = $child[0]->grade;
            $student_info[$i]["school"] = $schoolName;
            $student_info[$i]["school_id"] = $school_id;
            $student_info[$i]["last_activity"] = $last_activity;
            $student_info[$i]["avg"] = is_numeric($avg) ? $avg : "n/a";
            $student_info[$i]["score"] = $progress;
            $student_info[$i]["course"] = isset($st->course)
                ? $st->course
                : "n/a";
        }
        $i++;
    }
    //echo "<pre>";print_r($student_info);exit();
    return $student_info;
}

global $wpdb;

$result = count_users();
$total_students = $result["total_users"];
foreach ($result["avail_roles"] as $role => $count) {
    if (
        $role == "instructor" ||
        $role == "administrator" ||
        $role == "author" ||
        $role == "editor" ||
        $role == "constributor"
    ) {
        $total_students = $total_students - $count;
    }
    if ($role == "instructor") {
        $total_instructors = $count;
    }
    if ($role == "administrator") {
        $total_administrators = $count;
    }
    if ($role == "author" || $role == "editor" || $role == "constributor") {
        $total_others = $count;
    }
}

$num = 20;
$paged = 0;

if ($_REQUEST["paged"] && is_numeric($_REQUEST["paged"])) {
    $paged = $_REQUEST["paged"];
}
$page_num = 0;
if (isset($_GET["paged"]) && is_numeric($_GET["paged"]) && $_GET["paged"]) {
    $page_num = $_GET["paged"] * $num;
}

$student_info = school_lms_student_info_data($page_num, $num);
$array2 = [];
foreach ($student_info as $course) {
    if ($course["school_id"] == $user->ID) {
        array_push($array2, $course);
    }
}

$school_data = $array2;
$sName = get_user_meta($user->ID, "nickname", true);

$page_info = lms_student_school_info_data($page_num, $num);
$array1 = [];

foreach ($page_info as $course) {
    if ($course["school"] == $sName) {
        array_push($array1, $course);
    }
}
$school_data1 = $array1;

$act = [];
$inact = [];
foreach ($school_data1 as $course) {
    $todays = date("Y-m-d") . " 00:00:00";

    if (strtotime($course["last_activity"]) >= strtotime($todays)) {
        array_push($act, $course);
    }

    if (strtotime($course["last_activity"]) < strtotime($todays)) {
        array_push($inact, $course);
    }
}

$total_stud = count($school_data1);
$total_active = count($act);
$total_inactive = count($inact);

//echo "<pre>";print_r($inact);exit();

$cf = apply_filters(
    "wplms_report_total_active_students",
    $wpdb->get_results(
        apply_filters(
            "wplms_usermeta_direct_query",
            "
        SELECT count(user_id) as total FROM {$wpdb->usermeta}
        WHERE   meta_key    = 'last_activity'
    "
        )
    )
);

$active_students =
    $cf[0]->total - $total_instructors - $total_administrators - $total_others;

$qe = apply_filters(
    "wplms_report_total_course_students",
    $wpdb->get_results("
        SELECT sum(meta_value) as total FROM {$wpdb->postmeta}
        WHERE   meta_key    = 'vibe_students'

    ")
);
$course_students = $qe[0]->total;

$studentCountResult = $wpdb->get_results(getStudentListQuery(1));

/*echo $user_id;  
    $school_info= array_search($user_id,$student_info);
echo "<pre>";print_r($school_info);exit();*/

if (count($studentCountResult) > 0) {
    $total_students = $studentCountResult[0]->total;
}

$total_schools = 0;

$schoolCountSql = "SELECT COUNT(1) AS total FROM ht_users ";
$schoolCountSql .=
    "INNER JOIN ht_usermeta ON ht_users.ID = ht_usermeta.user_id ";
$schoolCountSql .= "WHERE ht_usermeta.meta_key = 'ht_capabilities' ";
$schoolCountSql .= "AND ht_usermeta.meta_value LIKE '%school%' ";
$schoolCountResult = $wpdb->get_results($schoolCountSql);

if (count($schoolCountResult) > 0) {
    $total_schools = $schoolCountResult[0]->total;
}
?>
    <head>
   <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/> -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() .
            "/assets/css/school-datatable-custom.css"; ?>"/>
<script type="text/javascript" src="<?php echo get_template_directory_uri() .
    "/assets/js/datatables.min.js"; ?>"></script>
 <script type="text/javascript" src="<?php echo get_template_directory_uri() .
     "/assets/js/school-datatables.js"; ?>"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>
      
</head>
<div class="school_studTotal">
    <div class="school-container">
        <div class="breadcrumb">
            <?php
                $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                    vibe_breadcrumbs(); 
            ?>
        </div>
        <div class="top-align">
            <div class="total-left">
                <span class="icon">
                    <?php bp_displayed_user_avatar("type=full"); ?>
                </span>
                <span class="school-name_total">
                    <h4><?php echo $sName; ?></h4>
                    <h3>Registered Students</h3>
                </span>
                
            </div>
            <div class="total-right">
                <ul>
                    <li>
                        <span class="number"><?php echo $total_stud; ?></span>
                        <h6>Total Enrolled Count </h6>
                    </li>
                    <li>
                        <span class="number"><?php echo $total_active; ?></span>
                        <h6>Total Active Students </h6>
                    </li>
                    <li>
                        <span class="number"><?php echo $total_inactive; ?></span>
                        <h6>Total Inactive Students </h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="poststuff" class="vibe-reports-wrap datatable-fix">
    <div class="datatable-container">
        <div class="vibe-reports-main">
            <div class="postbox course_info">
                <div class="page-title">
                    <h5>Dashboard</h5>
                </div>
                <div class="custom_datatable" id='dt'>
                    <div class="post-top">
                        <div class="postbox_left">
                            <input type="text" id="myInputTextField" placeholder="Search Students">
                        </div>
                        <div class="postbox_right">
                            <div class="cutom-checkbox">
                                <label class="checkbox">Progress less than 100%
                                    <input type="checkbox" id="maxTemp27">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- <input type="checkbox" id="maxTemp27"> Progress less than 100% -->
                            <div class="select-class">
                                <span class="title">Class :</span>
                                <select class="sch" id="dropdown1">
                                    <option value="">All Classes</option>
                                    <option value="-">-</option>
                                    <option value="k1">k1</option>
                                    <option value="k2">k2</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>
                                    <option value="6th">6th</option>
                                    <option value="7th">7th</option>
                                    <option value="8th">8th</option>
                                    <option value="9th">9th</option>
                                    <option value="10th">10th</option>
                                    <option value="11th">11th</option>
                                    <option value="12th">12th</option>
                                </select>
                            </div>
                            <div class="select-sort">
                                <!-- <span class="title">Sort by :</span> -->
                                <select class="sch" id="dropdown2">
                                    <option value="">Active/Inactive</option>
                                    <option value="enable">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tabble-background">
                        <table id="datatable" class="" style="width:100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th class='mobile_hide'>Class</th>
                                <th class='mobile_hide'>School</th>
                                <th class='mobile_hide'>Course</th>
                                <th style="display: none;">Status</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($school_data as $info) {
                                    $today = date("Y-m-d") . " 00:00:00";
                                    $last_active = $info["last_activity"];
                                    if (
                                        strtotime($last_active) >= strtotime($today)
                                    ) {
                                        $status = "enable";
                                    } else {
                                        $status = "inactive";
                                    }

                                    echo "<tr>";
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>" . $info["user"] ."<span class='mobile_view'>".
                                        ($info["grade"] ? $info["grade"] : "-") ."</span>"."<span class='mobile_view'>".
                                        ($info["school"]
                                            ? $info["school"]
                                            : "n/a") ."</span>"."<span class='mobile_view'>".
                                        $info["course"]."</span></td>";
                                    echo "<td class='mobile_hide'>" .
                                        ($info["grade"] ? $info["grade"] : "-") .
                                        "</td>";
                                    echo "<td class='mobile_hide'>" .
                                        ($info["school"]
                                            ? $info["school"]
                                            : "n/a") .
                                        "</td>";
                                    echo "<td class='mobile_hide'>" . $info["course"] . "</td>";
                                    echo '<td style="display: none;">' .
                                        $status .
                                        "</td>";
                                    echo "<td>" .
                                        ($info["score"] ? $info["score"] : "0") .
                                        "% </td>";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        /* Initialization of datatable */
                        $(document).ready(function() {
                            $('#datatable').DataTable( {} );
                        } );
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>   

<?php
vibe_include_template("profile/bottom.php");

get_footer(vibe_get_footer());


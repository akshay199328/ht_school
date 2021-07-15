<?php include("includes/lead-dashboard.php"); ?>
<section class="dashboard-wrapper">
    <div class="container">
        <div class="notice-board">
            <div class="pull-left">
                <h6>notice board</h6>
                <p>Get 20% discount on cuemath coupon. Please use the <strong>Code CM20P123.</strong></p>
            </div>
            <div class="pull-right">
                <div class="board_point">
                    <h6>Points</h6>
                    <h3>1020</h3>
                </div>
            </div>
        </div>
        <div class="dahboard_tab">
            <ul class="nav nav-tabs top-tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="learning-tab" data-bs-toggle="tab" data-bs-target="#learning" type="button" role="tab" aria-controls="learning" aria-selected="true">
                        Learning
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mock-tab" data-bs-toggle="tab" data-bs-target="#mock" type="button" role="tab" aria-controls="mock" aria-selected="false">
                        Mock Qualifier
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="qualifier-tab" data-bs-toggle="tab" data-bs-target="#qualifier" type="button" role="tab" aria-controls="qualifier" aria-selected="false">
                       Qualifier
                       <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        Finale
                        <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836" class="declaration">
                            <path id="Shape_924" data-name="Shape 924" d="M3192.22,367.219a8.916,8.916,0,1,0-12.979-.392l.083.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.941,8.941,0,0,0,3192.22,367.219Zm-5.933-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,1,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.247-1.566.144-.907.31-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.3,3.3,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.76a.494.494,0,0,1,.556.494,5.617,5.617,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.111-.062.35-.123.68-.164,1.03a1.311,1.311,0,0,0,.041.494.384.384,0,0,0,.432.31,2.3,2.3,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,5.994,5.994,0,0,1-1.051-.062A1.622,1.622,0,0,1,3183.959,364.788Z" transform="translate(-3176.997 -351.997)" fill="#fff"/>
                        </svg>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="learning" role="tabpanel" aria-labelledby="learning-tab">
                    <div class="col-7 col-md-7 col-sm-12  pull-left mrg">
                        <div class="leftcontent_tab">
                            <div class="details_header">
                                <div class="col-md-12 col-sm-12 mrg">
                                    <div class="option_share">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.834" height="17.836" viewBox="0 0 17.834 17.836">
                                                <path id="Shape_924_copy_4" data-name="Shape 924 copy 4" d="M3480.22,446.219a8.916,8.916,0,1,0-12.979-.391l.082.062a4.207,4.207,0,0,1-1.834,2.081.351.351,0,0,0,.1.659,5.044,5.044,0,0,0,3.791-1.03l.02.021A8.942,8.942,0,0,0,3480.22,446.219Zm-5.934-11.806a1.463,1.463,0,0,1,0,2.926,1.463,1.463,0,0,1,0-2.926Zm-2.328,9.375c.062-.515.144-1.051.248-1.566.144-.907.309-1.813.474-2.72,0-.062.02-.123.02-.165,0-.371-.124-.515-.494-.556a3.293,3.293,0,0,1-.474-.082.331.331,0,0,1-.247-.371.318.318,0,0,1,.329-.288,1.755,1.755,0,0,1,.33-.021h2.761a.494.494,0,0,1,.556.494,5.614,5.614,0,0,1-.082.845c-.185,1.03-.371,2.081-.577,3.112-.061.35-.124.68-.164,1.03a1.32,1.32,0,0,0,.041.495.385.385,0,0,0,.433.309,2.315,2.315,0,0,0,.536-.144c.144-.062.268-.145.412-.206a.233.233,0,0,1,.33.288.879.879,0,0,1-.206.351,2.722,2.722,0,0,1-1.916.865,6.007,6.007,0,0,1-1.051-.062A1.623,1.623,0,0,1,3471.959,443.788Z" transform="translate(-3464.997 -430.997)"/>
                                            </svg>
                                        </span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16">
                                                <path id="Shape_874" data-name="Shape 874" d="M3516.475,431l9.524,7.407-9.524,7.408v-3.852c-.507-.023-9.338-.306-15.476,5.037,2.457-7.534,10.171-10.811,15.476-12.148Z" transform="translate(-3500.999 -430.999)"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="video_decp">
                                    <div class="col-md-4 col-sm-12 mrg pull-left">
                                        <video width="100%" height="240" controls="" poster="images/video-poster.png">
                                            <source src="images/videos/dummy.mp4" type="video/mp4">
                                            <source src="images/videos/dummy.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <div class="col-md-8 col-sm-12 mrg pull-left">
                                        <div class="details">
                                            <h4>Website Development with HTML & CSS</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                            incididunt adipisicing elit, sed do eiusmo
                                            incididunt </p>
                                            <button type="button" class="resume_btn btn">Resume Learning</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                <div class="progress">
                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="details_footer">
                                <span class="head">Total Chapter: 10</span>
                                <div class="tab_scroll">
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>800 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>40%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>800 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>40%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6>
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>800 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>40%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-40" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6 class="disabled">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>0 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>0%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-0" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6 class="disabled">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>0 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>0%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-0" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="col-md-6 col-sm-12 mrg pull-left">
                                            <h5>Chapter 1 : Elements</h5>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mrg pull-right">
                                            <h6 class="disabled">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.626" height="21.626" viewBox="0 0 21.626 21.626">
                                                        <path id="Shape_882" data-name="Shape 882" d="M3382.348,786.705a10.813,10.813,0,1,0,10.813,10.813A10.813,10.813,0,0,0,3382.348,786.705Zm7.006,10.071-2.8,2.728.665,3.843a.973.973,0,0,1-.391.949.957.957,0,0,1-1.027.078l-3.451-1.819-3.451,1.819a.972.972,0,0,1-1.037-.078.993.993,0,0,1-.391-.949l.665-3.843-2.8-2.728a.975.975,0,0,1,.548-1.662l3.852-.567,1.731-3.491a1.009,1.009,0,0,1,1.75,0l1.731,3.491,3.853.567a.976.976,0,0,1,.548,1.662Z" transform="translate(-3371.536 -786.705)" fill="#ffcd35"/>
                                                    </svg>
                                                </span>0 / 1000
                                            </h6>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mrg">
                                            <div class="progressbar">
                                                <span class="pull-left">
                                                    <p>Completed</p>
                                                </span>
                                                <span class="pull-right">
                                                    <h6>0%</h6>
                                                </span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mrg pull-left">
                                                <div class="progress">
                                                    <div class="progress-bar w-0" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 pull-left mrg">
                        <div class="points_board">
                            <div class="top-points">
                                <div class="pull-left">
                                    <h6>Points</h6>
                                </div>
                                <div class="pull-right">
                                    <span class="total_point">Total<span class="break">Points</span> </span>
                                    <span class="points">1020</span>
                                </div>
                                <div class="board-button">
                                    <button type="button">VIEW POINTS DETAILS</button>
                                </div>
                            </div>
                            <div class="earn-points">
                                <div class="pull-left">
                                    <h6>Earn points</h6>
                                </div>
                                <div class="board-button">
                                    <button type="button">REFERRALS</button>
                                    <button type="button">UPLOAD PROJECT</button>
                                </div>
                            </div>
                        </div>
                        <div class="leader_board">
                            <div class="col-sm-12 mrg">
                                <div class="pull-left">
                                    <span class="head">Leaderboard</span>
                                </div>
                                <div class="pull-right">
                                    <h6>Your Rank <span class="rank">08</span></h6>
                                </div>
                            </div>
                            <div class="rank-people">
                                <span class="rank-two">
                                    <figure>
                                        <img src="images/rank2.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                                <span class="rank-one">
                                    <figure>
                                        <img src="images/rank1.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                                <span class="rank-three">
                                    <figure>
                                        <img src="images/rank3.png">
                                    </figure>
                                    <p class="name">Dummy Name</p>
                                </span>
                            </div>
                            <div class="board-list">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-zone-tab" data-bs-toggle="pill" data-bs-target="#pills-zone" type="button" role="tab" aria-controls="pills-zone" aria-selected="true">ZONES</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-school-tab" data-bs-toggle="pill" data-bs-target="#pills-school" type="button" role="tab" aria-controls="pills-school" aria-selected="false">SCHOOLS</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-zone" role="tabpanel" aria-labelledby="pills-zone-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-school" role="tabpanel" aria-labelledby="pills-school-tab">
                                        <div class="tab_scroll">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">1000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                        <tr>
                                                            <td>03</td>
                                                            <td>Dummy name</td>
                                                            <td class="numbers">800</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mock" role="tabpanel" aria-labelledby="mock-tab">
                    2
                </div>
                <div class="tab-pane fade" id="qualifier" role="tabpanel" aria-labelledby="qualifier-tab">
                    3
                </div>
                <div class="tab-pane fade" id="finale" role="tabpanel" aria-labelledby="finale-tab">
                    4
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>
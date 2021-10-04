@include('layouts.header_school_dashboard')
<main id="main">
<section id="content" class="dashboard_content">
    <div id="buddypress">
        <div class="member_header main dashboard_header">
            <div id="item-header" class="" role="complementary">
                <div class="container">
                    <div class="innerheader-space"></div>
                    <div class="">
                        <div class="col-xs-12 col-md-8 mrg right-part-menu">
                            
                        </div>
                        <div class="col-xs-12 col-md-4 mrg">
                            <div class="details_align">
                                <div class="mrg">
                                   <div id="item-header-avatar">
                                      <h2> My Profile</h2>
                                   </div>
                                   <!-- #item-header-avatar -->
                                   <div class="Profile_details">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 mrg right-part-menu">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-align">
                    <div class="pull-left">
                        <h3 id="profile_current_menu">School Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="school-dashboard">
            <div class="">
                <div class="">
                    <div class="padder dashboard_accountinfo">
                        <div class="school_studTotal">
                            <div class="container">
                               <div class="total-left">
                                    <span class="icon">
                                        <img loading="lazy" src="../assets_dashboards/img/school.jpg" class="avatar user-30273-avatar avatar-300 photo" width="300" height="300" alt="Profile picture of Army Base Wokshop High School">
                                    </span>
                                    <span class="school-name_total">
                                       <h4>{{ Session::get('school_name') }}</h4>
                                       <h3>Registered Students</h3>
                                    </span>
                               </div>
                               <div class="total-right">
                                 <ul>
                                    <li>
                                       <span class="number">0</span>
                                       <h6>Total Enrolled Count </h6>
                                    </li>
                                    <li>
                                       <span class="number">0</span>
                                       <h6>Total Active Students </h6>
                                    </li>
                                    <li>
                                       <span class="number">0</span>
                                       <h6>Total Inactive Students </h6>
                                    </li>
                                 </ul>
                              </div>
                            </div>
                        </div>
                        <div id="poststuff" class="vibe-reports-wrap datatable-fix">
                           <div class="container">
                                <div class="vibe-reports-main">
                                 <div class="postbox course_info">
                                    <div class="custom_datatable" id='dt'>
                                       <table id="datatable" class="" style="width:100%">
                                           <thead>
                                              <tr>
                                                 <th>No.</th>
                                                 <th>Name</th>
                                              </tr>
                                           </thead>
                                           <tbody>
                                              <tr>
                                                 <td></td>
                                                 <td></td>
                                              </tr>
                                              <tr>
                                                 <td></td>
                                                 <td></td>
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
        </div>
    </div>
</section>
</main>
@include('layouts.footer_school_dashboards')